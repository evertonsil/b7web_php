<?php

$array = [
    'nome' => 'Everton',
    'idade' => 22,
    'empresa' => 'Rai',
    'cor' => 'Vermelho',
    'profissao' => 'Programador',
    'categoria' => 'CLT'
];

$chaves = array_keys($array);
$valores = array_values($array);

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tabela Horizontal</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr.header {
        background-color: #919191;
    }
</style>

<body class="bg-light">
    <section class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <table>
                    <tr class="header">
                        <?php foreach ($chaves as $chave): ?>
                            <td><?php echo ucwords($chave); ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($valores as $valor): ?>
                            <td><?php echo ucwords($valor); ?></td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</body>

</html>