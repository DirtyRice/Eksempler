<?php

namespace controllers;

use models\Users;

class ViewUsers
{
    public $users;

    /**
     * ViewUsers constructor.
     * @param $name
     */
    public function __construct()
    {
        if ($_SESSION['loggedin']) {
            $this->users = new Users();
            include("./app/views/adminpage.php");
        } else {
            header('Location: /');
        }

    }


}