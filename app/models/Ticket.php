<?php

namespace app\models;

use app\models\Database;

class Ticket
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getTicket($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tickets WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateTicket($data)
    {
        try {
            $stmt = $this->db->prepare("UPDATE customers SET name = :name, email = :email WHERE id = :id");
            $stmt->bindParam(':name', $newData['name']);
            $stmt->bindParam(':email', $newData['email']);
            $stmt->bindParam(':id', $customerId);
            $stmt->execute();
            return true; // Success
        } catch(\PDOException $e) {
            // Handle database errors here (log, throw exception, etc.)
            return false;
        }
    }
}

?>