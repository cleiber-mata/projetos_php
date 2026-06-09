<h1>Listar Usuários</h1>
<form>
    <div class="mb-3">
        <?php echo botaoCadastrarNovo('?page=cadastrar-usuario'); ?>
    </div>
</form>

<?php


$sql = "SELECT * FROM leitor";

$result = $conn->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-hover table-sm align-middle' style='white-space: nowrap;'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Nome</th>";
    print "<th>Telefone</th>";
    print "<th>Email</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_leitor . "</td>";
        print "<td>" . $row->nome_leitor . "</td>";
        print "<td>" . $row->telefone_leitor . "</td>";
        print "<td>" . $row->email_leitor . "</td>";
        print "<td class='text-center' style='white-space: nowrap; width: 180px;'>"
            . botaoAtualizar("?page=editar-usuario&id_leitor={$row->id_leitor}")
            . " "
            . botaoHistorico("?page=historico-usuario&id_leitor={$row->id_leitor}")
            . " "
            . botaoExcluir("?page=salvar-usuario&acao=excluir&id_leitor={$row->id_leitor}")
            . "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>


<form>
    <div class="mb-3">
        <?php echo botaoCadastrarNovo('?page=cadastrar-usuario'); ?>
    </div>
</form>