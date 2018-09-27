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
    private static $_db;

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

    //单例获取数据库连接
    public static function getInstance()
    {
        if(null == self::$_db){
            self::$_db = new self();
        }

        return self::$_db;
    }

    /**
     * @param $table
     * @param $columns
     * @param $where
     * @return array|bool
     */
    public static function select($table,$columns,$where)
    {
        return self::$_db->select($table,'',$columns,$where);
    }
}