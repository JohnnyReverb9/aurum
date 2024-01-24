<?php

namespace router;

// Класс для роутинга сайта
use controllers\Auth;

class Router
{
    private static array $list = []; // массив с uri

    public static function page(string $uri, string $pageName): void // метод для получения uri и имён страниц
    {
        self::$list[] = [
            "uri" => $uri,
            "pageName" => $pageName
        ];
    }

    public static function enable(): void // метод для включения роутинга после заполнения всех роутов
    {
        $query = $_GET['q'] ?? '';

        foreach (self::$list as $route)
        {
//            print_r($route);
//            print_r($_FILES);
            if ($route["uri"] === "/" . $query)
            {
                if (isset($route["post"]) && $_SERVER["REQUEST_METHOD"] === "POST") // проверка на действие с формами
                {
                    $action = new $route["class"];
                    $function = $route["function"];

                    if (isset($route["formData"]) && isset($route["files"]))
                    {
                        $action->$function($_POST, $_FILES);
                        die();
                    }
                    elseif (isset($route["formData"]) && !isset($route["files"]))
                    {
                        $action->$function($_POST);
                        die();
                    }
                    else
                    {
                        $action->$function();
                        die();
                    }
                }
                else // вывод страниц
                {
                    include_once __DIR__ . "/../../misc/" . $route["pageName"] . ".php";
                    die();
                }
            }
        }

        self::errorRedirect("404"); // если не нашлась страница
    }

    public static function errorRedirect(string $errorCode): void // метод для вывода 404, если маршрут не был найден
    {
        include_once __DIR__ . "/../../misc/errors/" . $errorCode . ".php";
    }

    public static function redirect(string $uri): void
    {
        header("Location: $uri");
    }

    // метод для обработки действий с страницей
    public static function action(
        string $uri,
        string $method,
        string $class,
        string $function,
        bool $formData = false,
        bool $files = false
    ): void
    {
        switch ($method)
        {
            case "POST":
            {
                self::$list[] = [
                    "uri" => $uri,
                    "class" => $class,
                    "function" => $function,
                    "post" => true,
                    "formData" => $formData, // Передача значений $_POST из файла (да / нет)
                    "files" => $files // Передача файлов $_FILES (да / нет)
                ];
            }

            case "GET":
            {
                self::$list[] = [
                    "uri" => $uri,
                    "class" => $class,
                    "function" => $function,
                    "post" => false
                ];
            }
        }
    }
}