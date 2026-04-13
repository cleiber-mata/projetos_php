<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intervalo</title>
</head>

<body>
    <form method="POST">
        ALEATORIO:<BR>
        Entre com um valor: <input type="number" id="a" name="a">   
        <button type="submit">Enviar Número</button><br><br>

</form>

<?php

    $a = $_POST["a"] ?? "";

if(10 < $a && $a < 50){
    echo $a. " esta no intervalo de 10 a 50.";
}else{
    echo $a. " não esta no intervalo entre 10 e 50.";
}