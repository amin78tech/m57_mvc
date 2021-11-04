<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf110fe954a91a1e4a30065a0ece8309f
{
    public static $files = array (
        'e7b09bba9f90d12e41cf91677f9cc83b' => __DIR__ . '/../..' . '/Core/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf110fe954a91a1e4a30065a0ece8309f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf110fe954a91a1e4a30065a0ece8309f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf110fe954a91a1e4a30065a0ece8309f::$classMap;

        }, null, ClassLoader::class);
    }
}
