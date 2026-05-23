<?php
session_start();
if (!isset($_SESSION['perfil'])) {
    header("Location: login.php");
    exit;
}
$perfil = $_SESSION['perfil'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Viaturas ROTAM</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="painel">
        <h1>Sistema de Cadastro de Viaturas ROTAM</h1>
        <h2>
            Perfil:
            <?php echo strtoupper($perfil); ?>
        </h2>
        <div class="menu">
            <?php if ($perfil == "admin") { ?>
                <button onclick="window.location.href='cadastro_viaturas.php'">
                    Cadastro de Viaturas
                </button>
                <button onclick="window.location.href='cadastro_policiais.php'">
                    Cadastro de Policiais
                </button>
                <button onclick="window.location.href='em_construcao.php'">
                    Manutenção
                </button>
            <?php } ?>
            <button onclick="window.location.href='pesquisar_viatura.php'">
                Pesquisar Viatura
            </button>
            <button onclick="window.location.href='em_construcao.php'">
                Pesquisar Manutenção
            </button>
            <button onclick="window.location.href='pesquisar_policial.php'">
                Pesquisar Policiais
            </button>
            <button onclick="window.location.href='em_construcao.php'">
                Relatórios
            </button>
            <button
                class="logout"
                onclick="window.location.href='logout.php'">
                Sair
            </button>
        </div>
    </div>
</body>

</html>