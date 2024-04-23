<?php

require ('../config.php');

//verificando o método da requisição
$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'delete') {

    //capturando os parâmetro utilizando o 'método raiz', para capturar através do DELETE
    parse_str(file_get_contents('php://input'), $input);

    //capturando a primeira chave do array
    $chave = key($input);
    //decodificando a chave para um array
    $noteIdArray = json_decode($chave, true);

    //verificando existência do parâmetro id, utilizando a forma simplificada do if ternário
    $id = $noteIdArray['noteId'] ?? null;

    //Limpando as váriávies
    $id = filter_var($id);

    if ($id) {
        //verficando se a nota existe
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //Atualizando a nota existente
            $sql = $pdo->prepare("DELETE FROM notes WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            $array['result'] = 'Nota apagada com sucesso!';
        } else {
            $array['error'] = 'ID inexistente';
        }
    } else {
        $array['error'] = 'ID nao enviado';
    }

} else {
    $array['error'] = 'Método Inválido (apenas DELETE)';
}

require ('../return.php');