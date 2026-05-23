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
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            background: url('../imagens/aqui_nao.jpg') no-repeat center center/cover;
            background-attachment: fixed;
        }

        h1 {
            margin-top: 40px;
            color: #f70d20;
            text-shadow: 2px 2px 5px black;
        }

        h2 {
            color: white;
            text-shadow: 1px 1px 4px black;
        }

        .menu {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .menu button {
            width: 260px;
            padding: 12px;
            margin: 5px;
            font-size: 17px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            background-color: #222;
            color: white;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .painel {
            background: rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 700px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 30px;
            backdrop-filter: blur(2px);
        }
    </style>
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