<h1>Listar Livro</h1>

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
            $botaoEmprestar = "<button class='btn btn-outline-success btn-sm' onclick=\"location.href='?page=cadastrar-emprestimo&id_livro={$row->id_livro}';\">Emprestar</button>";
        }
        print "<td class='text-center'>{$status}</td>";
        print "<td class='text-center' style='white-space: nowrap; width: 180px;'>
        {$botaoEmprestar}
        <button class='btn btn-outline-primary btn-sm ms-1' onclick=\"location.href='?page=editar-livro&id_livro={$row->id_livro}';\">Editar</button>
       </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>


<form>
    <div class="mt-3">
        <button type="button"
            class="btn btn-secondary me-2"
            onclick="history.back()">
            Voltar
        </button>

        <button type="button"
            class="btn btn-primary"
            onclick="location.href='?page=cadastrar-livro'">
            Cadastrar Novo
        </button>
    </div>
</form>