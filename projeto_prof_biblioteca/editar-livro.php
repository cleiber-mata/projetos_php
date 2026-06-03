<h1>Editar Livro</h1>

<?php


$sql = "SELECT * FROM livro WHERE id_livro=" . $_GET['id_livro'];

$result = $conn->query($sql);

$row = $result->fetch_object();
?>
<form action="?page=salvar-livro" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_livro" value="<?php print $row->id_livro; ?>">

    <div class="mb-3">
        <strong>Titulo: </strong>
        <input type="text" name="titulo_livro" value="<?php print $row->titulo_livro; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <strong>Autor: </strong>
        <input type="text" name="autor_livro" value="<?php print $row->autor_livro; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Editora: </label>
        <input type="text" name="editora_livro" value="<?php print $row->editora_livro; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Edição: </label>
        <input type="text" name="edicao_livro" value="<?php print $row->edicao_livro; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Ano de Publicação: </label>
        <input type="text" name="ano_livro" value="<?php print $row->ano_livro; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Categoria: </label>
        <select name="categoria_id_categoria" class="form-control" required>
            <option value="">Selecione uma categoria</option>

            <?php
            $sql_categoria = "SELECT * FROM categoria ORDER BY nome_categoria";
            $res_categoria = $conn->query($sql_categoria);

            while ($cat = $res_categoria->fetch_object()) {
                $selected = ($cat->id_categoria == $row->categoria_id_categoria) ? "selected" : "";
                print "<option value='{$cat->id_categoria}' {$selected}>{$cat->nome_categoria}</option>";
            }
            ?>
        </select>
    </div>

     <div class="mb-3">
        <?php echo botaoEnviar(); ?>
        <?php echo botaoVoltar(); ?>
    </div>
</form>