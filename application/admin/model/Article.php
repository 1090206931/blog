<?php 
namespace app\admin\model;
use think\Model;
class Article extends Model
{
	protected $table = 'article';
	protected $pk = 'art_id';
	protected $insert = ['id','ctime'];

	protected function setIdAttr()
	{
		return  Request()->session('user.id');
	}
	protected function setCtimeAttr()
	{
		return  time();
	}

}