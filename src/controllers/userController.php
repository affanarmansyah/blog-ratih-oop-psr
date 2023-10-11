<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\UserModel;

session_start();

class UserController extends DefaultController
{
    public function __construct()
    {
        parent::__construct();

        $this->template = "users/user-template";
    }
    public function login()
    {
        $this->template = "users/login-template";
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // panggil class model user
            $userModel = new UserModel;

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email)) {
                $this->redirect("users/login", ["error" => "Email is required"]);
            } else if (empty($password)) {
                $this->redirect("users/login", ["error" => "Password is required"]);
            } else {
                $password = md5($password);

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
                    $this->redirect("users/login", ["error" => "Email atau password anda salah, coba kembali"]);
                }
            }
        }

        return $this->render(
            'login',
            []
        );
    }

    public function register()
    {
        $this->template = "users/register-template";

        $register = new UserModel;

        if (isset($_POST['create-user'])) {
            if ($_POST['create-user'] == "Create") {
                $register->create($_POST);
            }

            $feedback = $register->getUser();
            $feedbackErrors = $register->getErrors();

            if ($feedback['success']) {
                $this->redirect("users/register", ["success" => $feedback['message']]);
                exit();
            } else {
                $errorData = implode("<br>", $feedbackErrors['errors']);
                $this->redirect("users/register", ["error" => "$errorData", "email" => $feedbackErrors['email']]);
                exit();
            }
        }

        return $this->render(
            'register',
            []
        );
    }


    public function detail()
    {
        $detail = new UserModel;

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $result = $detail->detailProfile($id);

        return $this->render(
            'detail',
            [
                'result' => $result,
            ]
        );
    }

    public function update()
    {
        $this->template = "users/update-template";

        $update = new UserModel;

        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Save") {
                // untuk update
                $update->updateProfile($_POST, $_FILES);
            }

            $feedback = $update->getUser();
            $feedbackErrors = $update->getErrors();

            if ($feedback['success']) {
                // update session ketika berhasil update
                $_SESSION['email'] = $_POST['email'] ? $_POST['email'] : $_SESSION['email'];
                $_SESSION['name'] = $_POST['name'] ? $_POST['name'] : $_SESSION['name'];
                $_SESSION['photo'] = $_FILES['photo'] ? $_FILES['photo']['name'] : $_SESSION['photo'];
                $_SESSION['updated_at'] = $_POST['updated_at'] ? $_POST['updated_at'] : $_SESSION['updated_at'];

                $this->redirect("users/update", ["success" => $feedback['message']]);

                exit();
            } else {
                // Jika terdapat error, redirect ke halaman create-account.php dengan parameter error.
                $errorData = implode("<br>", $feedbackErrors['errors']);
                $this->redirect("users/update", ["error" => "$errorData"]);
                exit();
            }
        }
        return $this->render(
            'update',
            []
        );
    }

    public function logout()
    {
        session_start();

        session_unset();
        session_destroy();

        $this->redirect("users/login");
    }

    public function profile()
    {
        return $this->render(
            'profile',
            []
        );
    }
}
