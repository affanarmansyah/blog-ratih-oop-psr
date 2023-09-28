<?php

namespace src\models;

use src\config\mysql\MysqlConnection;

class NewsModel
{
    private $mysqlConnection;
    private array $newsRows;
    private int $newsTotalPages;

    public function __construct()
    {
        $mysqlConnection = new MysqlConnection;
        $this->mysqlConnection = $mysqlConnection->connection;
    }

    private function setNewsRows(array $row)
    {
        $this->newsRows = $row;
    }

    public function getNewsRows()
    {
        return $this->newsRows;
    }

    private function setNewsTotalPages(int $totalPages)
    {
        $this->newsTotalPages = $totalPages;
    }

    public function getNewsTotalPages()
    {
        return $this->newsTotalPages;
    }

    public function listNews(int $page, string $cari, int $limit = 10)
    {
        $offset = ($page - 1) * $limit; // Offset data
        $total_pages = ceil(mysqli_num_rows(mysqli_query($this->mysqlConnection, "SELECT * FROM table_news")) / $limit);

        $query = "SELECT * FROM table_news order by id DESC LIMIT $limit OFFSET $offset";
        if (isset($cari)) {
            $cari_disini = $cari;
            $query = "SELECT * FROM table_news where title LIKE '%" . $cari_disini . "%' OR status LIKE '%" . $cari_disini . "%' OR created_at LIKE '%" . $cari_disini . "%'  order by id DESC LIMIT $limit OFFSET $offset";
            $total_pages = ceil(mysqli_num_rows(mysqli_query($this->mysqlConnection, "SELECT * FROM table_news where title LIKE '%" . $cari_disini . "%' OR status LIKE '%" . $cari_disini . "%' OR created_at LIKE '%" . $cari_disini . "%'")) / $limit);
        }

        $result = mysqli_query($this->mysqlConnection, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return [
            'rows' => $row,
            'totalPages' => $total_pages,
        ];
    }

    public function detailUpdateNews(int $id)
    {
        $id = isset($id) ? $id : '';

        $query = "SELECT table_news.*, table_category.name as category FROM table_news 
                  join table_category on table_news.category_id = table_category.id WHERE table_news.id = '$id';";

        $sql = mysqli_query($this->mysqlConnection, $query);

        $result = mysqli_fetch_assoc($sql);

        return $result;
    }

    public function updateNews($data, $files)
    {
        $id = $data['id'];
        $title = $data['title'];
        $image = $files['image'];
        $description = $data['description'];
        $status = $data['status'];
        $category_id = $data['category_id'];

        if (isset($image) && $image['error'] == UPLOAD_ERR_OK) {
            $image_name = $image['name'];
            $image_tmp_name = $image['tmp_name'];
            // $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

            // Tentukan lokasi folder untuk menyimpan foto
            $upload_directory = "../assets/img/";
            $image_path = $upload_directory . $image_name; // ../assets/img/email.png

            // Pindahkan foto ke folder upload
            move_uploaded_file($image_tmp_name, $image_path);
        } else {
            // Gunakan gambar lama jika tidak ada gambar baru
            $query = "SELECT * FROM table_news WHERE id='$id'";
            $result = mysqli_query($this->mysqlConnection, $query);
            $row = mysqli_fetch_assoc($result);
            $image_name = $row['image'];
        }

        $query = "UPDATE table_news SET title='$title', image='$image_name', description='$description', status='$status',updated_at=NOW(),category_id='$category_id' WHERE id='$id'";
        $result = mysqli_query($this->mysqlConnection, $query);
        mysqli_close($this->mysqlConnection);

        return $result;
    }

    // function create-news.php
    public function createNews($data, $files)
    {

        $title = $data['title'];
        $image = $files['image'];
        $description = $data['description'];
        $status = $data['status'];
        $category_id = $data['category'];

        if (isset($image) && $image['error'] == UPLOAD_ERR_OK) {
            $image_name = $image['name'];
            $image_tmp_name = $image['tmp_name'];
            // $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $upload_directory = "/assets/img/";
            $image_path = $upload_directory . $image_name;

            move_uploaded_file($image_tmp_name, $image_path);
        }
        $query = "INSERT INTO table_news (title,image,description,status,category_id) VALUES ('$title','$image_name','$description','$status','$category_id')";
        mysqli_query($this->mysqlConnection, $query);
        mysqli_close($this->mysqlConnection);

        return true;
    }

    // function Delete news
    public function deleteNews($id)
    {
        mysqli_query($this->mysqlConnection, "DELETE from table_news WHERE id='$id'");
        return true;
    }
}
