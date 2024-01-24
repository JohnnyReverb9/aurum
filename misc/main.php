<?php

// Главная страница ДО авторизации
use selector\PagePartSelector;
PagePartSelector::$titleName = "Dog's Docs";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome!</h1>
        <p class="lead">This is your personal workspace with cool name.</p>
        <hr class="my-4">
        <p>Here you can organize your work to build your effectiveness.</p>
        <h3 class="display-6">Have you never been here before?</h3>
        <a class="btn btn-primary btn-lg" role="button" href="/sign_up">Sign up</a>
        <h3 class="display-6">Sign in to touch unknown pleasures...</h3>
        <a class="btn btn-primary btn-lg" role="button" href="/sign_in">Sign in</a>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>