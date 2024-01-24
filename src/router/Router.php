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
        $query = $_GET['q'] ?? '';

        foreach (self::$list as $route)
        {
            if ($route["uri"] === "/" . $query)
            {
                if (isset($route["post"]) && $_SERVER["REQUEST_METHOD"] === "POST") // проверка на действие с формами
                {
                    $action = new $route["class"];
                    $function = $route["function"];

                    if (isset($route["formData"]) && isset($route["files"]))
                    {
                        $action->$function($_POST, $_FILES);
                    }
                    elseif (isset($route["formData"]) && !isset($route["files"]))
                    {
                        $action->$function($_POST);
                    }
                    else
                    {
                        $action->$function();
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

    public static function errorRedirect($errorCode): void // метод для вывода 404, если маршрут не был найден
    {
        include_once __DIR__ . "/../../misc/errors/" . $errorCode . ".php";
    }

    // метод для обработки действий с страницей
    public static function action($uri, $method, $class, $function, $formData = false, $files = false): void
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
                    "formData" => $formData, // Передача значений $_POST из файла
                    "files" => $files // Передача файлов $_FILES
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