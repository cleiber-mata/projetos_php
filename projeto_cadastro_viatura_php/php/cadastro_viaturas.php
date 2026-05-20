<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Viaturas</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('../imagens/aqui_nao.jpg') no-repeat center center/cover;
            min-height: 100vh;
        }

        .container {
            background: rgba(0, 2, 14, 0.5);
            color: white;
            width: 360px;
            padding: 30px;
            border-radius: 20px;
            margin: 40px 0 40px 80px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input {
            width: 95%;
            padding: 9px;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
        }

        button, .voltar {
            width: 100%;
            padding: 11px;
            margin-top: 15px;
            background-color: #0d711a;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #007f50;
        }

        .voltar {
            display: block;
            text-align: center;
            text-decoration: none;
            background-color: #222;
            box-sizing: border-box;
        }

        .voltar:hover {
            background-color: #444;
        }

        .mensagem {
            margin-top: 15px;
            text-align: center;
            color: #00ffcc;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Cadastro de Viaturas<br>ROTAM</h2>

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