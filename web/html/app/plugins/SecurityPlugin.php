<?php

namespace Myticket\Plugins;

use Phalcon\Mvc\User\Plugin;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl\Role;

class SecurityPlugin extends Plugin
{
    public function beforeExecuteRoute(Event $oEvent, Dispatcher $oDispatcher)
    {
        $user = null;
        if ($this->session->has('auth_id'))
        {
            $user = $this->session->get('auth_id');
        }

        $sControleur = $oDispatcher->getControllerName();
        $sAction = $oDispatcher->getActionName();

        if (is_null($user))
        {
            if ($sControleur === 'auth' && ($sAction === 'login' || $sAction === 'index'))
            {
                return true;
            }
            else
            {
                $oDispatcher->forward (
                    [
                        'controller' => 'auth',
                        'action' => 'login',
                        'params' =>
                            [
                                'erreurs' => 'Pour accéder à la page '.$sControleur.'/'.$sAction.' vous devez être connecté.'
                            ]
                    ]
                );
                return false;
            }
        }
        else
        {
            if ($sControleur === 'users' && ($sAction === 'password' || $sAction === 'update') )
            {
                if ($user['role'] === 'admin')
                {
                    $this->view->loggedUser = $user['username'];
                    return true;
                }
                else
                {
                    $oDispatcher->forward(
                        [
                            'controller' => 'error',
                            'action' => 'code401',
                            'params' => 
                            [
                                'erreurs' => 'Non autorisé'
                            ]
                        ]
                    );
                    return false;
                }
            }
        }

        $this->view->loggedUser = $user['username'];
    }
}