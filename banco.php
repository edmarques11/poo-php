<?php

require_once('./src/Conta.php');
require_once('./src/Titular.php');

$primeiraConta = new Conta(new Titular('Edmarques', '123.456.789-10'), 99999999);
$conta2 = new Conta(new Titular('Fulano da Sila', '101.234.567-89'));

var_dump($primeiraConta);
echo PHP_EOL . Conta::getNumeroDeContas() . PHP_EOL;

new Conta(new Titular('alguem', '765.123.880-90'));