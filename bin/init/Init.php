<?php

namespace init;

use db\ManagementDB;

// Класс для подключения
class Init
{
    public static function start(): void
    {
        self::libs();
        ManagementDB::dbConnect();
    }

    private static function libs(): void
    {
        $conf = require_once "bin/config/conf.php";

        foreach ($conf["libs"] as $lib)
        {
            echo __DIR__;
            require_once "libs/" . $lib . ".php";
        }
    }
}