<?php
session_start();

include_once "../class/Vaga.class.php";
include_once "../class/VagaDAO.class.php";
include_once "../class/Empresa.class.php";
include_once "../class/EmpresaDAO.class.php";
include_once "../class/Categoria.class.php";
include_once "../class/EmpresaDAO.class.php";
include_once "../class/Usuario.class.php";

$objVaga = new Vaga();
$objVagaDAO = new VagaDAO();
$objVaga->setId($_GET['id']);
$vaga = $objVagaDAO->listarPorId($objVaga);

$objEmpresa = new Empresa();
$objEmpresaDAO = new EmpresaDAO();
$objEmpresa->setId($vaga['empresa_id']);
$emp = $objEmpresaDAO->listarPorId($objEmpresa);

$objUsuario = new Usuario();

$botoes = "";

if($_SESSION["admin"]){
    $botoes .= '<button style="margin-top: 5px;" type="button" class="btn-info btn-sm">Editar Informações</button>';

    if($vaga['ativo']){
        $botoes .= '<a href="ativa_desativa.php?id='.$objVaga->getId().'"><button style="margin-top: 5px;" type="button" class="btn-danger btn-sm">Desativar vaga</button></a>';

    } else {
        $botoes .= '<a href="ativa_desativa.php?id='.$objVaga->getId().'"><button style="margin-top: 5px;" type="button" class="btn-success btn-sm">Ativar vaga</button>';
    }
} else {
    $objUsuario->setId($_SESSION['idUsuario']);
    $ret = $objVagaDAO->listarCandidaturaPorId($objUsuario, $objVaga);
    if($ret['qtd'] > 0){
        $botoes .= '<a href="inscreverse.php?action=desistir&id='.$objVaga->getId().'"><button style="margin-top: 5px;" type="button" class="btn-danger btn-lg">Desistir da vaga</button>';
    } else {
        $botoes .= '<a href="inscreverse.php?id='.$objVaga->getId().'"><button style="margin-top: 5px;" type="button" class="btn-success btn-lg">Inscrever-se!</button>';
    }

}


?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Jober Desk | Responsive Job Portal Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- All Plugin Css --> 
		<link rel="stylesheet" href="../css/plugins.css">
		
		<!-- Style & Common Css --> 
		<link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/main.css">

    </head>
	
    <body>

		<!-- Navigation Start  -->
		<nav class="navbar navbar-default navbar-sticky bootsnav">

			<div class="container">      
				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="index.html"><img src="../img/logo.png" class="logo" alt=""></a>
				</div>
				<!-- End Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="../usuario/adm/index.php">Home</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="companies.html">Companies</a></li> 
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse</a>
								<ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
									<li class="active"><a href="browse-job.html">Browse Jobs</a></li>
									<li><a href="company-detail.html">Job Detail</a></li>
									<li><a href="resume.html">Resume Detail</a></li>
								</ul>
							</li>
						</ul>
				</div><!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- Navigation End  -->
	
    <section class="profile-detail">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
						<div class="col-md-3 col-sm-3" align="center">
                            <img src='imagens/<?=$vaga['imagem'];?>'" alt="" class="img-responsive">
                            <?=$botoes;?>
                        </div>
                        <div class="col-md-9 col-sm-9">
							<div class="profile-content">
									<h2><?=$vaga['titulo'];if(!$vaga['ativo'])echo" (DESATIVADA)"?><span><?=$emp['nome'];?></span></h2>
									<ul class="information">
										<li><span>Localização:</span><?=$vaga['localizacao'];?></li>
										<li><span>Website:</span>Google.com</li>
										<li><span>Employee:</span>50,000 - 70,000 employer</li>
										<li><span>Mail:</span>info@google.com</li>
										<li><span>Publicação:</span><?=$vaga['data_publicacao'];?></li>
									</ul>
								</div>
							</div>
						<ul class="social">
							<li><a href="" class="facebook"><i class="fa fa-facebook"></i>Facebook</a></li>
							<li><a href="" class="google"><i class="fa fa-google-plus"></i>Google Plus</a></li>
							<li><a href="" class="twitter"><i class="fa fa-twitter"></i>Twitter</a></li>
							<li><a href="" class="linkedin"><i class="fa fa-linkedin"></i>Linked In</a></li>
							<li><a href="" class="instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
						</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-user fa-fw"></i> Sobre a vaga
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							<p><?=$vaga['descricao'];?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

		<!-- footer start -->
		<footer>
			<div class="container">
				<div class="col-md-3 col-sm-6">
					<h4>Featured Job</h4>
					<ul>
						<li><a href="#">Browse Jobs</a></li>
						<li><a href="#">Premium MBA Jobs</a></li>
						<li><a href="#">Access Database</a></li>
						<li><a href="#">Manage Responses</a></li>
						<li><a href="#">Report a Problem</a></li>
						<li><a href="#">Mobile Site</a></li>
						<li><a href="#">Jobs by Skill</a></li>
					</ul>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<h4>Latest Job</h4>
					<ul>
						<li><a href="#">Browse Jobs</a></li>
						<li><a href="#">Premium MBA Jobs</a></li>
						<li><a href="#">Access Database</a></li>
						<li><a href="#">Manage Responses</a></li>
						<li><a href="#">Report a Problem</a></li>
						<li><a href="#">Mobile Site</a></li>
						<li><a href="#">Jobs by Skill</a></li>
					</ul>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<h4>Reach Us</h4>
					<address>
					<ul>
					<li>1201, Murakeu Market, QUCH07<br>
					United Kingdon</li>
					<li>Email: Support@job.com</li>
					<li>Call: 044 123 458 65879</li>
					<li>Skype: job@skype</li>
					<li>FAX: 123 456 85</li>
					</ul>
					</address>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<h4>Drop A Mail</h4>
					<form>
						<input type="text" class="form-control input-lg" placeholder="Your Name">
						<input type="text" class="form-control input-lg" placeholder="Email...">
						<textarea class="form-control" placeholder="Message"></textarea>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
				
				
			</div>
			<div class="copy-right">
			 <p>&copy;Copyright 2018 Jober Desk | Design By <a href="https://themezhub.com/">ThemezHub</a></p>
			</div>
		</footer>
		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>
