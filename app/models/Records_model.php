<?php
namespace App\Models;

use PDO;

class Records_model
{
    public static function getAll()
    {
        try {   
            $pdo = new PDO("mysql:host=localhost;dbname=records_shop", 'root', 'zion1101');
        
            $queryString = $pdo->query("SELECT * FROM records;");
        
            $data = $queryString->fetchAll();

            return $data;
        } catch (PDOException $e) {
            // TODO: переработать обработку ошибок
            echo "Невозможно установить соединение с базой данных";
        }
    }
}