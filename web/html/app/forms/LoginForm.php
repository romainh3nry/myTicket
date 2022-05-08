<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;


class LoginForm extends Form
{
    public function initialize()
    {
        $username = new Text('username',
            [
                'placeholder' => 'Username',
                'class' => 'form-control',
                'required' => 'required'
            ]
        );

        $password = new Password('password',
            [
                'placeholder' => 'Password',
                'class' => 'form-control',
                'required' => 'required' 
            ]
        );

        $submit = new Submit('Connexion',
            [
                'placeholder' => 'Connexion',
                'class' => 'btn btn-success',
            ]
        );

        $this->add($username);
        $this->add($password);
        $this->add($submit);
    }
}