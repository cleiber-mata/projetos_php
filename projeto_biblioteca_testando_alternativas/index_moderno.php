<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <title>Biblioteca</title>

    <link rel="stylesheet"
        type="text/css"
        href="css/bootstrap.min.css">

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

        .navbar {
            box-shadow: 0px 3px 18px rgba(0, 0, 0, 0.45);
        }

        .caixa-principal {
            background: rgba(255, 255, 255, 0.70);
            border-radius: 70px;
            padding: clamp(20px, 4vw, 40px);
            margin-top: 90px;
            box-shadow: 0px 6px 28px rgba(0, 0, 0, 0.60);
        }

        h1 {
            font-weight: bold;
            color: #212529;
        }

        .texto-bemvindo {
            font-size: 20px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="overlay">

        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="index_moderno.php">Biblioteca</a>

                <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" href="index_moderno.php">Início</a>
                        </li>

                        <!-- Categoria -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categoria
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-categoria">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-categoria">Listar</a></li>
                            </ul>
                        </li>

                        <!-- Livro -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Livro
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-livro">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-livro">Listar</a></li>
                            </ul>
                        </li>

                        <!-- Atendente -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Atendente
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-atendente">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-atendente">Listar</a></li>
                            </ul>
                        </li>

                        <!-- Usuário -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Usuário
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-usuario">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-usuario">Listar</a></li>
                            </ul>
                        </li>

                        <!-- Empréstimo -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Empréstimo
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=cadastrar-emprestimo">Cadastrar</a></li>
                                <li><a class="dropdown-item" href="?page=listar-emprestimo">Listar</a></li>
                            </ul>
                        </li>

                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2"
                            type="search"
                            placeholder="Pesquisar"
                            aria-label="Pesquisar">

                        <button class="btn btn-outline-light" type="submit">
                            Pesquisar
                        </button>
                    </form>

                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-md-10 caixa-principal text-center">

                    <?php

                    switch (@$_REQUEST["page"]) {

                        // categoria
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

                        // livro
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

                        // atendente
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

                        // usuário
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

                        // empréstimo
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

                        default:
                            print "
                                <h1>Bem-vindo ao Sistema da Biblioteca</h1>
                                <hr>
                                <p class='texto-bemvindo'>
                                    Sistema de gerenciamento de livros,
                                    categorias, usuários, atendentes e empréstimos.
                                </p>
                            ";
                    }

                    ?>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript"
        src="js/bootstrap.bundle.min.js">
    </script>

</body>

</html>