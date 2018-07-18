<?php
/**
 * Created by PhpStorm.
 * User: Owl
 * Date: 2018/7/16
 * Time: 12:41
 */

namespace app\api\controller\v1;

use app\api\service\Order as OrderService;
use app\api\service\Token as TokenService;
use app\api\validate\IdMustBePostiveInt;
use app\api\validate\OrderPlace;
use app\api\validate\PagingParameter;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use think\Controller;
use app\api\model\Order as OrderModel;

class Order extends BaseController
{
/*
 * 用户在选择商品后，向API提交包含它所选择商品的相关信息
 * API在接收到信息后，需要检查订单相关商品的库存量
 * 有库存把订单数据存入数据库中 （下单成功） 向客户端返回消息，告诉客户端可以支付了
 * 调用我们的支付接口，进行支付
 * 还需要再次进行库存量检测
 * 服务器调用微信的支付接口进行支付
 * 服务器这边就可以调用微信的支付接口进行支付
 * 微信会返回给我们一个支付结果（异步）
 * 成功也需要进行库存量检测（可以省略）
 * 成功进行库存量的扣除
 */

    protected $beforeActionList  = [
        'checkExclusiveScope'=>['only' => 'placeOrder'],
        'checkPrimaryScope'=>['only'=>'getSummaryByUser,getDetail']
    ];

    public function getSummaryByUser($page=1,$size=15)
    {
        (new PagingParameter())->goCheck();
        $uid = TokenService::getCurrentUid();
        $pagingOrders = OrderModel::getSummaryByUser($uid,$page,$size);
        if($pagingOrders->isEmpty()){
            return [
                'date'=>[],
                'current_page'=>$pagingOrders->getCurrentPage()
            ];
        }
        $data = $pagingOrders->hidden(['snap_items','snap_address','prepay_id'])->toArray();
        return [
            'date'=>$data,
            'current_page'=>$pagingOrders->getCurrentPage()
        ];
    }

    public function getDetail($id)
    {
        (new IdMustBePostiveInt())->goCheck();
        $orderDetail = OrderModel::get($id);
        if (!$orderDetail)
        {
            throw new OrderException();
        }
        return $orderDetail
            ->hidden(['prepay_id','snap_address']);
    }

    public function placeOrder()
    {
        (new OrderPlace())->goCheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();
        $order = new OrderService();
        $result = $order->place($uid,$products);
        return $result;
    }
}