<?php

use Mytickets\Models\Users;

class AccountController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Account');
        $this->assets->addCss('css/account.css');

        $sessionId = $this->session->get('auth_id')['id'];
        $user = Users::findFirst(
            [
                "id = '{$sessionId}'"
            ]
        );
        $this->view->user = $user;
    }
}
