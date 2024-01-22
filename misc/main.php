<?php

use selector\PagePartSelector;
$title = "Dog's Docs";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>

<div class="container" style="margin: 100px;">
    <h1>Welcome!</h1>
    <span>Have you ever been here?</span>
    <a href="/sign_in">Sign in</a>
    <a href="/sign_up">Sign up</a>
</div>

<?php

PagePartSelector::selectPart("footer");

?>