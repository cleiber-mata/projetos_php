
<form action="if.php" method="POST">
    A <input type="number" name="a">
    B <input type="number" name="b">

    <button type="submit">Enviar</button>
</form>

<?php

    $a = @$_POST['a'];
    $b = @$_POST['b'];

if($a > $b){
    print $a." é maior que ".$b;
}elseif($b > $a){
    print $b." é maior que ".$a;
}else{
    print $a." é igual a ".$b;
}