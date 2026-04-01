<form method="POST">

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome">

    <label for="sobrenome">Sobrenome</label>
    <input type="text" id="sobrenome" name="sobrenome">

    <label for="dn">Data nascimento</label>
    <input type="date" id="dn" name="DN">

    <button type="submit">Enviar</button>

</form>

<?php
$conn = new mysqli("localhost", "root", "", "cadastro_php");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST["nome"] ?? "";
$sobrenome = $_POST["sobrenome"] ?? "";
$data_nascimento = $_POST["DN"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO pessoas (nome, sobrenome, data_nascimento)
            VALUES ('$nome', '$sobrenome', '$data_nascimento')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Dados salvos com sucesso!";
    } else {
        echo "<br>Erro ao salvar: " . $conn->error;
    }
}

$conn->close();
?>