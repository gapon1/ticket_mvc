<?php

namespace app\controllers;

use app\models\Ticket;

class TicketController
{
    private $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new Ticket();
    }

    public function edit($id)
    {
        $ticket = $this->ticketModel->getTicket($id);
        include __DIR__ . '/../views/ticket/edit.php';
    }

    public function update($data)
    {
        $this->ticketModel->updateTicket($data);
        // Redirect or render a view after update
    }
}

?>