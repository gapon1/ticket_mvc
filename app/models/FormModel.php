<?php

namespace App\models;

class FormModel
{
    private $labour = 'labour';
    private $truck = 'trucks';
    private $ticketsTrucks = 'ticket_trucks';
    private $miscellaneous = 'miscellaneous';
    private $staff = 'staff';
    private $positions = 'positions';

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllLabours()
    {
        $stmt = $this->db->query("SELECT * FROM $this->labour");
        return $stmt->fetchAll(\PDO::FETCH_CLASS);

    }

    public function getAllStaff()
    {
        $stmt = $this->db->query("SELECT * FROM $this->staff");
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function getAllPositions()
    {
        $stmt = $this->db->query("SELECT * FROM $this->positions");
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function getAllMiscellaneous()
    {
        $stmt = $this->db->query("SELECT * FROM $this->miscellaneous");
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function getAllTicketTruck($id)
    {
        $stmt = $this->db->query("SELECT truck_id FROM $this->ticketsTrucks WHERE ticket_id = $id");
        $truckID = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
        $placeholders = implode(',', array_fill(0, count($truckID), '?'));

        $sql = "SELECT * FROM $this->truck WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);

        foreach ($truckID as $index => $id) {
            $stmt->bindValue($index + 1, $id, \PDO::PARAM_INT); // BindValue is 1-indexed
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function getAllTruck()
    {
        $stmt = $this->db->query("SELECT * FROM $this->truck");
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

}