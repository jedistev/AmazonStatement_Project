<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1b74d5c91cfe8631d917e8fd7ad2cb43
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PhpConsole' => 
            array (
                0 => __DIR__ . '/..' . '/php-console/php-console/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit1b74d5c91cfe8631d917e8fd7ad2cb43::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}