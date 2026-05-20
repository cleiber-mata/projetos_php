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
    <title>Pesquisar Moto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        table {
            width: 95%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #222;
            color: white;
        }

        input {
            padding: 10px;
            width: 300px;
        }

        button, a {
            padding: 10px 15px;
            background-color: #222;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .atualizar {
            background-color: #0d711a;
        }

        .voltar {
            background-color: #555;
        }
    </style>
</head>

<body>

    <h1>Pesquisar Moto</h1>

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