<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/

/*rule($路由规则, 路由地址, 请求类型 = '*', 路由参数 = [], 变量规则 = [])
Route::rule('hello','sample/index/index','GET',['https'=>false]);
Route::rule('hello','sample/index/index','GET|POST',['https'=>false]);
Route::post('hello/:id','sample/index/hello');*/

use \think\Route;

Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

Route::get('api/:version/product/recent','api/:version.Product/getRecent',[],['id'=>'\d+']);
Route::get('api/:version/by_category','api/:version.Product/getAllInCategory');
Route::get('api/:version/product/:id','api/:version.Product/getOne');

Route::get('api/:version/category/all','api/:version.Category/getAllCategorys');

Route::post('api/:version/token/user','api/:version.Token/getToken');

Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');

Route::post('api/:version/order','api/:version.Order/placeOrder');



