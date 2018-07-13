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

    protected function isPostiveInteger($value,$rule = '',$data = '',$field = '')
    {
        if(is_numeric($value) &&is_int($value + 0) && ($value + 0) >0){
            return true;
        }else{
            return $field.'必须是正整数';
        }
    }
}