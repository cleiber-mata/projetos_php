<h1>Editar Categoria</h1>
<?php


$sql = "SELECT * FROM categoria WHERE id_categoria=" . $_GET['id_categoria'];

$result = $conn->query($sql);

$row = $result->fetch_object();
?>
<form action="?page=salvar-categoria" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_categoria" value="<?php print $row->id_categoria; ?>">
	
	<div class="mb-3">
		<label>Nome da Categoria</label>
		<input type="text" name="nome_categoria" value="<?php print $row->nome_categoria; ?>" class="form-control">
	</div>

	 <div class="mb-3">
        <?php echo botaoEnviar(); ?>
        <?php echo botaoVoltar(); ?>
    </div>

</form>