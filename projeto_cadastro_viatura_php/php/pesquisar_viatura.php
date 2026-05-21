<?php
$conn = new mysqli("localhost", "root", "", "cadastro_viatura_rotam");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
$busca = "";
if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
}
$sql = "SELECT 
            viaturas.id_vtr,
            viaturas.prefixo_vtr,
            viaturas.modelo_vtr,
            viaturas.marca_vtr,
            viaturas.placa_vtr,
            viaturas.ano_modelo,
            viaturas.km_atual,
            viaturas.cartao_manutencao,
            viaturas.situacao_cautela,
            viaturas.situacao_operacional,
            policiais.posto_graduacao_pol,
            policiais.nome_guerra_pol
        FROM viaturas
        LEFT JOIN cautela_vtr 
            ON viaturas.id_vtr = cautela_vtr.id_vtr 
            AND cautela_vtr.data_devolucao IS NULL
        LEFT JOIN policiais 
            ON cautela_vtr.id_pol = policiais.id_pol
        WHERE 
            viaturas.prefixo_vtr LIKE '%$busca%' OR
            viaturas.placa_vtr LIKE '%$busca%' OR
            viaturas.modelo_vtr LIKE '%$busca%'
        ORDER BY viaturas.prefixo_vtr";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar Viatura</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.72),
                    rgba(0, 0, 0, 0.72)),
                url('../imagens/escudo.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            color: white;
            text-align: center;
        }

        h1 {
            color: #ff1e1e;
            text-shadow: 2px 2px 5px black;
            margin-top: 30px;
            font-size: 38px;
        }

        form {
            margin-top: 20px;
        }

        input {
            padding: 14px;
            width: 360px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
        }

        button,
        a {
            padding: 13px 18px;
            background-color: #222;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover,
        a:hover {
            transform: scale(1.05);
            background-color: #444;
        }

        .voltar {
            background-color: #555;
            display: inline-block;
            margin-top: 15px;
        }

        .atualizar {
            background-color: #0d711a;
            display: inline-block;
        }

        .atualizar:hover {
            background-color: #0a5c15;
        }

        table {
            width: 95%;
            margin: 35px auto;
            border-collapse: collapse;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.8);
        }

        th {
            background-color: #b00000;
            color: white;
            padding: 14px;
            font-size: 16px;
            text-shadow: 1px 1px 3px black;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        tr:hover {
            background-color: rgba(255, 0, 0, 0.18);
        }
    </style>
</head>

<body>
    <h1>Pesquisar Viatura</h1>
    <form method="GET">
        <input type="text" name="busca" placeholder="Digite prefixo, placa ou modelo" value="<?php echo $busca; ?>">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <a class="voltar" href="menu.php">Voltar ao Menu</a>
    <table>
        <tr>
            <th>Prefixo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Ano</th>
            <th>KM Atual</th>
            <th>Cartão Manutenção</th>
            <th>Cautela</th>
            <th>Operacional</th>
            <th>Policial Responsável</th>
            <th>Ação</th>
        </tr>
        <?php while ($linha = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $linha['prefixo_vtr']; ?></td>
                <td><?php echo $linha['modelo_vtr']; ?></td>
                <td><?php echo $linha['marca_vtr']; ?></td>
                <td><?php echo $linha['placa_vtr']; ?></td>
                <td><?php echo $linha['ano_modelo']; ?></td>
                <td><?php echo $linha['km_atual']; ?></td>
                <td><?php echo $linha['cartao_manutencao']; ?></td>
                <td><?php echo $linha['situacao_cautela']; ?></td>
                <td><?php echo $linha['situacao_operacional']; ?></td>
                <td>
                    <?php
                    if ($linha['nome_guerra_pol']) {
                        echo $linha['posto_graduacao_pol'] . " " . $linha['nome_guerra_pol'];
                    } else {
                        echo "Sem cautela";
                    }
                    ?>
                </td>
                <td>
                    <a class="atualizar" href="atualizar_viatura.php?id=<?php echo $linha['id_vtr']; ?>">
                        Atualizar
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
<?php
$conn->close();
?>