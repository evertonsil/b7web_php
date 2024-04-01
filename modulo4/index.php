<?php

session_start();

if (isset($_SESSION['username'])) {
    header('Location: user.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
    $userMail = filter_input(INPUT_POST, 'usermail', FILTER_SANITIZE_EMAIL);

    $_SESSION['username'] = $userName;
    $_SESSION['usermail'] = $userMail;
    if (
        isset($_SESSION['username']) &&
        $_SESSION['username'] != '' &&
        $_SESSION['usermail'] != ''
    ) {
        header('Location: user.php');
    }
}
//Criar um form que salve o nome do usuário
/*Ao abir a página verificar se existe uma session com o nome "name"
Se não tiver, direciona pra tela de login, se tiver, redireciona pra outra página
onde exibe as informações do usuário e um botão sair*/

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>

<body class="bg-light">
    <section class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="">
                            <label for="username">Qual seu nome?</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="usermail" name="usermail" placeholder="">
                            <label for="username">Qual se email?</label>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>