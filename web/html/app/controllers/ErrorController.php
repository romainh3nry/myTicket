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

    public function code401Action()
    {
        $this->tag->setTitle('401');
    }
}