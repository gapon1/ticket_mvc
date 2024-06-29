<?php

namespace App\models;

use PDO;

class Job {
    private $db;
    private $table = 'jobs';

    public $id;
    public $name;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllJobs() {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getJobsByCustomerId($customer_id) {
        $stmt = $this->db->query("SELECT id, name FROM $this->table WHERE customer_id = $customer_id");
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}
