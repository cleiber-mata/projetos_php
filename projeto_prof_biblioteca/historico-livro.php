<h1>Histórico do Livro</h1>

<?php

$id_livro = $_GET['id_livro'] ?? 0;

$sql_livro = "SELECT * FROM livro WHERE id_livro = {$id_livro}";
$res_livro = $conn->query($sql_livro);
$livro = $res_livro->fetch_object();

print "<h4>{$livro->titulo_livro}</h4>";

$sql = "SELECT
            e.id_emprestimo,
            l.nome_leitor,
            a.nome_atendente,
            e.data_emprestimo,
            e.devolucao_emprestimo,
            e.status_emprestimo
        FROM emprestimo e
        INNER JOIN leitor l
            ON e.leitor_id_leitor = l.id_leitor
        INNER JOIN atendente a
            ON e.atendente_id_atendente = a.id_atendente
        WHERE e.livro_id_livro = {$id_livro}
        ORDER BY e.data_emprestimo DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    print "<p><strong>Total de empréstimos:</strong> {$result->num_rows}</p>";

    print "<table class='table table-hover align-middle'>";

    print "<tr>";
    print "<th>ID</th>";
    print "<th>Leitor</th>";
    print "<th>Atendente</th>";
    print "<th>Data Empréstimo</th>";
    print "<th>Data Devolução</th>";
    print "<th>Status</th>";
    print "<th>Ação</th>";
    print "</tr>";

    $contador = 0;

    while ($row = $result->fetch_object()) {

        $contador++;

        print "<tr>";

        print "<td>{$row->id_emprestimo}</td>";
        print "<td>{$row->nome_leitor}</td>";
        print "<td>{$row->nome_atendente}</td>";
        print "<td>" . date('d/m/Y', strtotime($row->data_emprestimo)) . "</td>";
        print "<td>" . date('d/m/Y', strtotime($row->devolucao_emprestimo)) . "</td>";

        if ($row->status_emprestimo == "EMPRESTADO") {
            $status = "<span class='text-primary'>EMPRESTADO</span>";
        } elseif ($row->status_emprestimo == "ATRASADO") {
            $status = "<span class='text-danger'>ATRASADO</span>";
        } else {
            $status = "<span class='text-success'>DEVOLVIDO</span>";
        }

        print "<td>{$status}</td>";

        print "<td class='text-center' style='white-space: nowrap; min-width: 220px;'>";

        if ($contador == 1) {

            if ($row->status_emprestimo == "EMPRESTADO" || $row->status_emprestimo == "ATRASADO") {

                echo botaoAtualizar(
                    "?page=editar-emprestimo&id_emprestimo={$row->id_emprestimo}"
                );

                echo " ";

                echo botaoDevolver(
                    "?page=salvar-emprestimo&acao=devolver&id_emprestimo={$row->id_emprestimo}"
                );
            } elseif ($row->status_emprestimo == "DEVOLVIDO") {

                echo botaoEmprestar(
                    "?page=cadastrar-emprestimo&id_livro={$id_livro}"
                );
            }
        }

        print "</td>";

        print "</tr>";
    }

    print "</table>";
} else {

    print "<p>Este livro ainda não possui histórico de empréstimos.</p>";
}

echo botaoVoltar();

?>