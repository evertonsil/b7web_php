<?php

$id = filter_input(INPUT_POST, 'noteId');

$data = array(
    'noteId' => $id
);

$data_json = json_encode($data);

$curl = curl_init();
$url = 'http://localhost/b7web/php/modulo9/DevsNotes/api/delete.php';

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

return $data;

