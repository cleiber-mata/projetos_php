<h1>Listar Atendente</h1>
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
        print "<td>

					<button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-atendente&acao=excluir&id_atendente={$row->id_atendente}';}else{false;}\">Excluir</button>
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
        <button type="button" class="btn btn-secondary" onclick="history.back()">Voltar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="location.href='?page=cadastrar-atendente'">Cadastrar Novo</button>
    </div>
</form>