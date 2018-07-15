<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/14
 * Time: 18:30
 */

namespace app\api\model;


use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['id','img_id','banner_id','update_time','delete_time'];

    public function img()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}