<form method="POST">
    <br><br>
    <label for="nome_pol">nome_pol:</label>
    <input type="text" id="nome_pol" name="nome_pol">
    <br><br>
    
    <label for="sobrenome_pol">sobrenome_pol:</label>
    <input type="text" id="sobrenome_pol" name="sobrenome_pol">
    <br><br>
    
    <label for="matricula">matricula:</label>
    <input type="varchar" id="matricula" name="matricula">
    <br><br>

    <label for="celular_pol">celular_pol:</label>
    <input type="int" id="celular_pol" name="celular_pol">

    <button type="submit">Enviar</button>

</form>

<?php
$conn = new mysqli("localhost", "root", "", "cadastro_php");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome_pol = $_POST["nome_pol"] ?? "";
$sobrenome_pol = $_POST["sobrenome_pol"] ?? "";
$matricula = $_POST["matricula"] ?? "";
$celular_pol = $_POST["celular_pol"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO policiais (nome_pol, sobrenome_pol, matricula, celular_pol)
            VALUES ('$nome_pol', '$sobrenome_pol', '$matricula', '$celular_pol')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Dados salvos com sucesso!";
    } else {
        echo "<br>Erro ao salvar: " . $conn->error;
    }
}

$conn->close();
?>