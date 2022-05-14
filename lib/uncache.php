<?php
class uncache
{
    public function purgeDir($path, $seconds)
    {
        $files = glob($path. '/*');
        if ($files) {
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::purgeDir($file);
                } elseif ((time() - filemtime($file)) > ($seconds)) {
                    rex_file::delete($file);
                }
            }
        }
    }
}
