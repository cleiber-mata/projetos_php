<h1>Listar Livro</h1>

<form>
    <div class="mb-3">
        <?php echo botaoCadastrarNovo('?page=cadastrar-livro'); ?>
    </div>
</form>

<?php


$sql = "SELECT * FROM livro";

$result = $conn->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-hover table-sm align-middle' style='white-space: nowrap;'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Titulo</th>";
    print "<th>Autor</th>";
    print "<th>Editora</th>";
    print "<th>Edição</th>";
    print "<th>Ano de Publicação</th>";
    print "<th>Status</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_livro . "</td>";
        print "<td>" . $row->titulo_livro . "</td>";
        print "<td>" . $row->autor_livro . "</td>";
        print "<td>" . $row->editora_livro . "</td>";
        print "<td>" . $row->edicao_livro . "</td>";
        print "<td>" . $row->ano_livro . "</td>";

        if ($row->status_livro == 'EMPRESTADO') {

            $status = "<span class='text-danger'>Emprestado</span>";
            $botaoEmprestar = "";
        } else {

            $status = "<span class='text-success'>Disponível</span>";
            $botaoEmprestar = botaoEmprestar(
                "?page=cadastrar-emprestimo&id_livro={$row->id_livro}"
            );
        }

        print "<td class='text-center'>{$status}</td>";

        print "<td class='text-center' style='white-space: nowrap; width: 280px;'>"
            . $botaoEmprestar
            . " "
            . botaoAtualizar("?page=editar-livro&id_livro={$row->id_livro}")
            . " "
            . botaoHistorico("?page=historico-livro&id_livro={$row->id_livro}")
            . "</td>";

        print "</tr>";
    }

    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>


<form>
    <div class="mb-3">
        <?php echo botaoCadastrarNovo('?page=cadastrar-livro'); ?>
    </div>
</form>