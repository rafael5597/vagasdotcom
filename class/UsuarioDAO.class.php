<?php

class UsuarioDAO {

    private $conexao;

    public function __construct(){
        $this->conexao = new PDO("mysql:host=localhost;dbname=vagasdotcom;port=3306", "root", "root");
    }

    public function inserir(Usuario $usuario){
        $sql = $this->conexao->prepare(
            "INSERT INTO usuario (nome, email, senha, data_criacao, foto, link_linkedin) VALUES(:nome, :email, :senha, :data_criacao, :foto, :link_linkedin)"
        );

        $sql->bindValue(":nome",$usuario->getNome());
        $sql->bindValue(":email",$usuario->getEmail());
        $sql->bindValue(":senha",$usuario->getSenha());
        $sql->bindValue(":data_criacao",$usuario->getDataCriacao());
        $sql->bindValue(":foto",$usuario->getFoto());
        $sql->bindValue(":link_linkedin",$usuario->getLinkLinkedin());
        return $sql->execute();
    }

    public function listar(){
        $sql = $this->conexao->prepare(
            "SELECT * FROM usuario"
        );
        $sql->execute();
        return $sql->fetchAll();
    }

    public function listarUmUsuario($id){
        $sql = $this->conexao->prepare(
            "SELECT * FROM usuario where id=:id"
        );
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(Usuario $usuario){
        $sql = $this->conexao->prepare("UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id");
        $sql->bindValue(":nome", $usuario->getNome());
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->bindValue(":id", $usuario->getId());
        return $sql->execute();
    }

    public function excluir($id){
        $sql = $this->conexao->prepare("
                DELETE FROM usuarios WHERE id = :id
            ");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

}