<?php


namespace controllers;


use models\User;

class ViewLoginPage
{

    /**
     * ViewLoginPage constructor.
     */
    public function __construct()
    {
        if (!empty($_POST['username']) AND !empty($_POST['password'])) {
            $this->doLogin();
        } else {
            include("./app/views/loginpage.php");
        }
    }

    function doLogin()
    {
        $user = new User();
        if ($user->findUser($_POST['username'])) {
            if (password_verify($_POST['password'], $user->getPassword())) {
                $_SESSION['username'] = $user->getUsername();
                header('Location: /');
            } else {
                header('Location: /?page=login');
            }
        }
    }
}