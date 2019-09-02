<?php
$config = [
    'pathBlank' => './template/Blank.xlsx',
    'pathFiles' => './static',
    'pathTmp' => '/tmp',
    'urlPdf' => 'http://policy.fatal-error.online/static',
    'namePdf' => 'policy.pdf',
    'policy' => [
	'date' => [ 'C31', 'D31', 'E31', 'F31', 'G31', 'H31', 'I31', 'J31', 'K31', 'L31' ], // dd.mm.yyyy
	'validFrom' => [ 'C28', 'D28', 'E28', 'F28', 'G28', 'H28', 'I28', 'J28', 'K28', 'L28' ], // dd.mm.yyyy
	'validThrough' => [ 'C29', 'D29', 'E29', 'F29', 'G29', 'H29', 'I29', 'J29', 'K29', 'L29' ], // dd.mm.yyyy
	'premium' => [ 'C30' ],
	'brandName' => [ 'C9' ],
	'modelName' => [ 'C8' ],
	'modificationName' => [ 'C11' ],
	'year' => [ 'C10', 'D10', 'E10', 'F10' ],
	'plate' => [ 'C12', 'D12', 'E12', 'F12', 'G12', 'H12', 'I12', 'J12', 'K12' ],
	'VIN' => [ 'C13', 'D13', 'E13', 'F13', 'G13', 'H13', 'I13', 'J13', 'K13', 'L13', 'M13', 'N13', 'O13', 'P13', 'Q13', 'R13', 'S13' ],
    	'surname' => [ 'C17' ],
        'name' => [ 'C18' ],
        'patronymic' => [ 'C19' ],
        'birthDate' => [ 'C20', 'D20', 'E20', 'F20', 'G20', 'H20', 'I20', 'J20', 'K20', 'L20' ],
        'address' => [ 'C21' ],
        'license' => [ 'C22', 'D22', 'E22', 'F22', 'G22', 'H22', 'I22', 'J22', 'K22', 'L22' ], 
        'experienceYears' => [ 'C23', 'D23' ],
        'phone' => [ 'C24', 'D24', 'E24', 'F24', 'G24', 'H24', 'I24', 'J24', 'K24', 'L24', 'M24', 'N24' ],
    ]
];

