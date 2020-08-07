<?php
namespace app\v1\controller;
use think\facade\View;
use think\facade\Db;
class Apigetlist 
{
    public function index()
    {
        return View::fetch();
    }
    public function userlist()
    {   
    	if (request()->ispost()) {
            $tel = input('tel');
            $pageno = input('pageNo');
            $pagesize = input('pageSize');
            if ( isset($pageno) && $pageno>1) 
                {
                    $pageVal = $pageno;
                }else{
                    $pageVal = 1;
                }
                $pageno = ($pageVal-1)*$pagesize;

            if ($tel == null) {
                $date = Db::table('api_user')->limit($pageno,$pagesize)->select();
                $count =Db::table('api_user')->count();
            }else{
                $date = Db::table('api_user')->limit($pageno,$pagesize)->where('tel',$tel)->select();
                $count =Db::table('api_user')->where('tel',$tel)->limit($pageno,$pagesize)->count();
            }
            $res = [
                'code'=>200,
                'msg'=> '成功',
                'totalCount'=>$count,
                'data'=>$date,

            ];
    	}else{
    	$date = "没有数据";
        $res = [
            'code'=>500,
            'msg'=> '非法请求',
            'data'=>$date,
        ];
    	}
    	return json($res);
    }
    public function userlistedit()
    {
        $name = input('name');
        $perss = input('perss');
        $nickname = input('nickname');
        $old = input('old');
        $tel = input('tel');
        $gender = input('gender');
        $logodate = date("Y-m-d");
        $superiorid = '1';
        $data = ['name'=>$name,'perss'=>$perss,'nickname'=>$nickname,'old'=>$old,'tel'=>$tel,'gender'=>$gender,'logodate'=>$logodate,'superiorid'=>$superiorid,];
        $sql = Db::table('api_user')->insert($data);
        if ($sql == 1) {
            $res = [
            'code'=>200,
            'msg'=> '用户'.$name.'添加成功',
            'data'=>$name,
        ];
        }else{
            $res = [
            'code'=>300,
            'msg'=> '用户'.$name.'添加失败',
            'data'=>$name,
        ];
        }
        return json($res);
    }
    public function userlistdelete()
    {
        if (request()->ispost()) {
           $id = input('ids');
           $sql = Db::table('api_user')->where('id',$id)->delete();
           if ($sql == 0) {
              $res = [
               'code'=>500,
               'msg'=> '数据出错，请刷新重试！',
               'data'=>'1',
           ];
           }else{
               $res = [
               'code'=>200,
               'msg'=> '用户删除成功',
               'data'=>'1',
           ];
           }
        }else{
            $res = [
               'code'=>500,
               'msg'=> '非法请求',
               'data'=>'1',
           ];
        }
        return json($res);
    }
}
