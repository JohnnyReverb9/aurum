<?php

use selector\PagePartSelector;
PagePartSelector::$titleName = "Dog's Docs | 404";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>

<div class="container">
    <h1 class="mt-4">404 ERROR</h1>
</div>

<?php

PagePartSelector::selectPart("footer");

?>
