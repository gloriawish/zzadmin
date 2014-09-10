<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class ClassAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("class");
	}
	public function showclass()
	{
		//$model=D('ClassView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"班级编号"),
				array("id"=>"3","name"=>"班级名称"),
				array("id"=>"4","name"=>"人数"),
				array("id"=>"6","name"=>"年级"),
				array("id"=>"5","name"=>"学期"),
				
				array("id"=>"7","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,classno,classname,count,class,termname,collegename";
		$option["edit"]="addclass";
		$option["del"]=true;
		$option["add"]=true;
		$option["self1"]=array("title"=>"查看学生","url"=>"showstu?id=","img"=>"look3.png");
		//$option["self2"]=array("title"=>"添加学生","url"=>"showaddstu?id=","img"=>"add.png");
		
		//班级类型  1-》自然班  2-》教学班
		$type=isset($_GET["type"])?$_GET["type"]:1;
		$condtion="type=$type";
		$this->assign("classtype",$type);
		
		
		
		if($type==1)
		{
			$s="自然班信息列表";
			//--------------从这个开始是为了能够分类查看的--------------
			if(isset($_GET["class"])&&$_GET["class"]!=0)//如果有class表示是要求分类数据,0表示查询全部
			{
				$class=isset($_GET["class"])?$_GET["class"]:1;
			
				$condtion=$condtion.' and '."class='$class'";
					
			}
			//填充左下角的状态
			$this->show_class2($class);
			//-----------------------结束-----------------
			$this->showTable2("ClassView",$condtion,"showclass?type=$type&class=$class",$arr,$filed,$s,$option);
		}
		else if($type==2)
		{
			$s="教学班信息列表";
			
			//--------------从这个开始是为了能够分类查看的--------------
			if(isset($_GET["class"])&&$_GET["class"]!=0)//如果有class表示是要求分类数据,0表示查询全部
			{
				$class=isset($_GET["class"])?$_GET["class"]:1;
					
				$condtion=$condtion.' and '."term='$class'";
					
			}
			//填充左下角的状态
				$this->show_term($class);
			//-----------------------结束-----------------
			$this->showTable2("ClassView",$condtion,"showclass?type=$type&class=$class",$arr,$filed,$s,$option);
		}
		
		
		
		
	}
	
	//显示该班的学生
	public function showstu()
	{
		//$model=D('ClassstuView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"学号"),
				array("id"=>"3","name"=>"姓名"),
				array("id"=>"5","name"=>"身份证号"),
				array("id"=>"4","name"=>"性别"),
				
				array("id"=>"6","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,stuno,stuname,idcard,sexname,collegename";
		//$option["edit"]="addstu";
		$option["del"]=true;
		$classid=$_GET["id"];
		
		$model=M("class")->where("id=$classid")->find();//找到当前这个班级
		if($model["type"]==1)//如果是自然班
		{
			$classno=$model["classno"];
			$condtion="classno=$classno";
			$this->showTable2("StuView",$condtion,"showstu?id=$classid",$arr,$filed,"该班学生信息列表",$option);
		}
		else
		{
			$condtion="classid=$classid";
			$this->showTable2("ClassstuView",$condtion,"showstu?id=$classid",$arr,$filed,"该班学生信息列表",$option);
		}
	}
	
	
	//显示该班的学生，能不能实现 只显示未添加的学生呢
	public function showaddstu()
	{
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"学号"),
				array("id"=>"3","name"=>"姓名"),
				array("id"=>"4","name"=>"班号"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,stuno,stuname,classno";
		$classid=$_GET["id"];
		$option="";
		$condtion="";
		$this->assign("classid",$classid);
		
		$this->show1();
	
		$model=M("class")->where("id=$classid")->find();//找到当前这个班级
		$ids="";
		if($model["type"]==1)//如果是自然班
		{
			$this->error("自然班不能进行此操作!");
		}
		else
		{
		
			//查询出已经有的人
			$classstu=M("classstu")->where("classid=$classid")->select();
			
			if($classstu!=null)
			{
				foreach ($classstu as $value) {
			
					$ids=$ids.$value["stuid"].",";
				}
				$ids = substr($ids,0,-1);//除去最后一个逗号
				$condtion="id not in ($ids)";
			}
			else
			{
				$ids=null;;
			}
			
		}
		
		//--------------从这个开始是为了能够分类查看的--------------
		if(isset($_GET["classno"])&&$_GET["classno"]!=0)//如果有state表示是要求分类数据,0表示查询全部
		{
			$classno=isset($_GET["classno"])?$_GET["classno"]:1;
				if($ids!=null)
				{
					$condtion="classno='$classno' and id not in ($ids)";
				}
				else
				{
					$condtion="classno='$classno'";
				}
				
		}
		//填充左下角的状态
		$this->show_class($classno);
		//-----------------------结束-----------------
		
		
		
		$this->showTable2("stu",$condtion,"showaddstu?id=$classid&classno=$classno",$arr,$filed,"学生信息列表",$option,'table2');
	}
	
	//把选择的学生添加进去
	public function addstu(){
		$classid=$_POST["classid"];
		$ischeck=$_POST["checkd"];
		$nocheck=$_POST["nocheckd"];
		$ALLSTU=$_POST["isall"];
		$classno=$_POST["classno"];
		//去除最后一个#号
		$ischeck = substr($ischeck,0,-1);
		$nocheck = substr($nocheck,0,-1);
		
		$ischeckarr = explode("#", $ischeck);//把字符串分割为数组
		$nocheckarr=explode("#", $nocheck);
		
		$model=D("Classstu");
		$model->startTrans();//开始事物
		if($ALLSTU=="false")
		{
			
			foreach ($ischeckarr as $val)
			{
				$data=array("classid"=>$classid,"stuid"=>$val);
				
				if($val!="")//不为空
				{
					if(!$model->add($data)) //保存这个学生
					{
						$model->rollback();
						$this->ajaxReturn("操作失败!","已回滚2",2);
						return;
					}
				}
			}
		}
		else
		{
			$allstuinfo=M("stu")->where("classno='$classno'")->select();
			$ClassStu=M("classstu");
			foreach ($allstuinfo as $val)
			{
				$stuid=$val["id"];
				$data=array("classid"=>$classid,"stuid"=>$stuid);
				$tmp=$ClassStu->where("stuid=$stuid and classid=$classid")->find();
				if($tmp==null)
				{
					if(!$model->add($data)) //保存这个学生
					{
						$model->rollback();
						$this->ajaxReturn("操作失败!","已回滚2",2);
						return;
					}
				}
				
			}
		}
		$model->commit();//提交事物
		
		$this->ajaxReturn("操作成功","操作成功",1);
	
	}
	
	
	
	public function  addclass()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"班级编号","type"=>"text-M","name"=>"classno"),
					array("title"=>"班级名称","type"=>"text-M","name"=>"classname"),
					array("title"=>"人数","type"=>"text-M","name"=>"count"),
					array("title"=>"学期","type"=>"select","name"=>"term","items"=>$this->getterm()),
					array("title"=>"年级","type"=>"select","name"=>"class","items"=>$this->getclassonly()),
					array("title"=>"班级类型","type"=>"riadio","name"=>"type","items"=>array("1"=>"自然班","2"=>"教学班")),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addclass?aa=add","添加班级信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("class");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["classno"];
				$forms[1]["val"]=$Models["classname"];
				$forms[2]["val"]=$Models["count"];
				$forms[3]["val"]=$Models["term"];
				$forms[4]["val"]=$Models["class"];
				$forms[5]["val"]=$Models["type"];
				$forms[6]["val"]=$Models["college"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addclass?aa=edit","修改班级信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Class");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showclass");
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
						$this->success("修改成功",__URL__."/showclass");
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
	public function getterm()
	{
		$model=M("term");
		$models=$model->select();
		//$modelarr[0]="-----选择学期 （自然班不选此项）---";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['termname'];
		}
		return $modelarr;
	}
	public function getclassonly()
	{
		return array(
				"0"=>"请选择年级",
				"2010"=>"2010级",
				"2011"=>"2011级",
				"2012"=>"2012级",
				"2013"=>"2013级",
				"2014"=>"2014级",
				"2015"=>"2015级",
				"2016"=>"2016级",
				"2017"=>"2017级",
				"2018"=>"2018级",
				"2019"=>"2019级",
				"2020"=>"2020级",
				);
	}
	
	public function show_term($term)
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();
		$model=M("term");
		$models=$model->where("")->select();//
		$items[0]="-----选择学期--";
		//把类别的二维数组转为一位数组
		foreach ($models as $key=>$value)
		{
			$items[$value['id']]=$value['termname'];
		}
	
		$select=$F->editselect("class", $items, $term);
		$this->assign("select",$select);
	}
	//显示不同的班级学生
	public function show_class($classno)
	{
		require_once COMMONPATH.'Form.class.php';
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
	//显示不同年级的 教学班
	public function show_class2($class)
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();
		
		$select=$F->editselect("class", $this->getclassonly(), $class);
		$this->assign("select",$select);
	}
	public function show1()
	{
		require_once COMMONPATH.'Form.class.php';
		$F=new Form();
		$items[1]="当前班级所有学生";
		$this->assign("otherform",$F->check("ALLSTU", $items));
	}
}
?>