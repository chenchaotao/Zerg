<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 22:28
 */

namespace app\api\model;


class Banner
{
    public static function getBannerByID()
    {
        try {
            //TODO: 根据Banner ID号 获取Banner信息
            $res = 1/0;
            return 'this is banner info';
        }catch (\Exception $e){
            throw $e;
        }
    }
}