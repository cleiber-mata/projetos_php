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
            policiais.id_pol,
            policiais.posto_graduacao_pol,
            policiais.nome_guerra_pol,
            policiais.matricula,
            policiais.celular_pol,
            viaturas.prefixo_vtr
        FROM policiais
        LEFT JOIN cautela_vtr
        ON policiais.id_pol = cautela_vtr.id_pol
        LEFT JOIN viaturas
        ON cautela_vtr.id_vtr = viaturas.id_vtr
        
        WHERE 
            policiais.matricula LIKE '%$busca%' OR
            policiais.celular_pol LIKE '%$busca%' OR
            policiais.nome_guerra_pol LIKE '%$busca%'
        ORDER BY policiais.posto_graduacao_pol";
$resultado = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar Policial</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Pesquisar Policial</h1>
    <form method="GET">
        <input type="text" name="busca" placeholder="Digite nome, matricula ou celular" value="<?php echo $busca; ?>">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <a class="voltar" href="menu.php">Voltar ao Menu</a>
    <table>
        <tr>
            <th>Posto/Graduação</th>
            <th>Nome de Guerra</th>
            <th>Matrícula</th>
            <th>Celular</th>
            <th>Viatura Cautelada</th>
            <th>Ação</th>

        </tr>
        <?php while ($linha = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $linha['posto_graduacao_pol']; ?></td>
                <td><?php echo $linha['nome_guerra_pol']; ?></td>
                <td><?php echo $linha['matricula']; ?></td>

                <td><?php
                    $cel = preg_replace('/[^0-9]/', '', $linha['celular_pol']);
                    if (strlen($cel) == 13) {
                        echo "(" . substr($cel, 2, 2) . ") "
                            . substr($cel, 4, 5) . "-"
                            . substr($cel, 9, 4);
                    } elseif (strlen($cel) == 11) {
                        echo "(" . substr($cel, 0, 2) . ") "
                            . substr($cel, 2, 5) . "-"
                            . substr($cel, 7, 4);
                    } else {
                        echo $cel;
                    }
                    ?></td>

                <td><?php echo $linha['prefixo_vtr']; ?></td>
                <td>
                    <a class="atualizar" href="atualizar_policial.php?id=<?php echo $linha['id_pol']; ?>">
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