<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$leitor_id = $_POST['leitor_id_leitor'];
			$livro_id = $_POST['livro_id_livro'];
			$atendente_id = $_POST['atendente_id_atendente'];
			$data_emprestimo = $_POST['data_emprestimo'];
			$devolucao_emprestimo = $_POST['devolucao_emprestimo'];

			$sql = "INSERT INTO emprestimo (leitor_id_leitor, livro_id_livro, atendente_id_atendente, data_emprestimo, devolucao_emprestimo)
					VALUES ({$leitor_id}, {$livro_id}, {$atendente_id}, '{$data_emprestimo}', '{$devolucao_emprestimo}')";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-emprestimo';</script>";
			}else{
				print "<script>alert('Não cadastrou!');</script>";
				print "<script>location.href='?page=listar-emprestimo';</script>";
			}
			break;
		
		case 'editar':
			$leitor_id = $_POST['id_leitor'];
			$livro_id = $_POST['id_livro'];
			$atendente_id = $_POST['id_atendente'];
			$data_emprestimo = $_POST['data_emprestimo'];
			$devolucao_emprestimo = $_POST['devolucao_emprestimo'];

			$sql = "UPDATE emprestimo SET leitor_id_leitor={$leitor_id}, livro_id_livro={$livro_id}, atendente_id_atendente={$atendente_id}, data_emprestimo='{$data_emprestimo}', devolucao_emprestimo='{$devolucao_emprestimo}' WHERE id_emprestimo=".$_POST['id_emprestimo'];

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-emprestimo';</script>";
			}else{
				print "<script>alert('Não editou!');</script>";
				print "<script>location.href='?page=listar-emprestimo';</script>";
			}
			break;

		case 'excluir':
			$id_emprestimo = $_GET['id_emprestimo'];
			$sql = "DELETE FROM emprestimo WHERE id_emprestimo={$id_emprestimo}";

			$result = $conn->query($sql);

			if($result==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-emprestimo';</script>";
			}else{
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-emprestimo';</script>";
			}
			break;
	}
