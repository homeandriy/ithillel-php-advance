<?php

namespace Core;

class View
{
    public static function render(string $view, array $args = [])
    {
        $file = VIEW_DIR . $view . '.php';

        if (!is_readable($file)) {
            throw new \Exception("[{$file}] not found or not readable", 404);
        }

        extract($args, EXTR_SKIP);

        require $file;
    }

    public static function partRender(string $view, array $args = []): string
    {
        ob_start();
        static::render($view, $args);
        return ob_get_clean();
    }
}
