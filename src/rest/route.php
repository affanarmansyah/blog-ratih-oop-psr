<?php

namespace src\rest;

use src\rest\v1\users\UserRoute;
use src\controllers\v1\NewsController;
use src\controllers\v1\UserController;

class Route
{
    public function route(UserController $userController, NewsController $newsController)
    {
        $this->userRouteV1($userController);
    }

    private function userRouteV1(UserController $controller)
    {
        $userRoute = new UserRoute;
        $userRoute->setPrefix("api");
        $userRoute->setVersion("v1");
        $userRoute->router($controller);
    }
}
