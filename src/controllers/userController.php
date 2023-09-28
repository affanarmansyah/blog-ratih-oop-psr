<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\UserModel;


class UserController extends DefaultController
{
    public function pageLogin($login)
    {
        $userModel = new UserModel;
        $login = $userModel->login("", "");

        if (isset($login['email']) && isset($login['password'])) {
            // panggil class model user
            $userModel = new UserModel;

            $email = $login['email'];
            $password = md5($login['password']);

            if (empty($email)) {
                header("Location: ../src/views/users/index.php?error=Email is required");
                exit();
            } else if (empty($password)) {
                header("Location: ../src/views/users/index.php?error=Password is required");
                exit();
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
                        header("location: ../dashboard.php");
                        exit();
                    }
                } else {
                    header("location: ../src/views/users/index.php?error=Email atau password anda salah, coba kembali.");
                    exit();
                }
            }
        } else {
            header("Location: ../src/views/users/index.php");
            exit();
        }
        return $this->render(
            'index',
            [
                "success" => $login['success'],
                "row" => $login['row'],
            ]
        );
    }
}
