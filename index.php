<?php

use src\restapi\Rest;

require_once __DIR__ . '/vendor/autoload.php';

set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($message, $severity, $severity, $file, $line);
});

$restApi = new Rest;
$restApi->makeRoute();

restore_error_handler();
