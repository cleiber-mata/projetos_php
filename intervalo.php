<form action = "intervalo.php" method="POST">
    A <input type="number" id="a" name="a">   
    <button type="submit">Enviar</button>

</form>

<?php

    $a = $_POST["a"] ?? "";

if(10 < $a < 50){
    echo $a. " esta no intervalo de 10 a 50.";
}else{
    echo $a. " não esta no intervalo entre 10 e 50.";
}