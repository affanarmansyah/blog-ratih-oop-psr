<?php

namespace src\rest;

use src\controllers\v1\NewsController;
use src\controllers\v1\UserController;

class Rest
{
    public function makeRoute()
    {
        $routes = new Route;
        $routes->route(new UserController, new NewsController);
    }
}
