<?php

$numeros = [1, 2, 3, 4, 5];

function somar($subtotal, $item)
{
    $subtotal += $item;
    return $subtotal;
}

//Chamando array_reduce passando o array e a função como parâmetro.
$total = array_reduce($numeros, 'somar');
echo 'Soma do Array: ' . $total . '</br>';

$pessoas = [
    ['nome' => 'Fulano', 'sexo' => 'M', 'nota' => 9],
    ['nome' => 'Ciclano', 'sexo' => 'M', 'nota' => 7],
    ['nome' => 'Beltrana', 'sexo' => 'F', 'nota' => 10],
    ['nome' => 'Paulo', 'sexo' => 'M', 'nota' => 8],
    ['nome' => 'Cintia', 'sexo' => 'F', 'nota' => 9],
    ['nome' => 'Jessica', 'sexo' => 'F', 'nota' => 9],
];

//Total de Homens
function contar_masc($subtotal, $item)
{
    if ($item['sexo'] === 'M') {
        $subtotal++;
    }
    return $subtotal;
}
$total_masc = array_reduce($pessoas, 'contar_masc');
echo 'Total de Homens: ' . $total_masc . '</br>';

//Soma das Notas dos Homens
function somar_masc($subtotal, $item)
{
    if ($item['sexo'] === 'M') {
        $subtotal += $item['nota'];
    }

    return $subtotal;
}
$somar_masc = array_reduce($pessoas, 'somar_masc');
echo 'Soma das Médias dos Homens: ' . $somar_masc . '</br>';

$media_masc = $somar_masc / $total_masc;
echo 'Média das Notas dos Homens: ' . $media_masc . '</br>';


