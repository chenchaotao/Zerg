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
        //AOP 面向切面编程
        (new IdMustBePostiveInt())->goCheck($id);

//        $banner = BannerModel::getBannerByID($id);
        $banner = BannerModel::get($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return $banner;

    }
}