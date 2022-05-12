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
        # $this->logger->debug($user->email);
    }
}