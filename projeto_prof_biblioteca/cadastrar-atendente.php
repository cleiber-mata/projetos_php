<h1>Cadastrar Atendente</h1>

<form action="?page=salvar-atendente" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome_atendente" class="form-control">
    </div>

    <div class="mb-3">
        <?php echo botaoEnviar(); ?>
        <?php echo botaoVoltar(); ?>
    </div>
</form>