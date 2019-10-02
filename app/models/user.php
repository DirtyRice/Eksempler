<?php

namespace models;

class User extends dataBaseConnection
{
    public $id;
    public $username;
    public $password;

    /**
     * User constructor.
     * @param $id
     */
    public function __construct($id = "")
    {
        parent::__construct();
        if (is_numeric($id)) {
            $this->selectUser($id);
        }
    }

    function findUser($username)
    {
        $user = $this->select('SELECT id,name,password FROM `users` WHERE name="' . $username . '"');
        if (@sizeof($user) == 1) {
            $this->setPassword($user[0]['password']);
            $this->setUsername($user[0]['name']);
            return true;
        } else {
            return false;
        }
    }

    function selectUser($id)
    {
        $user = $this->select('SELECT id,name,password FROM `users` WHERE id=' . $id);
        if (@sizeof($user) == 1) {
            $this->setUsername($user[0]['name']);
            $this->setPassword($user[0]['password']);
            $this->setId($user[0]['id']);
        }
    }

    function insertUser()
    {
        $this->insert("INSERT INTO users (name, password) VALUES (?, ?)", [$this->getUsername(), $this->getPassword()]);
    }

    function updateUser()
    {
        $this->update("UPDATE users SET password = ? WHERE id = ?", [$this->getPassword(), $this->getId()]);
    }

    function deleteUser()
    {
        $this->delete("DELETE FROM users WHERE id = ?", [$this->getId()]);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

}