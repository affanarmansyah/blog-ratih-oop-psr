<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\UserModel;


class UserController extends DefaultController
{
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // panggil class model user
            $userModel = new UserModel;

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            if (empty($email)) {
                $this->redirect("user/login", ["error" => "Email is required"]);
            } else if (empty($password)) {
                $this->redirect("user/login", ["error" => "Password is required"]);
            } else {
                $login = $userModel->login($email, $password);

                if ($login['success'] === 1) {
                    $row = $login['row'];
                    if ($row['email'] === $email && $row['password'] === $password) {
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['photo'] = $row['photo'];
                        $_SESSION['created_at'] = $row['created_at'];
                        $_SESSION['updated_at'] = $row['updated_at'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['logged_in'] = true;
                        if (empty($row['name'])) {
                            echo "email: " . $row['email'];
                        } else {
                            echo "name: " . $row['name'];
                        }

                        $this->redirect("news/index");
                    }
                } else {
                    $this->redirect("user/login", ["error" => "Email atau password anda salah, coba kembali"]);
                }
            }
        }

        return $this->render(
            'login',
            [
                'err' => "sdfsdf"
            ]
        );
    }
}
