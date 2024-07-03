<?php

namespace App\models;

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

    public function updateTicket($newData)
    {
        //TODO add dropdown validation
        $sql = "UPDATE tickets SET 
                     customer_id = :customer_id,
                     ordered_by = :ordered_by,
                     job_id = :job_id,
                     date = :date,
                     status = :status_id,
                     area_field = :area_field,
                     location_id = :location_id, 
                     description = :description 
               WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute($newData);
        }
        catch(\Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}

?>