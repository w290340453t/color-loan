<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe43e15c395b41032bec1f752147bb47
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'loan\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'loan\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe43e15c395b41032bec1f752147bb47::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe43e15c395b41032bec1f752147bb47::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
