<?php

namespace src\controllers\v1; // Ubah namespace menjadi src\controllers

use Exception;
use src\controllers\component\DefaultController;
use src\models\NewsModel;
use Throwable;

class NewsController extends DefaultController
{
    public function list()
    {
        $model = new NewsModel();

        // secara default ketika tidak ada filter 
        $newsData = $model->list(1, "", 10);

        // ketika ada filter yang di request
        if (!empty($_GET)) {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

            $newsData = $model->list($page, $keyword, $limit);
        }

        return $newsData;
    }

    public function detail()
    {
        return ["message" => "detail"];
    }

    public function create()
    {
        try {
            $model = new NewsModel();
            if (!empty($_POST)) {
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $image_name = $_FILES['image']['name'];
                    $image_tmp_name = $_FILES['image']['tmp_name'];
                    $upload_directory =  './assets/images/news/';
                    $image_path = $upload_directory . $image_name;

                    move_uploaded_file($image_tmp_name, $image_path);
                }

                $data = [
                    "title" => $_POST['title'],
                    "image" => $image_name,
                    "description" => $_POST['description'],
                    "status" => $_POST['status'],
                    "categoryId" => $_POST['categoryId'],
                ];

                $model->createNews($data);
            }
        } catch (Exception $e) {
            http_response_code(400);
            return ["message" => $e->getMessage()];
        }

        return ["message" => "Success create news"];
    }

    public function edit()
    {
        return ["message" => "edit"];
    }

    public function delete()
    {
        try {
            $model = new NewsModel();
            if (!empty($_GET)) {
                $model->deleteNews($_GET['id']);
            }
        } catch (Exception $e) {
            http_response_code(400);
            return ["message" => $e->getMessage()];
        }

        return ["message" => "Success delete news"];
    }
}
