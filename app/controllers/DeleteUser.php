<?php


namespace controllers;


use models\User;

class DeleteUser
{

    /**
     * DeleteUser constructor.
     */
    public function __construct()
    {
        if (isset($_POST['id'])) {
            $user = new User($_POST['id']);
            $user->deleteUser();
            header('Location: /?page=admin');
        }
    }
}