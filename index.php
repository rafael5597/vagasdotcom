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
$vagas = $objVagaDAO->listar();

foreach ($vagas as $vaga){
    $objCategoria->setId($vaga["categoria_id"]);
    $cat = $objCategoriaDAO->listarPorId($objCategoria);

    $objEmpresa->setId($vaga["empresa_id"]);
    $emp = $objEmpresaDAO->listarPorId($objEmpresa);

    $vagaHtml .= '
    <div class="company-list">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="company-logo">
                    <img src="img/wipro.png" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="company-content">
                    <h3>'.$vaga["titulo"].'<span class="internship">'.$cat["nome"].'</span></h3>
                        <p><span class="company-name"><i class="fa fa-briefcase"></i>'.$emp["nome"].'</span><span class="company-location"><i class="fa fa-map-marker"></i>'.$vaga["localizacao"].'</span><span class="package"><i class="fa fa-money"></i>$24,000-$52,000</span></p>
                </div>
            </div>
        </div>
    </div>
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
                <li><a href="companies.php">Companies</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse</a>
                    <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                        <li class="active"><a href="browse-job.php">Browse Jobs</a></li>
                        <li><a href="company-detail.php">Job Detail</a></li>
                        <li><a href="resume.php">Resume Detail</a></li>
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
                        <input type="text" class="form-control border-right" placeholder="Skills, Designation, Companies" />
                    </div>
                    <div class="col-md-3 col-sm-3 no-pad">
                        <select class="selectpicker border-right">
                            <option>Experience</option>
                            <option>0 Year</option>
                            <option>1 Year</option>
                            <option>2 Year</option>
                            <option>3 Year</option>
                            <option>4 Year</option>
                            <option>5 Year</option>
                            <option>6 Year</option>
                            <option>7 Year</option>
                            <option>8 Year</option>
                            <option>9 Year</option>
                            <option>10 Year</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3 no-pad">
                        <select class="selectpicker">
                            <option>Select Category</option>
                            <option>Accounf & Finance</option>
                            <option>Information & Technology</option>
                            <option>Marketing</option>
                            <option>Food & Restaurent</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2 no-pad">
                        <input type="submit" class="btn seub-btn" value="submit" />
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
            <input type="button" class="btn brows-btn" value="Brows All Jobs" />
        </div>
    </div>
</section>

<section class="testimonials dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <div class="pic">
                            <img src="img/client-1.jpg" alt="">
                        </div>
                        <p class="description">
                            " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
                        </p>
                        <h3 class="testimonial-title">williamson</h3>
                        <span class="post">Web Developer</span>
                    </div>

                    <div class="testimonial">
                        <div class="pic">
                            <img src="img/client-2.jpg" alt="">
                        </div>
                        <p class="description">
                            " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
                        </p>
                        <h3 class="testimonial-title">kristiana</h3>
                        <span class="post">Web Designer</span>
                    </div>

                    <div class="testimonial">
                        <div class="pic">
                            <img src="img/client-3.jpg" alt="">
                        </div>
                        <p class="description">
                            " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
                        </p>
                        <h3 class="testimonial-title">kristiana</h3>
                        <span class="post">Web Designer</span>
                    </div>

                    <div class="testimonial">
                        <div class="pic">
                            <img src="img/client-4.jpg" alt="">
                        </div>
                        <p class="description">
                            " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
                        </p>
                        <h3 class="testimonial-title">kristiana</h3>
                        <span class="post">Web Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="membercard dark">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="left-widget-sidebar">
                    <div class="card-widget bg-white user-card">
                        <div class="u-img img-cover" style="background-image: url(img/bg-1.jpg);background-size:cover;"></div>
                        <div class="u-content">
                            <div class="avatar box-80">
                                <img class="img-responsive img-circle img-70 shadow-white" src="img/avatar3.jpg" alt="">
                                <i class="fa fa-circle-o fa-green"></i>
                            </div>
                            <h5>Sazzel Shi</h5>
                            <p class="text-muted">UX/ Designer</p>
                        </div>
                        <div class="user-social-profile">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="left-widget-sidebar">
                    <div class="card-widget bg-white user-card">
                        <div class="u-img img-cover" style="background-image: url(img/bg-2.jpg);background-size:cover;"></div>
                        <div class="u-content">
                            <div class="avatar box-80">
                                <img class="img-responsive img-circle img-70 shadow-white" src="img/avatar2.jpg" alt="">
                                <i class="fa fa-circle-o fa-green"></i>
                            </div>
                            <h5>Daniel Dezox</h5>
                            <p class="text-muted">CEO Founder</p>
                        </div>
                        <div class="user-social-profile">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="left-widget-sidebar">
                    <div class="card-widget bg-white user-card">
                        <div class="u-img img-cover" style="background-image: url(img/bg-3.jpg);background-size:cover;"></div>
                        <div class="u-content">
                            <div class="avatar box-80">
                                <img class="img-responsive img-circle img-70 shadow-white" src="img/avatar1.jpg" alt="">
                                <i class="fa fa-circle-o fa-green"></i>
                            </div>
                            <h5>Silp Sizzer</h5>
                            <p class="text-muted">Human Resource</p>
                        </div>
                        <div class="user-social-profile">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                <h2>Want More Job & Latest Job? </h2>
                <p>Subscribe to our mailing list to receive an update when new Job arrive!</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type Your Email Address...">
                    <span class="input-group-btn">
							<button type="button" class="btn btn-default">subscribe!</button>
						</span>
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
