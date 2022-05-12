<?php

use Myticket\Models\Users;

class UsersController extends ControllerBase {
    
    public function updateAction($user_id)
    {
        $user = Users::findFirst(
            [
                "id = '{$user_id}'"
            ]
        );
        # $this->logger->debug($user->email);
    }

}