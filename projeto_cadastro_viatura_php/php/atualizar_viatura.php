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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(rgba(0, 0, 0, 0.45),
                    rgba(0, 0, 0, 0.45)),
                url('../imagens/fusca_pmdf.jpg') no-repeat center center/cover;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .box {
            background: rgba(0, 0, 0, 0.45);
            width: 430px;
            padding: 35px;
            border-radius: 20px;
            backdrop-filter: blur(5px);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.7);
        }

        h1 {
            color: #ff1e1e;
            margin-bottom: 25px;
            text-shadow: 2px 2px 5px black;
        }

        p {
            text-align: left;
            margin: 10px 0;
            font-size: 17px;
        }

        strong {
            color: #ff4d4d;
        }

        form {
            margin-top: 25px;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 95%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        button,
        a {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 14px;
            border-radius: 10px;
            border: none;
            text-decoration: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
            box-sizing: border-box;
        }

        button {
            background-color: #0d711a;
        }

        button:hover {
            background-color: #0a5c15;
            transform: scale(1.02);
        }

        a {
            background-color: #444;
        }

        a:hover {
            background-color: #666;
            transform: scale(1.02);
        }
    </style>
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