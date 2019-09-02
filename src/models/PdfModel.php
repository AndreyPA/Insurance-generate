<?php
declare(strict_types = 1);

namespace FatalErrorOnline\Models;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReadXlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriteXlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class PdfModel
{
    /**
    * @param string $blank - path to XLS template
    * @param string $pathFiles - path to directory with output files
    * @param string $uuid - for creating unique directory
    * @param string $pathTmp - path to template directory
    * @param string $namePdf - name of output pdf file
    * @param array $xlsData - get data for filling template
    * @return bool after pdf ready for upload
    */
    public function __construct(string $blank = '', string $pathFiles = '', string $uuid = '', string $pathTmp = '', string $namePdf = '', array $xlsData){
	$this->blank = $blank;
	$this->files = $pathFiles;
	$this->uuid = $uuid;
	$this->tmp = $pathTmp;
	$this->name = $namePdf;
	$this->data = $xlsData;
    }

    /**
    * @return bool after pdf ready for upload
    */
    public function createInsurancePolicy() : bool
    {
	$oReader = new ReadXlsx();
	$spreadsheet = $oReader->load($this->blank);

	$sheet = $spreadsheet->getActiveSheet();
	foreach ($this->data as $indx => $val) {
	    $sheet->setCellValue($indx, $val);
	}
	
	$oWriter = IOFactory::createWriter($spreadsheet, 'Mpdf');
	$oWriter->save($this->tmp . '/' . $this->name);
	
	//Check directory for save policy 
	if (!file_exists($this->files)) mkdir($this->files);

	$newPath = $this->files. '/' . $this->uuid;
	mkdir($newPath);
	copy($this->tmp . '/' . $this->name, $newPath . '/' . $this->name);
	
	unlink($this->tmp . '/' . $this->name);
	return true;

    }
}