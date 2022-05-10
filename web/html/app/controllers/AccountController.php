<?php

use Mytickets\Models\Users;

class AccountController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Account');
        $this->assets->addCss('css/account.css');
        $this->assets->addJs('js/account.js');

        $sessionId = $this->session->get('auth_id')['id'];
        $user = Users::findFirst(
            [
                "id = '{$sessionId}'"
            ]
        );
        $this->view->user = $user;
    }
}
