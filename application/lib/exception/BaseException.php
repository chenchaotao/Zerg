<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/14
 * Time: 9:58
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    //http错误码
    public $code = 400;

    //错误信息
    public $msg = '参数错误';

    //自定义错误状态码
    public $errorCode = 10000;

    public function __construct($paramas = [])
    {
        if(!is_array($paramas)){
            return;
        }

        if(array_key_exists('code',$paramas)){
            $this->code = $paramas['code'];
        }

        if(array_key_exists('msg',$paramas)){
            $this->msg = $paramas['msg'];
        }

        if(array_key_exists('errorCode',$paramas)){
            $this->errorCode = $paramas['errorCode'];
        }
    }
}