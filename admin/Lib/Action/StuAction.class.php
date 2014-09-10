<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class StuAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("stu");
	}
	public function showstu()
	{
		//$model=D('StuView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"学号"),
				array("id"=>"3","name"=>"姓名"),
				
				array("id"=>"5","name"=>"身份证号"),
				
				array("id"=>"6","name"=>"班号"),
				array("id"=>"4","name"=>"性别"),
				array("id"=>"7","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,stuno,stuname,idcard,classno,sexname,collegename";
		$option["edit"]="addstu";
		$option["del"]=true;
		$condtion="";
	
		//--------------从这个开始是为了能够分类查看的--------------
		if(isset($_GET["classno"])&&$_GET["classno"]!=0)//如果有state表示是要求分类数据,0表示查询全部
		{
			$classno=isset($_GET["classno"])?$_GET["classno"]:1;
				
			$condtion="classno='$classno'";
				
		}
		//填充左下角的状态
		$this->show_class($classno);
		//-----------------------结束-----------------
		$this->showTable2("StuView",$condtion,"showstu?classno=$classno",$arr,$filed,"学生信息列表",$option);
	}
	
	public function  addstu()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"学号","type"=>"text-M","name"=>"stuno","disable"=>"true"),
					array("title"=>"姓名","type"=>"text-M","name"=>"stuname","disable"=>"true"),
					array("title"=>"性别","type"=>"riadio","name"=>"sex","items"=>array("1"=>"男","2"=>"女")),
					array("title"=>"出生年月","type"=>"time","name"=>"birth","disable"=>"true"),
					array("title"=>"身份证号","type"=>"text-M","name"=>"idcard","disable"=>"true"),
					array("title"=>"班号","type"=>"select","name"=>"classno","disable"=>"true","items"=>$this->getclass()),
					array("title"=>"学院","type"=>"select","name"=>"college","disable"=>"true","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addstu?aa=add","添加学生信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("stu");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["stuno"];
				$forms[1]["val"]=$Models["stuname"];
				$forms[2]["val"]=$Models["sex"];
				$forms[3]["val"]=$Models["birth"];
				$forms[4]["val"]=$Models["idcard"];
				$forms[5]["val"]=$Models["classno"];
				$forms[6]["val"]=$Models["college"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addstu?aa=edit","修改学生信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Stu");
			if($action=="add")
			{
				$_POST['guide']=$_POST["content"];
				$_POST['guidefile']=$_POST["guidefileupimg"][0];
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showstu");
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
				$_POST['guide']=$_POST["content"];
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$Model->create();
				$temp=$Model->where("id=$id")->find();
				$data["id"]=$id;
				$data["password"]=$temp["password"];
				if ($data) {
					if (false !== $Model->save($data)) {
						
						if(isset($_SESSION["role"])&&$_SESSION["role"]==1)
							$this->success("修改成功",__URL__."/showstu");
						else 
							$this->success("修改成功");
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
	
	public function getcourse()
	{
		$course=M("course");
		$courses=$course->select();
		$coursearr[0]="-----选择课程---";
		foreach ($courses as $key=>$value)
		{
			$coursearr[$value['id']]=$value['coursename'];
		}
		return $coursearr;
	}
	
	public function getclass()
	{
		$model=M("class");
		//只查询自然班
		$models=$model->where("type=1")->select();
		$modelsarr[0]="-----选择班---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['classno']]=$value['classname'];
		}
		return $modelsarr;
	}
	
	//显示不同的班级学生
	public function show_class($classno)
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();
		$model=M("class");
		$models=$model->where("type=1")->select();//只查询自然班
		$items[0]="-----选择班级--";
		//把类别的二维数组转为一位数组
		foreach ($models as $key=>$value)
		{
			$items[$value['classno']]=$value['classname'];
		}
	
		$select=$F->editselect("classno", $items, $classno);
		$this->assign("select",$select);
	}
}
?>