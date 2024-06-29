<?php

namespace App\models;

use PDO;

class Customer {
    private $db;
    private $table = 'customers';

    public $id;
    public $name;
    public $contact_name;
    public $contact_email;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCustomers() {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
