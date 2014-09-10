<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class MajorAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("lab");
	}
	public function showmajor()
	{
		//$lab=D("LabView");
		//dump($lab->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"专业编号"),
				array("id"=>"3","name"=>"专业名称"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,majorno,majorname";
		$option["edit"]="addmajor";
		$option["del"]=true;
		$condtion="";
		$this->showTable2("Major",$condtion,"showmajor",$arr,$filed,"专业信息列表",$option);
	}
	
	public function  addmajor()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"专业编号","type"=>"text-M","name"=>"majorno"),
					array("title"=>"专业名称","type"=>"text-M","name"=>"majorname"),
			);
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addmajor?aa=add","添加专业信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$major=M("major");
				$majorinfo=$major->where("id=$id")->find();
	
				$forms[0]["val"]=$majorinfo["majorno"];
				$forms[1]["val"]=$majorinfo["majorname"];
	
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$majorinfo["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addlab?aa=edit","修改专业信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Major=D("Major");
			if($action=="add")
			{
				$data=$Major->create();
				if ($data) {
					if (false !== $Major->add()) {
						$this->success("添加成功",__URL__."/showmajor");
					} else {
						$this->error('数据写入错误');
					}
				}
				else
				{
					header("Content-Type:text/html; charset=utf-8");
					exit($Major->getError() . ' [ <a href="javascript:history.back()">返 回</a> ]');
				}
	
			}
			else if($action=="edit")
			{
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$Major->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Major->save($data)) {
						$this->success("修改成功",__URL__."/showmajor");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}

}
?>