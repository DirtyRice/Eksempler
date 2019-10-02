<?php


namespace models;

use Exception;
use PDO;


class dataBaseConnection
{

    /**
     * dataBaseConnection constructor.
     */

    private $pdo = null;
    private $stmt = null;

    function __construct()
    {

        include('./app/config/settings.php');

        try {
            $this->pdo = new PDO(
                'mysql:host=localhost;dbname=' . $databaseSettings['name'] . ';charset=utf8',
                $databaseSettings['name'], $databaseSettings['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    function select($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }

    function insert($sql, $cond)
    {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
    }

    function update($sql, $cond)
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($cond);
        $this->stmt = null;
    }

    function delete($sql, $cond)
    {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
    }
}