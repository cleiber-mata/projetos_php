<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_leitor'];
			$email = $_POST['email_leitor'];
			$telefone = $_POST['telefone_leitor'];
			$data_nasc = $_POST['data_nasc_leitor'];
			$genero = $_POST['genero_leitor'];

			$sql = "INSERT INTO leitor (nome_leitor, email_leitor, telefone_leitor, data_nasc_leitor, genero_leitor)
					VALUES ('{$nome}', '{$email}', '{$telefone}', '{$data_nasc}', '{$genero}')";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-usuario';</script>";
			}else{
				print "<script>alert('Não cadastrou!');</script>";
				print "<script>location.href='?page=listar-usuario';</script>";
			}
			break;
		
		case 'editar':
			$email = $_POST['email_leitor'];
			$telefone = $_POST['telefone_leitor'];
			$genero = $_POST['genero_leitor'];

			$sql = "UPDATE leitor SET email_leitor='{$email}', telefone_leitor='{$telefone}', genero_leitor='{$genero}' WHERE id_leitor=".$_POST['id_leitor'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-usuario';</script>";
			}else{
				print "<script>alert('Não editou!');</script>";
				print "<script>location.href='?page=listar-usuario';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM leitor WHERE id_leitor=".$_GET['id_leitor'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-usuario';</script>";
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-usuario';</script>";
			}
			break;
	}
