<?php
require_once "config/database.php";

class Orders 
{
    private $conn;
    private $table = "orders";

    public function __construct() 
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() 
    {
        $query = "SELECT o.*, u.nama as nama, e.nama_event as nama_event FROM " . $this->table . " o
            JOIN users u ON o.user_id = u.id
            JOIN tickets t ON o.ticket_id = t.id
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

    public function create($user_id, $ticket_id, $jumlah, $tanggal_order) 
    {
        $query = "INSERT INTO " . $this->table . " ( user_id, ticket_id, jumlah) VALUES(:user_id, :ticket_id, :jumlah)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':ticket_id', $ticket_id);
        $stmt->bindParam(':jumlah', $jumlah);
        return $stmt->execute();
    }
    
    public function update($id, $user_id, $ticket_id, $jumlah) 
    {
        $query = "UPDATE " . $this->table . 
        " SET user_id = :user_id, ticket_id = :ticket_id, jumlah = :jumlah WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':ticket_id', $ticket_id);
        $stmt->bindParam(':jumlah', $jumlah);
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