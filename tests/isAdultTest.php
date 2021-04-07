<?php

require "../class/User.php";
require "../vendor/testTool.php";


$ageTest = array(
    array(
        "age" => 10,
        "expectedResult" => false
    ),
    array(
        "age" => 30,
        "expectedResult" => true,
    ),
    array(
        "age" => 18,
        "expectedResult" => true,
    ),
);

foreach ($ageTest as $testCase){

}





