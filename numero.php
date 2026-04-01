<form action="numero.php" method="POST">
    A <input type="number" name="a">
    <button type="submit">Enviar</button>
</form>

<?php

    $a = $_POST['a'] ?? "";


if($a < 0){
    echo $a." é negativo";
}elseif($a > 0){
    echo $a." é positivo.";
}else{
    echo $a." igual a 0(ZERO).";
}