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
}
