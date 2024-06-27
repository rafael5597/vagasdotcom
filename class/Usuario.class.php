<?php

class Usuario {
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $admin;
    public $data_criacao;
    public $ativo;
    public $foto;
    public $link_linkedin;

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