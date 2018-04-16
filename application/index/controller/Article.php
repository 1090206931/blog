<?php 
namespace app\index\controller;
use think\Controller;

class Article extends Controller
{
	public function articleDetail()
	{
		$id = Request()->get('id');
		$obj = new \app\admin\model\Article();
		$data = $obj->where('art_id',$id)->find();
		$this->assign('data',$data);
		return $this->fetch('article_detail');
	} 
}