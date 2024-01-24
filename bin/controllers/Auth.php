<?php

namespace controllers;

use router\Router;

// Контроллер для авторизации и входа
class Auth
{
    public function signUp(array $postData, array $files): void
    {
        session_start();
        $username = urldecode(htmlspecialchars(trim($postData["username"])));
        $login = urldecode(htmlspecialchars(trim($postData["login"])));
        $email = urldecode(htmlspecialchars(trim($postData["email"])));
        $password = urldecode(htmlspecialchars(hash("sha256", trim($postData["password"]))));
        $passwordConfirm = urldecode(htmlspecialchars(hash("sha256", trim($postData["passwordConfirm"]))));
        $types = ["image/jpeg", "image/jpg", "image/png"];
        $avatar = $files["avatar"];
        $maxFileSize = 3; // Mb
        $avatarSize = $files["size"] / 1000000;

        $loginValid = \R::findOne("users", "user_login = ?", [$login]);
        $emailValid = \R::findOne("users", "user_email = ?", [$email]);

        if (empty($username) || empty($login) || empty($password) || empty($email) || empty($passwordConfirm))
        {
            $_SESSION["msg"] = "Fill all form fields";
            Router::redirect("/sign_up");
        }

        if ($loginValid || $emailValid)
        {
            $_SESSION["msg"] = "Login or e-mail are already registered";
            Router::redirect("/sign_up");
        }

        if (!in_array($avatar["type"], $types))
        {
            $_SESSION["msg"] = "Avatar must be in .jpg or .png format";
            Router::redirect("/sign_up");
        }

        if ($avatarSize > $maxFileSize)
        {
            $_SESSION["msg"] = "Avatar must be under 3 Mb size";
            Router::redirect("/sign_up");
        }

        if ($password !== $passwordConfirm)
        {
            $_SESSION["msg"] = "Password confirmation failed";
            Router::redirect("/sign_up");
        }

        if (!is_dir("uploads"))
        {
            mkdir("uploads", 0777, true);
        }

        if (!is_dir("uploads/avatars/$login"))
        {
            mkdir("uploads/avatars/$login", 0777, true);
        }

        $fileName = time() . "_" . $avatar["name"];
        $avatarsPath = "uploads/avatars/$login/" . $fileName;

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
        $email = urldecode(htmlspecialchars(trim($postData["email"])));
        $passwordHash = urldecode(htmlspecialchars(hash("sha256", trim($postData["password"]))));
        $user = \R::findOne("users", "user_email = ?", [$email]);

        if (!$user)
        {
            $_SESSION["msg"] = "User not found";
            Router::redirect("/sign_in");
        }

        if ($passwordHash === $user->user_password)
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