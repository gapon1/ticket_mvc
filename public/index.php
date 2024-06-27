<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TicketController;

$action = isset($_GET['action']) ? $_GET['action'] : 'edit';
$id = isset($_GET['id']) ? $_GET['id'] : 1; // Default to 1 for testing

$controller = new TicketController();

if ($action === 'edit') {
    $controller->edit($id);
} elseif ($action === 'update') {
    $controller->update($_POST);
}
