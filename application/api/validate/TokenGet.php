<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 15:30
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $message = ['code' => 'code不能为空'];

    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];
}