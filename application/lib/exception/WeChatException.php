<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 16:45
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '微信服务接口调用失败';
    public $errorCode = 999;
}