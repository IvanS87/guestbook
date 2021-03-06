<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9668eca060f4b454a7b509f57ad58c0b
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9668eca060f4b454a7b509f57ad58c0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9668eca060f4b454a7b509f57ad58c0b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
