<?php

class uncache
{
    public static function addon($addon)
    {
        $dir = rex_path::addonCache($addon);
        $files = glob("$dir{*,*/*,*/*/*,*/*/*/*}", GLOB_BRACE);

        foreach ($files as $entry => $file) {
            unlink($file);
        }
    }
    public static function core()
    {
        $dir = rex_path::coreCache();
        $files = glob("$dir{*,*/*,*/*/*,*/*/*/*}", GLOB_BRACE);

        foreach ($files as $entry => $file) {
            unlink($file);
        }
    }

    public static function url()
    {
        self::addon("url2");
        self::addon("yrewrite");
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
        self::core();
        $files = glob("$dir{*,*/*,*/*/*,*/*/*/*}", GLOB_BRACE);

        /* Skip Media Manager Files */
        foreach ($files as $entry => $file) {
            if (!str_starts_with($file, rex_path::addonCache('media_manager'))) {
                unlink($file);
            }
        }
    }

    public static function all()
    {
        $dir = rex_path::cache();
        $files = glob("$dir{*,*/*,*/*/*,*/*/*/*}", GLOB_BRACE);

        foreach ($files as $entry => $file) {
            unlink($file);
        }
    }
}
