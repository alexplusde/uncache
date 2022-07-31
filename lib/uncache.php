<?php

class uncache
{
    public static function addon($addon)
    {
        $dir = rex_path::addonCache($addon);
        array_map("unlink", glob("$dir/*"));
    }
    public static function core()
    {
        $dir = rex_path::coreCache();
        array_map("unlink", glob("$dir/*"));
    }

    public static function url()
    {
        self::addon("url2");
    }
    
    public static function yrewrite()
    {
        self::addon("yrewrite");
    }

    public static function structure()
    {
        self::addon("structure");
    }

    public static function auto()
    {
        self::url();
        self::yrewrite();
        self::structure();
        self::core();
    }
    
    public static function all()
    {
        self::core();
        $dir = rex_path::addonCache();
        array_map("unlink", glob("$dir/*"));
    }
}
