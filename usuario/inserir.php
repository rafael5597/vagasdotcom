<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form action="inserir_ok.php" method="POST" enctype="multipart/form-data">
            Nome:<input type="text" name="nome" required/><br />
            Email:<input type="email" name="email" required/><br />
            Senha:<input type="password" name="senha" required/><br />
            LinkedIn:<input type="text" name="link_linkedin" required>
            Foto:<input type="file" name="foto" required/><br />
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
