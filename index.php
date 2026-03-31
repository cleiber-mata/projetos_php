<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aprendendo PHP</title>
</head>
<body>

    <form action="aula_chat.php" method="GET">
        <label>A</label>
        <input type="number" name="a">
        
        <label>B</label>
        <input type="number" name="b">
        
        <button type="submit">Enviar</button>
    </form>

    <?php
        $a = $_GET["a"] ?? 0;
        $b = $_GET["b"] ?? 0;

        if ($a > $b) {
            echo $a . " é maior que o valor de " . $b;
        } elseif ($b > $a) {
            echo $b . " é maior que o valor de " . $a;
        } else {
            echo "Os valores são iguais";
        }
    ?>

</body>
</html>