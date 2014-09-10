<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类是staff表对应功能实现类
class StaffAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("staff");
	}
	public function showstaff()
	{
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"编号"),
				array("id"=>"3","name"=>"姓名"),
				array("id"=>"5","name"=>"生日"),
				array("id"=>"4","name"=>"性别"),
				array("id"=>"7","name"=>"工作"),
				array("id"=>"8","name"=>"专业"),
				array("id"=>"6","name"=>"职称"),
				array("id"=>"9","name"=>"学院"),
				
		);
		$filed="id,no,name,sexname,birth,titlename,jobname,majorname,collegename";
		$option["edit"]="addstaff";
		$option["del"]=true;
		$condtion="";
		$this->showTable2("StaffView",$condtion,"showstaff",$arr,$filed,"基本员工信息表",$option);
	}
	
	public function  addstaff()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
			
			$forms=array(
					array("title"=>"编号","type"=>"text-M","name"=>"no"),
					array("title"=>"姓名","type"=>"text-M","name"=>"name"),
					array("title"=>"性别","type"=>"riadio","name"=>"sex","items"=>array(1=>"男",2=>"女")),
					array("title"=>"出生日期","type"=>"time","name"=>"birth"),
					array("title"=>"职称","type"=>"riadio","name"=>"title","items"=>$this->gettitle()),
					array("title"=>"职业","type"=>"riadio","name"=>"job","items"=>$this->getjob()),
					array("title"=>"专业","type"=>"select","name"=>"major","items"=>$this->getmajor()),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addstaff?aa=add","添加基本员工信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
				
				$staff=M("staff");
				$staffs=$staff->where("id=$id")->find();
	
				$forms[0]["val"]=$staffs["no"];
				$forms[1]["val"]=$staffs["name"];
				$forms[2]["val"]=$staffs["sex"];
				$forms[3]["val"]=$staffs["birth"];
				$forms[4]["val"]=$staffs["title"];
				$forms[5]["val"]=$staffs["job"];
				$forms[6]["val"]=$staffs["major"];
				$forms[7]["val"]=$staffs["college"];
				
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$staffs["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addstaff?aa=edit","修改员工信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Staff = D("Staff");
			if($action=="add")
			{
				$data=$Staff->create();
				if ($data) {
					if (false !== $Staff->add()) {
						$this->success("添加成功",__URL__."/showstaff");
					} else {
						$this->error('数据写入错误');
					}
				}
				else
				{
					header("Content-Type:text/html; charset=utf-8");
					exit($Staff->getError() . ' [ <a href="javascript:history.back()">返 回</a> ]');
				}
	
			}
			else if($action=="edit")
			{
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$Staff->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Staff->save($data)) {
						if(isset($_SESSION["role"])&&$_SESSION["role"]==1)
							$this->success("修改成功",__URL__."/showstaff");
						else
							$this->success("修改成功");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	public function getjob()
	{
		$job=M("job");
		$jobs=$job->select();
		foreach ($jobs as $key=>$value)
		{
			$jobarr[$value['id']]=$value['jobname'];
		}
		return $jobarr;
	}

	public function getmajor()
	{
		$major=M("major");
		$majors=$major->select();
		$majorarr[0]="-----选择专业---";
		foreach ($majors as $key=>$value)
		{
			$majorarr[$value['id']]=$value['majorname'];
		}
		return $majorarr;
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
	
	public function gettitle()
	{
		$title=M("title");
		$titles=$title->select();
		foreach ($titles as $key=>$value)
		{
			$titlearr[$value['id']]=$value['titlename'];
		}
		return $titlearr;
	}
}
?>