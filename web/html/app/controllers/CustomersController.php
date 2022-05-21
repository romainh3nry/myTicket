<?php

use Myticket\Models\Customers;
use Myticket\Forms\CustomerForm;

class CustomersController extends ControllerBase
{
    public function initialize()
    {
        $this->assets->addCss('css/customers.css');
    }

    public function updateAction($customer_id)
    {
        $customer = Customers::findFirst(
            [
                "id = '{$customer_id}'"
            ]
        );

        $this->tag->setTitle("Update {$customer->name}");

        $form = new CustomerForm($customer);

        $this->view->customerName = $customer->name;
        $this->view->customerId = $customer->id;
        $this->view->form = $form;

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES)))
            {
                $form->bind($this->request->getPost(), $customer);
                $customer->save();
                $this->flashSession->success('Modification éffectuée avec succès');
            }
            else 
            {
                $aMessages = $form->getMessages();
                $sErreurs = '';
                foreach($aMessages as $sMessage)
                {
                    $sErreurs = '- ' . $sMessage . '<br />';
                }
                $this->view->erreurs = $sErreurs;
            };
        }
    }

    public function createAction()
    {
        $this->tag->setTitle('Create customer');
        $form = new CustomerForm();
        $customer = new Customers();
        $this->view->form = $form;

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES)))
            {
                $form->bind($this->request->getPost(), $customer);
                $customer->save();
                $this->flashSession->success('Ajout éffectué avec succès');
            }
            else 
            {
                $aMessages = $form->getMessages();
                $sErreurs = '';
                foreach($aMessages as $sMessage)
                {
                    $sErreurs = '- ' . $sMessage . '<br />';
                }
                $this->view->erreurs = $sErreurs;
            };
        }
    }
}