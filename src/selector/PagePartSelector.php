<?php

namespace selector;

// Класс для вставки частей страницы, таких как хэдер, футер и подобное с передачей названия страницы
class PagePartSelector
{
    public static string $titleName;

    public static function selectPart(string $partName): void
    {
        $title = self::$titleName;
        include_once "misc/pages/" . $partName . ".php";
    }

    public static function stylePathHeaderInsertion(string $path): string
    {
        $paths = require_once "bin/config/conf_paths.php";
        $mainPath = $paths["main"] ?? "/";
        return $mainPath . $path;
    }
}