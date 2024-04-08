<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>🔗 Send File</title>
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
                <form id="loginForm" action="submit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="inpFile" name="inpFile" placeholder="">
                            <label for="username">Enviar arquivo</label>
                            <span class="error">
                                <?php echo $_SESSION['error']; ?>
                            </span>
                            <span class="success">
                                <?php echo $_SESSION['success']; ?>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>