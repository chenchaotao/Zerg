<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 22:28
 */

namespace app\api\model;


class ProductProperties extends BaseModel
{
    protected $hidden = ['product_id','delete_time','product_id'];
}