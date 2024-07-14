<?php

class Usuario {
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public bool $admin = false;
    public string $data_criacao;
    public bool $ativo;
    public string $foto;
    public string $link_linkedin;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }   

    public function getEmail() {
        return $this->email;
    }   

    public function setSenha($senha) {
        $this->senha = $senha;
    }   

    public function getSenha() {
        return $this->senha;
    }   

    public function setAdmin($admin) {
        $this->admin = $admin;
    }      

    public function getAdmin() {
        return $this->admin;
    }   

    public function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }   

    public function getDataCriacao() {
        return $this->data_criacao;
    }   

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }   

    public function getAtivo() {
        return $this->ativo;
    }   

    public function setFoto($foto) {
        $this->foto = $foto;
    }   

    public function getFoto() {
        return $this->foto;
    }   

    public function setLinkLinkedin($link_linkedin) {
        $this->link_linkedin = $link_linkedin;
    }

    public function getLinkLinkedin() {
        return $this->link_linkedin;
    }   
    
}

?>