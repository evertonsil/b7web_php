<?php

//recebe id do post do ajax
$id = filter_input(INPUT_POST, 'noteId');
$curl = curl_init();

//envia o id recebido pelo ajax, como parâmetro na rota da api
$url = 'http://localhost/b7web/php/modulo9/DevsNotes/api/get.php?id=' . $id;

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

header('Content-Type: application/json');
echo json_encode($data);


