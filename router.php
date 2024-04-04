<?php

require_once './vendor/autoload.php';
require_once './app/controllers/Catalog_controller.php';

use App\Controllers\Catalog_controller;

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/',  [Catalog_controller::class, 'getCatalog']);
    // {id} must be a number (\d+)
    // $r->addRoute('GET', '/user/{id:\d+}', []);
    // The /{title} suffix is optional
    // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Получить метод, query и URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
// Удалить строку запроса (?foo=bar) и декодировать URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// TODO: Как прокидывать?
// Парсим query
parse_str($query, $query);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
         include_once './app/views/pages/404.php';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        call_user_func_array($handler, $vars);
        break;
}