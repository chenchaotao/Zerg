<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/14
 * Time: 10:06
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求Banner不存在';
    public $errorCode = 40000;

}