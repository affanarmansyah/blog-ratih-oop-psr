<?php

namespace src\controllers; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\NewsModel;

class NewsController extends DefaultController
{
    public function index()
    {
        $newsModel = new NewsModel;
        $listNews = $newsModel->listNews(1, "", 10000);

        return $this->render(
            'index',
            [
                'rows' => $listNews['rows'],
                'totalPages' => $listNews['totalPages'],
            ]
        );
    }
    public function create()
    {
        return "create";
    }
}
