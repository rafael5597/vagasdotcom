<?php
	include_once "../class/Vaga.class.php";
	include_once "../class/VagaDAO.class.php";

    $objVaga = new Vaga();

    $objVaga->setTitulo($_POST['titulo'] ?? "");
    $objVaga->setDescricao($_POST['descricao'] ?? "");
    $objVaga->setCargo($_POST['cargo'] ?? "");
    $objVaga->setModalidade($_POST['modalidade'] ?? "");
    $objVaga->setLocalizacao($_POST['localizacao'] ?? "");
    $objVaga->setEmpresaId($_POST['empresa'] ?? 0);
    $objVaga->setCategoriaId($_POST['categoria'] ?? 0);
    $objVaga->setDataPublicacao(date('Y-m-d H-i-s'));
    $objVaga->setAtivo($_POST['ativo'] ?? false);
    $objVaga->setImagem($_POST['imagem'] ?? false);

	$objVagaDAO = new VagaDAO();
    $retorno = $objVagaDAO->inserir($objVaga);
	
    if($retorno){
		header('Location: inserir.php');
	}
	else{
		echo "erro ao cadastrar";
	}
?>