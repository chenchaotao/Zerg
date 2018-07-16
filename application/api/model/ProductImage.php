<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 22:26
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}