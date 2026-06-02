<h1>Pesquisa</h1>

<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

$busca = $_GET['q'] ?? '';

print "<p>Você pesquisou por: <b>{$busca}</b></p>";
?>