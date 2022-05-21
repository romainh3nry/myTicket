<?php

use Myticket\Models\Services; 


class ServicesController extends ControllerBase
{
    function updateAction($service_id)
    {
        $this->assets->addCss('css/services.css');
        $service = Services::findFirst(
            [
                "id = '$service_id'"
            ]
        );

        $this->view->service = $service;

        if ($this->request->isPost())
        {
            $name = $this->request->getPost('name');
            $service->name = $name;
            $service->save();
            $this->flashSession->success('Modification éffectuée ave succès');
        }
    }
}