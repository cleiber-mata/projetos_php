<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$titulo = $_POST['titulo_livro'];
			$autor = $_POST['autor_livro'];
			$editora = $_POST['editora_livro'];
			$edicao = $_POST['edicao_livro'];
			$ano = $_POST['ano_livro'];
			$categoria = $_POST['categoria_id_categoria'];

			$sql = "INSERT INTO livro (titulo_livro, autor_livro, editora_livro, edicao_livro, ano_livro, categoria_id_categoria)
					VALUES ('{$titulo}', '{$autor}', '{$editora}', '{$edicao}', '{$ano}', {$categoria})";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-livro';</script>";
			}else{
				print "<script>alert('Não cadastrou!');</script>";
				print "<script>location.href='?page=listar-livro';</script>";
			}
			break;
		
		case 'editar':
			$titulo = $_POST['titulo_livro'];
			$autor = $_POST['autor_livro'];
			$editora = $_POST['editora_livro'];
			$edicao = $_POST['edicao_livro'];
			$ano = $_POST['ano_livro'];
			$categoria = $_POST['categoria_id_categoria'];

			$sql = "UPDATE livro SET titulo_livro='{$titulo}', autor_livro='{$autor}', editora_livro='{$editora}', edicao_livro='{$edicao}', ano_livro='{$ano}', categoria_id_categoria={$categoria} WHERE id_livro=".$_POST['id_livro'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-livro';</script>";
			}else{
				print "<script>alert('Não editou!');</script>";
				print "<script>location.href='?page=listar-livro';</script>";
			}
			break;

		case 'excluir':
			$id_livro = $_GET['id_livro'];
			$sql = "DELETE FROM livro WHERE id_livro={$id_livro}";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-livro';</script>";
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-livro';</script>";
			}
			break;
	}
