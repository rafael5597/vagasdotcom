<?php
	
    include_once "Conexao.php";

	class CategoriaDAO{
	    private Conexao $conexao;
        private PDO $pdo;

		public function __construct(){
		    $this->conexao = new Conexao();
			$this->pdo = new PDO(
			    $this->conexao->getConn_srv(),
			    $this->conexao->getConn_usr(),
			    $this->conexao->getConn_pwd());
		}
		
        public function inserir(Categoria $c){
            $sql = $this->pdo->prepare("INSERT INTO categoria (nome) VALUES (?)");
            $sql->bindValue(1, $c->getNome());
            return $sql->execute();
        }
		
		public function listar(){
			$sql = $this->pdo->prepare("SELECT * FROM categoria");
			$sql->execute();
			return $sql->fetchAll();
		}

        public function excluir(Categoria $c){
            $sql = $this->pdo->prepare("DELETE FROM categoria WHERE id = ?");
            $sql->bindValue(1, $c->getId());
            return $sql->execute();
        }

        public function editar(Categoria $c){
            $sql = $this->pdo->prepare("UPDATE categoria SET nome = ? WHERE id = ?");
            $sql->bindValue(1, $c->getNome());
            $sql->bindValue(2, $c->getId());
            return $sql->execute();
        }

        public function listarPorId(Categoria $c){
            $sql = $this->pdo->prepare("SELECT * FROM categoria WHERE id = ?");
            $sql->bindValue(1, $c->getId());
            $sql->execute();
            return $sql->fetch();
        }
	
	}
?>