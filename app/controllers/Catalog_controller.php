<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/Records_model.php';

use App\Models\Records_model;

class Catalog_controller
{
    private static string $view = __DIR__ . '/../views/pages/main.php';


    public static function getCatalog(): void
    {
        $records_model = new Records_model;
        $data = $records_model->getAll();

        require_once self::$view;
    }
}