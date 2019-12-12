<?php

namespace Views;

Class View
{
    public static function render(string $path, array $param = [])
    {
            ob_start();
            include($path);
            $result = ob_get_clean();
            return $result;
    }
}
