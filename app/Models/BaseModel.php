<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Models;

use Medoo\Medoo;

class BaseModel
{
    public static $_model = null;

    //sql设置
    public function __construct()
    {
        $database = new Medoo([
            'database_type' => $_ENV['database_type'] ?? '',
            'database_name' => $_ENV['database_name'] ?? '',
            'server'        => $_ENV['server'] ?? '',
            'port'          => $_ENV['port'] ?? 3306,
            'username'      => $_ENV['username'] ?? '',
            'password'      => $_ENV['password'] ?? '',

            //其他设置
            'charset'       => $_ENV['charset'] ?? 'utf8',
        ]);
        static::$_model = $database;
    }

    /**
     * 单例获取数据库连接.
     * @return Medoo
     */
    public static function getInstance()
    {
        if (null === static::$_model){
            new static();
        }
        return static::$_model;
    }
}
