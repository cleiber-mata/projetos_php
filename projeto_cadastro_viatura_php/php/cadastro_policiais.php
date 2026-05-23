<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Policiais</title>
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

        input,
        select {
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
        <h2>Cadastro de Policiais<br>ROTAM</h2>
        <form method="POST">
            <label>Posto/Graduação:</label>

            <select name="posto_graduacao_pol" required>
                <option value="">Selecione</option>

                <option value="Cel">Cel</option>
                <option value="Tc">Tc</option>
                <option value="Maj">Maj</option>
                <option value="Cap">Cap</option>
                <option value="1º Ten">1º Ten</option>
                <option value="2º Ten">2º Ten</option>
                <option value="Asp">Asp</option>
                <option value="St">St</option>
                <option value="1º Sgt">1º Sgt</option>
                <option value="2º Sgt">2º Sgt</option>
                <option value="3º Sgt">3º Sgt</option>
                <option value="Cb">Cb</option>
                <option value="Sd">Sd</option>
            </select>

            <label>Nome de Guerra:</label>
            <input type="text" name="nome_guerra_pol" required>
            <label>Matricula:</label>
            <input type="text" name="matricula" required>
            <label>Celular:</label>
            <input
                type="tel"
                name="celular_pol"
                id="celular_pol"
                placeholder="(61) 99999-9999"
                maxlength="15"
                required>
            <button type="submit">Cadastrar Policial</button>

        </form>
        <a class="voltar" href="menu.php">Voltar ao Menu</a>
        <?php
        $conn = new mysqli("localhost", "root", "", "cadastro_viatura_rotam");
        if ($conn->connect_error) {
            die("<div class='mensagem'>Erro de conexão: " . $conn->connect_error . "</div>");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $posto_graduacao_pol = $_POST["posto_graduacao_pol"];
            $nome_guerra_pol = $_POST["nome_guerra_pol"];
            $matricula = $_POST["matricula"];
            $celular_pol = $_POST["celular_pol"];

            $sql = "INSERT INTO policiais (posto_graduacao_pol, nome_guerra_pol, matricula, celular_pol)
                    VALUES 
                    ('$posto_graduacao_pol', '$nome_guerra_pol', '$matricula', '$celular_pol')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='mensagem'>Policial cadastrado com sucesso!</div>";
            } else {
                echo "<div class='mensagem'>Erro: " . $conn->error . "</div>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>

</html>