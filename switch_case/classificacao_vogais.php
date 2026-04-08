<?php
/*
Receba uma letra e verifique se ela é uma vogal:

a, e, i, o, u → "Vogal"
Qualquer outra letra → "Consoante ou inválida"
*/

?>

<form action="classificacao_vogais.php" method="POST">
    
    <label> Entre com uma letra <input type="text" name="vogal"></label>
    <br><br>
    <button type="submit">Enviar Letra</button>
</form>
<br><br>

<?php

switch (@$_POST["vogal"]) {
    case "a":
        echo "A letra é uma vogal";
        break;
    case "e":
        echo "A letra é uma vogal";
        break;
    default:
        echo "A letra não é uma vogal";
}