<?php

use Myticket\Models\Tickets; 
use Myticket\Models\Services;
use Myticket\Models\Customers;  
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
            # $oResponse = new Response();
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
            # $oResponse->setJsonContent([
            #    $title, $author, $service, $getCustomer->id, $message
            #]);
            #return $oResponse->send();
            $newTicket->title = $title;
            $newTicket->service = $service;
            $newTicket->author = $author;
            $newTicket->related_to = $getCustomer->id;
            $newTicket->message = $message;
            $newTicket->save();
        }
    }
}