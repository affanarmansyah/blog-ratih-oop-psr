<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\CategoryModel;

session_start();

class CategoryController extends DefaultController
{
    public function __construct()
    {
        parent::__construct();

        $this->template = "category/category-template";
    }
    public function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search = isset($_GET['cari_disini']) ? $_GET['cari_disini'] : '';
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 5;

        $categoryModel = new CategoryModel;
        $listcategory = $categoryModel->listCategory($page, $search, $limit);

        if (isset($_GET['id'])) {
            $berhasil = $categoryModel->deleteCategory($_GET['id']);
            if ($berhasil) {
                $this->redirect("category/index", ["berhasil" => "<b>Well done!</b> Category Deleted"]);
                exit();
            } else {
                echo $berhasil;
                exit();
            }
        }
        return $this->render(
            'index',
            [
                'totalPages' => $listcategory['totalPages'],
                'rows' => $listcategory['rows'],
                'page' => $page,
                'limit' => $limit,
                'search' => $search,
            ]
        );
    }

    public function create()
    {
        $this->template = "category/create-template";

        $categoryModel = new CategoryModel;
        // proses addNews
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "save") {
                $berhasil = $categoryModel->createCategory($_POST);
                if ($berhasil) {
                    $this->redirect("category/index", ["berhasil" => "<b>Well done!</b> Category Created"]);

                    exit();
                } else {
                    echo $berhasil;
                    exit();
                }
            }
        }
        return $this->render(
            'create',
            []
        );
    }

    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $categoryModel = new CategoryModel;
        $detail = $categoryModel->detailUpdateCategory($id);

        return $this->render(
            'detail',
            [
                'detail' => $detail,

            ]
        );
    }

    public function update()
    {
        $this->template = "category/update-template";

        $categoryModel = new CategoryModel;
        $result = $categoryModel->detailUpdateCategory(isset($_GET['id']) ? $_GET['id'] : '');

        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Update") {
                $berhasil = $categoryModel->updateCategory($_POST);
                if ($berhasil) {
                    $this->redirect("category/index", ["berhasil" => "<b>Well done!</b> Category Updated"]);

                    exit();
                } else {
                    echo $berhasil;
                    exit();
                }
            }
        }
        return $this->render(
            'update',
            [
                'result' => $result,

            ]
        );
    }
}
