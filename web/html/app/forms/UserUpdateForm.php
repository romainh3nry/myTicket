<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Myticket\Models\Users;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\InclusionIn;


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

        $username->addValidators(
            [
                new Regex(
                    [
                        "pattern" => "/^[a-z]{1}[.]{1}[a-z]*/",
                        "message" => "Le username doit être de format [1ère lettre prenom].[nom de famille] (ex: e.zola).",
                    ]
                )
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

        $email->addValidators(
            [
                new Email(
                    [
                        "message" => "le champs Email doit comporter une adresse Email"
                    ]
                )
            ]
        );

        $role = new Select('role',
            [
                'user' => 'user',
                'admin' => 'admin',
            ],
            [
                'placerholder' => 'Role',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $role->addValidators(
            [
                new InclusionIn(
                    [
                        "message" => "Le role doit être user ou admin",
                        "domain" => ["user", "admin"]
                    ]
                )
            ]
        );

        $submit = new Submit('Update',
            [
                'placerholder' => 'Update',
                'class' => 'btn btn-block',
            ]
        );

        $this->add($username);
        $this->add($password);
        $this->add($email);
        $this->add($role);
        $this->add($submit);
    }
}