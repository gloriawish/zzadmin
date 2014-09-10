<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class LabAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("lab");
	}
	public function showlab()
	{
		//$lab=D("LabView");
		//dump($lab->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"编号"),
				array("id"=>"3","name"=>"名称"),
				array("id"=>"4","name"=>"描述"),
				array("id"=>"5","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,labno,labname,labinfo,collegename";
		$option["edit"]="addlab";
		$option["del"]=true;
		$condtion="";
		$this->showTable2("LabView",$condtion,"showlab",$arr,$filed,"实验室信息列表",$option);
	}
	
	public function  addlab()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"实验室编号","type"=>"text-M","name"=>"labno"),
					array("title"=>"实验室名称","type"=>"text-M","name"=>"labname"),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
					array("title"=>"描述","type"=>"text","name"=>"labinfo"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addlab?aa=add","添加实验室","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Lab=M("lab");
				$Labs=$Lab->where("id=$id")->find();
	
				$forms[0]["val"]=$Labs["labno"];
				$forms[1]["val"]=$Labs["labname"];
				$forms[2]["val"]=$Labs["college"];
				$forms[3]["val"]=$Labs["labinfo"];
	
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Labs["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addlab?aa=edit","修改实验室信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Lab=D("Lab");
			if($action=="add")
			{
				$data=$Lab->create();
				if ($data) {
					if (false !== $Lab->add()) {
						$this->success("添加成功",__URL__."/showlab");
					} else {
						$this->error('数据写入错误');
					}
				}
				else
				{
					header("Content-Type:text/html; charset=utf-8");
					exit($Lab->getError() . ' [ <a href="javascript:history.back()">返 回</a> ]');
				}
	
			}
			else if($action=="edit")
			{
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$Lab->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Lab->save($data)) {
						$this->success("修改成功",__URL__."/showlab");
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