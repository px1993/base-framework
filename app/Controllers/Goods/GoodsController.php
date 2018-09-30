<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controllers\Goods;

use App\Controllers\BaseController;
use App\Models\Goods\GoodsModel;
use App\Services\Cache;
use App\Services\View;

class GoodsController extends BaseController
{
    public function index()
    {
        $goods = GoodsModel::all();
        Cache::lpush('goods',$goods);
        View::display('/goods/index.html', ['goods'=>$goods]);
    }

    public function add()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function delete()
    {
    }

    public function update()
    {
    }
}
