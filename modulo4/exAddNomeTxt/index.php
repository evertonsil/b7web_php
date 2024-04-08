<?php

session_start();
if (file_exists('nomes.txt')) {
    $nomes = file_get_contents('nomes.txt');
    $nomes = explode("\n", $nomes);
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>🖊️ Add Nome Txt</title>
</head>
<style>
    .error {
        color: #990000;
        font-weight: 600;
    }

    .success {
        color: #009900;
        font-weight: 600;
    }
</style>

<body class="bg-light">
    <section class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <form id="loginForm" action="submit.php" method="POST">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="">
                            <label for="username">Insira um nome</label>
                            <span class="error errUserName">
                                <?php echo $_SESSION['error']; ?>
                            </span>
                            <span class="success">
                                <?php echo $_SESSION['success']; ?>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </div>
                </form>
                <div class="name-list pt-4">
                    <h4>Lista de Nomes</h4>
                    <ul>
                        <?php if (file_exists('nomes.txt')): ?>
                            <?php foreach ($nomes as $nome): ?>
                                <li>
                                    <?php echo $nome; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

</html>