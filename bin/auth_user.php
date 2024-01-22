<?php

require_once __DIR__ . "/../vendor/autoload.php";

$users = new \db\ManagementUsers();

$users->query("select * from users;");