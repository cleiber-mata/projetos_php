<h1>Pesquisa</h1>

<?php

$busca = $_GET['q'] ?? '';

print "<h4>Resultado da pesquisa: <b>$busca</b></h4>";

$sql = "SELECT * FROM leitor
        WHERE nome_leitor LIKE '%{$busca}%'";

$result = $conn->query($sql);

if($result->num_rows > 0){

    print "<h3>Leitores encontrados</h3>";

    while($row = $result->fetch_object()){

        print "<p>";
        print "<b>{$row->nome_leitor}</b><br>";
        print "Email: {$row->email_leitor}<br>";
        print "Telefone: {$row->telefone_leitor}";
        print "</p><hr>";

    }

}else{

    print "<p>Nenhum leitor encontrado.</p>";

}
?>