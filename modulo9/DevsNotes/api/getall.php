<?php

require ('../config.php');

//verificando o método da requisição
$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'get') {

    //executando a query para chamar a listagem das notas
    $sql = $pdo->query('SELECT * FROM notes');
    if ($sql->rowCount() > 0) {
        $return = $sql->fetchAll(PDO::FETCH_ASSOC);
        //adicionando o resultado da query no array de resultado
        foreach ($return as $item) {
            $array['result'][] = [
                'id' => $item['id'],
                'title' => $item['title']
            ];
        }
    }

} else {
    $array['error'] = 'Método Inválido (apenas GET)';
}

require ('../return.php');