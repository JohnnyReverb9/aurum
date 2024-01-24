<?php

namespace router;

// Класс для роутинга сайта
use controllers\Auth;

class Router
{
    private static array $list = []; // массив с uri

    public static function page($uri, $pageName): void // метод для получения uri и имён страниц
    {
        self::$list[] = [
            "uri" => $uri,
            "pageName" => $pageName
        ];
    }

    public static function enable(): void // метод для включения роутинга после заполнения всех роутов
    {
        //if (isset($route["post"]) ? $route["post"] === true : false && $_SERVER["REQUEST_METHOD"] === "POST")
        $query = $_GET['q'] ?? '';

        foreach (self::$list as $route)
        {
            if ($route["uri"] === "/" . $query)
            {
                if (isset($route["post"]) && $_SERVER["REQUEST_METHOD"] === "POST")
                {
                    $action = new $route["class"];
                    $function = $route["function"];
                    $action->$function($_POST);
                    die();
                }
                else
                {
                    include_once __DIR__ . "/../../misc/" . $route["pageName"] . ".php";
                    die();
                }
            }
        }

        self::notFoundPage();
    }

    private static function notFoundPage(): void // метод для вывода 404, если маршрут не был найден
    {
        include_once __DIR__ . "/../../misc/errors/404.php";
    }

    public static function action($uri, $method, $class, $function)
    {
        switch ($method)
        {
            case "POST":
            {
                self::$list[] = [
                    "uri" => $uri,
                    "class" => $class,
                    "function" => $function,
                    "post" => true
                ];
            }

            case "GET":
            {
                // ...
            }
        }
    }
}