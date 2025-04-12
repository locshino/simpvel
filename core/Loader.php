<?php

namespace Core;

class Loader
{
    protected static array $loaded = [];

    public static function register(): void
    {
        spl_autoload_register([self::class, 'autoload']);
    }

    public static function autoload(string $class): void
    {
        if (isset(self::$loaded[$class])) {
            return;
        }

        $path = base_path(str_replace('\\', '/', $class) . '.php');

        if (file_exists($path)) {
            require_once $path;
            self::$loaded[$class] = true;
        } else {
            die("Autoload error: Class [$class] not found at path [$path]");
        }
    }

    public static function getLoaded(): array
    {
        return self::$loaded;
    }
}
