<?php

namespace App\models;

class Miscellaneous
{
    private $db;
    private $table = 'miscellaneous';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllMiscellaneous()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($data)
    {
        $query = "INSERT INTO $this->table (ticket_id, description, cost, price, quantity, total) VALUES (?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute(array_values($data))) {
            return true;
        } else {
            return false;
        }
    }

    public function update($newData)
    {
        $sql = "UPDATE $this->table SET 
                     description = :description,
                     cost = :cost,
                     price = :price,
                     quantity = :quantity,
                     total = :total
               WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute($newData)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record";
        }

    }

    public function delete($id)
    {
        if ($id != 'empty') {
            $query = "DELETE FROM $this->table WHERE `id` = $id";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }
    }
}
