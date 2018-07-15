<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 13:44
 */

namespace app\api\controller\v1;

use \app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllcategorys()
    {
        $category = CategoryModel::all([],'img');
        if($category->isEmpty()){
            throw new CategoryException();
        }
        return $category;
    }
}