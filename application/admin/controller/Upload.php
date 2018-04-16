<?php 
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Upload extends Common
{
	public function upload()
	{
		$data = Request::instance()->file('file');
		$info = $data->move(ROOT_PATH.'public/uploads');
		if($info){
			dump($info);
			
		}else{
			echo $data->getError();
		}
	}
}