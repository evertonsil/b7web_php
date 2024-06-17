<?php
header("Access-Control-Allow-Origin: *"); //Permissão para requições
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); //Permissão para todos os métodos 
header("Content-Type: application/json; charset=UTF-8");  //Definindo tipo de conteúdo para JSON
echo json_encode($array);

// if ($array['result'] != null) {
//     header('Location: http://localhost/b7web/php/modulo9/DevsNotes');
//     exit;
// }