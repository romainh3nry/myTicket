<?php

use Myticket\Models\Users;
use Myticket\Forms\UserUpdateForm;

class UsersController extends ControllerBase {
    
    public function updateAction($user_id)
    {
        $user = Users::findFirst(
            [
                "id = '{$user_id}'"
            ]
        );
        $this->tag->setTitle('Update '. $user->username);
        $form = new UserUpdateForm($user);
        $this->view->form = $form;
        # $this->logger->debug($user->email);
    }
}