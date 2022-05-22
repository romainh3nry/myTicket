<?php

use Myticket\Models\Users;
use Myticket\Models\Customers;
use Myticket\Models\Services;
use Myticket\Models\Tickets;
use Myticket\Models\TicketsUpdates;
use Phalcon\http\Response;


class ApiController extends ControllerBase
{
    function usersAction($search)
    { 
        $oResponse = new Response();
        $user = Users::find(
            [
                "username LIKE '%{$search}%'"
            ]
        );
        $oResponse->setJsonContent($user);
        return $oResponse->send();
    }

    function customersAction($search)
    {
        $oResponse = new Response();
        $customer = Customers::find(
            [
                "name LIKE '%{$search}%'"
            ]
        );
        $oResponse->setJsonContent($customer);
        return $oResponse->send();
    }

    function getCustomersAction()
    {
        $oResponse = new Response();
        $customers = Customers::find(
            [
                'columns' => ['name']
            ]
        );
        $oResponse->setJsonContent($customers);
        return $oResponse->send();
    }

    function servicesAction()
    {
        $oResponse = new Response();
        $services = Services::find();
        $oResponse->setJsonContent($services);
        return $oResponse->send();
    }

    function ticketsAction()
    {
        $results = [];
        $oResponse = new Response();
        $tickets = Tickets::find(
            [
                "state = 't'"
            ]
        );
        foreach($tickets as $ticket)
        {
            $ticket->service = $ticket->Services->name;
            $ticket->related_to = $ticket->Customers->name;
            $ticket->author = $ticket->Users->username;
            $ticket->date_creation = date('d-m-Y H:i:s', strtotime($ticket->date_creation));
            array_push($results, $ticket);
        }
        $oResponse->setJsonContent($results);
        return $oResponse->send();
    }

    function updatesAction($ticket_id)
    {
        $oResponse = new Response();
        
        $updates = TicketsUpdates::find(
            [
                "ticket_id = '{$ticket_id}'",
            ]
        );
        $oResponse->setJsonContent($updates);
        return $oResponse->send();
    }

    function createUpdateAction()
    {
        if ($this->request->isPost())
        {
            $oResponse = new Response();
            $newUpdate = new TicketsUpdates();

            $ticket_id = $this->request->getPost('ticket_id');
            $update = $this->request->getPost('update');

            $newUpdate->ticket_id = $ticket_id;
            $newUpdate->update = $update;
            $newUpdate->save();

            $oResponse->setJsonContent(['statut' => 'OK']);
            return $oResponse->send();
        }
    }
}