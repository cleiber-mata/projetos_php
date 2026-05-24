<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Policiais</title>
    <link rel="stylesheet" href="../css/style_03.css">
    
</head>

<body>
    <div class="container">
        <h1>Cadastro de Policiais<br>ROTAM</h1>
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