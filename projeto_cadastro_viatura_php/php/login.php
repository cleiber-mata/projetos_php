<?php
session_start();

if (isset($_POST['entrar_admin'])) {

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if ($login == "GTAM" && $senha == "gtam2026") {

        $_SESSION['perfil'] = "admin";

        header("Location: menu.php");
        exit;

    } else {

        $erro = "Login ou senha inválidos.";

    }
}

if (isset($_POST['entrar_consulta'])) {

    $_SESSION['perfil'] = "consulta";

    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Sistema ROTAM</title>

    <style>

        body{

            margin: 0;
            padding: 0;

            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            text-align: center;

            background: url('../imagens/gtam_metal.jpg')
                        no-repeat
                        center center/cover;

        }

        .painel{

            background: rgba(0,0,0,0.60);

            width: 420px;

            margin: 120px 0 0 80px;

            padding: 35px;

            border-radius: 20px;

            backdrop-filter: blur(4px);

            box-shadow: 0 0 25px rgba(0,0,0,0.5);

            color: white;

        }

        h1{

            color: #ff2b2b;

            text-shadow: 2px 2px 5px black;

            margin-bottom: 10px;

        }

        h2{

            margin-bottom: 25px;

            color: #dddddd;

        }

        input{

            width: 90%;

            padding: 14px;

            margin: 10px 0;

            border: none;

            border-radius: 10px;

            font-size: 16px;

            outline: none;

        }

        button{

            width: 97%;

            padding: 14px;

            margin-top: 15px;

            border: none;

            border-radius: 10px;

            background-color: #1f1f1f;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;

            box-shadow: 2px 2px 10px rgba(0,0,0,0.3);

        }

        button:hover{

            background-color: #444;

            transform: translateY(-3px);

        }

        .consulta{

            background-color: #555;

        }

        .consulta:hover{

            background-color: #777;

        }

        .erro{

            color: #ff4d4d;

            font-weight: bold;

            margin-bottom: 15px;

        }

        hr{

            margin-top: 25px;
            margin-bottom: 20px;

            border: 1px solid rgba(255,255,255,0.1);

        }

    </style>

</head>

<body>

    <div class="painel">

        <h1>ROTAM</h1>

        <h2>Sistema de Cadastro de Viaturas</h2>

        <?php

            if(isset($erro)){

                echo "<p class='erro'>$erro</p>";

            }

        ?>

        <form method="POST">

            <input
                type="text"
                name="login"
                placeholder="Login">

            <input
                type="password"
                name="senha"
                placeholder="Senha">

            <button
                type="submit"
                name="entrar_admin">

                Entrar

            </button>

        </form>

        <hr>

        <form method="POST">

            <button
                class="consulta"
                type="submit"
                name="entrar_consulta">

                Consultas

            </button>

        </form>

    </div>

</body>

</html>