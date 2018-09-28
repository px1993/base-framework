<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controllers\Goods;

use App\Controllers\BaseController;
use App\Models\Goods\GoodsModel;
use App\Services\View;
use Twig_Loader_Filesystem;
use Twig_Environment;

class GoodsController extends BaseController
{
    public function index()
    {
        $goodsModel = GoodsModel::getInstance();
        $goods      = $goodsModel->select('goods', '*', 1);
        View::display('/goods/index.html');
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
