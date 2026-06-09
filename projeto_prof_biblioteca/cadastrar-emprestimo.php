<h1>Cadastrar Empréstimo</h1>
<?php
$id_leitor = $_GET['leitor_id'] ?? '';
$id_livro = $_GET['livro_id'] ?? ($_GET['id_livro'] ?? '');
$id_atendente = $_GET['atendente_id'] ?? '';
$data_hoje = date('Y-m-d');
?>

<form action="?page=salvar-emprestimo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Leitor:</label>
        <select name="leitor_id_leitor" class="form-control" required>
            <option value="">Selecione um leitor</option>

            <?php
            $sql_leitor = "SELECT * FROM leitor ORDER BY nome_leitor";
            $res_leitor = $conn->query($sql_leitor);

            while ($leitor = $res_leitor->fetch_object()) {
                $selected = ($id_leitor == $leitor->id_leitor) ? "selected" : "";
                print "<option value='{$leitor->id_leitor}' {$selected}>{$leitor->nome_leitor}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Livro:</label>

        <select name="livro_id_livro" class="form-control" required>
            <option value="">Selecione um livro</option>

            <?php
            $sql_livro = "SELECT * FROM livro ORDER BY titulo_livro";
            $res_livro = $conn->query($sql_livro);

            while ($livro = $res_livro->fetch_object()) {
                $selected = ($id_livro == $livro->id_livro) ? "selected" : "";
                print "<option value='{$livro->id_livro}' {$selected}>{$livro->titulo_livro}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Atendente:</label>
        <select name="atendente_id_atendente" class="form-control" required>
            <option value="">Selecione um atendente</option>

            <?php
            $sql_atendente = "SELECT * FROM atendente ORDER BY nome_atendente";
            $res_atendente = $conn->query($sql_atendente);

            while ($atendente = $res_atendente->fetch_object()) {
                $selected = ($id_atendente == $atendente->id_atendente) ? "selected" : "";
                print "<option value='{$atendente->id_atendente}' {$selected}>{$atendente->nome_atendente}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data do Empréstimo:</label>
        <input type="date" name="data_emprestimo" value="<?php print $data_hoje; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Devolução:</label>
        <input type="date" name="devolucao_emprestimo" class="form-control" required>
    </div>

    <div class="mb-3">
        <?php echo botaoEnviar(); ?>
        <?php echo botaoVoltar(); ?>
    </div>
</form>