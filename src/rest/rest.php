<?php

namespace src\rest;

use src\v1\controllers\NewsController;
use src\v1\controllers\UserController;

class Rest
{
    public function makeRoute()
    {
        $routes = new Routes;
        $routes->route(new UserController, new NewsController);
    }
}
