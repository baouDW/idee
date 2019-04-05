<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9868d950b9688fd62920d5bd898be0a3
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'idee\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'idee\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9868d950b9688fd62920d5bd898be0a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9868d950b9688fd62920d5bd898be0a3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}