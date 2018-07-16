<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 11:32
 */

namespace app\api\controller\v1;

use \app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IdMustBePostiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count = 15)
    {
        (new Count())->goCheck($count);
        $produts = ProductModel::products($count);
        if($produts->isEmpty()){
            throw new ProductException();
        }
        $produts = $produts->hidden(['summary']);
        return $produts;
    }

    public function getAllInCategory($id)
    {
        (new IdMustBePostiveInt())->goCheck($id);
        $produts = ProductModel::getProductsByCategoryId($id);
        if($produts->isEmpty()){
            throw new ProductException();
        }
        return $produts;
    }

    public function getOne($id)
    {
        (new IdMustBePostiveInt())->goCheck();
        $product =ProductModel::getProductDetail($id);
        if(!$product){
            throw new ProductException();
        }
        return $product;
    }
}