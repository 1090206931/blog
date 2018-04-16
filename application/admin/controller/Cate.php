<?php 
namespace app\admin\Controller;
use think\Controller;
class Cate extends Controller
{
	protected $table = 'cate';
	protected $pk = 'cat_id';
	public function test(){
		echo ROOT_PATH;
	}
}