<?php

use Myticket\Forms\LoginForm;

class AuthController extends ControllerBase
{

    public function initialize()
    {
        $this->assets->addCss('css/auth.css');
    }

    public function loginAction()
    {
        $this->tag->setTitle('login');
        $form = new LoginForm();

        $this->view->form = $form;
    }
}
