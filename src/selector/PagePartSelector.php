<?php

namespace selector;

class PagePartSelector
{
    public static string $titleName;

    public static function selectPart($partName): void
    {
        $title = self::$titleName;
        include_once "misc/pages/" . $partName . ".php";
    }
}