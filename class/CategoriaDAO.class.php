<?php
	include_once "Categoria.class.php";
	class CategoriaDAO{
		public function __construct(){
			$this->conexao = new PDO("mysql:host=localhost; dbname=vagasdotcom", "root", "root");
		}
		
        public function inserir(Categoria $c){
            $sql = $this->conexao->prepare("INSERT INTO categorias (nome) VALUES (?)");
            $sql->bindValue(1, $c->getNome());
            $sql->execute();
        }
		
		public function listar(){
			$sql = $this->conexao->prepare("SELECT * FROM categorias");
			$sql->execute();
			return $sql->fetchAll();
		}

        public function excluir(Categoria $c){
            $sql = $this->conexao->prepare("DELETE FROM categorias WHERE id = ?");
            $sql->bindValue(1, $c->getId());
            $sql->execute();
        }

        public function alterar(Categoria $c){
            $sql = $this->conexao->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
            $sql->bindValue(1, $c->getNome());
            $sql->bindValue(2, $c->getId());
            $sql->execute();
        }

        public function listarPorId(Categoria $c){
            $sql = $this->conexao->prepare("SELECT * FROM categorias WHERE id = ?");
            $sql->bindValue(1, $c->getId());
            $sql->execute();
            return $sql->fetch();
        }
	
	}
?>