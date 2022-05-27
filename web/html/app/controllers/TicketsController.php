<?php

use Myticket\Models\Tickets; 
use Myticket\Models\Services;
use Myticket\Models\Customers;
use Myticket\Models\Users;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;


class TicketsController extends ControllerBase
{
    public function initialize()
    {
        $this->assets->addCss('css/tickets.css');
        $this->tag->setTitle('Tickets');
    }
    
    public function indexAction()
    {
        $this->assets->addJs('js/ticketsIndex.js');
    }

    public function createAction()
    {
        $this->assets->addJs('js/ticketsCreate.js');
        if ($this->request->isPost())
        {
            $newTicket = new Tickets();
            $title = $this->request->getPost('title');
            $author = $this->session->get('auth_id')['id'];
            $service = $this->request->getPost('service');
            $severity = $this->request->getPost('severity');
            $customer = $this->request->getPost('customer');
            $message = $this->request->getPost('message');

            $getCustomer = Customers::findFirst(
                [
                    "name = '{$customer}'",
                ]
            );

            $newTicket->title = $title;
            $newTicket->service = $service;
            $newTicket->severity = $severity;
            $newTicket->author = $author;
            $newTicket->related_to = $getCustomer->id;
            $newTicket->message = $message;
            $newTicket->save();
            $this->response->redirect("/tickets");
        }
    }

    public function detailAction($ticket_id)
    {
        $this->assets->addJs('js/updateCreate.js');
        $ticket = Tickets::findFirst(
            [
                "id = '{$ticket_id}'",
            ]
        );
        $this->view->ticket = $ticket;
    }

    public function closureAction($ticket_id)
    {
        $ticket = Tickets::findFirst(
            "id = '{$ticket_id}'"
        );

        $ticket->state = false;
        date_default_timezone_set('Europe/Paris');
        $ticket->date_closure = date("Y-m-d H:i:s");
        $ticket->save();
        $this->response->redirect("/tickets/detail/{$ticket->id}");
    }

    public function exploreAction()
    {
        $currentPage = $this->request->getQuery('page', 'int');
        $tickets = Tickets::find(
            [
                'order' => 'state DESC, date_creation DESC'
            ]
        );
        $paginator = new PaginatorModel(
            [
                'data' => $tickets,
                'limit' => '10',
                'page' => $currentPage

            ]
        );

        $page = $paginator->getPaginate();
        $this->view->page = $page;
    }
}