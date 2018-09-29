<?php
/**
 * Created by PhpStorm.
 * User: panxin
 * Date: 2018/9/29 0029
 * Time: 10:49
 */
return [
    'driver'    => $_ENV['driver'] ?? '',
    'host'      => $_ENV['host'] ?? '',
    'database'  => $_ENV['database'] ?? '',
    'username'  => $_ENV['username'] ?? '',
    'password'  => $_ENV['password'] ?? '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];