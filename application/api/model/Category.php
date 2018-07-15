<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 13:47
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    public function img()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
}