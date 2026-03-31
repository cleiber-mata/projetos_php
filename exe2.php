<form action="exe2.php" method="POST"> 
    Nome <input type="text" name="nome"> 
    Sobrenome <input type="text" name="sobrenome"> 
    Data nascimento <input type="date" name="DN"> <button type="submit">Enviar</button> 
</form> 

<?php 
    $Nome = $_POST["nome"] ?? ""; 
    $Sobrenome = $_POST["sobrenome"] ?? ""; 
    $Data_nascimento = $_POST["DN"] ?? ""; 
    echo "Nome: " . $Nome . " " . $Sobrenome . ". "; echo '<br>'; 
    echo "Data de Nascimento: " . $Data_nascimento . "."; 
?>