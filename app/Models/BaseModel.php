<?php
/**
 * Created by PhpStorm.
 * User: panxin
 * Date: 2018/9/26 0026
 * Time: 17:18
 */
namespace App\Models;
use Medoo\Medoo;

class BaseModel{
    private static $_db = [];

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
        self::$_db = $database;
    }

//    /**
//     * 单例获取数据库连接
//     * @param $args
//     * @return BaseModel|array|Medoo
//     */
//    public static function getInstance(...$args)
//    {
//        $key   = md5(serialize($args));
//        if(!self::$_db[$key]){
//            self::$_db[$key] = new self(...$args);
//        }
//
//        return self::$_db[$key];
//    }

    /**
     * @param $table
     * @param $join
     * @param $columns
     * @param $where
     * @return array|bool
     */
    public function select($table,$join,$columns,$where = false)
    {
        return self::$_db->select($table, $join, $columns, $where);
    }


    public function log()
    {
        return self::$_db->log();
    }

    /**
     * 获取数据连接信息
     * @return array
     */
    public function info()
    {
        return self::$_db->info();
    }
}