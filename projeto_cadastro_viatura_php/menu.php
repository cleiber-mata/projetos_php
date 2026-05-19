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

        body{
            background-color: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1{
            margin-top: 40px;
            color: #222;
        }

        h2{
            color: #555;
        }

        .menu{
            margin-top: 50px;
        }

        .menu button{

            width: 260px;
            padding: 15px;
            margin: 10px;

            font-size: 18px;
            font-weight: bold;

            border: none;
            border-radius: 10px;

            background-color: #222;
            color: white;

            cursor: pointer;

            transition: 0.3s;

            box-shadow: 2px 2px 10px rgba(0,0,0,0.2);

        }

        .menu button:hover{

            background-color: #444;

            transform: scale(1.03);

        }

        .logout{
            background-color: #8b0000 !important;
        }

        .logout:hover{
            background-color: #b22222 !important;
        }

    </style>

</head>

<body>

    <h1>Sistema de Cadastro de Viaturas ROTAM</h1>

    <h2>
        Perfil:
        <?php echo strtoupper($perfil); ?>
    </h2>

    <div class="menu">

        <?php if($perfil == "admin"){ ?>

            <button onclick="window.location.href='cadastro_viaturas.php'">
                Cadastro de Viaturas
            </button>

            <button onclick="window.location.href='cadastro_policial.php'">
                Cadastro de Policiais
            </button>

            <button onclick="window.location.href='manutencao.php'">
                Manutenção
            </button>

        <?php } ?>

        <button onclick="window.location.href='pesquisar_viatura.php'">
            Pesquisar Viatura
        </button>

        <button onclick="window.location.href='pesquisar_manutencao.php'">
            Pesquisar Manutenção
        </button>

        <button onclick="window.location.href='pesquisar_policiais.php'">
            Pesquisar Policiais
        </button>

        <button onclick="window.location.href='relatorios.php'">
            Relatórios
        </button>

        <button
            class="logout"
            onclick="window.location.href='logout.php'">

            Sair

        </button>

    </div>

</body>

</html>