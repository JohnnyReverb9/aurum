<?php

namespace db;

// Класс для управления таблицей users
class ManagementUsers extends ManagementDB
{
    private string $table = "dogs_docs.users";

    public function query($sql)
    {
        $this->dbConnect();

    }
}