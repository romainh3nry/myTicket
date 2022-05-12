<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;


class UserUpdateForm extends Form
{
    public function initialize()
    {
        $username = new Text('username',
            [
                'placerholder' => 'Username',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );
        
        $password = new Password('password',
            [
                'placerholder' => 'Password',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $email = new Text('email',
            [
                'placeholder' => 'Email',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $role = new Select('role',
            [
                'admin' => 'Admin',
                'user' => 'User',
            ],
            [
                'placerholder' => 'Role',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $this->add($username);
        $this->add($password);
        $this->add($email);
        $this->add($role);
    }
}