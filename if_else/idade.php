<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <TITLE> Classificação por Idade </TITLE>
    </head>
<body>

<?php
/*
Receba a idade de uma pessoa e classifique:

0–12 → Criança
13–17 → Adolescente
18–59 → Adulto
60+ → Idoso
*/
?>
<div style="text-align: center; margin-top: 100px;">
<form method="POST">
    <LABEL> Idade <input type="number" id="idade" name="idade" min="0"></LABEL>
    <br><br>
    <button type="submit">Enviar Idade</button>
</form>
    
<br><br>

<?php
if ($_POST) {
    $idade = $_POST['idade'];

    if ($idade >= 0 && $idade <= 12) {
        echo "Classificação: Criança";
    } elseif ($idade >= 13 && $idade <= 17) {
        echo "Classificação: Adolescente";
    } elseif ($idade >= 18 && $idade <= 59) {
        echo "Classificação: Adulto";
    } else {
        echo "Classificação: Idoso";
    }
}
?>
</div>
</body>
</html>