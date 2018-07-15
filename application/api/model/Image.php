<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/14
 * Time: 21:06
 */

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['id','from','delete_time','update_time'];

    public function getUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }
}