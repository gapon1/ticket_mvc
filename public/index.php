<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TicketController;

$action = isset($_GET['url']) ? $_GET['url'] : 'edit';
$id = isset($_GET['id']) ? $_GET['id'] : 1; // Default to 1 for testing

$controller = new TicketController();


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
}
