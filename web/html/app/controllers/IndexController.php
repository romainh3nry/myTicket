<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->assets->addCss('css/index.css');
        $this->tag->setTitle('Home');
    }

}
