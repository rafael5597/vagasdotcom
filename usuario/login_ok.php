<?php
include_once "../class/Usuario.class.php";
include_once "../class/UsuarioDAO.class.php";

$objUsuario = new Usuario();
$objUsuario->setEmail($_POST["email"]);
$objUsuario->setSenha($_POST["senha"]);

$objUsuarioDAO = new UsuarioDAO();
$retorno = $objUsuarioDAO->login($objUsuario);
if($retorno == 0){
    header("location:login.php?erroEmail");
}
else if($retorno == 1){
    header("location:login.php?erroSenha");
}
else{
    session_start();
    $_SESSION['idUsuario'] = $retorno["id"];
    $_SESSION['logado'] = true;
    $_SESSION['nomeUsuario'] = $retorno["nome"];
    header("location:../index.php");
}
