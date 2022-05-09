<?php

use Myticket\Forms\LoginForm;
use Mytickets\Models\Users;

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

            $user = Users::findFirst(
                [
                    "username = :username: AND password = crypt(:password:, password)",
                    "bind" => [
                        'username' => $username,
                        'password' => "$password"
                    ]
                ]
            );
            if ($user !== false) {
                $this->_registerSession($user);
                $this->response->redirect('/');

            } else {
                $this->flash->error(
                    'Identifiant ou mot de passe incorrect'
                );
            }
        }

        $this->view->form = $form;
    }
}
