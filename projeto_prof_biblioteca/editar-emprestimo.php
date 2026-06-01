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
        <strong>Leitor: </strong>
        <input type="text" name="leitor_id_leitor" value="<?php print $row->leitor_id_leitor; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <strong>Livro: </strong>
        <input type="text" name="livro_id_livro" value="<?php print $row->livro_id_livro; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Atendente: </label>
        <input type="text" name="atendente_id_atendente" value="<?php print $row->atendente_id_atendente; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Empréstimo: </label>
        <input type="text" name="data_emprestimo" value="<?php print $row->data_emprestimo; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Devolução: </label>
        <input type="text" name="devolucao_emprestimo" value="<?php print $row->devolucao_emprestimo; ?>" class="form-control">
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</form>