<h1>Listar Categoria</h1>

<form>
	<div class="mb-3">
		<?php echo botaoCadastrarNovo('?page=cadastrar-categoria'); ?>
	</div>
</form>

<?php

$sql = "SELECT * FROM categoria";

$result = $conn->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
	print "<table class='table table-hover table-sm align-middle' style='white-space: nowrap;'>";
	print "<tr>";
	print "<th>ID</th>";
	print "<th>Nome</th>";
	print "<th>Ações</th>";
	print "</tr>";
	while ($row = $result->fetch_object()) {
		print "<tr>";
		print "<td>" . $row->id_categoria . "</td>";
		print "<td>" . $row->nome_categoria . "</td>";
		print "<td class='text-center' style='white-space: nowrap; width: 180px;'>"
			. botaoAtualizar("?page=editar-categoria&id_categoria={$row->id_categoria}")
			. " "
			. botaoExcluir("?page=salvar-categoria&acao=excluir&id_categoria={$row->id_categoria}")
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
		<?php echo botaoCadastrarNovo('?page=cadastrar-categoria'); ?>
	</div>
</form>