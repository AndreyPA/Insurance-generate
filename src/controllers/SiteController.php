<?php
declare(strict_types = 1);
 
namespace FatalErrorOnline\Controllers;

use FatalErrorOnline\Models\TestDataModel;
use FatalErrorOnline\Models\PdfModel;
use FatalErrorOnline\Models\UuidModel;

class SiteController
{

    private $templateArray = [];
    private $template = [];
    
    public function __construct (){
	global $config;
	$this->config = $config;
    }


    /**
    * @return json with policy url
    */
    public function actionIndex()
    {
	$postData = (isset($_POST['postData'])) ? $_POST['postData'] : (new TestDataModel())->testRequest;
	
	$readyData = $this->serializeData(json_decode($postData, true)); 
	$xlsData = $this->convertData($readyData, $this->config['policy']);

	$uuid = UuidModel::generate();

	$pdfCreate = new PdfModel($this->config['pathBlank'], 
				  $this->config['pathFiles'],
				  $uuid, 
				  $this->config['pathTmp'], 
				  $this->config['namePdf'], $xlsData);
				  
	$pdf = $pdfCreate->createInsurancePolicy();

	$asset['policy'] = $pdf ? [ 'download' =>  $this->config['urlPdf'] . '/' . $uuid . '/' . $this->config['namePdf'] ] : null;
	
        return [ 'asset' => $asset, 'type' => 'json'];
    }
    
    /**
    * @param array $postData policy data
    * @return array with serialize data
    */
    private function serializeData( $postData ) : array
    {
	foreach($postData as $indx => $val) { 
	    if (!is_array($val)) {
		$this->templateArray[$indx] = $val;
	    } else {
		$this->serializeData($val);
	    }
	}
	return $this->templateArray;
    }

    /**
    * @param array $readyData with all policy data
    * @param array $policy with list XLS cells
    * @return array
    */
    private function convertData(array $readyData = [], array $policy = []) : array
    {
	// Filling XLS Template cells from geted data
	foreach ($policy as $indx => $val) {
	    if (isset($readyData[$indx])) {
		$lineStr = (string)$readyData[$indx];
		if (count($val) > 1) {
		    if (preg_match('/\d{4}-\d{2}-\d{2}/', $lineStr)) {
			$date = \DateTime::createFromFormat('Y-m-d', $lineStr);
			$newDate = $date->format('d.m.Y');
			$readyData[$indx] = $newDate;
		    }
		    $lineStr = (string)$readyData[$indx];
		    foreach ($val as $indx1 => $val1) {
			$char = mb_substr($lineStr, $indx1, 1);
			$this->template[$val1] = $char;
		    }
		} else {
		    $this->template[$val[0]] = $readyData[$indx];
		    
		}
	    }
	}
	return $this->template;
    }

}