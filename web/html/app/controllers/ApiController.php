<?php

use Myticket\Models\Users;
use Myticket\Models\Customers;
use Myticket\Models\Services;
use Myticket\Models\Tickets;
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
}