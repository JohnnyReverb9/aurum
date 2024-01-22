<?php

//require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/db/ManagementDB.php";
require_once __DIR__ . "/db/ManagementUsers.php";

$users = new \db\ManagementUsers();

$users->query("select * from users;");