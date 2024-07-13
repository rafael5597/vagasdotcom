<?php
    include_once "../class/Usuario.class.php";
    include_once "../class/UsuarioDAO.class.php";
	
    $objUsuarioDAO = new UsuarioDAO();
    $retorno =$objUsuarioDAO->listar();
?>

<!DOCTYPE html>
<html>
	<head>Lista de Usuarios</head>
	<body>
        <?php
		    if(isset($_GET['excluirOk'])) echo "<h2>Excluido com sucesso!</h2>";
			
			if(isset($_GET['excluirError'])) echo "<h2>Erro ao excluir!</h2>";
		?>
		<table border>
			<thead>
				<th>Nome</th>
                <th>E-mail</th>
                <th>ADM</th>
                <th>Ativo</th>
                <th>Data cadastro</th>
                <th>LinkedIn</th>
                <th>Foto</th>
				<th colspan="2">Ações</th>
			</thead>
			<tbody>
			<?php
			foreach($retorno as $linha){
				echo "
				<tr>
					<td>".$linha['nome']."</td>
					<td>".$linha['email']."</td>
					<td>".$linha['admin']."</td>
					<td>".$linha['ativo']."</td>
					<td>".$linha['data_criacao']."</td>
					<td>".$linha['link_linkedin']."</td>
					<td><img src=".'imagens/'.$linha['foto']." alt='Foto usuário' width='100' height='100'></td>
					<td><a href='editar.php?id=".$linha['id']."'>Editar</a></td>
					<td><a href='excluir.php?id=".$linha['id']."'>Excluir</a></td>
				</tr>";
			}
			?>
			</tbody>
		</table>
		<a href="inserir.php"><button>Inserir</button></a>
	</body>
</html>