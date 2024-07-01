<?php

namespace App\controllers;

use app\models\Database;
use App\models\FormModel;
use App\models\Miscellaneous;

class MiscellaneousController
{
    private $db;
    private $miscellaneousModel;
    private $formModel;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->miscellaneousModel = new Miscellaneous($this->db);
        $this->formModel = new FormModel($this->db);
    }

    public function miscellaneousAddBlock($index, $counter, $id)
    {
        include __DIR__ . '/../views/forms/_subForms/_subFormMiscellaneous.php';
    }

    public function createMiscellaneousValidator($post)
    {
        if (empty($post['description'])) {
            $errors['description'] = 'Description is required.';
        }
        if (empty($post['cost'])) {
            $errors['cost'] = 'Cost is required.';
        }
        if (empty($post['price'])) {
            $errors['price'] = 'Price is required.';
        }
        if (empty($post['quantity'])) {
            $errors['quantity'] = 'Quantity is required.';
        }
        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $data['success'] = true;
            $data['message'] = 'Success!';
        }
        return $data;
    }

    public function createMiscellaneous($post, $id)
    {
        $validator = $this->createMiscellaneousValidator($post);

        if ($validator['success']) {
            if ($this->miscellaneousModel->save($post)) {
                $miscellaneous = $this->formModel->getAllMiscellaneous();
                return include __DIR__ . "/../views/forms/miscellaneousForm.php";
            } else {
                return 'Create ERROR';
            }
        } else {
            echo json_encode($validator);
        }

    }

    public function updateMiscellaneous($post, $ticketId)
    {
        $validator = $this->createMiscellaneousValidator($post);

        if ($validator['success']) {
            $this->miscellaneousModel->update($ticketId, $post);
        }

        return 'Miscellaneous Updated Success!';
    }

    public function deleteMiscellaneous($id)
    {
        $this->miscellaneousModel->delete($id);
        return '<div class="form-group col-md-12 text-right" style="margin-top: 30px">
            <button type="button" class="btn btn-primary add-sub-form">+</button>
        </div>';
    }

}