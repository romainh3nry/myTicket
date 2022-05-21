<?php

use Myticket\Models\Tickets; 
use Myticket\Models\Services;
use Myticket\Models\Customers;  


class TicketsController extends ControllerBase
{
    public function initialize()
    {
        $this->assets->addCss('css/tickets.css');
        $this->assets->addJs('js/tickets.js');
        $this->tag->setTitle('Tickets');
    }
    
    public function indexAction()
    {

    }

    public function createAction()
    {
        if ($this->request->isPost())
        {
            $newTicket = new Tickets();
            $title = $this->request->getPost('title');
            $service = $this->request->getPost('service');
            $customer = $this->request->getPost('customer');
            $message = $this->request->getPost('message');

            $serviceId = Services::findFirst(
                [
                    "name = '{$service}'",
                    "columns" => 'id'
                ]
            );
            $customerId = Customers::findFirst(
                [
                    "name = '{$customers}'",
                    "columns" => 'id'
                ]
            );

            $newTicket->title = $title;
            $newTicket->service = $serviceId;
            $newTicket->customer = $customerId;
            $newTicket->message = $message;
            $newTicket->save();
        }
    }
}