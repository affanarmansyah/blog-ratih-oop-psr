<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\CategoryModel;
use src\models\NewsModel;

session_start();

class NewsController extends DefaultController
{
    public function __construct()
    {
        parent::__construct();

        $this->template = "news/news-template";
    }

    public function index()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search = isset($_GET['cari_disini']) ? $_GET['cari_disini'] : '';
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $newsModel = new NewsModel;
        $listNews = $newsModel->listNews($page, $search, $limit);

        if (isset($_GET['id'])) {
            $berhasil = $newsModel->deleteNews($_GET['id']);
            if ($berhasil) {
                $this->redirect("news/index", ["berhasil" => "<b>Well done!</b> News Deleted"]);
                exit();
            } else {
                echo $berhasil;
                exit();
            }
        }
        return $this->render(
            'index',
            [
                'totalPages' => $listNews['totalPages'],
                'rows' => $listNews['rows'],
                'page' => $page,
                'limit' => $limit,
                'search' => $search,
            ]
        );
    }

    public function create()
    {
        $newsModel = new NewsModel;
        $categoryModel = new CategoryModel;
        $listcategory = $categoryModel->listCategory(1, "", 10);

        // proses addNews
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Add") {
                $berhasil = $newsModel->createNews($_POST, $_FILES);
                if ($berhasil) {
                    $this->redirect("news/index", ["berhasil" => "<b>Well done!</b> News Created"]);
                    exit();
                } else {
                    echo $berhasil;
                    exit();
                }
            }
        }
        return $this->render(
            'create',
            [
                'rows' => $listcategory['rows'],

            ]
        );
    }

    public function update()
    {
        $newsModel = new NewsModel;
        $categoryModel = new CategoryModel;
        $categoryModel->listCategory(1, "", 1000);

        $result = $newsModel->detailUpdateNews($_GET['id']);

        // proses updateNews
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Update") {
                $berhasil = $newsModel->updateNews($_POST, $_FILES);
                if ($berhasil) {
                    $this->redirect("news/index", ["berhasil" => "<b>Well done!</b> News Updated"]);
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
                'categories' => $categoryModel->getCategoryRows(),
                'result' => $result,
            ]
        );
    }

    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $newsModel = new NewsModel;
        $detail = $newsModel->detailUpdateNews($id);

        return $this->render(
            'detail',
            [
                'detail' => $detail,
            ]
        );
    }
}
