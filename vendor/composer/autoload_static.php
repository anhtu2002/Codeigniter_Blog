<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b1ce5fb336420d48ef9a588cf247d6c
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        '27592325262b385204a263c2ab632d6e' => __DIR__ . '/..' . '/kreait/clock/src/Clock.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'StellaMaris\\Clock\\' => 18,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'Psr\\Clock\\' => 10,
            'Psr\\Cache\\' => 10,
        ),
        'L' => 
        array (
            'Lcobucci\\JWT\\' => 13,
            'Lcobucci\\Clock\\' => 15,
        ),
        'K' => 
        array (
            'Kreait\\Firebase\\JWT\\' => 20,
            'Kreait\\Clock\\' => 13,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
            'Firebase\\Auth\\Token\\' => 20,
            'Fig\\Http\\Message\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'StellaMaris\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/stella-maris/clock/src',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'Psr\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/clock/src',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Lcobucci\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/jwt/src',
        ),
        'Lcobucci\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/clock/src',
        ),
        'Kreait\\Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/kreait/firebase-tokens/src/JWT',
        ),
        'Kreait\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/kreait/clock/src/Clock',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Firebase\\Auth\\Token\\' => 
        array (
            0 => __DIR__ . '/..' . '/kreait/firebase-tokens/src/Firebase/Auth/Token',
        ),
        'Fig\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/fig/http-message-util/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b1ce5fb336420d48ef9a588cf247d6c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b1ce5fb336420d48ef9a588cf247d6c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0b1ce5fb336420d48ef9a588cf247d6c::$classMap;

        }, null, ClassLoader::class);
    }
}
