<?php

use Mytickets\Models\Users;
use Phalcon\http\Response;


class ApiController extends ControllerBase
{
    function usersAction($search)
    { 
        $oResponse = new Response();
        $this->logger->debug('search word : ' . $search);
        $user = Users::find(
            [
                "username LIKE '%{$search}%'"
            ]
        );
        $oResponse->setJsonContent($user);
        return $oResponse->send();
    }
}