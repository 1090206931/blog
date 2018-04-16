<?php 
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if(!Request::instance()->session('user')){
			$this->error('你还没有登陆','Login/login');
		}
	}
}