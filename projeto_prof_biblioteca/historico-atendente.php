<h1>Histórico do Atendente</h1>

<?php
echo botaoVoltar();

$id_atendente = $_GET['id_atendente'] ?? 0;

$sql_atendente = "SELECT * FROM atendente WHERE id_atendente = {$id_atendente}";
$res_atendente = $conn->query($sql_atendente);
$atendente = $res_atendente->fetch_object();

print "<h4>{$atendente->nome_atendente}</h4>";

$sql = "SELECT 
            e.id_emprestimo,
            l.nome_leitor,
            li.titulo_livro,
            e.data_emprestimo,
            e.devolucao_emprestimo,
            e.status_emprestimo
        FROM emprestimo e
        INNER JOIN leitor l ON e.leitor_id_leitor = l.id_leitor
        INNER JOIN livro li ON e.livro_id_livro = li.id_livro
        WHERE e.atendente_id_atendente = {$id_atendente}
        ORDER BY e.data_emprestimo DESC
        LIMIT 10";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    print "<table class='table table-hover table-sm align-middle'>";

    print "<tr>";
    print "<th>ID</th>";
    print "<th>Leitor</th>";
    print "<th>Livro</th>";
    print "<th>Data Empréstimo</th>";
    print "<th>Data Devolução</th>";
    print "<th>Status</th>";
    print "<th>Ação</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {

        print "<tr>";

        print "<td>{$row->id_emprestimo}</td>";
        print "<td>{$row->nome_leitor}</td>";
        print "<td>{$row->titulo_livro}</td>";
        print "<td>" . date('d/m/Y', strtotime($row->data_emprestimo)) . "</td>";
        print "<td>" . date('d/m/Y', strtotime($row->devolucao_emprestimo)) . "</td>";
        print "<td>{$row->status_emprestimo}</td>";

        print "<td>"
            . botaoAtualizar("?page=editar-emprestimo&id_emprestimo={$row->id_emprestimo}")
            . "</td>";

        print "</tr>";
    }

    print "</table>";

} else {

    print "<p>Este atendente ainda não possui histórico de empréstimos.</p>";

}

echo botaoVoltar();

?>