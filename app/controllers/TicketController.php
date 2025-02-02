<?php

namespace App\controllers;

use App\Models\Customer;
use app\models\Database;
use App\Models\FormModel;
use App\Models\Job;
use App\Models\Location;
use App\models\Ticket;

class TicketController
{
    private $db;
    private $ticketModel;
    private $customerModel;
    private $jobsModel;
    private $locationsModel;
    private $formModel;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->ticketModel = new Ticket();
        $this->customerModel = new Customer($this->db);
        $this->jobsModel = new Job($this->db);
        $this->locationsModel = new Location($this->db);
        $this->formModel = new FormModel($this->db);
    }

    public function edit($id)
    {
        $ticket = $this->ticketModel->getTicket($id);
        $customers = $this->customerModel->getAllCustomers();
        $jobs = $this->jobsModel->getAllJobs();
        $statuses = $this->formModel->getStatusOptions();
        $uoms = $this->formModel->getUomOptions();
        $locations = $this->locationsModel->getAllLocations();

        // Services Forms block
        $labours = $this->formModel->getAllLabours();
        $staffs = $this->formModel->getAllStaff();
        $positions = $this->formModel->getAllPositions();
        $ticketTrucks = $this->formModel->getAllTicketTruck($id);
        $trucks = $this->formModel->getAllTruck();
        $miscellaneous = $this->formModel->getAllMiscellaneous();

        include __DIR__ . '/../views/ticket/edit.php';
    }

    public function update($data)
    {
        $this->ticketModel->updateTicket($data);
    }

    public function save($post)
    {
        // Redirect or render a view after save
    }

    public function jobDropdown($customer_id)
    {
        $jobs = $this->jobsModel->getJobsByCustomerId($customer_id);
        if (!empty($jobs)) {
            echo json_encode($jobs);
        }
    }

    public function locationDropdown($job_id)
    {
        $location = $this->locationsModel->getLocationByJobId($job_id);
        if (!empty($location)) {
            echo json_encode($location);
        }
    }
}

?>