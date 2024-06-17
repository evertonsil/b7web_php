<?php

class Notes
{
    public function getAllNotes()
    {
        $curl = curl_init();
        $url = 'http://localhost/b7web/php/modulo9/DevsNotes/api/getall.php';

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        //transformando retorno JSON em um array (utilizar o 'true' para ser array)
        $data = json_decode($response, true);

        return $data;
    }

    public function getNote($noteId)
    {
        $curl = curl_init();
        $url = 'http://localhost/b7web/php/modulo9/DevsNotes/api/get.php?id=' . $noteId;

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($curl);

        $data = json_decode($response, true);

        return $data;
    }
}