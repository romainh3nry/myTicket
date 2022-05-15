<?php

namespace Myticket\Plugins;

use Phalcon\Mvc\User\Plugin;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;


class SecurityPlugin extends Plugin
{
    public function getAcl()
    {
        $oAcl = null;

        if (true === $this->session->has('acl'))
        {
            $oAcl = unserialize($this->session->get('acl'));
        }
        else
        {
            $this->logger->debug('Start creating role...');
            $oAcl = new Memory();

            $oAcl->setDefaultAction(
                Acl::DENY
            );

            $aRoles = [
                'admin' => new Role('admin'),
                'user' => new Role('user')
            ];

            foreach($aRoles as $oRole)
            {
                $oAcl->addRole($oRole);
            }

            $aActionParRole = [
                'admin' => [
                    'users' => ['*'],
                ],
                '*' => [
                    'index' => ['*'],
                    'error' => ['*'],
                    'auth' => ['*'],
                    'account' => ['*'],
                    'api' => ['*']
                ]
            ];
            foreach($aActionParRole as $sRole => $aRole)
            {
                foreach($aRole as $sControleur => $aActions)
                {
                    $oRessourceControleur = new Resource($sControleur);
                    foreach($aActions as $aAction)
                    {
                        $oAcl->addResource($oRessourceControleur, $aAction);
                        $oAcl->allow($sRole, $sControleur, $aAction);
                    }
                }
            }

            $this->session->set('acl', serialize($oAcl));
        }
        return $oAcl;
    }

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

        $sNomRole = $user['role'];
        $oAcl = $this->getAcl();
        $bAutorise = $oAcl->isAllowed($sNomRole, $sControleur, $sAction);
        
        if (!$bAutorise)
        {
            $oDispatcher->forward(
                [
                    'controller' => 'error',
                    'action' => 'code401'
                ]
            );
            return false;
        }

        $this->view->loggedUser = $user['username'];
    }
}