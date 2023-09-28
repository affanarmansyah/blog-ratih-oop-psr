<?php

use src\controllers\NewsController;
use src\controllers\UserController;

require_once __DIR__ . '/vendor/autoload.php';

$requestUrls = explode('/', $_SERVER['REQUEST_URI']);

if ($requestUrls[2] === '') {
    header("Location: ./users/login");
} elseif ($requestUrls[2] === 'users') {
    $userController = new UserController;

    $actionExplode = explode('?', $requestUrls[3]);
    if ($actionExplode[0] === 'login') {
        echo $userController->login();
    }
} elseif ($requestUrls[2] === 'news') {
    $newsController = new NewsController;
    $actionExplode = explode('?', $requestUrls[3]);
    if ($actionExplode[0] === 'index') {
        echo $newsController->index();
    } elseif ($actionExplode[0] === 'create') {
        echo $newsController->create();
    }
} else {
    http_response_code(404);

    echo "Halaman tidak ditemukan";
}

function explodeUrl($string, $delimeter, $index)
{
    $value = explode($delimeter, $string);
    return $value[$index];
}
