<?php

//Exercício prático Orientação a Objetos PHP

require_once 'calculadora.php';

$calc = new Calculadora();
$calc->add(1);
$calc->add(2);
$calc->sub(1);
$calc->multiply(2);
$calc->divide(1);
$calc->add(1);

echo 'Total: ' . $calc->total();

$calc->clear();
