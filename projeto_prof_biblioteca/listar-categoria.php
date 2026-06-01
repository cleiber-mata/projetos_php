<h1>Listar Categoria</h1>
<?php
$sql = "SELECT * FROM categoria";

$result = $conn->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
	print "<table class='table table-bordered table-striped table-hover'>";
	print "<tr>";
	print "<th>ID</th>";
	print "<th>Nome</th>";
	print "<th>Ações</th>";
	print "</tr>";
	while ($row = $result->fetch_object()) {
		print "<tr>";
		print "<td>" . $row->id_categoria . "</td>";
		print "<td>" . $row->nome_categoria . "</td>";
		print "<td>		
					<button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-categoria&id_categoria={$row->id_categoria}';\">Editar</button>
					<button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-categoria&acao=excluir&id_categoria={$row->id_categoria}';}else{false;}\">Excluir</button>
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
		<button type="button" class="btn btn-secondary" onclick="location.href='?page=cadastrar-categoria'">Cadastrar Novo</button>
	</div>

</form>