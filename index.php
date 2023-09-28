<?php

use src\controllers\NewsController;
use src\controllers\UserController;

require_once __DIR__ . '/vendor/autoload.php';

$requestUrls = explode('/', $_SERVER['REQUEST_URI']);

if ($requestUrls === '/') {
} elseif ($requestUrls[2] === 'users') {
    $userController = new UserController;
    if ($requestUrls[3] === 'index') {
        echo $userController->pageLogin($_POST);
    }
} elseif ($requestUrls[2] === 'news') {
    $newsController = new NewsController;
    if ($requestUrls[3] === 'index') {
        echo $newsController->index();
    } elseif ($requestUrls[3] === 'create') {
        echo $newsController->create();
    }
} else {
    http_response_code(404);
    echo "Halaman tidak ditemukan";
}
