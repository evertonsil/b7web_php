<?php

require ('../config.php');

//verificando o método da requisição
$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'get') {

    //capturando o id da nota através do GET
    $id = filter_input(INPUT_GET, 'id');
    if ($id) {

        $sql = $pdo->prepare('SELECT * FROM notes WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $array['result'] = [
                'id' => $result['id'],
                'title' => $result['title'],
                'body' => $result['body']
            ];
        } else {
            $array['error'] = 'Nenhuma nota econtrada!';
        }

    } else {
        $array['error'] = 'ID não enviado!';
    }
} else {
    $array['error'] = 'Método Inválido (apenas GET)';
}

require ('../return.php');