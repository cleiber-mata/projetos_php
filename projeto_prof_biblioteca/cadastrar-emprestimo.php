<h1>Cadastrar Empréstimo</h1>

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
                print "<option value='{$leitor->id_leitor}'>{$leitor->nome_leitor}</option>";
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
                print "<option value='{$livro->id_livro}'>{$livro->titulo_livro}</option>";
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
                print "<option value='{$atendente->id_atendente}'>{$atendente->nome_atendente}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data do Empréstimo:</label>
        <input type="date" name="data_emprestimo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Devolução:</label>
        <input type="date" name="devolucao_emprestimo" class="form-control" required>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="location.href='?page=cadastrar-usuario'">Cadastrar Novo Usuário</button>
    </div>
</form>