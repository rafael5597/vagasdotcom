<?php
	include_once "../class/Categoria.class.php";
	include_once "../class/CategoriaDAO.class.php";
	
	$objCategoria = new Categoria();
	$objCategoria->setNome($_POST["nome"]);
	
	$objCategoriaDAO = new CategoriaDAO();
	$retorno = $objCategoriaDAO->inserir($objCategoria);
	
    if($retorno){
		header('Location: '.'listar.php');
	}
	else{
		echo "erro ao cadastrar";
	}
?>