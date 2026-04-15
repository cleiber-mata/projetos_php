<!DOCTYPE html>
<html lang="pt-br">
<herd>
<meta charset="UTF-8">
</herd>
<body>
<?php
/*Crie um array com números e mostre a soma de todos os valores.*/
$numeros = [0, 1, 2, 3, 4, 5];
$soma = 0;

foreach ($numeros as $numero) {
    $soma += $numero;
}

echo "Soma total: " . $soma;
?>
</body>
</html>
