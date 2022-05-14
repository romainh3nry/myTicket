<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;

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

        $passwordConfirm = new Password('passwordConfirm',
            [
                'placeholder' => 'Confirmer mot de passe',
                'class' => 'form-control',
                'required' => 'required',
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