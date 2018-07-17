<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/16
 * Time: 15:02
 */

namespace app\api\controller\v1;

use \app\api\service\Token as TokenService;
use think\Controller;

class BaseController extends Controller
{
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }
}