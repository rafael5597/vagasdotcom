<?php
include_once "../class/Usuario.class.php";
include_once "../class/UsuarioDAO.class.php";

$objUsuario = new Usuario();
$objUsuario->setId($_GET["id"]);

$objUsuarioDAO = new UsuarioDAO();
$retorno = $objUsuarioDAO->listarUmUsuario($objUsuario);
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="editar_ok.php" method="POST" enctype="multipart/form-data">
    Nome:<input type="text" name="nome" value="<?=$retorno['nome'];?>" required/><br/>
    Email:<input type="email" name="email" value="<?=$retorno['email'];?>" readonly required/><br/>
    Senha:<input type="password" name="senha" value="<?=$retorno['senha'];?>" required/><br/>
    LinkedIn:<input type="text" name="link_linkedin" value="<?=$retorno['link_linkedin'];?>" required/><br/>
    Foto: <img src="imagens/<?=$retorno['foto'];?>" width="100" height="100"></form><br/>
    Atualizar foto: <input type="file" name="foto" required/><br />
    <input value="<?=$objUsuario->getId();?>" hidden>
    <button type="submit">Enviar</button>
</form>
</body>
</html>