<?php

use router\Router;

Router::page("/main", "main");
Router::page("/sign_in", "sign_in");
Router::page("/sign_up", "sign_up");
//Router::page("/404", "404");

Router::enable();