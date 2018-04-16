<?php 
namespace app\admin\controller;
use app\admin\controller;
use think\Request;
class Article extends Common
{

	public function article_list() 
	{
		$article = new \app\admin\model\Article;
		$data = $article ->alias('a')->field('a.*,b.name,c.cate_name')->join('admin b','a.id = b.id')->join('cate c','a.cat_id = c.cat_id')->select();
		
		$this->assign('data',$data);
		return $this->fetch('article-list');
	}
	public function article_add()
	{
		if(Request::instance()->isPost()){
			$data = Request::instance()->Post();
			$file = Request::instance()->File('thumb');					
			$info = $file->move(ROOT_PATH.'public/uploads');

			if($info){
				
				$data['thumb'] = $info->getSaveName();
				
			}else{
				return [
					'code'=>'2',
					'msg' =>'文件上传失败！'
				];
			}
			$article = new \app\admin\model\Article;
			$res = $article->save($data);
			if($res){
				return [
					'code'=>'1',
					'msg'=>'添加成功！'
				];
			}else{
				return [
					'code'=>'3',
					'msg'=>'添加失败！'
				];
			}
			return[
				'code'=>'4',
				'msg'=>'未知错误，请重试！'
			];

		}else{
			return $this->fetch('Article-add');
		}
	 	
	}
}