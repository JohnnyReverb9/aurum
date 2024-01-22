<?php

namespace db;

// Базовый класс для управления БД с начальными переменными для подключения
abstract class ManagementDB
{
    private string $username = "root";
    private string $password = "";
    private string $hostname = "localhost";
    private string $database = "dogs_docs";
    private int $port = 3306;

    protected function dbConnect(): \mysqli|bool
    {
        $connect = mysqli_connect($this->hostname, $this->username, $this->password, $this->database, $this->port);

        if (!$connect)
        {
            die("ERROR: Something went wrong");
        }

        return $connect;
    }

    public function query($sql)
    {
        $connect = $this->dbConnect();
        return $connect->query($sql);
    }
}