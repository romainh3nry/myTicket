<?php

use Myticket\Forms\LoginForm;

class AuthController extends ControllerBase
{
    public function loginAction()
    {
        $this->assets->addCss('css/auth.css');
        $this->assets->addJs('js/auth.js');
        $this->tag->setTitle('login');
        $form = new LoginForm();

        $this->view->form = $form;
    }
}
