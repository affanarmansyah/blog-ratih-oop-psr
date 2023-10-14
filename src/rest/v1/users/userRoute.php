<?php

namespace src\rest\v1\users;

use src\utilities\Route;
use src\controllers\v1\UserController;

class UserRoute extends Route
{
    public function router(UserController $controller)
    {
        $this->GET('/users/login', [$controller, 'login']);
    }
}
