<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class NoticeAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("course");
	}
	public function shownotice()
	{
		//$model=D('NoticeView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"标题"),
				array("id"=>"3","name"=>"内容"),
				array("id"=>"4","name"=>"类型"),
				array("id"=>"5","name"=>"时间"),
				array("id"=>"6","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,title,content,type,time,collegename";
		$option["edit"]="addnotice";
		$option["del"]=true;
		$condtion="college=1";
		$this->showTable2("NoticeView",$condtion,"shownotice",$arr,$filed,"公告信息",$option);
	}
	
	public function  addnotice()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"标题","type"=>"text-M","name"=>"title"),
					array("title"=>"内容","type"=>"kind","name"=>"content"),
					array("title"=>"时间","type"=>"time","name"=>"time"),
					array("title"=>"类型","type"=>"riadio","name"=>"type","items"=>array("1"=>"通知","2"=>"公告")),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addnotice?aa=add","添加公告信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("notice");
				$Models=$Model->where("id=$id")->find();
	
				$forms[0]["val"]=$Models["title"];
				$forms[1]["val"]=$Models["content"];
				$forms[2]["val"]=$Models["time"];
				$forms[3]["val"]=$Models["type"];
				$forms[4]["val"]=$Models["college"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addnotice?aa=edit","修改公告信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Notice");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/shownotice");
					} else {
						$this->error('数据写入错误');
					}
				}
				else
				{
					header("Content-Type:text/html; charset=utf-8");
					exit($Model->getError() . ' [ <a href="javascript:history.back()">返 回</a> ]');
				}
	
			}
			else if($action=="edit")
			{
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$Model->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Model->save($data)) {
						$this->success("修改成功",__URL__."/shownotice");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	public function getcollege()
	{
		$college=M("college");
		$colleges=$college->select();
		$collegearr[0]="-----选择学院---";
		foreach ($colleges as $key=>$value)
		{
			$collegearr[$value['id']]=$value['collegename'];
		}
		return $collegearr;
	}
	
}
?>