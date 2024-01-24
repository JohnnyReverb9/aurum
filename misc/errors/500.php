<?php

use selector\PagePartSelector;
PagePartSelector::$titleName = "Aurum | 500";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>

<div class="container">
    <h1 class="mt-4">500 ERROR: server error</h1>
</div>

<?php

PagePartSelector::selectPart("footer");

?>
