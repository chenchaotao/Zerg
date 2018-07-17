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
}