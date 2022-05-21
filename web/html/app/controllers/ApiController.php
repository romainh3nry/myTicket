<?php

use Myticket\Models\Users;
use Myticket\Models\Customers;
use Myticket\Models\Services;
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
}