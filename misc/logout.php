<?php
session_start();
unset($_SESSION["user"]);
\router\Router::redirect("/main");