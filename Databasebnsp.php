<?php

class Databasematch
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "bnsp";
    private $connection;
    private $result;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Koneksi database gagal: " . $this->connection->connect_error);
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }
    public function getResult()
    {
        return $this->result;
    }
}
?>