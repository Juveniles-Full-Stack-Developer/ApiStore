<?php
namespace app\v1\controller;
use think\facade\View;
use think\facade\Route;
use think\facade\Db;
class Login
{
    public function index()
    {
        if(request()->ispost()){
            $username = input('userName');
            $password = input('password');
            $sql = Db::table('api_admin')->where('adminuser', $username)->find();
            if ($sql == null) {
                $res = [
                    'code'=> 500,
                    'msg'=> '账号不存在'
                ];
            }else{
                if ($password == $sql['adminperss']) {
                    $res = [
                        'code'=> 200,
                        'msg'=> '登陆成功',
                        'data'=>['accessToken'=>'admin-accessToken']
                    ];
                }else{
                   $res = [
                        'code'=> 500,
                        'msg'=> '密码不正确',
                        'data'=>['accessToken'=>'admin-accessToken']
                    ]; 
                }
            }
            //return $sql['adminuser'];
        }else{
            $res = [
            'code'=> 500 ,
            'msg'=> '非法请求',
            'data'=>'0'
        ];
        }
        /**if ($username == "admin" & $password == "123456") {
        	$res = [
    		'code'=> 200,
    		'msg'=> 'success',
    		'data'=>['accessToken'=>'admin-accessToken']
    	];
        }else{
        	$res = [
    		'code'=> 500 ,
    		'msg'=> 'success',
    		'data'=>'0'
    	];
        }**/
    	return json($res);
    }
    public function info()
    {
        $res = [
            "code" => 200,
            "msg" => "success",
            "data" =>[
            "permissions"=> ["admin"],
            "userName"=> "admin",
            "avatar"=> "https://i.gtimg.cn/club/item/face/img/2/15922_100.gif"
            ],
        ];
        return json($res);
    }
    public function logout()
    {
        $res = [
            "code" => 200,
            "msg" => "success"
        ];
        return json($res);
    }
}
