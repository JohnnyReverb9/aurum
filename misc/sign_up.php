<?php

use selector\PagePartSelector;
$title = "Dog's Docs | Sign up";
PagePartSelector::selectPart("header");
PagePartSelector::selectPart("navbar");

?>
<div class="container" style="margin: 100px;">
        <h2>Sign up</h2>
        <form action="../bin/auth_user.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" placeholder="Enter your login">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your e-mail">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">User avatar</label>
                <input type="file" class="form-control" id="avatar">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="passwordConfirm">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>