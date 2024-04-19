<?php

require ('../config.php');

//verificando o método da requisição
$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'put') {

    //capturando os parâmetro utilizando o 'método raiz', para capturar através do PUT
    parse_str(file_get_contents('php://input'), $input);

    //verificando existência do parâmetro id, utilizando a forma simplificada do if ternário
    $id = $input['id'] ?? null;
    $title = $input['title'] ?? null;
    $body = $input['body'] ?? null;

    //Limpando as váriávies
    $id = filter_var($id);
    $title = filter_var($title);
    $body = filter_var($body);

    if ($id && $title && $body) {
        //verficando se a nota existe
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //Atualizando a nota existente
            $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->execute();

            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body
            ];
        } else {
            $array['error'] = 'A nota indicada não foi encontrada';
        }
    } else {
        $array['error'] = 'Os dados não foram enviados';
    }

} else {
    $array['error'] = 'Método Inválido (apenas PUT)';
}

require ('../return.php');