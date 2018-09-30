<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Database\Capsule\Manager as Capsule;

define('BASE_PATH', __DIR__ . '/../');
define('CONF_PATH', __DIR__ . '/../config/');

//引入全局配置
$config = require __DIR__ . '/../env.php';

//引入项目配置
$app_config = require __DIR__ . '/../config/app.php';

//引入数据库配置
$sql_config = require __DIR__ . '/../config/database.php';

//引入缓存配置
$redis  = require __DIR__ . '/../config/cache.php';

//加载ORM
$capsule = new Capsule();
$capsule->addConnection($sql_config);
$capsule->bootEloquent();

//时区设定
date_default_timezone_set($app_config['timeZone']);

//引入路由文件
require __DIR__ . '/../routes/web.php';
