<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_categoria'];

			$sql = "INSERT INTO categoria (nome_categoria)
					VALUES ('{$nome}')";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-categoria';</script>";
			}else{
				print "<script>alert('Não cadastrou!');</script>";
				print "<script>location.href='?page=listar-categoria';</script>";
			}
			break;
		
		case 'editar':
			$nome = $_POST['nome_categoria'];

			$sql = "UPDATE categoria SET nome_categoria='{$nome}' WHERE id_categoria=".$_POST['id_categoria'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-categoria';</script>";
			}else{
				print "<script>alert('Não editou!');</script>";
				print "<script>location.href='?page=listar-categoria';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM categoria WHERE id_categoria=".$_GET['id_categoria'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-categoria';</script>";
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-categoria';</script>";
			}
			break;
	}