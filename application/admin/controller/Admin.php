<?php 
namespace app\admin\controller;
use app\admin\controller;
use think\Request;

class Admin extends Common
{
	public function adminList()
	{
		$res = \app\admin\model\Admin::All(function($where){
			$where -> field(['id','uname','name','phone','mail','role_id','state','add_time']);
		});
		$this->assign('data',$res);
		return $this->fetch('admin-list');
	}

	public function adminStop()
	{
		$id = Request::instance()->post('id');
		$user = \app\admin\model\Admin::get($id);
		$user->state = 0;
		$res = $user->save();
	
		if($res){
			return [
				'code'=>1,
				'msg'=>'已停用！'
			];
		}else{
			return [
				'code'=>0,
				'msg'=>'操作失败了！'
			];
		}
	}
	public function adminStart()
	{
		$id = Request::instance()->post('id');
		$user = \app\admin\model\Admin::get($id);
		$user->state = 1;
		$res = $user->save();
		if($res){
			return [
				'code'=>1,
				'msg'=>'已启用！'
			];
		}else{
			return [
				'code'=>0,
				'msg'=>'操作失败了！'
			];
		}
	}
}