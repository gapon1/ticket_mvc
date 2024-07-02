<?php

namespace App\models;

class Labour
{
    private $db;
    private $table = 'labour';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllLabour()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($data)
    {
        $query = "INSERT INTO $this->table (
                   ticket_id, 
                   staff_id, 
                   position_id, 
                   uom, 
                   regular_rate, 
                   reg_hours, 
                   overtime_rate,
                   overtime,
                   total
                   ) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute(array_values($data))) {
            echo "<div class='alert alert-success modal_custom' role='alert'>Data saved successfully!</div>";
            return true;
        } else {
            echo "<div class='alert alert-danger modal_custom' role='alert'>Failed to save data: </div>" . $e->getMessage();
            return false;
        }
    }

    public function update($newData)
    {
        $sql = "UPDATE $this->table SET 
                   staff_id = :staff_id, 
                   position_id = :position_id, 
                   uom = :uom, 
                   regular_rate = :regular_rate, 
                   reg_hours = :reg_hours, 
                   overtime_rate = :overtime_rate,
                   overtime = :overtime,
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
