<?php

namespace src\controllers\v1; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\services\UserModel;


class UserController extends DefaultController
{
    public function login()
    {
        http_response_code(200);

        echo json_encode(["message" => "success"]);
    }
}
