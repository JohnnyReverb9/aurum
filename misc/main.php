<?php

use selector\PagePartSelector;
$title = "Dog's Docs";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <h3 class="display-6">Have you ever been here?</h3>
        <a class="btn btn-primary btn-lg" role="button" href="/sign_in">Sign in</a>
        <a class="btn btn-primary btn-lg" role="button" href="/sign_up">Sign up</a>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>