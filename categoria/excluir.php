<?php
	include_once "../class/Categoria.class.php";
	include_once "../class/CategoriaDAO.class.php";
	
	$objCategoria = new Categoria();
    $objCategoria->setId($_GET['id']);

	$objCategoriaDAO = new CategoriaDAO();
	$retorno = $objCategoriaDAO->excluir($objCategoria);
	
	if($retorno)
		header("Location:listar.php?excluirOk");
	else
		header("Location:listar.php?excluirError");
?>