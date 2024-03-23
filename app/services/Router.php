<?php
namespace App\services;

class Router
{
    private static $list = [];

    public static function page($uri, $page_name)
    {
        self::$list[] = [
          "uri" => $uri,
          "page_name" => $page_name,
        ];
    }

    public static function enable()
    {
        $query = $_SERVER['REQUEST_URI'];

        foreach (self::$list as $route) {
            if ($route['uri'] === $query) {
                require_once $route['page_name'];
                die();
            }
        }

        require_once "views/pages/404.php";
        die();
    }
}