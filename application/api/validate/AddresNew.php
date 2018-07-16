<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 23:45
 */

namespace app\api\validate;


class AddresNew extends BaseValidate
{
    protected $rule = [
        'name'=>'require|isNotEmpty',
        'mobile'=>'require|isMobile',
        'province'=>'require|isNotEmpty',
        'city'=>'require|isNotEmpty',
        'country'=>'require|isNotEmpty',
        'detail'=>'require|isNotEmpty'
    ];
}