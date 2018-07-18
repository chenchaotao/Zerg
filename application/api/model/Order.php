<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/16
 * Time: 21:33
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id','delete_time','update_time'];

    protected $autoWriteTimestamp = true;

    public function getSnapItemsAttr($value)
    {
     if(empty($value)){
         return null;
     }
     return json_decode($value);
    }

    public static function getSummaryByUser($uid,$page=1,$size=15)
    {
        $paginateData = self::where('user_id','=',$uid)->order('create_time desc')->paginate($size,true,['page'=>$page]);
        return $paginateData;
    }
}