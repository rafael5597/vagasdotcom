<?php
class Conexao {
    private string $conn_srv;
    private string $conn_usr;
    private string $conn_pwd;

    public function __construct() {
        $this->conn_srv = "mysql:host=localhost; port=3307;dbname=vagasdotcom";
        $this->conn_usr = "root";
        $this->conn_pwd = "root";
    }
    
    /**
     * @return string
     */
    public function getConn_srv(): string
    {
        return $this->conn_srv;
    }

    /**
     * @return string
     */
    public function getConn_usr(): string
    {
        return $this->conn_usr;
    }

    /**
     * @return string
     */
    public function getConn_pwd(): string
    {
        return $this->conn_pwd;
    }

    /**
     * @param string $conn_srv
     */
    public function setConn_srv(string $conn_srv): void
    {
        $this->conn_srv = $conn_srv;
    }

    /**
     * @param string $conn_usr
     */
    public function setConn_usr(string $conn_usr): void
    {
        $this->conn_usr = $conn_usr;
    }

    /**
     * @param string $conn_pwd
     */
    public function setConn_pwd(string $conn_pwd): void
    {
        $this->conn_pwd = $conn_pwd;
    }

}

?>