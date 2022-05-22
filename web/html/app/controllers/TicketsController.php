<?php

use Myticket\Models\Tickets; 
use Myticket\Models\Services;
use Myticket\Models\Customers;
use Myticket\Models\Users;
use Phalcon\http\Response;


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
            $author = $this->session->get('auth_id')['id'];
            $service = $this->request->getPost('service');
            $customer = $this->request->getPost('customer');
            $message = $this->request->getPost('message');

            $getCustomer = Customers::findFirst(
                [
                    "name = '{$customer}'",
                ]
            );

            $newTicket->title = $title;
            $newTicket->service = $service;
            $newTicket->author = $author;
            $newTicket->related_to = $getCustomer->id;
            $newTicket->message = $message;
            $newTicket->save();
        }
    }

    public function detailAction($ticket_id)
    {
        $ticket = Tickets::findFirst(
            [
                "id = '{$ticket_id}'",
            ]
        );
        $this->view->ticket = $ticket;
    }
}