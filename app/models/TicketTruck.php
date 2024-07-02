<?php

namespace App\models;

class TicketTruck
{
    private $db;
    private $table = 'ticket_trucks';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllTicketTruck()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        if ($id != 'empty') {
            $query = "DELETE FROM $this->table WHERE `truck_id` = $id";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }
    }

}