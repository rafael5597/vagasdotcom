<?php
session_start();

include_once ("../class/Vaga.class.php");
include_once ("../class/VagaDAO.class.php");
include_once ("../class/Usuario.class.php");
include_once ("../class/UsuarioDAO.class.php");

$objVaga = new Vaga();
$objVaga->setId($_GET['id']);

$objUsuario = new Usuario();
$objUsuario->setId($_SESSION['idUsuario']);

$objVagaDAO = new VagaDAO();

if(isset($_GET['action'])){
    if($_GET['action'] == "desistir"){
        $retorno = $objVagaDAO->removerCandidatura($objUsuario, $objVaga);
        if($retorno){
            header("location:../index.php");
        }
    }
} else {
    $retorno = $objVagaDAO->adicionarCandidatura($objUsuario, $objVaga);
    if($retorno){
        header("location:../index.php");
    }
}