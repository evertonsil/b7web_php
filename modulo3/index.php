<?php
$weekname = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['userDate'];
    $dataFormatada = date('d/m/Y', strtotime($data));
    if ($data) {
        $weekName = getWeek($data);
    }
}
function getWeek($data)
{
    $data = date('N', strtotime($data));
    switch ($data) {
        case 1:
            $data = 'Segunda-Feira';
            break;
        case 2:
            $data = 'Terça-Feira';
            break;
        case 3:
            $data = 'Quarta-Feira';
            break;
        case 4:
            $data = 'Quinta-Feira';
            break;
        case 5:
            $data = 'Sexta-Feira';
            break;
        case 6:
            $data = 'Sábado';
            break;
        case 7:
            $data = 'Domingo';
            break;
    }
    return $data;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Qual o dia da Semana?</title>
</head>

<body class="bg-light">
    <section class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="userDate" name="userDate" placeholder="">
                            <label for="userDate">Insira uma data</label>
                        </div>
                        <div class="result text-center text-success fw-bold mb-4">
                            <?php echo $weekName ? 'O dia da semana em ' . $dataFormatada . ' é ' . $weekName : ''; ?>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>