<?php
session_start();
if (isset($_POST['entrar_admin'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    if ($login == "GTAM" && $senha == "") {
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
    <link rel="stylesheet" href="../css/style_03.css">
</head>

<body>
    <div class="painel">
        <h1>ROTAM</h1>
        <h2>Sistema de Cadastro de Viaturas</h2>
        <?php
        if (isset($erro)) {
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