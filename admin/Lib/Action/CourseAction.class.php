<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class CourseAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("course");
	}
	public function showcourse()
	{
		//$model=D('CourseView');
		//dump($model->select());
		$role=isset($_GET["role"])?$_GET["role"]:1;
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"编号"),
				array("id"=>"3","name"=>"名称"),
				
				array("id"=>"4","name"=>"学时"),
				array("id"=>"5","name"=>"专业"),
				array("id"=>"6","name"=>"性质"),
				array("id"=>"7","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,courseno,coursename,classhour,majorname,propertiesname,collegename";
		$option["edit"]="addcourse";
		$option["del"]=true;
		$condtion="";
		
		//--------------从这个开始是为了能够分类查看的--------------
		if(isset($_GET["major"])&&$_GET["major"]!=0)//如果有major表示是要求分类数据,0表示查询全部
		{
			$major=isset($_GET["major"])?$_GET["major"]:1;
		
			$condtion="course.major='$major'";
				
		}
		//填充左下角的状态
		$this->show_major($major);
		//-----------------------结束-----------------
		
		
		
		$this->showTable2("CourseView",$condtion,"showcourse?major=$major",$arr,$filed,"课程信息",$option);
	}
	
	public function  addcourse()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"课程编号","type"=>"text-M","name"=>"courseno"),
					array("title"=>"课程名称","type"=>"text-M","name"=>"coursename"),
					array("title"=>"专业","type"=>"select","name"=>"major","items"=>$this->getmajor()),
					array("title"=>"性质","type"=>"riadio","name"=>"properties","items"=>$this->gettype()),
					array("title"=>"学时","type"=>"text-M","name"=>"classhour"),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addcourse?aa=add","添加课程","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("course");
				$Models=$Model->where("id=$id")->find();
	
				$forms[0]["val"]=$Models["courseno"];
				$forms[1]["val"]=$Models["coursename"];
				$forms[2]["val"]=$Models["major"];
				$forms[3]["val"]=$Models["properties"];
				$forms[4]["val"]=$Models["classhour"];
				$forms[5]["val"]=$Models["college"];
				$forms[6]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addcourse?aa=edit","修改课程信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Course");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showcourse");
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
						$this->success("修改成功",__URL__."/showcourse");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
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
	
	public function gettype()
	{
		$model=M("coursetype");
		$models=$model->select();
		//$majorarr[0]="-----选择专业---";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['typename'];
		}
		return $modelarr;
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
	
	
	
	public function show_major($major)
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();
		$model=M("major");
		$models=$model->where("")->select();//只查询自然班
		$items[0]="-----选择专业--";
		//把类别的二维数组转为一位数组
		foreach ($models as $key=>$value)
		{
			$items[$value['id']]=$value['majorname'];
		}
		
		$select=$F->editselect("major", $items, $major);
		$this->assign("select",$select);
	}
}
?>