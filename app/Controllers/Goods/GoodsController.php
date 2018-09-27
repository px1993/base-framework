<?php
/**
 * Created by PhpStorm.
 * User: panxin
 * Date: 2018/9/26 0026
 * Time: 17:42
 */
namespace App\Controllers\Goods;
use App\Controllers\BaseController;
use App\Models\Goods\GoodsModel;

class GoodsController extends BaseController{

    public function index()
    {
        $goodsModel = new GoodsModel();
        $goods      = $goodsModel->select('goods','*',1);
        print_r($goods);
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