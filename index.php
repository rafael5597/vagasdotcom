<?php
session_start();

include_once "class/Usuario.class.php";
include_once "class/UsuarioDAO.class.php";
include_once "class/VagaDAO.class.php";
include_once "class/EmpresaDAO.class.php";
include_once "class/Empresa.class.php";
include_once "class/CategoriaDAO.class.php";
include_once "class/Categoria.class.php";

if(!isset($_SESSION['logado'])){
    header("location:usuario/login.php");
} else {

    $objUsuario = new Usuario();
    $objUsuarioDAO = new UsuarioDAO();
    $objUsuario->setId($_SESSION['idUsuario']);
    $retorno = $objUsuarioDAO->listarUmUsuario($objUsuario);

    if(!$retorno){
        header('location: usuario/logout.php');
    }

    $nomeUsuario = $_SESSION['nomeUsuario'];
    if($_SESSION['admin']){
        header('location: usuario/adm/');
    }
}

$objVagaDAO = new VagaDAO();
$qtdVagas = $objVagaDAO->contarVagas();

$objEmpresaDAO = new EmpresaDAO();
$objEmpresa = new Empresa();
$qtdEmpresas = $objEmpresaDAO->contarEmpresas();

$objCategoriaDAO = new CategoriaDAO();
$objCategoria = new Categoria();

$qtdUsuarios = $objUsuarioDAO->contarUsuarios();

$vagaHtml = '';
$vagas = $objVagaDAO->listar(5);

foreach ($vagas as $vaga){
    $objCategoria->setId($vaga["categoria_id"]);
    $cat = $objCategoriaDAO->listarPorId($objCategoria);

    $class = "intership";

    if($cat["nome"] == "Tempo Integral"){
        $class="full-time";
    }

    if($cat["nome"] == "Meio Período" || $cat["nome"] == "Meio Periodo"){
        $class="part-time";
    }

    if($cat["nome"] == "Freelance" || $cat["nome"] == "Freelancer"){
        $class="freelance";
    }

    $objEmpresa->setId($vaga["empresa_id"]);
    $emp = $objEmpresaDAO->listarPorId($objEmpresa);

    $vagaHtml .= '
    <a href="vaga/vaga.php?id='.$vaga["id"].'"><div class="company-list">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="company-logo">
                    <img src="vaga/imagens/'.$vaga["imagem"].'" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="company-content">
                    <h3>'.$vaga["titulo"].'<span class="internship">'.$cat["nome"].'</span></h3>
                        <p><span class="company-name"><i class="fa fa-briefcase"></i>'.$emp["nome"].'</span><span class="company-location"><i class="fa fa-map-marker"></i>'.$vaga["localizacao"].'</span><span class="package"><i class="fa fa-money"></i>$24,000-$52,000</span></p>
                </div>
            </div>
        </div>
    </div></a>
';
}


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
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style & Common Css -->
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/main.css">

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
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Navegar</a>
                    <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                        <li class="active"><a href="browse-job.php">Ver Vagas</a></li>
                    </ul>
                </li>
                <li>
                    <a><?=$nomeUsuario;?></a>
                </li>
                <li>
                    <a href="usuario/logout.php">Sair</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- Navigation End  -->

<!-- Main jumbotron for a primary marketing message or call to action -->
<section class="main-banner" style="background:#242c36 url(img/slider-01.jpg) no-repeat">
    <div class="container">
        <div class="caption">
            <h2>Construa sua carreira</h2>
            <form>
                <fieldset>
                    <div class="col-md-4 col-sm-4 no-pad">
                        <input type="text" class="form-control border-right" placeholder="Digite o que procua..." />
                    </div>
                    <div class="col-md-3 col-sm-3 no-pad">
                        <select class="selectpicker border-right">
                            <option>Empresa (todas)</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 no-pad">
                        <select class="selectpicker">
                            <option>Categoria (todas)</option>
                            <option>Accounf & Finance</option>
                            <option>Information & Technology</option>
                            <option>Marketing</option>
                            <option>Food & Restaurent</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2 no-pad">
                        <input type="submit" class="btn seub-btn" value="PROCURAR" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>

<section class="counter">
    <div class="container">
        <div class="col-md-4 col-sm-4">
            <div class="counter-text">
                <span aria-hidden="true" class="icon-briefcase"></span>
                <h3><?=$qtdVagas;?></h3>
                <p>Vagas Postadas</p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="counter-text">
                <span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
                <h3><?=$qtdEmpresas;?></h3>
                <p>Empresas Contratando</p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="counter-text">
                <span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
                <h3><?=$qtdUsuarios;?>+</h3>
                <p>Total de usuários</p>
            </div>
        </div>

    </div>
</section>

<section class="jobs">
    <div class="container">
        <div class="row heading">
            <h2>Encontre vagas populares</h2>
            <p>As melhores empresas que você pode trabalhar estão aqui!</p>
        </div>
        <div class="companies">
            <?=$vagaHtml?>
        </div>
        <div class="row">
            <input type="button" class="btn brows-btn" value="Veja todas as vagas" />
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
        <p>&copy;Copyright 2018 Jober Desk | Seu novo emprego está aqui!</p>
    </div>
</footer>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/main.js"></script>
</body>
</html>
