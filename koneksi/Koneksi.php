<?php

class database
{

    private $host = 'localhost', $dbname = 'ayominumamanah', $uname = 'root', $pass = '';
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->uname, $this->pass);
        } catch (PDOException $e) {
            echo "Gagal" . $e->getMessage();
        }
        return $this->conn;
    }

}

// $db = new database();

// var_dump($db);

