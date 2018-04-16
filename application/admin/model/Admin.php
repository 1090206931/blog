<?php 
namespace app\admin\model;
use think\Model;
class Admin extends Model
{
	protected $table = 'admin';
	protected $pk = 'id';
	public function getstateAttr($value)
	{
		$state = [1=>'已启用',0=>'已禁用'];
		return $state[$value];
	}
	public function getroleIdAttr($value)
	{
		$role = [0=>'超级管理员',1=>'普通管理员',2=>'编辑'];
		return $role[$value];
	}

	public static function checkUser($user,$pass)
	{
		
		$where = function ($query) use ($user){
			
			$query->field(['id','pwd','name'])->where('uname','=',$user);

		};
		$res = self::get($where);
		if($res){
			if($res['pwd'] === $pass){
				session('user',$res);
				return true;
			}else{
				return '密码错误';
			}
		}else{ 
			return '用户不存在';
		}

	}

}