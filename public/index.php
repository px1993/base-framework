<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

define('ROOT_PATH', __DIR__);
define('APP_PATH', ROOT_PATH . '/../app');
define('CONFIG_PATH', ROOT_PATH . '/../config');
define('ROUTES_PATH', ROOT_PATH . '/../routes');

//引入全局变量
$config = require __DIR__. '/../.env.php';

//引入自动加载文件
require ROOT_PATH . '/../vendor/autoload.php';

//引入路由文件
require ROUTES_PATH . '/web.php';

//引入配置文件
$config = require CONFIG_PATH . '/app.php';

//时区设定
date_default_timezone_set($config['timeZone']);

