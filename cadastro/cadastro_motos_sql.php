<!DOCTYPE html>
<html lang="pt-br"></html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Motos</title>
</head>
<body>


<form method="POST">
    <br><br>
    <label for="prefixo_mt">prefixo_mt:</label>
    <input type="text" id="prefixo_mt" name="prefixo_mt">
    <br><br>

    <label for="modelo_mt">modelo_mt:</label>
    <input type="text" id="modelo_mt" name="modelo_mt">
    <br><br>

    <label for="placa_mt">placa_mt:</label>
    <input type="text" id="placa_mt" name="placa_mt">
    <br><br>

    <button type="submit">Enviar</button>

</form>

<?php
$conn = new mysqli("localhost", "root", "", "cadastro_php");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$prefixo_mt = $_POST["prefixo_mt"] ?? "";
$modelo_mt = $_POST["modelo_mt"] ?? "";
$placa_mt = $_POST["placa_mt"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO motos (prefixo_mt, modelo_mt, placa_mt)
            VALUES ('$prefixo_mt', '$modelo_mt', '$placa_mt')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Dados salvos com sucesso!";
    } else {
        echo "<br>Erro ao salvar: " . $conn->error;
    }
}

$conn->close();

?>
</body>
</html>