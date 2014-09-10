<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class ExpitemAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("expitem");
	}
	public function showexpitem()
	{
		//$model=D('ExpitemView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"实验名称"),
				array("id"=>"3","name"=>"实验指导"),
				array("id"=>"4","name"=>"学时"),
				array("id"=>"5","name"=>"课程名称"),
				array("id"=>"5","name"=>"专业"),
				array("id"=>"6","name"=>"实验类型"),
				array("id"=>"7","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,expname,guide,exphour,coursename,majorname,typename,collegename";
		$option["edit"]="addexpitem";
		$option["del"]=true;
		$condtion="";
		
		//--------------从这个开始是为了能够分类查看的--------------
		if(isset($_GET["courseid"])&&$_GET["courseid"]!=0)//如果有courseid表示是要求分类数据,0表示查询全部
		{
			$courseid=isset($_GET["courseid"])?$_GET["courseid"]:1;
		
			$condtion="courseid='$courseid'";
		
		}
		//填充左下角的状态
		$this->show_course($courseid);
		
		
		
		$this->showTable2("ExpitemView",$condtion,"showexpitem?courseid=$courseid",$arr,$filed,"实验项目信息",$option);
	}
	
	public function  addexpitem()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"实验课程","type"=>"select","name"=>"courseid","items"=>$this->getcourse()),
					array("title"=>"实验名称","type"=>"text-M","name"=>"expname"),
					array("title"=>"实验指导","type"=>"kind","name"=>"guide"),
					array("title"=>"实验类型","type"=>"riadio","name"=>"type","items"=>$this->getexptype()),
					array("title"=>"实验学时(<font color='red'>请输入数字</font>)","type"=>"text-S","name"=>"exphour"),
					array("title"=>"附件","type"=>"upfile","name"=>"guidefile"),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addexpitem?aa=add","添加实验项目信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("expitem");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["courseid"];
				$forms[1]["val"]=$Models["expname"];
				$forms[2]["val"]=$Models["guide"];
				$forms[3]["val"]=$Models["type"];
				$forms[4]["val"]=$Models["exphour"];
				$forms[5]["val"]=$Models["guidefile"];
				$forms[6]["val"]=$Models["college"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addexpitem?aa=edit","修改实验项目信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Expitem");
			if($action=="add")
			{
				$_POST['guide']=$_POST["content"];
				$_POST['guidefile']=$_POST["guidefileupimg"][0];
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						
						$this->success("添加成功",__URL__."/showexpitem");
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
				$_POST['guidefile']=$_POST["guidefileupimg"][0];
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$Model->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Model->save($data)) {
						$this->success("修改成功",__URL__."/showexpitem");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	
	//显示不同的班级学生
	public function show_course($courseid)
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();
		$model=M("course");
		$models=$model->where("")->select();
		$items[0]="-----选择课程--";
		//把类别的二维数组转为一位数组
		foreach ($models as $key=>$value)
		{
			$items[$value['id']]=$value['coursename'];
		}
	
		$select=$F->editselect("course", $items, $courseid);
		$this->assign("select",$select);
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
	
	public function getexptype()
	{
		$model=M("exptype");
		$models=$model->select();
		//$coursearr[0]="-----选择课程---";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['typename'];
		}
		return $modelarr;
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
}
?>