<?php 
namespace app\database;

use PDOException;
use PDO;

abstract class Base_Repository{
    protected $pdo;

    public function __construct()
        {
            $dsn= "mysql:host=" . DB_HOST . ";dbname=". DB_NAME. ";charset=utf8";
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
}