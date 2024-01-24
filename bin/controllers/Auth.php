<?php

namespace controllers;

// Контроллер для авторизации и входа
class Auth
{
    public function signUp($postData, $files)
    {
        $username = $postData["username"];
        $login = $postData["login"];
        $email = $postData["email"];
        $password = $postData["password"];
        $passwordConfirm = $postData["passwordConfirm"];

        // Сделать проверку на пустоту (валидировать)


    }
}