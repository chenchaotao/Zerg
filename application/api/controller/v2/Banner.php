<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 8:49
 */

namespace app\api\controller\v2;

use app\api\model\Banner as BannerModel;
use app\api\validate\IdMustBePostiveInt;
use app\lib\exception\BannerMissException;
use think\Controller;

class Banner extends Controller
{
    /*
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        return 'this is 2.0 version';
    }
}