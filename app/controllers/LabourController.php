<?php

namespace App\controllers;

use app\models\Database;
use App\models\FormModel;
use App\models\Labour;

class LabourController
{
    private $db;
    private $formModel;
    private $labourModel;


    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->formModel = new FormModel($this->db);
        $this->labourModel = new Labour($this->db);
    }

    public function labourAddBlock($index, $counter, $id)
    {
        $staffs = $this->formModel->getAllStaff();
        $positions = $this->formModel->getAllPositions();
        $uoms = $this->formModel->getUomOptions();
        include __DIR__ . '/../views/forms/_subForms/_subFormLabour.php';
    }

    public function createLabour($post, $id)
    {
        $validator = $this->labourValidator($post);

        if ($validator['success']) {
            if ($this->labourModel->save($post)) {
                $labours = $this->formModel->getAllLabours();
                $staffs = $this->formModel->getAllStaff();
                $positions = $this->formModel->getAllPositions();
                $uoms = $this->formModel->getUomOptions();
                return include __DIR__ . "/../views/forms/labourForm.php";
            } else {
                return 'Create ERROR';
            }
        } else {
            echo json_encode($validator);
        }

    }

    public function updateLabour($post)
    {
        foreach ($post as $misc) {
            $validator = $this->labourValidator($misc);
            if ($validator['success']) {
                $this->labourModel->update($misc);
            }
        }

        return 'Miscellaneous Updated Success!';
    }

    public function deleteLabour($id)
    {
        $this->labourModel->delete($id);
        return '<div class="form-group col-md-12 text-right" style="margin-top: 30px">
            <button type="button" class="btn btn-primary add-sub-form">+</button>
        </div>';
    }

    public function labourValidator($post)
    {
        if (empty($post['reg_hours'])) {
            $errors['reg_hours'] = 'Reg Hours is required.';
        }

        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $data['success'] = true;
        }
        return $data;
    }

    public function selectPositionInfo($position_id)
    {
        $position = $this->labourModel->getAllLabourByPositionId($position_id);
        if (!empty($position)) {
            echo json_encode($position);
        }
    }

}