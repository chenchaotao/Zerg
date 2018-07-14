<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/13
 * Time: 19:42
 */

namespace app\api\validate;


use app\lib\exception\ParameterExcetion;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        //获取HTTP传入的参数
        //对这些参数进行校验
        $require = Request::instance();
        $params = $require->param();

        $result = $this->batch()->check($params);
        if(!$result){
            $e = new ParameterExcetion([
                'msg'=>$this->error
            ]);
            throw $e;
        }else{
            return true;
        }
    }
}