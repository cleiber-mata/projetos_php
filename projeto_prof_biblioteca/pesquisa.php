<h1>Pesquisa</h1>

<?php

$busca = $_GET['q'] ?? '';
print "<h4>Resultado da pesquisa: <b>{$busca}</b></h4>";

if ($busca == '') {
    print "<p>Digite algo para pesquisar.</p>";
    return;
}

// Pesquisa por leitores
$sql = "SELECT * FROM leitor 
        WHERE nome_leitor LIKE '%{$busca}%'
        OR email_leitor LIKE '%{$busca}%'
        OR telefone_leitor LIKE '%{$busca}%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    print "<h3>Leitores encontrados</h3>";
    print "<table class='table table-hover table-sm align-middle'>";
    print "<tr>";
    print "<th>Nome</th>";
    print "<th>Email</th>";
    print "<th>Telefone</th>";
    print "<th>Ação</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>{$row->nome_leitor}</td>";
        print "<td>{$row->email_leitor}</td>";
        print "<td>{$row->telefone_leitor}</td>";
        print "<td>";

        echo botaoAtualizar(
            "?page=editar-usuario&id_leitor={$row->id_leitor}"
        );

        echo " ";

        echo botaoHistorico(
            "?page=historico-usuario&id_leitor={$row->id_leitor}"
        );

        print "</td>";
        print "</tr>";
    }

    print "</table>";
}

// Pesquisa por livros
$sql = "SELECT * FROM livro
        WHERE titulo_livro LIKE '%{$busca}%'
        OR autor_livro LIKE '%{$busca}%'
        OR editora_livro LIKE '%{$busca}%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    print "<h3>Livros encontrados</h3>";
    print "<table class='table table-hover table-sm align-middle'>";
    print "<tr>";
    print "<th>Título</th>";
    print "<th>Autor</th>";
    print "<th>Editora</th>";
    print "<th>Status</th>";
    print "<th>Ação</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {
        print "<tr>";
        print "<td>{$row->titulo_livro}</td>";
        print "<td>{$row->autor_livro}</td>";
        print "<td>{$row->editora_livro}</td>";
        print "<td>{$row->status_livro}</td>";
        print "<td>";

        echo botaoAtualizar(
            "?page=editar-livro&id_livro={$row->id_livro}"
        );

        print "</td>";
        print "</tr>";
    }

    print "</table>";
}

// Pesquisa por empréstimos
$sql = "SELECT
            e.id_emprestimo,
            l.nome_leitor,
            li.titulo_livro,
            e.status_emprestimo
        FROM emprestimo e
        INNER JOIN leitor l
            ON e.leitor_id_leitor = l.id_leitor
        INNER JOIN livro li
            ON e.livro_id_livro = li.id_livro
        WHERE l.nome_leitor LIKE '%{$busca}%'
           OR li.titulo_livro LIKE '%{$busca}%'
           OR e.status_emprestimo LIKE '%{$busca}%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    print "<h3>Empréstimos encontrados</h3>";

    print "<table class='table table-hover table-sm align-middle'>";

    print "<tr>";
    print "<th>ID</th>";
    print "<th>Leitor</th>";
    print "<th>Livro</th>";
    print "<th>Status</th>";
    print "<th>Ação</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {

        print "<tr>";

        print "<td>{$row->id_emprestimo}</td>";
        print "<td>{$row->nome_leitor}</td>";
        print "<td>{$row->titulo_livro}</td>";
        print "<td>{$row->status_emprestimo}</td>";

        print "<td>";

        echo botaoAtualizar(
            "?page=editar-emprestimo&id_emprestimo={$row->id_emprestimo}"
        );

        print "</td>";

        print "</tr>";
    }

    print "</table>";
}

// Pesquisa por categorias
$sql = "SELECT * FROM categoria
        WHERE nome_categoria LIKE '%{$busca}%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    print "<h3>Categorias encontradas</h3>";

    print "<table class='table table-hover table-sm align-middle'>";

    print "<tr>";
    print "<th>Categoria</th>";
    print "<th>Ação</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {

        print "<tr>";

        print "<td>{$row->nome_categoria}</td>";

        print "<td>";

        echo botaoAtualizar(
            "?page=editar-categoria&id_categoria={$row->id_categoria}"
        );

        print "</td>";

        print "</tr>";
    }

    print "</table>";
}

// Pesquisa por atendentes
$sql = "SELECT * FROM atendente
        WHERE nome_atendente LIKE '%{$busca}%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    print "<h3>Atendentes encontrados</h3>";

    print "<table class='table table-hover table-sm align-middle'>";

    print "<tr>";
    print "<th>Nome</th>";
    print "<th>Ação</th>";
    print "</tr>";

    while ($row = $result->fetch_object()) {

        print "<tr>";

        print "<td>{$row->nome_atendente}</td>";

        print "<td>";

        echo botaoAtualizar(
            "?page=editar-atendente&id_atendente={$row->id_atendente}"
        );

        print "</td>";

        print "</tr>";
    }

    print "</table>";
}

?>
<form>
    <div class="mb-3">
        <?php echo botaoVoltar(); ?>
    </div>
</form>