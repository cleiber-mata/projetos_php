<h1>Histórico do Usuário</h1>

<?php

$id_leitor = $_GET['id_leitor'] ?? 0;

$sql_usuario = "SELECT * FROM leitor WHERE id_leitor = {$id_leitor}";
$res_usuario = $conn->query($sql_usuario);
$usuario = $res_usuario->fetch_object();

print "<h4>{$usuario->nome_leitor}</h4>";

$sql = "SELECT 
            e.id_emprestimo,
            li.titulo_livro,
            a.nome_atendente,
            e.data_emprestimo,
            e.devolucao_emprestimo,
            e.status_emprestimo
        FROM emprestimo e
        INNER JOIN livro li ON e.livro_id_livro = li.id_livro
        INNER JOIN atendente a ON e.atendente_id_atendente = a.id_atendente
        WHERE e.leitor_id_leitor = {$id_leitor}
        ORDER BY e.data_emprestimo DESC
        LIMIT 6";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    print "<table class='table table-hover table-sm align-middle'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Livro</th>";
    print "<th>Atendente</th>";
    print "<th>Data Empréstimo</th>";
    print "<th>Data Devolução</th>";
    print "<th>Status</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_emprestimo}</td>";
        print "<td>{$row->titulo_livro}</td>";
        print "<td>{$row->nome_atendente}</td>";
        print "<td>" . date('d/m/Y', strtotime($row->data_emprestimo)) . "</td>";
        print "<td>" . date('d/m/Y', strtotime($row->devolucao_emprestimo)) . "</td>";
        print "<td>{$row->status_emprestimo}</td>";
        print "</tr>";
    }

    print "</table>";

} else {
    print "<p>Este usuário ainda não possui histórico de empréstimos.</p>";
}

echo botaoVoltar();
?>