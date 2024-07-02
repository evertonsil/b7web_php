<?php


$db_host = 'localhost';
$db_name = 'b7web_users';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=$db_name;db_host=$db_host", $db_user, $db_pass);

$array = [
    'error' => '',
    'result' => []
];