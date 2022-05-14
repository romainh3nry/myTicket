<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Confirmation;

class UserPasswordUpdateForm extends Form
{
    public function initialize()
    {
        $password = new Password('password',
            [
                'placeholder' => 'Nouveau mot de passe',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $password->addValidators(
            [
                new Confirmation(
                    [
                        "message" => "Le mot de passe doit être identique",
                        "with" => "passwordConfirm",
                    ]
                )
            ]
        );

        $passwordConfirm = new Password('passwordConfirm',
            [
                'placeholder' => 'Confirmer mot de passe',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $passwordConfirm->addValidators(
            [
                new Confirmation(
                    [
                        "message" => "Le mot de passe doit être identique",
                        "with" => "password",
                    ]
                )
            ]
        );

        $submit = new Submit('Modifier',
            [
                'placeholder' => 'Modifier',
                'class' => 'btn btn-block'
            ]
        );

        $this->add($password);
        $this->add($passwordConfirm);
        $this->add($submit);
    }
}