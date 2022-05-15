<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Digit;


class CustomerForm extends Form
{
    public function initialize()
    {
        $name = new Text('name',
            [
                'placeholder' => 'name',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $email = new Text('email',
            [
                'placeholder' => 'Email Contact',
                'class' => 'form-control',
                'reuired' => 'required',
            ]
        );

        $email->addValidators(
            [
                new Email(
                    [
                        "message" => "Le champ Email doit contenir une adresse Email"
                    ]
                )
            ]
        );

        $tel = new Text('tel',
            [
                'placeholder' => 'Telephon Contact',
                'class' => 'form-control',
                'required' => 'required',
            ]
        );

        $tel->addValidators(
            [
                new Digit(
                    [
                        "message" => "Le champ Tel doit contenir uniquement des chiffres"
                    ]
                )
            ]
        );

        $submit = new Submit('Modifier',
            [
                'placeholder' => 'Modifier',
                'class' => 'btn btn-block',
            ]
        );

        $this->add($name);
        $this->add($email);
        $this->add($tel);
        $this->add($submit);
    }
}