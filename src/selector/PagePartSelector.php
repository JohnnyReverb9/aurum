<?php

namespace selector;

class PagePartSelector
{
    public static function selectPart($partName): void
    {
        include_once "misc/pages/" . $partName . ".php";
    }
}