<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 22:28
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends Model
{
//    public static function getBannerByID($id)
//    {
////        $result = Db::query('SELECT * FROM banner_item WHERE banner_id = ?',[$id]);
////        $result = Db::table('banner_item')->where('banner_id','=',$id)->select();
//        $result = Db::table('banner_item')->where(function($query)use ($id){
//            $query->where('banner_id','=',$id);
//        })->select();
//
//        return $result;
//    }
}