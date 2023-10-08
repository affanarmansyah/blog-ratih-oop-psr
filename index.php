<?php

use src\controllers\CategoryController;
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
    } elseif ($actionExplode[0] === 'register') {
        echo $userController->register();
    } elseif ($actionExplode[0] === 'detail') {
        echo $userController->detail();
    } elseif ($actionExplode[0] === 'update') {
        echo $userController->update();
    } elseif ($actionExplode[0] === 'profile') {
        echo $userController->profile();
    } elseif ($actionExplode[0] === 'logout') {
        echo $userController->logout();
    }
} elseif ($requestUrls[2] === 'news') {
    $newsController = new NewsController;
    $actionExplode = explode('?', $requestUrls[3]);
    if ($actionExplode[0] === 'index') {
        echo $newsController->index();
    } elseif ($actionExplode[0] === 'create') {
        echo $newsController->create();
    } elseif ($actionExplode[0] === 'update') {
        echo $newsController->update();
    } elseif ($actionExplode[0] === 'detail') {
        echo $newsController->detail();
    }
} elseif ($requestUrls[2] === 'category') {
    $categoryController = new CategoryController;
    $actionExplode = explode('?', $requestUrls[3]);
    if ($actionExplode[0] === 'index') {
        echo $categoryController->index();
    } elseif ($actionExplode[0] === 'create') {
        echo $categoryController->create();
    } elseif ($actionExplode[0] === 'update') {
        echo $categoryController->update();
    } elseif ($actionExplode[0] === 'detail') {
        echo $categoryController->detail();
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
