<?php
require_once "config/database.php";

class Events 
{
    private $conn;
    private $table = "events";

    public function __construct() 
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() 
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_event, $tanggal, $lokasi)
    {
        $query = "INSERT INTO " . $this->table . " (nama_event, tanggal, lokasi) VALUES(:nama_event, :tanggal, :lokasi)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':nama_event', $nama_event);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':lokasi', $lokasi);
        return $stmt->execute();
    }
    
    public function update($id, $nama_event, $tanggal, $lokasi) 
    {
        $query = "UPDATE " . $this->table . 
        " SET nama_event = :nama_event, tanggal = :tanggal, lokasi = :lokasi WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_event', $nama_event);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':lokasi', $lokasi);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>