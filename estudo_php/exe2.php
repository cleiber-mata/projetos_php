<form method="POST"> 
    <label for="nome">Nome</label> <input type="text" id="nome" name="nome"> 
    <label for="sobrenome">Sobrenome</label> <input type="text" id="sobrenome" name="sobrenome"> 
    <label for="dn">Data nascimento</label> <input type="date" id="dn" name="dn"> 
    
    <button type="submit">Enviar</button>

</form> 

<?php 
    $Nome = $_POST["nome"] ?? ""; 
    $Sobrenome = $_POST["sobrenome"] ?? ""; 
    $Data_nascimento = $_POST["dn"] ?? ""; 
    echo "Nome: " . $Nome . " " . $Sobrenome . ". "; echo '<br>'; 
    echo "Data de Nascimento: " . $Data_nascimento . "."; 
?>