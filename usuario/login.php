<?php

session_start();
if(isset($_SESSION['logado'])){
    header("location:../index.php");
}

$msg = '
    <div class="alert alert-info" role="alert">
        Você precisa entrar para ver as vagas!
    </div>';

if(isset($_GET['erroEmail']))
$msg = '
    <div class="alert alert-danger" role="alert">
        Este usuário não existe!
    </div>';

if(isset($_GET['erroSenha']))
$msg = '
    <div class="alert alert-danger" role="alert">
        Senha inválida!
    </div>';

else if(isset($_GET['cadastroOk']))
    $msg = '
    <div class="alert alert-success" role="alert">
        Seu usuário foi criado! <br> Entre agora para encontrar seu novo emprego!
    </div>';

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vagas.Com | Seu novo emprego está aqui!</title>
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
					<a class="navbar-brand" href="index.php"><img src="../img/logo.png" class="logo" alt=""></a>
				</div>
				<!-- End Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="usuario/inserir.php">Criar uma conta</a></li>
                    </ul>
				</div><!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- Navigation End  -->
		
		<!-- login section start -->
		<section class="login-wrapper">
			<div class="container">
                <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					<form action="login_ok.php" method="POST">
						<img class="img-responsive" alt="logo" src="../img/logo.png">
                        <?=$msg;?>
                        <input name="email" type="text" class="form-control input-lg" placeholder="Usuário (e-mail)">
						<input name="senha" type="password" class="form-control input-lg" placeholder="Senha">
						<!--<label><a href="">Forget Password?</a></label>-->
						<button type="submit" class="btn btn-primary">Entrar</button>
						<p>Ainda não tem uma conta? <a href="inserir.php">Criar uma conta</a></p>
					</form>
				</div>
			</div>
		</section>
		<!-- login section End -->	
		
		<!-- footer start -->
		<footer>
			<div class="container">
				<!-- <div class="col-md-3 col-sm-6">
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
				
				<<div class="col-md-3 col-sm-6">
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
				</div> -->
				
				<!-- <div class="col-md-3 col-sm-6">
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
				</div> -->
				
				<!-- <div class="col-md-3 col-sm-6">
					<h4>Drop A Mail</h4>
					<form>
						<input type="text" class="form-control input-lg" placeholder="Your Name">
						<input type="text" class="form-control input-lg" placeholder="Email...">
						<textarea class="form-control" placeholder="Message"></textarea>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div> -->
				
				
			</div>
			<div class="copy-right">
			 <p>&copy;Copyright 2024 Vagas.Com | Seu novo emprego está aqui!</p>
			</div>
		</footer>
		 
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
		<script src="../js/bootsnav.js"></script>
		<script src="../js/main.js"></script>
    </body>
</html>