<?php

namespace models;

class Users
{
    public $users;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->get();
    }


    function get()
    {
        $connect = new dataBaseConnection();
        $users = $connect->select("SELECT * FROM `users`");
        if (sizeof($users) != 0) {
            foreach ($users as $user) {
                $this->users[$user['id']] = new User($user['id']);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
    }

}
