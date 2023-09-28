<?php

namespace src\models;

use src\config\mysql\MysqlConnection;

class UserModel
{
    private $mysqlConnection;

    public function __construct()
    {
        $mysqlConnection = new MysqlConnection;
        $this->mysqlConnection = $mysqlConnection->connection;
    }

    public function login($email, $password)
    {
        $sql = "Select * FROM table_users where email='$email' AND password='$password'";
        $result = mysqli_query($this->mysqlConnection, $sql);

        return [
            'success' => mysqli_num_rows($result),
            'row' => mysqli_fetch_assoc($result)
        ];
    }
}
