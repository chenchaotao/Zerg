<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 17:43
 */

namespace app\api\validate;

class IdMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id'=>'require|isPostiveInteger'
    ];

    protected $message = [
        'id'=>'id必须为正整数'
    ];
}