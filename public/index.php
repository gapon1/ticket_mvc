<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TicketController;
use App\Controllers\MiscellaneousController;
use App\Controllers\LabourController;

$action = isset($_GET['url']) ? $_GET['url'] : 'edit';
$id = isset($_GET['id']) ? $_GET['id'] : 1; // Default to 1 for testing

$controller = new TicketController();
$miscellaneous = new MiscellaneousController();
$labour = new LabourController();


switch ($action) {
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'save':
        $controller->save($_POST);
        break;
    case 'jobDropdown':
        $controller->jobDropdown($_GET['customer_id']);
        break;
    case 'locationDropdown':
        $controller->locationDropdown($_GET['job_id']);
        break;
    case 'miscellaneousAddBlock':
        $miscellaneous->miscellaneousAddBlock($_GET['index'], $_GET['counter'], $id);
        break;
    case 'createMiscellaneous':
        $miscellaneous->createMiscellaneous($_POST, $id);
        break;
    case 'deleteMiscellaneous':
        $miscellaneous->deleteMiscellaneous($_GET['id']);
        break;
    case 'updateMiscellaneous':
        $miscellaneous->updateMiscellaneous($_POST['items']);
        break;
    case 'labourAddBlock':
        $labour->labourAddBlock($_GET['index'], $_GET['counter'], $id);
        break;
    case 'createLabour':
        $labour->createLabour($_POST, $id);
        break;
    case 'deleteLabour':
        $labour->deleteLabour($id);
        break;
    case 'updateLabour':
        $labour->updateLabour($_POST['items_labour']);
        break;
}
