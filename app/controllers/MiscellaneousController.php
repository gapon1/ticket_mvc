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

    public function miscellaneousAddBlock($index, $counter, $ticketId)
    {
        include __DIR__ . '/../views/forms/_subForms/_subFormMiscellaneous.php';
    }

    public function createMiscellaneous($post)
    {
        if ($post) {
            if ($this->miscellaneousModel->save($post)) {
                $miscellaneous = $this->formModel->getAllMiscellaneous();
                return include __DIR__ . "/../views/forms/miscellaneousForm.php";
            }
        } else {
            return 'Create ERROR';
        }
        return 'Create success';

    }

//    public function actionCreateMiscellaneous($ticketId)
//    {
//        $model = new Miscellaneous();
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//
//                return $this->renderAjax('../../widgets/views/miscellaneous', [
//                    'model' => Miscellaneous::find()->all(),
//                    'ticketId' => $ticketId
//                ]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }
//        return 'Create success';
//    }
//
//    public function actionUpdateMiscellaneous($ticketId)
//    {
//        // Load the related Miscellaneous models
//        $miscellaneousModels = Miscellaneous::findAll(['ticket_id' => $ticketId]);
//
//        if (Yii::$app->request->isPost) {
//            $miscellaneousPostData = Yii::$app->request->post('Miscellaneous', []);
//            foreach ($miscellaneousModels as $index => $miscModel) {
//                // Load the submitted data and validate it
//                if (isset($miscellaneousPostData[$index])) {
//                    $miscModel->load($miscellaneousPostData[$index], '');
//                }
//            }
//            $valid = ActiveForm::validateMultiple($miscellaneousModels);
//            if (empty($valid)) {
//                // All models are valid, so save them
//                foreach ($miscellaneousModels as $miscModel) {
//                    $miscModel->save(false); // Saving without further validation
//                }
//                // Redirect or do something after saving
//            } else {
//                // Validation failed
//                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//                return $valid;
//            }
//        }
//        return 'Miscellaneous Updated Success!';
//    }
//
    public function deleteMiscellaneous($id)
    {
        $this->miscellaneousModel->delete($id);
        return '<div class="form-group col-md-12 text-right" style="margin-top: 30px">
            <button type="button" class="btn btn-primary add-sub-form">+</button>
        </div>';
    }

}