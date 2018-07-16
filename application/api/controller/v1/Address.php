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
use app\lib\exception\SuccessException;
use app\lib\exception\UserException;

class Address
{
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