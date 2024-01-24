<?php
session_start();

// Страница регистрации
use selector\PagePartSelector;
PagePartSelector::$titleName = "Aurum | Sign up";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

if (isset($_SESSION["user"]))
{
    \router\Router::redirect("/home");
}

?>
<div class="container">
    <h2>Sign up</h2>
    <form action="/auth/sign_up" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" value=<?= $_POST["username"] ?? "" ?>>
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Enter your login" value=<?= isset($_POST["login"]) ?? "" ?>>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your e-mail" value=<?= isset($_POST["email"]) ?? "" ?>>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">User avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar" value=>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
        <div class="mb-3">
            <label for="passwordConfirm" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm your password">
        </div>
        <button type="submit" class="btn-sign-up btn btn-primary btn-lg">Submit</button>
        <?php
        if (isset($_SESSION["msg"]))
        {
            echo '<p class="msg">' . $_SESSION["msg"] . '</p>';
        }
        unset ($_SESSION["msg"]);
        ?>
    </form>
</div>

<?php

PagePartSelector::selectPart("footer");

?>