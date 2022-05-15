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

        $form = new CustomerForm($customer);

        $this->view->customerName = $customer->name;
        $this->view->customerId = $customer->id;
        $this->view->form = $form;
    }
}