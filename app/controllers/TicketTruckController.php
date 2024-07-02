<?php

namespace App\controllers;

use app\models\Database;
use App\models\TicketTruck;

class TicketTruckController
{
    private $db;
    private $ticketsTrucksModel;


    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->ticketsTrucksModel = new TicketTruck($this->db);
    }

    public function deleteTicketTruck($id)
    {
        $this->ticketsTrucksModel->delete($id);
        return '<div class="form-group col-md-12 text-right" style="margin-top: 30px">
            <button type="button" class="btn btn-primary add-sub-form">+</button>
        </div>';
    }

}