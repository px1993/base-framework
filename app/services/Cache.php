<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Services;

use App\Tools\Config;
use Predis\Client;
use Exception;

class Cache
{
    /**
     * @var null|Client
     */
    private static $con = null;

    /**
     * Cache constructor.
     */
    public function __construct()
    {
        try{
            $cacheConfig = Config::get('cache.redis');
            self::$con   = new Client($cacheConfig);
        }catch (Exception $exception){
            throw new Exception('redis连接失败');
        }
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if (null === self::$con){
            new static();
        }
        return self::$con->$name($arguments[0], $arguments[1]);
    }

}
