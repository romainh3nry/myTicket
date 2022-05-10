<?php

class AccountController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Account');
        $this->assets->addCss('css/account.css');
    }
}
