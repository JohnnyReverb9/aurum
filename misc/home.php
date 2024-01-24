<?php

// Главная страница ПОСЛЕ авторизации
session_start();
use selector\PagePartSelector;

PagePartSelector::$titleName = "Dog's Docs";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

if (!isset($_SESSION["user"]))
{
    \router\Router::redirect("/sign_in");
}

?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome, <?php echo $_SESSION["user"]["user_name"]; ?></h1>
            <p class="lead">This is your personal workspace with cool name.</p>
            <hr class="my-4">
            <p>Here you can organize your work to build your effectiveness.</p>
        </div>
    </div>

<?php

PagePartSelector::selectPart("footer");

?>