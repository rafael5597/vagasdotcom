<?php
	
	class CategoriaDAO{
        public $conexao;

		public function __construct(){
			$this->conexao = new PDO("mysql:host=localhost; port=3306;dbname=vagasdotcom", "root", "root");
		}
		
        public function inserir(Categoria $c){
            $sql = $this->conexao->prepare("INSERT INTO categoria (nome) VALUES (?)");
            $sql->bindValue(1, $c->getNome());
            return $sql->execute();
        }
		
		public function listar(){
			$sql = $this->conexao->prepare("SELECT * FROM categoria");
			$sql->execute();
			return $sql->fetchAll();
		}

        public function excluir(Categoria $c){
            $sql = $this->conexao->prepare("DELETE FROM categoria WHERE id = ?");
            $sql->bindValue(1, $c->getId());
            return $sql->execute();
        }

        public function editar(Categoria $c){
            $sql = $this->conexao->prepare("UPDATE categoria SET nome = ? WHERE id = ?");
            $sql->bindValue(1, $c->getNome());
            $sql->bindValue(2, $c->getId());
            return $sql->execute();
        }

        public function listarPorId(Categoria $c){
            $sql = $this->conexao->prepare("SELECT * FROM categoria WHERE id = ?");
            $sql->bindValue(1, $c->getId());
            $sql->execute();
            return $sql->fetch();
        }
	
	}
?>