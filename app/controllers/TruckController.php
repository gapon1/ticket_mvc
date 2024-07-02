<?php

namespace App\controllers;

use app\models\Database;
use App\models\FormModel;
use App\models\TicketTruck;
use App\models\Truck;

class TruckController
{
    private $db;
    private $formModel;
    private $truckModel;
    private $ticketsTrucksModel;


    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->formModel = new FormModel($this->db);
        $this->truckModel = new Truck($this->db);
        $this->ticketsTrucksModel = new TicketTruck($this->db);
    }

    public function truckAddBlock($index, $counter, $id)
    {
        $uoms = $this->formModel->getUomOptions();
        $trucks = $this->formModel->getAllTruck();
        include __DIR__ . '/../views/forms/_subForms/_subFormTruck.php';
    }

    public function createTruck($post, $id)
    {
        $validator = $this->truckValidator($post);

        if ($validator['success']) {
            if ($this->truckModel->save($post)) {
                $trucks = $this->formModel->getAllTruck();
                $uoms = $this->formModel->getUomOptions();
                return include __DIR__ . "/../views/forms/truckForm.php";
            } else {
                return 'Create ERROR';
            }
        } else {
            echo json_encode($validator);
        }
    }

    public function updateTruck($post)
    {
        foreach ($post as $misc) {
            $validator = $this->truckValidator($misc);
            if ($validator['success']) {
                $this->truckModel->update($misc);
            }
        }

        return 'Miscellaneous Updated Success!';
    }

    public function deleteTruck($id)
    {
        $this->ticketsTrucksModel->delete($id);
        $this->truckModel->delete($id);
        return '<div class="form-group col-md-12 text-right" style="margin-top: 30px">
            <button type="button" class="btn btn-primary add-sub-form">+</button>
        </div>';
    }

    public function truckValidator($post)
    {
        if (empty($post['quantity'])) {
            $errors['quantity'] = 'Quantity is required.';
        }

        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $data['success'] = true;
        }
        return $data;
    }

}