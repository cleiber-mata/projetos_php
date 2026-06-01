<h1>Listar Empréstimo</h1>

<?php
$sql = "SELECT 
            e.id_emprestimo,
            l.nome_leitor,
            l.telefone_leitor,
            li.titulo_livro,
            a.nome_atendente,
            e.data_emprestimo,
            e.devolucao_emprestimo
        FROM emprestimo e
        INNER JOIN leitor l ON e.leitor_id_leitor = l.id_leitor
        INNER JOIN livro li ON e.livro_id_livro = li.id_livro
        INNER JOIN atendente a ON e.atendente_id_atendente = a.id_atendente";

$result = $conn->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-hover table-sm align-middle' style='white-space: nowrap;'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Leitor</th>";
    print "<th>Telefone</th>";
    print "<th>Livro</th>";
    print "<th>Atendente</th>";
    print "<th>Data de Empréstimo</th>";
    print "<th>Data de Devolução</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_emprestimo . "</td>";
        print "<td>" . $row->nome_leitor . "</td>";
        print "<td>" . $row->telefone_leitor . "</td>";
        print "<td>" . $row->titulo_livro . "</td>";
        print "<td>" . $row->nome_atendente . "</td>";
        print "<td>" . date('d/m/Y', strtotime($row->data_emprestimo)) . "</td>";
        print "<td>" . date('d/m/Y', strtotime($row->devolucao_emprestimo)) . "</td>";
        print "<td 
            style='white-space: nowrap; width: 130px;'>
            <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-emprestimo&id_emprestimo={$row->id_emprestimo}';\">Editar</button>
            <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-emprestimo&acao=excluir&id_emprestimo={$row->id_emprestimo}';}\">Excluir</button>
        </td>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>


<form>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="location.href='?page=cadastrar-emprestimo'">Cadastrar Novo</button>
    </div>
</form>