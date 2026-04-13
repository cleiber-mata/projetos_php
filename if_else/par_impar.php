<form method="POST">
    A <input type="number" name="a">
    <button type="submit">Enviar</button>
</form>

<?php

$a = $_POST['a'] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($a % 2 == 0) {
        print $a . " é par";
    } else {
        print $a . " é ímpar";
    }
}
?>