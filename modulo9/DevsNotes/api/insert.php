<?php

require ('../config.php');

//verificando o método da requisição
$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'post') {

    //capturando o title e body da nota através do POST
    $title = filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');

    if ($title && $body) {
        //preprarando query sql para inserir, após validação do preenchimento dos campos
        $sql = $pdo->prepare('INSERT INTO notes (title, body) VALUE (:title, :body)');
        $sql->bindValue(':title', $title);
        $sql->bindValue(':body', $body);
        $sql->execute();

        $id = $pdo->lastInsertId();
        $array['result'] = [
            'id' => $id,
            'title' => $title,
            'body' => $body
        ];
    } else {
        $array['error'] = 'Os campos não foram enviados';
    }

} else {
    $array['error'] = 'Método Inválido (apenas POST)';
}

require ('../return.php');