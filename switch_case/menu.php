<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title> 
        
        <style>
            body {
                background: 
                linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)),
                url('../imagem/aqui_nao.jpg') no-repeat center/cover;
                margin: 0;
                height: 100vh;
                font-family: Arial, sans-serif;
            }
    </style>
    </head>

    <body>
        <div style="background-color: rgba(255, 255, 255, 0.4); padding: 40px; border-radius: 10px; width: 300px; margin: auto; margin-top: 50px;">
            <form action="menu.php" method="POST">
                <label> Menu de opções: </label><br><br>
                <label> 1 - Cadastro </label><br>
                <label> 2 - Editar </label><br>
                <label> 3 - Excluir </label><br>   
                <label> 4 - Sair </label><br><br>
                <input type ="number" name="opcao" required>
                <input type="submit" value="Enviar">
            </form>
            <?php
                if (isset($_POST['opcao'])) { 
                    $opcao = $_POST['opcao'];
                    switch ($opcao) {
                        case 1:
                            echo("Cadastrar:");
                            break;
                        case 2:
                            echo("Editar:");
                            break;
                        case 3:
                            echo("Excluir:");
                            break;
                        case 4:
                            echo("Sair");
                            break;
                        default:
                            echo("Opção inválida");
                    }
                }
            ?>
        </div>        
    </body>
</html>

