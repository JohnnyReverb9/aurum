<?php

$title = "Dog's Docs | Sign in";
include_once __DIR__ . "/pages/header.php";

?>

<body>
<div>
    <form action="main.php">
        <button>Main menu</button>
    </form>
</div>
<div>
    <form action="../bin/auth_user.php" method="post">
        <label for="email">E-mail</label>
        <label>
            <input type="email" name="email" placeholder="Enter your e-mail">
        </label>
        <label for="password">Password</label>
        <label>
            <input type="password" name="password" placeholder="Enter your password">
        </label>
        <button>Sign up</button>
    </form>
</div>
</body>

<?php

include_once __DIR__ . "/pages/footer.php";

?>