<?php
namespace app\admin\controller;
use think\Request;

//后台首页控制器
class Login extends Common
{
    //后台首页
    public function login()
    {
        return $this->fetch();
    }
}