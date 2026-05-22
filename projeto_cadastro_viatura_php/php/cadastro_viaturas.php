<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Viaturas</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url("../imagens/aqui_nao.jpg") no-repeat center center/cover;
            background-attachment: fixed;
        }

        .container {
            background: rgba(0, 0, 0, 0.50);
            color: white;
            width: 90%;
            max-width: 500px;
            padding: 35px;
            border-radius: 30px;
            backdrop-filter: blur(2px);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        h2 {
            color: #ff1e1e;
            text-shadow: 2px 2px 5px black;
            margin-bottom: 25px;
            font-size: 34px;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 12px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 95%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            margin-top: 5px;
            font-size: 15px;
            outline: none;
        }

        button,
        .voltar {
            display: block;
            width: 100%;
            padding: 13px;
            margin-top: 15px;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            text-decoration: none;
            box-sizing: border-box;
            transition: 0.3s;
        }

        button {
            background-color: #0d711a;
        }

        button:hover {
            background-color: #007f50;
            transform: scale(1.02);
        }

        .voltar {
            background-color: #222;
        }

        .voltar:hover {
            background-color: #444;
            transform: scale(1.02);
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
