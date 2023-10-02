<?php

class Conn {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = "misbach";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        if($this->conn->connect_error){
            die('Connection Failed : ' . $this->conn->connect_error);
        }
    }

}

?>