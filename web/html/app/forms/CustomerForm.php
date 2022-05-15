<?php

namespace Myticket\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;

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

        $tel = new Text('tel',
            [
                'placeholder' => 'Telephon Contact',
                'class' => 'form-control',
                'required' => 'required',
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