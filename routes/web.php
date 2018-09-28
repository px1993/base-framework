<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace App\Routes;
use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function () {
    echo 'Hello world!';
});

Macaw::get('/goods', '\App\Controllers\Goods\GoodsController@index');


Macaw::$error_callback = function() {
    throw new \Exception("路由无匹配项 404 Not Found");
};

Macaw::dispatch();
