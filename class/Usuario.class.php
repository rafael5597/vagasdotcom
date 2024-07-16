<?php

class Usuario {
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public bool $admin;
    public string $data_criacao;
    public bool $ativo;
    public string $foto;
    public string $link_linkedin;

    public function __construct(){
        $this->setAdmin(false);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }

    public function getDataCriacao(): string
    {
        return $this->data_criacao;
    }

    public function setDataCriacao(string $data_criacao): void
    {
        $this->data_criacao = $data_criacao;
    }

    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

    public function getLinkLinkedin(): string
    {
        return $this->link_linkedin;
    }

    public function setLinkLinkedin(string $link_linkedin): void
    {
        $this->link_linkedin = $link_linkedin;
    }


    
}

?>