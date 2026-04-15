<?php
/*
Verificação de login simples
Crie um sistema simples que receba um usuário e senha.

Se usuário for "admin" e senha "1234" → Login válido
Caso contrário → Acesso negado
*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content ="width=device-width, initial-scale=1.0">
     <TITLE> Login senha </TITLE>
</head>

<body>

<div style="text-align: center; margin-top: 100px;">
    

<form method="POST">
        <LABEL> Login: <input type="text" id="login" name="login" required></LABEL>
        <br><br>
        <LABEL> Senha: <input type="password" id="senha" name="senha" required ></LABEL>
        <br><br>
        <button type="submit">Entrar</button><br><br>
</form>

<?php
    $_login = "admin";
    $_senha = "1234";

    if ($_POST) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if ($login == $_login && $senha == $_senha) {
            echo "Login bem-sucedido!";
        } else {
            echo "Login ou senha incorretos.";
        }
    }
            
?>
</div>
</body>
</html>