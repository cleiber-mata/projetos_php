<h1>Cadastrar Livro</h1>


<form action="?page=salvar-livro" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Titulo:</label>
        <input type="text" name="titulo_livro" class="form-control">
    </div>
    <div class="mb-3">
        <label>Autor:</label>
        <input type="text" name="autor_livro" class="form-control">
    </div>
    <div class="mb-3">
        <label>Editora:</label>
        <input type="text" name="editora_livro" class="form-control">
    </div>
    <div class="mb-3">
        <label>Edição:</label>
       <input type="text" name="edicao_livro" class="form-control" placeholder="Ex: 1">
    </div>
    <div class="mb-3">
        <label>Ano de Publicação:</label>
        <input type="number" name="ano_livro" class="form-control" min="1800" max="<?php echo date('Y') + 1; ?>" placeholder="Ex: 2026">
    </div>

    <div class="mb-3">
        <label>Categoria:</label>
        <select name="categoria_id_categoria" class="form-control" required>
            <option value="">Selecione uma categoria</option>

            <?php
            $sql_categoria = "SELECT * FROM categoria ORDER BY nome_categoria";
            $res_categoria = $conn->query($sql_categoria);

            while ($cat = $res_categoria->fetch_object()) {
                print "<option value='{$cat->id_categoria}'>{$cat->nome_categoria}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <?php echo botaoEnviar(); ?>
        <?php echo botaoVoltar(); ?>
    </div>
</form>