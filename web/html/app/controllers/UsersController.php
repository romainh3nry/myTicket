<?php

use Myticket\Models\Users;
use Myticket\Forms\UserUpdateForm;

class UsersController extends ControllerBase {

    public function updateAction($user_id)
    {
        $this->assets->addCss('css/users.css');
        $user = Users::findFirst(
            [
                "id = '{$user_id}'"
            ]
        );
        $this->tag->setTitle('Update '. $user->username);
        $form = new UserUpdateForm($user);
        $this->view->form = $form;
        $this->view->userName = $user->username;
        $this->view->userId = $user->id;
        $this->view->userPassword = $user->password;

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES))){
                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $role = $this->request->getPost('role');

                $user->username = $username;
                $user->email = $email;
                $user->role = $role;

                $user->save();
            }
            else {
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