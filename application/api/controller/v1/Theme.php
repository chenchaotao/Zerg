<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use \app\api\model\Theme as ThemeModel;
use app\api\validate\IdMustBePostiveInt;
use app\lib\exception\ThemeException;
use think\Controller;

class Theme extends Controller
{
    /*
     * @Url         api/:version/theme?ids=id1,id2,id3
     * @return      一组theme模型
     */
    public function getSimpleList($ids='')
    {
        (new IDCollection())->goCheck();
        $ids = explode(',',$ids);
        $result = ThemeModel::with('headImg,topicImg')->select($ids);
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }

    /*
    * @Url         api/:version/theme/:id
    */
    public function getComplexOne($id)
    {
        (new IdMustBePostiveInt())->goCheck($id);
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException(['msg'=>'id对应的资源找不到']);
        }
        return $theme;
    }
}
