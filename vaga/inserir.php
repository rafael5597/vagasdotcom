<?php
include_once "../class/Usuario.class.php";
include_once "../class/UsuarioDAO.class.php";
include_once "../class/Categoria.class.php";
include_once "../class/CategoriaDAO.class.php";
include_once "../class/Empresa.class.php";
include_once "../class/EmpresaDAO.class.php";

$msg = "";

$objEmpresa = new Empresa();
$objEmpresaDAO = new EmpresaDAO();

$retorno = $objEmpresaDAO->listar();
$selectOptionsEmp = '<option value="0">Selecione a empresa</option>';
if($retorno){
    foreach ($retorno as $row){
        $selectOptionsEmp .= '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
    }
}

$objCategoria = new Categoria();
$objCategoriaDAO = new CategoriaDAO();

$retorno = $objCategoriaDAO->listar();
$selectOptionsCat = '<option value="0">Selecione a categoria</option>';
if($retorno){
    foreach ($retorno as $row){
        $selectOptionsCat .= '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
    }
}

?>

<!DOCTYPE html>
<html>
<head></head>
<body>

</body>
</html>

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
                <li><a href="../index.php">Home</a></li>
                <li><a href="../empresa/inserir.php">Empresas</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse</a>
                    <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                        <li class="active"><a href="../browse-job.php">Browse Jobs</a></li>
                        <li><a href="../company-detail.php">Job Detail</a></li>
                        <li><a href="../resume.php">Resume Detail</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- Navigation End  -->

<!-- login section start -->
<section class="login-wrapper">
    <div class="container">
        <div class="row heading">
            <h2>ADM - Cadastro de vaga</h2>
            <p>Preencha as informações sobre a vaga com precisão!</p>
        </div>
        <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
            <?=$msg;?>
            <form action="inserir_ok.php" method="POST" enctype="multipart/form-data">
                <select id="empresa" name="empresa" class="form-control input-lg" required>
                    <?=$selectOptionsEmp?>
                </select>
                <select id="categoria" name="categoria" class="form-control input-lg" required>
                    <?=$selectOptionsCat?>
                </select>
                <input type="text" name="titulo" class="form-control input-lg" placeholder="Título da vaga" required/><br />
                <textarea name="descricao" class="form-control input-lg" placeholder="Descrição da vaga" rows="4"required></textarea>
                <!-- <input type="text" name="cargo" class="form-control input-lg" placeholder="Cargo" required/><br /> -->
                <input type="text" name="modalidade" class="form-control input-lg" placeholder="Modalidade" required/><br />
                <input type="text" name="localizacao" class="form-control input-lg" placeholder="Localização" required>
                <label for="imagem">Selecione uma imagem:</label><input type="file" name="imagem" id="imagem" class="form-control input-lg" required/><br />
                <input type="checkbox" class="form-check-input" id="ativo" name="ativo">
                <label class="form-check-label" for="ativo">Ativar vaga</label>
                <button type="submit" class="btn btn-success">REGISTRAR</button>
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