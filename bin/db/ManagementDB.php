<?php

namespace db;

// Базовый класс для управления БД с начальными переменными для подключения
class ManagementDB
{
    public static function dbConnect(): void
    {
        $conf = require_once "bin/config/conf_db.php";

        if ($conf["enable"])
        {
            \R::setup("mysql:host=" . $conf["hostname"] . ";dbname=" . $conf["database"], $conf["username"], $conf["password"]);

            if (!\R::testConnection())
            {
                die("ERROR: DB connect");
            }
        }
    }
}