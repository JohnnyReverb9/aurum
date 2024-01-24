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

<div class="container" style="margin: 100px;">
    <div>
        <h2>Sign in</h2>
        <form action="/auth/sign_in" method="post" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your e-mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>