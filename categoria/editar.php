<?php
	include_once "../class/Categoria.class.php";
	include_once "../class/CategoriaDAO.class.php";
	
    $objCategoria = new Categoria();
    $objCategoria->setId($_GET["id"]);

	$objCategoriaDAO = new CategoriaDAO();
	$retorno = $objCategoriaDAO->listarPorId($objCategoria);
?>

<!DOCTYPE html>
<html>
    <head>Editar Categoria</head>
    <body>
        <form action="editar_ok.php" method="POST">
            Nome:<input type="text" name="nome" value="<?=$retorno['nome'];?>" required/><br/>
            <input type="hidden" name="id" value="<?=$objCategoria->getId();?>"/>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>