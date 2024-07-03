<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TicketController;
use App\Controllers\MiscellaneousController;
use App\Controllers\LabourController;
use App\controllers\TruckController;
use App\controllers\TicketTruckController;

$action = isset($_GET['url']) ? $_GET['url'] : 'edit';
$id = isset($_GET['id']) ? $_GET['id'] : 1; // Default to 1 for testing

$controller = new TicketController();
$miscellaneous = new MiscellaneousController();
$labour = new LabourController();
$truck = new TruckController();
$ticketTruck = new TicketTruckController();


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
    case 'truckAddBlock':
        $truck->truckAddBlock($_GET['index'], $_GET['counter'], $id);
        break;
    case 'createTruck':
        $truck->createTruck($_POST, $id);
        break;
    case 'deleteTruck':
        $truck->deleteTruck($id);
        break;
    case 'deleteTicketTruck':
        $ticketTruck->deleteTicketTruck($id);
        break;
    case 'updateTruck':
        $truck->updateTruck($_POST['items_truck']);
        break;
    case 'selectPositionInfo':
        $labour->selectPositionInfo($_GET['position_id']);
        break;
}
