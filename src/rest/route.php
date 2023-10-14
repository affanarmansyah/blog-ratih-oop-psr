<?php

namespace src\rest;

use src\rest\v1\users\UserRoute;
use src\v1\controllers\NewsController;
use src\v1\controllers\UserController;

class Routes
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
