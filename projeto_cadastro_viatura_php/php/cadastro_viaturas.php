<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Viaturas</title>
    <link rel="stylesheet" href="../css/style_03.css">
</head>

<body>
    <div class="container">
        <h1>Cadastro de Viaturas<br>ROTAM</h1>
        <form method="POST">
            <label>Prefixo:</label>
            <input type="text" name="prefixo_vtr" required>
            <label>Modelo:</label>
            <input type="text" name="modelo_vtr" required>
            <label>Marca:</label>
            <input type="text" name="marca_vtr">
            <label>Placa:</label>
            <input type="text" name="placa_vtr" maxlength="8" required>
            <label>Ano Modelo:</label>
            <input type="number" name="ano_modelo">
            <label>KM Atual:</label>
            <input type="number" name="km_atual" value="0">
            <label>Cartão Manutenção:</label>
            <input type="text" name="cartao_manutencao" maxlength="16">
            <button type="submit">Salvar</button>
        </form>
        <a class="voltar" href="menu.php">Voltar ao Menu</a>
        <?php
        $conn = new mysqli("localhost", "root", "", "cadastro_viatura_rotam");
        if ($conn->connect_error) {
            die("<div class='mensagem'>Erro de conexão: " . $conn->connect_error . "</div>");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $prefixo_vtr = $_POST["prefixo_vtr"];
            $modelo_vtr = $_POST["modelo_vtr"];
            $marca_vtr = $_POST["marca_vtr"];
            $placa_vtr = $_POST["placa_vtr"];
            $ano_modelo = $_POST["ano_modelo"];
            $km_atual = $_POST["km_atual"];
            $cartao_manutencao = $_POST["cartao_manutencao"];
            $sql = "INSERT INTO viaturas 
                    (prefixo_vtr, modelo_vtr, marca_vtr, placa_vtr, ano_modelo, km_atual, cartao_manutencao)
                    VALUES 
                    ('$prefixo_vtr', '$modelo_vtr', '$marca_vtr', '$placa_vtr', '$ano_modelo', '$km_atual', '$cartao_manutencao')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='mensagem'>Viatura cadastrada com sucesso!</div>";
            } else {
                echo "<div class='mensagem'>Erro: " . $conn->error . "</div>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>

</html>
