<h1>Editar Usuário</h1>
<?php


$sql = "SELECT * FROM leitor WHERE id_leitor=" . $_GET['id_leitor'];

$result = $conn->query($sql);

$row = $result->fetch_object();
?>
<form action="?page=salvar-usuario" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_leitor" value="<?php print $row->id_leitor; ?>">

    <div class="mb-3">
        <strong>Nome: </strong>
        <?php print $row->nome_leitor; ?>
    </div>
    <div class="mb-3">
        <strong>Data de Nascimento: </strong>
        <?php print date('d/m/Y', strtotime($row->data_nasc_leitor)); ?>
    </div>

    <div class="mb-3">
        <label>Email: </label>
        <input type="text" name="email_leitor" value="<?php print $row->email_leitor; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Telefone: </label>
        <input type="text" name="telefone_leitor" value="<?php print $row->telefone_leitor; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Genero: </label>
        <select name="genero_leitor" class="form-control">
            <option value="Masculino" <?php if ($row->genero_leitor == "Masculino") print "selected"; ?>>Masculino</option>
            <option value="Feminino" <?php if ($row->genero_leitor == "Feminino") print "selected"; ?>>Feminino</option>
            <option value="Outro" <?php if ($row->genero_leitor == "Outro") print "selected"; ?>>Outro</option>
            <option value="Não quero informar" <?php if ($row->genero_leitor == "Não quero informar") print "selected"; ?>>Não quero informar</option>
        </select>
    </div>

     <div class="mb-3">
        <?php echo botaoEnviar(); ?>
        <?php echo botaoVoltar(); ?>
    </div>
</form>