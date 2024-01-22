<?php

namespace router;

class Router
{

    private static array $list = [];

    public static function page($uri, $pageName): void
    {
        self::$list[] = [
            "uri" => $uri,
            "pageName" => $pageName
        ];
    }

    public static function enable(): void
    {
        //if (isset($route["post"]) ? $route["post"] === true : false && $_SERVER["REQUEST_METHOD"] === "POST")
        $query = $_GET['q'] ?? '';

        foreach (self::$list as $route)
        {
            if ($route["uri"] === "/" . $query)
            {
                include_once __DIR__ . "/../../misc/" . $route["pageName"] . ".php";
            }
        }
    }
}