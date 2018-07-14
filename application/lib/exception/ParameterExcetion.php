<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/14
 * Time: 13:40
 */

namespace app\lib\exception;


class ParameterExcetion extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}