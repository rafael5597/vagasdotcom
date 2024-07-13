<?php

	date_default_timezone_set('America/Sao_Paulo');

	include_once "../class/Usuario.class.php";
	include_once "../class/UsuarioDAO.class.php";

	$objUsuario = new Usuario();
	$objUsuario->setNome($_POST["nome"]);
    $objUsuario->setEmail($_POST["email"]);
	$objUsuario->setSenha($_POST["senha"]);
    $objUsuario->setLinkLinkedin($_POST["link_linkedin"]);
    $objUsuario->setDataCriacao(date('Y-m-d H-i-s'));

    $nomeImagem = $_FILES["foto"]["name"];
	$tmpName = $_FILES["foto"]["tmp_name"];
	$diretorio = "imagens/".$nomeImagem;
	if(move_uploaded_file($tmpName, $diretorio))
		echo "imagem ok";
	else
		echo "erro imagem";
	$objUsuario->setFoto($nomeImagem);
	
	$objUsuarioDAO = new UsuarioDAO();
	$retorno = $objUsuarioDAO->inserir($objUsuario);
	
    if($retorno){
		header('Location: '.'listar.php');
	}
	else{
		echo "erro ao cadastrar";
	}
?>