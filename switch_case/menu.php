<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title> 
        
    </head>

    <body>
    
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
    </body>
</html>

