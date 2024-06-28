<?php

namespace app\models;

class FormModel
{
    private $labour = 'labour';
    private $truck = 'truck';
    private $miscellaneous = 'miscellaneous';
    private $staff = 'staff';
    private $positions = 'positions';

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function saveLabourForm()
    {

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

    public function saveMiscellaneousForm()
    {

    }

    public function saveTruckForm()
    {

    }

}