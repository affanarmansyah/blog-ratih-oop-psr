<?php

// use src\rest\Rest;

use src\v1\controllers\UserController;

require_once __DIR__ . '/vendor/autoload.php';

$user = new UserController;
$user->login();

// $restApi = new Rest;
// $restApi->makeRoute();
