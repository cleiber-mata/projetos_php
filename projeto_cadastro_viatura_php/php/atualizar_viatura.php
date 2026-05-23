<?php
$conn = new mysqli("localhost", "root", "", "cadastro_viatura_rotam");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $km_atual = $_POST['km_atual'];
    $cartao_manutencao = $_POST['cartao_manutencao'];
    $sql_update = "UPDATE viaturas 
                   SET km_atual = '$km_atual',
                       cartao_manutencao = '$cartao_manutencao'
                   WHERE id_vtr = '$id'";
    if ($conn->query($sql_update) === TRUE) {
        header("Location: pesquisar_viatura.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
$sql = "SELECT * FROM viaturas WHERE id_vtr = '$id'";
$resultado = $conn->query($sql);
$viatura = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Atualizar Viatura</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="box">
        <h1>Atualizar Viatura</h1>
        <p><strong>Prefixo:</strong> <?php echo $viatura['prefixo_vtr']; ?></p>
        <p><strong>Modelo:</strong> <?php echo $viatura['modelo_vtr']; ?></p>
        <p><strong>Marca:</strong> <?php echo $viatura['marca_vtr']; ?></p>
        <p><strong>Placa:</strong> <?php echo $viatura['placa_vtr']; ?></p>
        <p><strong>Ano:</strong> <?php echo $viatura['ano_modelo']; ?></p>
        <form method="POST">
            <label>KM Atual:</label>
            <input type="number" name="km_atual" value="<?php echo $viatura['km_atual']; ?>" required>
            <label>Cartão Manutenção:</label>
            <input type="text" name="cartao_manutencao" value="<?php echo $viatura['cartao_manutencao']; ?>">
            <button type="submit">Salvar Atualização</button>
        </form>
        <a href="pesquisar_viatura.php">Voltar para Pesquisa</a>
    </div>
</body>

</html>
<?php
$conn->close();
?>