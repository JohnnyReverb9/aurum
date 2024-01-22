<?php

namespace selector;

// Класс для вставки частей страницы, таких как хэдер, футер и подобное с передачей названия страницы
class PagePartSelector
{
    public static string $titleName;

    public static function selectPart($partName): void
    {
        $title = self::$titleName;
        include_once "misc/pages/" . $partName . ".php";
    }
}