<?php
require_once "config/database.php";

class Tickets 
{
    private $conn;
    private $table = "tickets";

    public function __construct() 
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() 
    {
        $query = "SELECT t.*, e.nama_event as nama_event FROM " . $this->table . " t 
        JOIN events e ON t.event_id = e.id";
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

    public function create($event_id, $tipe_tiket, $harga) 
    {
        $query = "INSERT INTO " . $this->table . " (event_id, tipe_tiket, harga) VALUES(:event_id, :tipe_tiket, :harga)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':tipe_tiket', $tipe_tiket);
        $stmt->bindParam(':harga', $harga);
        return $stmt->execute();
    }
    
    public function update($id, $event_id, $tipe_tiket, $harga) 
    {
        $query = "UPDATE " . $this->table . 
        " SET event_id = :event_id, tipe_tiket = :tipe_tiket, harga = :harga WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':tipe_tiket', $tipe_tiket);
        $stmt->bindParam(':harga', $harga);
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