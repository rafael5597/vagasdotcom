<?php
	include_once "../class/Empresa.class.php";
	include_once "../class/EmpresaDAO.class.php";
	
	$objEmpresa = new Empresa();
	$objEmpresa->setNome($_POST["nome"]);
	
	$objEmpresaDAO = new EmpresaDAO();
	$retorno = $objEmpresaDAO->inserir($objEmpresa);
	
    if($retorno){
		header('Location: inserir.php');
	}
	else{
		echo "vishhh deu ruim...";
	}
?>