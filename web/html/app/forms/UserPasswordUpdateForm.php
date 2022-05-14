<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Regex;


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
                ),
                new Regex(
                    [
                        "pattern" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
                        "message" => 'Le mot de passe doit comporter au moin 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial',
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
                ),
                new Regex(
                    [
                        "pattern" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
                        "message" => 'Le mot de passe doit comporter au moin 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial',
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