<?php
/*
Aprovação de aluno
Receba a nota de um aluno (0 a 10).

Se a nota for maior ou igual a 7 → Aprovado
Caso contrário → ReprovadoAprovação de aluno
Receba a nota de um aluno (0 a 10).

Se a nota for maior ou igual a 7 → Aprovado
Caso contrário → Reprovado
*/
?>


<form method="POST">
    <label> Nota Aluno <input type="number" id="Nota" name="Nota" min="0" max="10"></label>
    <button type="submit">Enviar</button>

</form>

<?php

$Nota = $_POST["Nota"] ?? "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($Nota >= 7) {
        echo "Aprovado";
    } else {
        echo "Reprovado";
    }
}
?>