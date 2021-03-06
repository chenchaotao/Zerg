<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 8:33
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time','create_time','update_time','main_img_id','pivot','from','category_id'];

    public function getMainImgUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage','product_id','id')->order('order','asc');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperties','product_id','id');
    }

    public static function products($count)
    {
        $products = self::limit($count)->order('create_time desc')->select();
        return $products;
    }

    public static function getProductsByCategoryId($id)
    {
        $products = self::where('category_id','=',$id)->select();
        return $products;
    }

    public static function getProductDetail($id)
    {
        $product = self::with('imgs.imgUrl','properties')->find($id);
        return $product;
    }
}