<?php

$title = "Dog's Docs | Sign up";
include_once __DIR__ . "/pages/header.php";

?>

<body>
<div>
    <form action="index.php">
        <button>Main menu</button>
    </form>
</div>
<div>
    <form action="../bin/auth_user.php" method="post">
        <label for="name">Name</label>
        <label>
            <input type="text" name="name" placeholder="Enter your name">
        </label>
        <label for="login">Login</label>
        <label>
            <input type="text" name="login" placeholder="Enter your login">
        </label>
        <label for="email">E-mail</label>
        <label>
            <input type="email" name="email" placeholder="Enter your e-mail">
        </label>
        <label>Profile picture</label>
        <input type="file" name="avatar">
        <label for="password">Password</label>
        <label>
            <input type="password" name="password" placeholder="Enter your password">
        </label>
        <label for="password">Confirm password</label>
        <label>
            <input type="password" name="passwordConfirm" placeholder="Confirm your password">
        </label>
        <button>Sign up</button>
    </form>
</div>
</body>

<?php

include_once __DIR__ . "/pages/footer.php";

?>