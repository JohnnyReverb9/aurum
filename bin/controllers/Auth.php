<?php

namespace controllers;

use router\Router;

// Контроллер для авторизации и входа
class Auth
{
    public function signUp(array $postData, array $files): void
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
            $_SESSION["msg"] = "Password confirmation failed";
            Router::redirect("/sign_up");
        }

        $fileName = time() . "_" . $avatar["name"];
        $avatarsPath = "uploads/avatars/" . $fileName;

        if (move_uploaded_file($avatar["tmp_name"], $avatarsPath)) // TODO: без аватарки не работает
        {
            $users = \R::dispense('users');
            $users->user_name = $username;
            $users->user_login = $login;
            $users->user_email = $email;
            $users->user_password = $password;
            $users->user_avatar = "/" . $avatarsPath;

            try
            {
                \R::store($users);
                Router::redirect("/sign_in");
            }
            catch (\Exception $e)
            {
                $_SESSION["msg"] = $e->getMessage();
            }
        }
        else
        {
            Router::errorRedirect("500");
        }
    }

    public function signIn($postData): void
    {
        session_start();
        $email = $postData["email"];
        $password = hash("sha256", $postData["password"]);
        $user = \R::findOne("users", "user_email = ?", [$email]);

        if (!$user)
        {
            $_SESSION["msg"] = "User not found";
            Router::redirect("/sign_in");
        }

        if ($password === $user->user_password)
        {
            $_SESSION["user"] = [
                "id" => $user->id,
                "user_name" => $user->user_name,
                "user_login" => $user->user_login,
                "user_email" => $user->user_email
            ];
            $_SESSION["group"] = $user->group; //TODO: сделать группу пользователей

            Router::redirect("/home");
        }
        else
        {
            $_SESSION["msg"] = "Invalid login or password";
            Router::redirect("/sign_in");
        }
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        \router\Router::redirect("/main");
    }
}