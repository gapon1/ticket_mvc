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
        // Implement update logic here based on the fields in the database.
    }
}

?>