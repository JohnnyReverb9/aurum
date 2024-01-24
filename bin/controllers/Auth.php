<?php

namespace controllers;

use router\Router;

// Контроллер для авторизации и входа
class Auth
{
    public function signUp($postData, $files = null)
    {
        $username = $postData["username"];
        $login = $postData["login"];
        $email = $postData["email"];
        $password = $postData["password"];
        $passwordConfirm = $postData["passwordConfirm"];
        $avatar = $files["avatar"];
        // Сделать проверку на пустоту (валидировать)

        $fileName = time() . "_" . $avatar["name"];

        if (move_uploaded_file($avatar["tmp_name"], "uploads/avatars" . $fileName))
        {

        }
        else
        {
            Router::errorRedirect("500");
        }
    }
}