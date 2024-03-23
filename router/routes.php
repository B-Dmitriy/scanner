<?php

require_once 'app/services/Router.php';

use App\services\Router;

Router::page('/', 'views/pages/main.php');
Router::page('/about', 'views/pages/about.php');
Router::page('/admin', 'views/pages/admin.php');
Router::page('/card', 'views/pages/card.php');

Router::enable();