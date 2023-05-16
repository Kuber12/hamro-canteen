<?php

class DataBase
{
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "password";
    private static $dbname = "crud";
    private static $conn = null;

    public function connect()
    {
        $this->conn = new mysqli_connect(
            DataBase::$host,
            DataBase::$user,
            DataBase::$pass,
            DataBase::$dbname
        );
        if ($this->conn != null) {
            return $this->conn;
        }
    }

    public function insert($conn, $table_name, $item_arr)
    {
        $sql = "INSERT INTO users (id, name, phone, address)
          VALUES ('', 'Doe', 'john@example.com')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "error while inserting";
        }


    }
}