<form action="exe1.php" method="POST"> 
    frase <input type="text" name="frase"> <button 
    type="submit">Enviar</button> </form> 
<?php 
    $frase = @$_POST['frase']; 
    $palavrao = array("PQP", "Merda", "Foda", "FDP"); 
    echo str_ireplace($palavrao, "********", $frase); 
?> 