<?php

class TicketsController extends ControllerBase
{
    public function initialize()
    {
        $this->assets->addCss('css/tickets.css');
        $this->assets->addJs('js/tickets.js');
        $this->tag->setTitle('Tickets');
    }
    
    public function indexAction()
    {

    }

    public function createAction()
    {

    }
}