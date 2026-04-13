<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovação</title>
</head>
<body>
    <form method="POST">
        NOTA:<BR>
        Entre com uma nota: <input type="number" id="nota" name="nota" step="0.1" min="0" max="10">   
        <button type="submit">Enviar Nota</button><br><br>
    </form>

    <?php
        $nota = $_POST["nota"] ?? "";

        if(isset($nota) && $nota >= 7){
            echo "Aluno aprovado com a nota: " . $nota;
        } else {
            echo "Aluno reprovado com a nota: " . $nota;
        }
    ?>
</body>
</html>