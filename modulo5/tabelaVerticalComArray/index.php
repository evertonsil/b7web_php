<?php

$array = [
    'nome' => 'Everton',
    'idade' => 22,
    'empresa' => 'Rai',
    'cor' => 'Vermelho',
    'profissao' => 'Programador'
];

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tabela Vertical</title>
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
</style>

<body class="bg-light">
    <section class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <table>
                    <?php foreach ($array as $chave => $valor): ?>
                        <tr>
                            <th>
                                <?php echo ucwords($chave); ?>
                            </th>
                            <td>
                                <?php echo ucwords($valor); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
</body>

</html>