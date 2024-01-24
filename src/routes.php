<?php

// Файл для настройки и включения роутинга
use router\Router;
use controllers\Auth;

Router::page("/main", "main");
Router::page("/sign_in", "sign_in");
Router::page("/sign_up", "sign_up");
Router::page("/home", "home");
Router::page("/profile", "profile");
Router::page("/logout", "logout");

Router::action("/auth/sign_up", "POST", Auth::class, "signUp", true, true);
Router::action("/auth/sign_in", "POST", Auth::class, "signIn", true);

Router::enable();