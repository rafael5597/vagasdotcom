<?php
	include_once "../class/Empresa.class.php";
	include_once "../class/EmpresaDAO.class.php";
	
	$objEmpresa = new Empresa();
    $objEmpresa->setId($_GET['id']);

	$objEmpresaDAO = new EmpresaDAO();
	$retorno = $objEmpresaDAO->excluir($objEmpresa);
	
	if($retorno)
		header("Location:inserir.php?excluirOk");
	else
		header("Location:inserir.php?excluirError");
?>