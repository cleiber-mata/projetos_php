<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style>
        body {
            background-image: url("imagens/fundo_biblioteca.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.60);
            min-height: 100vh;
            padding-bottom: 50px;
        }

        .caixa-principal {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            margin-top: 30px;
            max-width: 95%;
            margin-left: auto;
            margin-right: auto;
            overflow-x: auto;
        }

        h1 {
            font-weight: bold;
            color: #212529;
        }

        .texto-bemvindo {
            font-size: 20px;
            color: #555;
        }

        .tabela-emprestimo {
            font-size: 0.95rem;
        }

        .tabela-emprestimo th,
        .tabela-emprestimo td {
            padding: 10px 14px;
            white-space: nowrap;
        }

        .tabela-emprestimo th {
            font-weight: 700;
        }

        .tabela-emprestimo td:nth-child(4) {
            min-width: 230px;
        }

        .tabela-emprestimo td:last-child {
            min-width: 170px;
        }
    </style>
</head>

<body>

    <div class="overlay">

        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="index_moderno.php">Biblioteca</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" href="index_moderno.php">Início</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Categoria
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-categoria">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-categoria">Listar</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Livro
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-livro">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-livro">Listar</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Atendente
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-atendente">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-atendente">Listar</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Usuário
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-usuario">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-usuario">Listar</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Empréstimo
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-emprestimo">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-emprestimo">Listar</a></li>
                            </ul>
                        </li>

                    </ul>

                    <form class="d-flex" role="search" action="index_moderno.php" method="GET">
                        <input type="hidden" name="page" value="pesquisa">

                        <input class="form-control me-2"
                            type="search"
                            name="q"
                            placeholder="Pesquisar no sistema"
                            aria-label="Pesquisar">

                        <button class="btn btn-outline-light" type="submit">
                            Pesquisar
                        </button>
                    </form>

                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12 caixa-principal">

                    <?php
                    include('config.php');
                    include_once("componentes_botoes.php");

                    switch (@$_REQUEST["page"]) {

                        // Categoria
                        case 'cadastrar-categoria':
                            include('cadastrar-categoria.php');
                            break;
                        case 'listar-categoria':
                            include('listar-categoria.php');
                            break;
                        case 'editar-categoria':
                            include('editar-categoria.php');
                            break;
                        case 'salvar-categoria':
                            include('salvar-categoria.php');
                            break;

                        // Livro
                        case 'cadastrar-livro':
                            include('cadastrar-livro.php');
                            break;
                        case 'listar-livro':
                            include('listar-livro.php');
                            break;
                        case 'editar-livro':
                            include('editar-livro.php');
                            break;
                        case 'salvar-livro':
                            include('salvar-livro.php');
                            break;

                        // Atendente
                        case 'cadastrar-atendente':
                            include('cadastrar-atendente.php');
                            break;
                        case 'listar-atendente':
                            include('listar-atendente.php');
                            break;
                        case 'editar-atendente':
                            include('editar-atendente.php');
                            break;
                        case 'salvar-atendente':
                            include('salvar-atendente.php');
                            break;

                        // Usuário
                        case 'cadastrar-usuario':
                            include('cadastrar-usuario.php');
                            break;
                        case 'listar-usuario':
                            include('listar-usuario.php');
                            break;
                        case 'editar-usuario':
                            include('editar-usuario.php');
                            break;
                        case 'salvar-usuario':
                            include('salvar-usuario.php');
                            break;

                        // Empréstimo
                        case 'cadastrar-emprestimo':
                            include('cadastrar-emprestimo.php');
                            break;
                        case 'listar-emprestimo':
                            include('listar-emprestimo.php');
                            break;
                        case 'editar-emprestimo':
                            include('editar-emprestimo.php');
                            break;
                        case 'salvar-emprestimo':
                            include('salvar-emprestimo.php');
                            break;

                        // Pesquisa
                        case 'pesquisa':
                            include('pesquisa.php');
                            break;

                        // Histórico do usuário
                        case 'historico-usuario':
                            include('historico-usuario.php');
                            break;

                        default:
                            print "
                            <div class='text-center'>
                                <h1>Bem-vindo ao Sistema da Biblioteca</h1>
                                <hr>
                                <p class='texto-bemvindo'>
                                    Sistema de gerenciamento de livros, categorias,
                                    usuários, atendentes e empréstimos.
                                </p>
                            </div>
                        ";
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

</body>

</html>