<?php
    include_once "../class/Categoria.class.php";
    include_once "../class/CategoriaDAO.class.php";
	
    $objCategoriaDAO = new CategoriaDAO();
    $retorno =$objCategoriaDAO->listar();
?>
<!DOCTYPE html>
<html>
	<head>Lista de Categorias</head>
	<body>
        <?php
		    if(isset($_GET['excluirOk'])) echo "<h2>Excluido com sucesso!</h2>";
			
			if(isset($_GET['excluirError'])) echo "<h2>Erro ao excluir!</h2>";
		?>
		<table border>
			<thead>
				<th>Nome</th>
				<th colspan="2">Ações</th>
			</thead>
			<tbody>
			<?php
			foreach($retorno as $linha){
				echo "
				<tr>
					<td>".$linha['nome']."</td>
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