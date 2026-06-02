<h1>Editar Empréstimo</h1>

<?php
$sql = "SELECT * FROM emprestimo WHERE id_emprestimo=" . $_GET['id_emprestimo'] . ";";

$result = $conn->query($sql);

$row = $result->fetch_object();
?>
<form action="?page=salvar-emprestimo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_emprestimo" value="<?php print $row->id_emprestimo; ?>">

    <div class="mb-3">
        <strong>Emprestimo: </strong>
        <?php print $row->id_emprestimo; ?>
    </div>

    <div class="mb-3">
    <label>Leitor:</label>
    <select name="leitor_id_leitor" class="form-control" required>
        <?php
        $sql_leitor = "SELECT * FROM leitor ORDER BY nome_leitor";
        $res_leitor = $conn->query($sql_leitor);

        while ($leitor = $res_leitor->fetch_object()) {
            $selected = ($leitor->id_leitor == $row->leitor_id_leitor) ? "selected" : "";
            print "<option value='{$leitor->id_leitor}' {$selected}>{$leitor->nome_leitor}</option>";
        }
        ?>
    </select>
</div>

    <div class="mb-3">
    <label>Livro:</label>
    <select name="livro_id_livro" class="form-control" required>
        <?php
        $sql_livro = "SELECT * FROM livro ORDER BY titulo_livro";
        $res_livro = $conn->query($sql_livro);

        while ($livro = $res_livro->fetch_object()) {
            $selected = ($livro->id_livro == $row->livro_id_livro) ? "selected" : "";
            print "<option value='{$livro->id_livro}' {$selected}>{$livro->titulo_livro}</option>";
        }
        ?>
    </select>
</div>

    <div class="mb-3">
    <label>Atendente:</label>
    <select name="atendente_id_atendente" class="form-control" required>
        <?php
        $sql_atendente = "SELECT * FROM atendente ORDER BY nome_atendente";
        $res_atendente = $conn->query($sql_atendente);

        while ($atendente = $res_atendente->fetch_object()) {
            $selected = ($atendente->id_atendente == $row->atendente_id_atendente) ? "selected" : "";
            print "<option value='{$atendente->id_atendente}' {$selected}>{$atendente->nome_atendente}</option>";
        }
        ?>
    </select>
</div>

    <div class="mb-3">
        <label>Data de Empréstimo: </label>
        <input type="date" name="data_emprestimo" value="<?php print $row->data_emprestimo; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Devolução: </label>
        <input type="date" name="devolucao_emprestimo" value="<?php print $row->devolucao_emprestimo; ?>" class="form-control">
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</form>