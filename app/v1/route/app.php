<?php
//文件地址
namespace app\v1\route;
//使用Route对象
use think\facade\Route;

Route::rule('Logininfo','login/info')->allowCrossDomain(['Access-Control-Allow-Headers' => 'accessToken','Access-Control-Allow-Origin'=>'*']);
Route::rule('Login','login/index')->allowCrossDomain(['Access-Control-Allow-Origin'=>'*']);
Route::rule('logout','login/logout')->allowCrossDomain(['Access-Control-Allow-Headers' => 'accessToken','Access-Control-Allow-Origin'=>'*']);
Route::rule('userlist','apigetlist/userlist')->allowCrossDomain(['Access-Control-Allow-Headers' => '*','Access-Control-Allow-Origin'=>'*']);
Route::rule('userlistedit','apigetlist/userlistedit')->allowCrossDomain(['Access-Control-Allow-Headers' => '*','Access-Control-Allow-Origin'=>'*','Access-Control-Allow-Methods'=>'GET, POST, PATCH, PUT, DELETE,PARMAS']);
Route::rule('userlistdelete','apigetlist/userlistdelete')->allowCrossDomain(['Access-Control-Allow-Headers' => '*','Access-Control-Allow-Origin'=>'*']);