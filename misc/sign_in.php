<?php
session_start();

// Страница входа
use selector\PagePartSelector;
PagePartSelector::$titleName = "Aurum | Sign in";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

if (isset($_SESSION["user"]))
{
    \router\Router::redirect("/home");
}
?>

<div class="container">
    <div>
        <h2>Sign in</h2>
        <form action="/auth/sign_in" method="post" class="mt-4">
            <div class="mb-3" style="width: 400px">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your e-mail" maxlength="64">
            </div>
            <div class="mb-3" style="width: 400px">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" maxlength="64">
            </div>
            <button type="submit" class="btn-sign-in btn btn-primary btn-lg">Submit</button>
            <?php
            if (isset($_SESSION["msg"]))
            {
                echo '<p class="msg alert-danger">' . $_SESSION["msg"] . '</p>';
            }
            unset ($_SESSION["msg"]);
            ?>
        </form>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>