<?php
session_start();

if (isset($_SESSION['name'])) {
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Informações de Usuário</title>
</head>

<body class="bg-light">
    <section class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <p>
                    <strong>Nome: </strong>
                    <?php echo $_SESSION['username']; ?>
                </p>
                <p>
                    <strong>Email: </strong>
                    <?php echo $_SESSION['usermail']; ?>
                </p>
                <div>
                    <a href="exit.php"><button class="btn btn-danger">Sair</button></a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>