<?php

//Inclure les classes 
require 'Calculator.php';
require 'CalculatorTest.php';
//Créer un objet CalculatorTest et exécuter les tests
$test = new CalculatorTest();
$test->testAdd();
$test->testSubstract();
$test->testSetAndGetResult();
?>