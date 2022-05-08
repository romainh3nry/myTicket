<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;


class LoginForm extends Form
{
    public function initialize()
    {
        $username = new Text('username',
            [
                'placeholder' => 'Username',
                'class' => 'form-control m-2',
                'required' => 'required'
            ]
        );

        $password = new Password('password',
            [
                'placeholder' => 'Password',
                'class' => 'form-control m-2',
                'required' => 'required',
            ]
        );

        $checkPassword = new Check('checkPassword',
            [
                
            ]
        );

        $submit = new Submit('Connexion',
            [
                'placeholder' => 'Connexion',
                'class' => 'btn btn-block m-2',
            ]
        );

        $this->add($username);
        $this->add($password);
        $this->add($checkPassword);
        $this->add($submit);
    }
}