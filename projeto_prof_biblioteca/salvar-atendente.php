<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_atendente'];
            

			$sql = "INSERT INTO atendente (nome_atendente)
					VALUES ('{$nome}')";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-atendente';</script>";
			}else{
				print "<script>alert('Não cadastrou!');</script>";
				print "<script>location.href='?page=listar-atendente';</script>";
			}
			break;
		

		case 'excluir':
			$sql = "DELETE FROM atendente WHERE id_atendente=".$_GET['id_atendente'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-atendente';</script>";
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-atendente';</script>";
			}
			break;
	}
