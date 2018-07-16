<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/16
 * Time: 10:44
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['id','delete_time','user_id'];
}