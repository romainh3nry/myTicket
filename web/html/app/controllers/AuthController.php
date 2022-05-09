<?php

use Myticket\Forms\LoginForm;
use Phalcon\Crypt;

class AuthController extends ControllerBase
{
    private function _registerSession($user)
    {
        $this->session->set('auth_id', $user->id);
    }

    public function loginAction()
    {
        $this->assets->addCss('css/auth.css');
        $this->assets->addJs('js/auth.js');
        $this->tag->setTitle('login');
        $form = new LoginForm();

        if ($this->request->isPost())
        {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
        }

        $this->view->form = $form;
    }
}
