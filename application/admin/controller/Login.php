<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Admin;
class Login extends Controller
{
	public function login()
	{
		
		if(Request::instance()->isGet()){
			return $this->fetch();
		}else{
			$login = Request::instance()->post();
			//$admin = new Admin();
			$res = Admin::checkUser($login['user'],$login['pass']);
			if($res === true){
				$this->success('登陆成功！','Index/index','',1);
			}else{
				$this->error($res,'','',1);
			}
		}
	}

	public function logout()
	{
		session('user',null);
		$this->success('已退出登陆','Login/login','',1);
	}
}