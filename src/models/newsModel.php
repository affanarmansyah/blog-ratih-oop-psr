<?php

namespace src\models;

use src\config\MysqlConnection;

class NewsModel
{
    private $mysqlConnection;

    public function __construct()
    {
        $mysqlConnection = new MysqlConnection;
        $this->mysqlConnection = $mysqlConnection->connection;
    }

    public function list(int $page, string $cari, int $limit = 10)
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
            'data' => $row,
            'totalPages' => $total_pages,
        ];
    }

    public function createNews($data)
    {
        $query = "INSERT INTO table_news (title,image,description,status,category_id) VALUES ('" . $data['title'] . "','" . $data['image'] . "','" . $data['description'] . "','" . $data['status'] . "','" . $data['categoryId'] . "')";
        mysqli_query($this->mysqlConnection, $query);
        mysqli_close($this->mysqlConnection);

        return true;
    }

    public function deleteNews($id)
    {
        mysqli_query($this->mysqlConnection, "DELETE from table_news WHERE id='$id'");
        return true;
    }
}
