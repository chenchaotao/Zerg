<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 22:28
 */

namespace app\api\model;




class Banner extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    public function items()
    {
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }
}