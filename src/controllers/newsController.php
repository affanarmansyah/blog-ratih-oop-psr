<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use CURLFile;
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
        $keyword = isset($_GET['cari_disini']) ? $_GET['cari_disini'] : '';
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

        // api get news list
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/www.test-api.com/api/v1/news/list?page=$page&limit=$limit&keyword=$keyword");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $responseApi = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $this->render(
            'index',
            [
                'totalPages' => $responseApi['totalPages'],
                'rows' => $responseApi['data'],
                'page' => $page,
                'limit' => $limit,
                'keyword' => $keyword,
            ]
        );
    }

    public function create()
    {
        $this->template = "news/create-template";

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
        $this->template = "news/update-template";

        $newsModel = new NewsModel;
        $categoryModel = new CategoryModel;
        $listcategory = $categoryModel->listCategory(1, "", 10);


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
                'rows' => $listcategory['rows'],
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

    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        // api delete news list
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/www.test-api.com/api/v1/news/delete?id=' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        if ($response) {
            $this->redirect("news/index", ["berhasil" => "<b>Well done!</b> News Deleted"]);
        }
    }
}
