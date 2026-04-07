<?php
/*
Receba uma letra e verifique se ela é uma vogal:

a, e, i, o, u → "Vogal"
Qualquer outra letra → "Consoante ou inválida"
*/

?>

<form methot="POST">
    <label> Vogal <input type="text" vogal="vogal"></label>
    <br><br>
    <button type="submit">Enviar Letra</button>
</form>
<br><br>

<?php

switch
