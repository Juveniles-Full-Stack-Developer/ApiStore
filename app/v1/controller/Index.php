<?php
namespace app\v1\controller;
use think\facade\View;
class Index 
{
    public function index()
    {
        return View::fetch();
    }
    public function userlist()
    {
        return View::fetch();
    }
}
