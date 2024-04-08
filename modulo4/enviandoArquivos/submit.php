<?php
session_start();

//Validando o tipo de arquivo
$arquivosPermitidos = ['image/jpeg', 'image/jpg', 'image/png'];

if (in_array($_FILES['inpFile']['type'], $arquivosPermitidos)) {
    //Gerando um novo nome aleatório para o arquivo, evitando duplicidade.
    $fileName = md5(time() . rand(0, 100)) . '.jpg';

    move_uploaded_file($_FILES['inpFile']['tmp_name'], 'arquivos/' . $fileName);

    $_SESSION['success'] = 'Arquivo salvo com sucesso!';
    $_SESSION['error'] = '';
    header('Location: index.php');
} else {
    $_SESSION['success'] = '';
    $_SESSION['error'] = 'Tipo de arquivo não permitido';
    header('Location: index.php');
}

