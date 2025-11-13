<?php 

namespace app\data;

use PDO;

abstract class BaseData{
    protected $pdo;
    
    public function __construct()
        {
            $dns = "mysql:host=".DB_HOST . ";dbname=".DB_NAME . ";charset=utf8";
            $this->pdo = new PDO($dns, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
}