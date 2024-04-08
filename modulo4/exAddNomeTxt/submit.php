<?php

session_start();

$nome = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

if ($nome != '') {
    $nomes = file_get_contents('nomes.txt');
    if ($nomes) {
        $nomes .= "\n" . $nome;
    } else {
        $nomes .= $nome;
    }
    file_put_contents('nomes.txt', $nomes);
    $_SESSION['success'] = 'Nome cadastrado com sucesso!';
    $_SESSION['error'] = '';
    header('Location: index.php');
} else {
    $_SESSION['error'] = 'Por favor preencha o campo de nome!';
    $_SESSION['success'] = '';
    header('Location: index.php');
}