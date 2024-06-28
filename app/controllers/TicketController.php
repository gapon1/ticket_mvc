<?php

namespace app\controllers;

use App\Models\Customer;
use app\models\Database;
use App\Models\Job;
use App\Models\Location;
use app\models\Ticket;

class TicketController
{
    private $db;
    private $ticketModel;
    private $customerModel;
    private $jobsModel;
    private $locationsModel;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->ticketModel = new Ticket();
        $this->customerModel = new Customer($this->db);
        $this->jobsModel = new Job($this->db);
        $this->locationsModel = new Location($this->db);
    }

    public function edit($id)
    {
        $ticket = $this->ticketModel->getTicket($id);
        $customers = $this->customerModel->getAllCustomers();
        $jobs = $this->jobsModel->getAllJobs();
        $statuses = self::getStatusOptions();
        $locations = $this->locationsModel->getAllLocations();
        include __DIR__ . '/../views/ticket/edit.php';
    }

    public function update()
    {
        var_dump('dddd');
        die();
        $this->ticketModel->updateTicket($data);
        // Redirect or render a view after update
    }

    public static function getStatusOptions()
    {
        return [
            'Active' => 'Active',
            'Pending' => 'Pending',
            'Closed' => 'Closed',
        ];
    }
}

?>