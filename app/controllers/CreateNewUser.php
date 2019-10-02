<?php


namespace controllers;


use models\User;

class CreateNewUser
{

    /**
     * CreateNewUser constructor.
     */
    public function __construct()
    {
        if (isset($_POST['username']) AND isset($_POST['password'])) {
            $this->insertUser();
        } else {
            $this->viewCreatePage();
        }
    }

    function insertUser()
    {
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $user->insertUser();
        header('Location: /');
    }

    function viewCreatePage()
    {
        include("./app/views/createnewuser.php");
    }
}