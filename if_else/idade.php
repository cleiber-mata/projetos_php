<?php
/*
Receba a idade de uma pessoa e classifique:

0–12 → Criança
13–17 → Adolescente
18–59 → Adulto
60+ → Idoso
*/
?>

<form method="POST">
    <LABEL> Idade <input type="number" id="idade" name="idade" min="0"></LABEL>
    <br><br>
    <button type="submit">Enviar Idade</button>
<form>
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