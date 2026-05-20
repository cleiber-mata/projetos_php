<?php
session_start();

if(isset($_POST['entrar_admin'])){

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if($login == "GTAM" && $senha == "gtam2026"){

        $_SESSION['perfil'] = "admin";

        header("Location: menu.php");
        exit;

    }else{

        $erro = "Login ou senha inválidos.";

    }
}

if(isset($_POST['entrar_consulta'])){

    $_SESSION['perfil'] = "consulta";

    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Sistema ROTAM</title>

    <style>

        body{
            background-color: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin-top: 80px;
        }

        .login-box{

            width: 350px;
            margin: auto;

            background-color: white;

            padding: 30px;

            border-radius: 10px;

            box-shadow: 2px 2px 10px rgba(0,0,0,0.2);

        }

        input{

            width: 90%;
            padding: 12px;
            margin: 10px;

            font-size: 16px;

        }

        button{

            width: 95%;
            padding: 12px;
            margin-top: 10px;

            border: none;

            background-color: #222;

            color: white;

            font-size: 16px;

            border-radius: 8px;

            cursor: pointer;

        }

        button:hover{
            background-color: #444;
        }

        .consulta{
            background-color: #555;
        }

        .consulta:hover{
            background-color: #777;
        }

        .erro{
            color: red;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <h1>ROTAM</h1>

        <h2>Acesso ao Sistema</h2>

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

                Entrar com senha

            </button>

        </form>

        <hr>

        <form method="POST">

            <button
                class="consulta"
                type="submit"
                name="entrar_consulta">

                Entrar apenas para consulta

            </button>

        </form>

    </div>

</body>

</html>