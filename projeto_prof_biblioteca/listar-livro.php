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
        print "<td>
					<button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-livro&id_livro={$row->id_livro}';\">Editar</button>

					<button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-livro&acao=excluir&id_livro={$row->id_livro}';}else{false;}\">Excluir</button>
			       </td>";
        print "</tr>";
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
        <button type="button" class="btn btn-secondary" onclick="location.href='?page=cadastrar-livro'">Cadastrar Novo</button>
    </div>
</form>