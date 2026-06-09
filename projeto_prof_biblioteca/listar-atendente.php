<h1>Listar Atendente</h1>

<form>
    <div class="mb-3">
        <?php echo botaoCadastrarNovo('?page=cadastrar-atendente'); ?>
    </div>
</form>

<?php

$sql = "SELECT * FROM atendente";

$result = $conn->query($sql);

$qtd = $result->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-hover table-sm align-middle' style='white-space: nowrap;'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Nome</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_atendente . "</td>";
        print "<td>" . $row->nome_atendente . "</td>";
        print "<td class='text-center' style='white-space: nowrap; width: 180px;'>
			" . botaoHistorico("?page=historico-atendente&id_atendente={$row->id_atendente}")
            . " "
            . botaoExcluir("?page=salvar-atendente&acao=excluir&id_atendente={$row->id_atendente}") . "
			       </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>

<form>
    <div class="mb-3">
        <?php echo botaoCadastrarNovo('?page=cadastrar-atendente'); ?>
    </div>
</form>