<!DOCTYPE html>
<html lang="pt-br">
<herd>
<meta charset="UTF-8">
</herd>

<body>

<?php
/*
Receba uma letra e verifique se ela é uma vogal:

a, e, i, o, u → "Vogal"
Qualquer outra letra → "Consoante ou inválida"
*/

?>

<form action="classificacao_vogais.php" method="POST">
    
    <label> Entre com uma letra <input type="text" name="vogal" required></label>
    <br><br>
    <button type="submit">Enviar Letra</button>
</form>
<br><br>

<?php

$vogal = $_POST["vogal"];

switch ($vogal) {
    case "a":
        echo "A letra é uma vogal";
        break;
    case "e":
        echo "A letra é uma vogal";
        break;
    case "i":
        echo "A letra é uma vogal";
        break;
    case "o":
        echo "A letra é uma vogal";
        break;
    case "u":
        echo "A letra é uma vogal";
        break;
    default:
        echo "A letra é uma consoante ou inválida.";

}

?>
</body></html>