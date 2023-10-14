<?php

namespace src\rest\v1\users;

use src\utilities\Route;
use src\v1\controllers\UserController;

class UserRoute extends Route
{
    public function router(UserController $controller)
    {
        $this->GET('/users/login', $controller->login());
    }
}
