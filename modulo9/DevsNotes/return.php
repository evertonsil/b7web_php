<?php
header("Access-Control-Allow-Origin: *"); //Permissão para requições
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); //Permissão para todos os métodos 
header("Content-Type: application/json");  //Definindo tipo de conteúdo para JSON
echo json_encode($array);
exit;