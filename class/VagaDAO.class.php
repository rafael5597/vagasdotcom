<?php

include_once "Conexao.php";

class VagaDAO{
    private Conexao $conexao;
    private PDO $pdo;

    public function __construct(){
        $this->conexao = new Conexao();
        $this->pdo = new PDO(
            $this->conexao->getConn_srv(),
            $this->conexao->getConn_usr(),
            $this->conexao->getConn_pwd());
    }

    public function inserir(Vaga $v){
        $sql = $this->pdo->prepare("
            INSERT INTO vaga (
                              titulo,
                              descricao,
                              cargo, 
                              modalidade,
                              localizacao,
                              empresa_id, 
                              categoria_id, 
                              data_publicacao,
                              ativo, 
                              imagem
                        )
            VALUES (
                    :titulo, 
                    :descricao,
                    :cargo, 
                    :modalidade,
                    :localizacao,
                    :empresa_id,
                    :categoria_id, 
                    :data_publicacao,
                    :ativo, 
                    :imagem
            )
        ");

        $sql->bindValue(':titulo', $v->getTitulo());
        $sql->bindValue(':descricao', $v->getDescricao());
        $sql->bindValue(':cargo', $v->getCargo());
        $sql->bindValue(':modalidade', $v->getModalidade());
        $sql->bindValue(':localizacao', $v->getLocalizacao());
        $sql->bindValue(':empresa_id', $v->getEmpresaId());
        $sql->bindValue(':categoria_id', $v->getCategoriaId());
        $sql->bindValue(':data_publicacao', $v->getDataPublicacao());
        $sql->bindValue(':ativo', $v->isAtivo());
        $sql->bindValue(':imagem', $v->getImagem());

        return $sql->execute();
    }

    public function listar(int $limite){
        $sqlLimit = "";
        if($limite > 0){
            $sqlLimit = " LIMIT $limite";
        }
        $sql = $this->pdo->prepare("SELECT * FROM vaga ORDER BY id DESC".$sqlLimit);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function contarVagas(): int{
        $sql = $this->pdo->prepare(
            "SELECT count(*) AS nRows FROM vaga;"
        );
        $sql->execute();
        $tmp = $sql->fetch();
        return $tmp['nRows'];
    }

    public function excluir(vaga $v){
        $sql = $this->pdo->prepare("DELETE FROM vaga WHERE id = ?");
        $sql->bindValue(1, $v->getId());
        return $sql->execute();
    }

    public function editar(Vaga $v){
        $sql = $this->pdo->prepare("
            UPDATE vaga 
            SET titulo = :titulo, 
                descricao = :descricao,
                cargo = :cargo,
                modalidade = :modalidade, 
                localizacao = :localizacao, 
                empresa_id = :empresa_id, 
                categoria_id = :categoria_id, 
                data_publicacao = :data_publicacao, 
                ativo = :ativo, 
                imagem = :imagem
            WHERE id = :id
        ");
        $sql->bindValue(':id', $v->getId());
        $sql->bindValue(':titulo', $v->getTitulo());
        $sql->bindValue(':descricao', $v->getDescricao());
        $sql->bindValue(':cargo', $v->getCargo());
        $sql->bindValue(':modalidade', $v->getModalidade());
        $sql->bindValue(':localizacao', $v->getLocalizacao());
        $sql->bindValue(':empresa_id', $v->getEmpresaId());
        $sql->bindValue(':categoria_id', $v->getCategoriaId());
        $sql->bindValue(':data_publicacao', $v->getDataPublicacao());
        $sql->bindValue(':ativo', $v->isAtivo());
        return $sql->execute();
    }

    public function listarPorId(Vaga $v){
        $sql = $this->pdo->prepare("SELECT * FROM categoria WHERE id = ?");
        $sql->bindValue(1, $v->getId());
        $sql->execute();
        return $sql->fetch();
    }

}
?>