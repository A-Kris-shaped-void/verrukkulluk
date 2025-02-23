<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit122ab13d99965b411728bab9e73a9564
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'vrklk\\' => 6,
        ),
        'M' => 
        array (
            'ManKind\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'vrklk\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'ManKind\\' => 
        array (
            0 => __DIR__ . '/../..' . '/ManKind',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit122ab13d99965b411728bab9e73a9564::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit122ab13d99965b411728bab9e73a9564::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit122ab13d99965b411728bab9e73a9564::$classMap;

        }, null, ClassLoader::class);
    }
}
