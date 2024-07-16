<?php

include_once "Conexao.php";

class EmpresaDAO{
    private Conexao $conexao;
    private PDO $pdo;

    public function __construct(){
        $this->conexao = new Conexao();
        $this->pdo = new PDO(
            $this->conexao->getConn_srv(),
            $this->conexao->getConn_usr(),
            $this->conexao->getConn_pwd());
    }

    public function inserir(Empresa $e){
        $sql = $this->pdo->prepare("INSERT INTO empresa (nome) VALUES (?)");
        $sql->bindValue(1, $e->getNome());
        return $sql->execute();
    }

    public function listar(){
        $sql = $this->pdo->prepare("SELECT * FROM empresa");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function contarEmpresas(): int{
        $sql = $this->pdo->prepare(
            "SELECT count(*) AS nRows FROM empresa;"
        );
        $sql->execute();
        $tmp = $sql->fetch();
        return $tmp['nRows'];
    }

    public function excluir(Empresa $e){
        $sql = $this->pdo->prepare("DELETE FROM empresa WHERE id = ?");
        $sql->bindValue(1, $e->getId());
        return $sql->execute();
    }

    public function editar(Empresa $e){
        $sql = $this->pdo->prepare("UPDATE empresa SET nome = ? WHERE id = ?");
        $sql->bindValue(1, $e->getNome());
        $sql->bindValue(2, $e->getId());
        return $sql->execute();
    }

    public function listarPorId(Empresa $e){
        $sql = $this->pdo->prepare("SELECT * FROM empresa WHERE id = ?");
        $sql->bindValue(1, $e->getId());
        $sql->execute();
        return $sql->fetch();
    }

}
?>