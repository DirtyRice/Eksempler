<?php


namespace controllers;


class Logout
{

    /**
     * Logout constructor.
     */
    public function __construct()
    {
        session_destroy();
        header('Location: /');
    }
}