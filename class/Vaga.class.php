<?php

    class Vaga{

        private int $id;
        private string $titulo;
        private string $descricao;
        private string $cargo;
        private string $modalidade;
        private string $localizacao;
        private int $empresa_id;
        private int $categoria_id;
        private string $data_publicacao;
        private bool $ativo;
        private bool $imagem;

        public function __construct(){

        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getTitulo(): string
        {
            return $this->titulo;
        }

        public function setTitulo(string $titulo): void
        {
            $this->titulo = $titulo;
        }

        public function getDescricao(): string
        {
            return $this->descricao;
        }

        public function setDescricao(string $descricao): void
        {
            $this->descricao = $descricao;
        }

        public function getCargo(): string
        {
            return $this->cargo;
        }

        public function setCargo(string $cargo): void
        {
            $this->cargo = $cargo;
        }

        public function getModalidade(): string
        {
            return $this->modalidade;
        }

        public function setModalidade(string $modalidade): void
        {
            $this->modalidade = $modalidade;
        }

        public function getLocalizacao(): string
        {
            return $this->localizacao;
        }

        public function setLocalizacao(string $localizacao): void
        {
            $this->localizacao = $localizacao;
        }

        public function getEmpresaId(): int
        {
            return $this->empresa_id;
        }

        public function setEmpresaId(int $empresa_id): void
        {
            $this->empresa_id = $empresa_id;
        }

        public function getCategoriaId(): int
        {
            return $this->categoria_id;
        }

        public function setCategoriaId(int $categoria_id): void
        {
            $this->categoria_id = $categoria_id;
        }

        public function getDataPublicacao(): string
        {
            return $this->data_publicacao;
        }

        public function setDataPublicacao(string $data_publicacao): void
        {
            $this->data_publicacao = $data_publicacao;
        }

        public function isAtivo(): bool
        {
            return $this->ativo;
        }

        public function setAtivo(bool $ativo): void
        {
            $this->ativo = $ativo;
        }

        public function isImagem(): bool
        {
            return $this->imagem;
        }

        public function setImagem(bool $imagem): void
        {
            $this->imagem = $imagem;
        }


    }

?>