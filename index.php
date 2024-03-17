<?php

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/') {
    include_once __DIR__ . "/views/main.php";
} elseif ($uri === '/about') {
    include_once __DIR__ . "/views/about.php";
} else {
    include_once __DIR__ . "/views/404.php";
}