<?php

use Myticket\Models\Users;
use Myticket\Models\Customers;
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
}