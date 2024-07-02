<?php

namespace App\models;

class Truck
{
    private $db;
    private $table = 'trucks';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllTruck()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($data, $ticketId)
    {
        try {
            // Begin a transaction
            $this->db->beginTransaction();

            $query = "INSERT INTO $this->table (
                   label, 
                   quantity, 
                   uom, 
                   rate, 
                   total
                   ) VALUES (?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array_values($data));
            $truckId = $this->db->lastInsertId();

            // Insert into ticketTruck table
            $sql = "INSERT INTO ticket_trucks (ticket_id, truck_id) VALUES (:ticket_id, :truck_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['ticket_id' => $ticketId, 'truck_id' => $truckId]);

            // Commit the transaction
            $this->db->commit();

            echo "<div class='alert alert-success modal_custom' role='alert'>Data saved successfully!</div>";
        } catch (\Exception $e) {
            // Rollback the transaction if something failed
            $this->db->rollBack();
            echo "<div class='alert alert-danger modal_custom' role='alert'>Failed to save data: </div>" . $e->getMessage();

        }
        return true;
    }

    public function update($newData)
    {
        $sql = "UPDATE $this->table SET 
                   label = :label, 
                   quantity = :quantity, 
                   uom = :uom, 
                   rate = :rate, 
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
