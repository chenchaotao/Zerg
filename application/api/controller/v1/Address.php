<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/15
 * Time: 23:37
 */

namespace app\api\controller\v1;

use app\api\model\User as UserModel;
use \app\api\service\Token as TokenService;
use app\api\validate\AddresNew;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessException;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use think\Controller;

class Address extends BaseController
{
    /*
     * TP5的前置方法
        protected $beforeActionList = [
            'first'=>['only'=>'second,third']
        ];
    */

    protected $beforeActionList  = [
        'checkPrimaryScope'=>['only' => 'createOrUpdateAddress']
    ];

    public function createOrUpdateAddress()
    {
        $validate = new AddresNew();
        $validate->goCheck();
        //根据Token 取出 uid
        //根据 uid 来查找用户数据，判断用户是否存在 ，如果不存在抛出异常
        //获取客户端传递过来的信息
        //判断用户信息是否存在判断是更新还是添加数据

        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        //获取客户端传递过来的信息
        $dataArray = $validate->getDateByRule(input('post.'));

        $userAddress = $user->address;
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        //return $user;
        return json(new SuccessException(),201);
    }
}