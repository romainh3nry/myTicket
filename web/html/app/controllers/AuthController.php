<?php

class AuthController extends ControllerBase
{

    public function initialize()
    {
        $this->assets->addCss('css/auth.css');
    }

    public function loginAction()
    {
        $this->tag->setTitle('login');
    }
}
