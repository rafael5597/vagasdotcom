<?php
class Conexao {
    private string $conn_srv;
    private string $conn_usr;
    private string $conn_pwd;

    public function __construct() {
        $this->conn_srv = "mysql:host=localhost; port=3306;dbname=vagasdotcom";
        $this->conn_usr = "root";
        $this->conn_pwd = "root";
    }
    
    /**
     * @return string
     */
    public function getConn_srv()
    {
        return $this->conn_srv;
    }

    /**
     * @return string
     */
    public function getConn_usr()
    {
        return $this->conn_usr;
    }

    /**
     * @return string
     */
    public function getConn_pwd()
    {
        return $this->conn_pwd;
    }

    /**
     * @param string $conn_srv
     */
    public function setConn_srv($conn_srv)
    {
        $this->conn_srv = $conn_srv;
    }

    /**
     * @param string $conn_usr
     */
    public function setConn_usr($conn_usr)
    {
        $this->conn_usr = $conn_usr;
    }

    /**
     * @param string $conn_pwd
     */
    public function setConn_pwd($conn_pwd)
    {
        $this->conn_pwd = $conn_pwd;
    }

}

?>