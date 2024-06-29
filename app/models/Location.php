<?php

namespace App\models;

use PDO;

class Location {
    private $db;
    private $table = 'locations';

    public $id;
    public $locations_lsd;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllLocations() {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getLocationByJobId($job_id) {
        $stmt = $this->db->query("SELECT id, location_lsd FROM $this->table WHERE job_id = $job_id");
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}
