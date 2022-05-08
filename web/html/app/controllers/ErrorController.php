<?php

class ErrorController extends ControllerBase
{

    public function initialize()
    {
        $this->assets->addCss('css/error.css');
    }

    public function code404Action()
    {
        $this->tag->setTitle('404');
    }

    public function code500Action()
    {
        $this->tag->setTitle('500');
    }
}