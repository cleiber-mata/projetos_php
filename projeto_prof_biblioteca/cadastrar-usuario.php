<h1>Cadastrar Usuário</h1>
<form action="?page=salvar-usuario" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome_leitor" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail:</label>
        <input type="email" name="email_leitor" class="form-control">
    </div>
    <div class="mb-3">
        <label>Telefone:</label>
        <input type="text" name="telefone_leitor" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Nascimento:</label>
        <input type="date" name="data_nasc_leitor" class="form-control">
    </div>
    <div class="mb-3">
        <label>Gênero:</label>
        <select name="genero_leitor" class="form-control" required>
            <option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
            <option value="Não quero informar">Não quero informar</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
     <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
</form>