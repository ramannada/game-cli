<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4357fca3d6981ca9693b4105603ed2ca
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4357fca3d6981ca9693b4105603ed2ca::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4357fca3d6981ca9693b4105603ed2ca::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
