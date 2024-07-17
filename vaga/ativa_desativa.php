<?php
include_once "../class/Vaga.class.php";
include_once "../class/VagaDAO.class.php";

$objVaga = new Vaga();
$objVagaDAO = new VagaDAO();
$objVaga->setId($_GET['id']);
$vaga = $objVagaDAO->listarPorId($objVaga);

if(!$vaga['ativo']){
    $objVaga->setAtivo(true);
} else {
    $objVaga->setAtivo(false);
}

$objVagaDAO->atualizaStatus($objVaga);

header('location: vaga.php?id='.$objVaga->getId());