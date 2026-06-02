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
        print "<td class='text-center' style='white-space: nowrap; width: 180px;'>
					<button class='btn btn-outline-danger btn-sm ms-1' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-atendente&acao=excluir&id_atendente={$row->id_atendente}';}else{false;}\">Excluir</button>
			       </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>

<form>
    <div class="mt-3">
    <button type="button"
        class="btn btn-secondary me-2"
        onclick="history.back()">
        Voltar
    </button>

    <button type="button"
        class="btn btn-primary"
        onclick="location.href='?page=cadastrar-atendente'">
        Cadastrar Novo
    </button>
</div>
</form>