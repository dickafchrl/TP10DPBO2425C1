<?php
class database 
{
    private $host = "localhost";
    private $database = "event_management";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection() 
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}