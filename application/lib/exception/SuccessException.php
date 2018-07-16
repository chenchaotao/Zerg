<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/16
 * Time: 9:41
 */

namespace app\lib\exception;


class SuccessException extends BaseException
{
    public $code = 201;
    public $msg = 'success';
    public $errorCode = 0;
}