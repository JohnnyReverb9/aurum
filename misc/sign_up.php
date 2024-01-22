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
                <label for="exampleInputEmail1" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Enter your login">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your e-mail">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User avatar</label>
                <input type="file" class="form-control" id="avatar" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php

PagePartSelector::selectPart("footer");

?>