<?php

use validator\ValidateDate;

require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateDate.php";

$testCases = [
    [
        'input' => '18/10/1993',
        'expected' => '18/10/1993' 
    ],
    [
        'input' => '19/33/1975',
        'expected' => false
    ],
    [
        'input' => '00/00/0000',
        'expected' => false
    ],
    [
        'input' => '32/05/1975',
        'expected' => false
    ],
    [
        'input' => '05-05-1998',
        'expected' => false
    ],
    [
        'input' => '05#05#1998',
        'expected' => false
    ],
    [
        'input' => '33/09/1975',
        'expected' => false
    ]
];

foreach ($testCases as $key => $test){
    $input = $test['input'];
    $expected = $test['expected'];

    $v = new ValidateDate();

    if ($v->isValid($input) != $expected){
        echo "\ntest numero $key NON superato, mi aspettavo: ";
        var_dump($expected);
        echo"\nma ho trovato";
        var_dump($v->isValid($input));
    };
};