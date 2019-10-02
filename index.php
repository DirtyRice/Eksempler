<?php
session_start();

use controllers\CreateNewUser;
use controllers\DeleteUser;
use controllers\Logout;
use controllers\ViewFrontpage;
use controllers\ViewLoginPage;
use controllers\ViewUsers;

require_once('./app/autoloader.php');

if ($_GET['page'] == 'login') {
    new ViewLoginPage();
} elseif ($_GET['page'] == 'admin') {
    new ViewUsers();
} elseif ($_GET['page'] == 'deleteuser') {
    new DeleteUser();
} elseif ($_GET['page'] == 'createnewuser') {
    new CreateNewUser();
} elseif ($_GET['page'] == 'login') {
    new ViewLoginPage();
} elseif ($_GET['page'] == 'logout') {
    new Logout();
} else {
    new ViewFrontpage();
}

