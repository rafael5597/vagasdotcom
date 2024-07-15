<?php
	include_once "../class/Categoria.class.php";
	include_once "../class/CategoriaDAO.class.php";
	
	$objCategoria = new Categoria();
    $objCategoria->setId($_GET['id']);

	$objCategoriaDAO = new CategoriaDAO();
	$retorno = $objCategoriaDAO->excluir($objCategoria);
	
	if($retorno)
		header("Location:inserir.php?excluirOk");
	else
		header("Location:inserir.php?excluirError");
?>