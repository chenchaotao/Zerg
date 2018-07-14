<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 8:49
 */

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IdMustBePostiveInt;
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
        (new IdMustBePostiveInt())->goCheck($id);

        $banner = BannerModel::getBannerByID();

        return $banner;

    }
}