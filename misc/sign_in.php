<?php

use selector\PagePartSelector;
//$title = "Dog's Docs | Sign in";
PagePartSelector::$title = "Dog's Docs | Sign in";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>

<div class="container" style="margin: 100px;">
    <div>
        <h2>Sign in</h2>
        <form action="../bin/auth_user.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your e-mail">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>