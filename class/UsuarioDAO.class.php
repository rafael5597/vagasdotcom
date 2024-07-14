<?php

    include_once "Conexao.php";

class UsuarioDAO {

    private Conexao $conexao;
    private PDO $pdo;

    public function __construct(){
        $this->conexao = new Conexao();
        $this->pdo = new PDO(
            $this->conexao->getConn_srv(),
            $this->conexao->getConn_usr(),
            $this->conexao->getConn_pwd());
    }

    public function inserir(Usuario $usuario){
        $sql = $this->pdo->prepare(
            "INSERT INTO usuario (nome, email, senha, admin, data_criacao, foto, link_linkedin) VALUES(:nome, :email, :senha, :admin, :data_criacao, :foto, :link_linkedin)"
        );

        $sql->bindValue(":nome",$usuario->getNome());
        $sql->bindValue(":email",$usuario->getEmail());
        $sql->bindValue(":senha",$usuario->getSenha());
        $sql->bindValue(":admin",$usuario->getAdmin());
        $sql->bindValue(":data_criacao",$usuario->getDataCriacao());
        $sql->bindValue(":foto",$usuario->getFoto());
        $sql->bindValue(":link_linkedin",$usuario->getLinkLinkedin());
        return $sql->execute();
    }

    public function contarUsuarios(): int{
        $sql = $this->pdo->prepare(
            "SELECT count(*) AS nRows FROM usuario;"
        );
        $sql->execute();
        $tmp = $sql->fetch();
        return $tmp['nRows'];
    }

    public function listar(){
        $sql = $this->pdo->prepare(
            "SELECT * FROM usuario"
        );
        $sql->execute();
        return $sql->fetchAll();
    }

    public function listarUmUsuario(Usuario $u){
        $sql = $this->pdo->prepare(
            "SELECT * FROM usuario where id=:id"
        );
        $sql->bindValue(":id", $u->getId());
        $sql->execute();
        return $sql->fetch();
    }

    public function editar(Usuario $usuario){
        $sql = $this->pdo->prepare("UPDATE usuario SET nome=:nome, email=:email WHERE id=:id");
        $sql->bindValue(":nome", $usuario->getNome());
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->bindValue(":id", $usuario->getId());
        return $sql->execute();
    }

    public function excluir($id){
        $sql = $this->pdo->prepare("
                DELETE FROM usuario WHERE id = :id
            ");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

    public function login(Usuario $usuario){
        $sql = $this->pdo->prepare(
            "SELECT * FROM usuario WHERE email=:email"
        );
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->execute();
        if($sql->rowCount()>0){
            while($retorno = $sql->fetch()){
                if($retorno["senha"] == $usuario->getSenha()){
                    return $retorno;
                }
            }
            return 1;//erro senha;
        }
        else{
            return 0;//email nao cadastrado
        }
    }

}