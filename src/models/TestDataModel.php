<?php
declare(strict_types = 1);

namespace FatalErrorOnline\Models;

class TestDataModel
{

    /**
    *  @return json $testRequest - data for testing
    */
    public $testRequest = '
    {
      "policy": {
        "date": "2019-07-30",
        "validFrom": "2019-08-01",
        "validThrough": "2020-07-31",
        "premium": 14522.45,
        "car": {
            "brandName": "Renault",
	    "brandID": 348,
            "modelName": "Duster",
            "modelID": 49,
            "modificationName": "1.6 л 76 л.с.",
            "modificationID": 9023,
            "year": 2013,
            "plate": "A999BC777",
            "VIN": "X7LHSRGAN57192549"
    	},
        "driver": {
    	    "surname": "Иванов",
            "name": "Сергей",
            "patronymic": "Петрович",
            "birthDate": "1980-07-26",
            "address": "Москва, Красная пл., д. 1, кв. 17",
            "license": "7777123456",
            "experienceYears": 3,
            "phone": "+79051234567"
        }
      }
    }
    ';

}