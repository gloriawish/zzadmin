<?php
//用来删除缓存的方法
class CacheAction extends Action{
	public function index(){
		$abs_dir=dirname(dirname(dirname(dirname(__FILE__))));
		//这里主要是为了得到项目的根目录，绝对路径
		//website absolute directory [app root directory]
		$text=$this->deleteFile($abs_dir.'/home/Runtime');
		$text=$text.$this->deleteFile($abs_dir.'/admin/Runtime');
		$this->assign('text',$text);
		$this->display("Index:cache");
	}
	protected function deleteFile($path){
		global $text;
		if (is_dir($path)){
			$handle=opendir($path);			
			while($list=readdir($handle)){
				if ($list=='.' || $list=='..'){
					//do nothing
				}else{
					$list=$path.'/'.$list;
				}
				switch ($list){
					case $list=='.' || $list=='..':
						//echo $list.' this is  special directory ';
						continue;
					case is_file($list):
						if (unlink($list)){
							$text=$text.'<span>delete file</span> '.$list.'';
						}else {
							$text=$text. 'delete file failure';
						}
						break;
					case is_dir($list):
						$text=$text. 'open directory '.$list.'';
						$this->deleteFile($list);
						break;
					default:
						//$text=$text.'default action '.$list.'';
						continue;
				}
			}
		}else{
			$text=$text. $path.' sorry the path is not directory';
		}
		return  $text;
	}
}
?>