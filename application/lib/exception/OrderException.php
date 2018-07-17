<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/16
 * Time: 16:57
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单信息错误，请检查ID';
    public $errorCode = 80000;
}