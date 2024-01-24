<?php

namespace controllers;

use router\Router;

// Контроллер для авторизации и входа
class Auth
{
    public function signUp($postData, $files)
    {
        $username = $postData["username"];
        $login = $postData["login"];
        $email = $postData["email"];
        $password = hash("sha256", $postData["password"]);
        $passwordConfirm = hash("sha256", $postData["passwordConfirm"]);
        $avatar = $files["avatar"];
        // Сделать проверку на пустоту (валидировать)

        if ($password !== $passwordConfirm)
        {
            // redirect
            die();
        }

        $fileName = time() . "_" . $avatar["name"];
        $avatarsPath = "uploads/avatars/" . $fileName;

        if (move_uploaded_file($avatar["tmp_name"], $avatarsPath))
        {
            $users = \R::dispense('users');
            $users->user_name = $username;
            $users->user_login = $login;
            $users->user_email = $email;
            $users->user_password = $password;
            $users->user_avatar = $fileName;

            try
            {
                \R::store($users);
                Router::redirect("sign_in");
            }
            catch (\Exception $e)
            {
                echo $e->getMessage();
            }
        }
        else
        {
            Router::errorRedirect("500");
        }
    }
}