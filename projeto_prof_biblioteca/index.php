<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Biblioteca</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Início</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Categoria
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-categoria">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-categoria">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Livro
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-livro">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-livro">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Atendente
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-atendente">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-atendente">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Usuário
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-usuario">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-usuario">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Empréstimo
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-emprestimo">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-emprestimo">Listar</a></li>
						</ul>
					</li>

				</ul>

				<form class="d-flex" role="search" action="index.php" method="GET">
					<input type="hidden" name="page" value="pesquisa">
					<input
						class="form-control me-2"
						type="search"
						name="q"
						placeholder="Pesquisar no sistema"
						aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Pesquisar</button>
				</form>

			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row mt-4">
			<div class="col">
				<?php
				//CONEXÃO COM O BANCO DE DADOS
				include('config.php');
				include_once("componentes_botoes.php");

				switch (@$_REQUEST['page']) {
					//categoria
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

					//livro
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
					case 'historico-livro':
						include('historico-livro.php');
						break;

					//atendente
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
					case 'historico-atendente':
						include('historico-atendente.php');
						break;

					//usuario
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
					case 'historico-usuario':
						include('historico-usuario.php');
						break;

					//emprestimo
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

					// pesquisa
					case 'pesquisa':
						include('pesquisa.php');
						break;


					default:
						print "<h1>Bem vindo ao sistema da Biblioteca</h1>";
				}
				?>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>