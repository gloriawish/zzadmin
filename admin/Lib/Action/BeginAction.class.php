<?php
require_once COMMONPATH.'Fun.class.php';
require_once COMMONPATH.'BaseAction.class.php';
require_once COMMONPATH.'GetFileName.class.php';
require_once COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class BeginAction extends BaseAction {
	
	public function del()
	{
		//$id=$_POST["id'"];
		//$this->delete("stu");
	}
	public function showbegin()
	{
		//$model=D('BegincourseView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"班名"),
				array("id"=>"3","name"=>"年级"),
				
				array("id"=>"4","name"=>"开课老师"),
				array("id"=>"4","name"=>"课程名称"),
				
				array("id"=>"6","name"=>"专业"),
				array("id"=>"5","name"=>"课程性质"),
				array("id"=>"7","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,classname,class,name,coursename,majorname,propertiesname,collegename";
		$option["edit"]="addbegin";
		//$option["del"]=true;
		$condtion="";
	
		//--------------从这个开始是为了能够分类查看的--------------
		if(isset($_GET["xx"])&&$_GET["xx"]!=0)//如果有state表示是要求分类数据,0表示查询全部
		{
			$xx=isset($_GET["xx"])?$_GET["xx"]:1;
				
			$condtion="xx='xx'";
				
		}
		//填充左下角的状态
		//$this->show_class($xx);
		//-----------------------结束-----------------
		$this->showTable2("BegincourseView",$condtion,"showbegin",$arr,$filed,"开课信息列表",$option);
	}
	
	public function  addbegin()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"开课班级","type"=>"select","name"=>"classid","items"=>$this->getclass()),
					array("title"=>"开课教师","type"=>"select","name"=>"teacherid","items"=>$this->getteacher()),
					array("title"=>"课程","type"=>"select","name"=>"courseid","items"=>$this->getcourse()),
					array("title"=>"开课学期","type"=>"select","name"=>"term",'items'=>$this->getterm()),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addbegin?aa=add","添加开课信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("begincourse");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["classid"];
				$forms[1]["val"]=$Models["teacherid"];
				$forms[2]["val"]=$Models["courseid"];
				$forms[3]["val"]=$Models["termid"];
				$forms[4]["val"]=$Models["college"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addbegin?aa=edit","修改开课信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Begincourse");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showbegin");

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
						$this->success("修改成功",__URL__."/showbegin");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	public function showmybegin()
	{
		$classids= $this->getstuclassids();
		$stuid=$this->getstuid();//我登陆的时候的id
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"开课班级"),
				array("id"=>"3","name"=>"开课老师"),
				array("id"=>"4","name"=>"课程名称"),
				array("id"=>"5","name"=>"专业"),
				array("id"=>"6","name"=>"课程性质"),
				array("id"=>"8","name"=>"开课学期"),

				array("id"=>"9","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,classname,name,coursename,majorname,propertiesname,termname,collegename";
		$condtion="classid in ($classids)";
		$option["self1"]=array("title"=>"查看实验项目","url"=>"showexp?id=","img"=>"look.png");
		$option["self2"]=array("title"=>"查看我已提交的实验报告","url"=>"showmyreport?id=","img"=>"eye.png");

		$this->showTable2("BegincourseView",$condtion,"showmybegin",$arr,$filed,"开课信息列表",$option);
	}
	//显示教师已开的课程
	public function showteacherbegin()
	{
		
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"开课班级"),
				array("id"=>"3","name"=>"开课老师"),
				array("id"=>"4","name"=>"课程名称"),
				array("id"=>"5","name"=>"专业"),
				array("id"=>"6","name"=>"课程性质"),
				array("id"=>"8","name"=>"开课学期"),
		
				array("id"=>"9","name"=>"学院"),
		
		);
		$teacherid=$this->getteacherid();
		//字段顺序不能和视图模型里面的不一致
		$filed="id,classname,name,coursename,majorname,propertiesname,termname,collegename";
		$condtion="teacherid=$teacherid";
		$option["self1"]=array("title"=>"查看实验项目","url"=>"showexp?aa=teacher&id=","img"=>"look.png");
		
		$this->showTable2("BegincourseView",$condtion,"showteacherbegin",$arr,$filed,"我已开的课程列表",$option);
		
	}
	
	
	
	
	
	
	
	//显示某个开课的课程下的实验项目
	public function showexp()
	{
		//获取开课id
		$beginid=isset($_GET['id'])?$_GET['id']:"null";
		
		$model=D("Begincourse")->where("id=$beginid")->find();
		if($model!=null)
		{
			$courseid=$model["courseid"];
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
			
			$condtion="courseid=$courseid";
			$this->assign("beginid",$beginid);
			if(isset($_GET["aa"])&&$_GET["aa"]=="teacher")//说明是教师查看
			{
				$this->assign("notify_report_teacher",true);
				$option["self1"]=array("title"=>"查看学生提交的实验报告","url"=>"showstureport?beginid=$beginid&expid=","img"=>"look.png");
				$this->showTable2("ExpitemView",$condtion,"showexp?aa=teacher&id=$beginid",$arr,$filed,"该课程的实验项目信息",$option);
			}
			else
			{
				$this->assign("notify_report",true);
				$option["self1"]=array("title"=>"提交实验报告","url"=>"addreport?aa=showedit&beginid=$beginid&id=","img"=>"paper_content_pencil_48.png");
				$option["lookgrade"]=true;
				//$option["self2"]=array("title"=>"修改实验报告","url"=>"addreport?aa=showedit&beginid=$beginid&id=","img"=>"hammer_screwdriver.png");
				$option["dl"]=true;
				$this->assign("downtype","guide");
				$this->showTable2("ExpitemView",$condtion,"showexp?id=$beginid",$arr,$filed,"该课程的实验项目信息",$option);
			}
			
			
		}
		else
		{
			$this->error("获取实验项目失败");
		}
	}
	

	//添加实验报告
	public function  addreport()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"开课信息","type"=>"select","name"=>"beginid","disable"=>"true","items"=>$this->getbegin()),
					//array("title"=>"课程名称","type"=>"select","name"=>"coursename","items"=>$this->getcourse()),
					array("title"=>"指导老师","type"=>"select","name"=>"name","disable"=>"true","items"=>$this->getteacher()),
					array("title"=>"实验名称","type"=>"select","name"=>"expid","disable"=>"true","items"=>$this->getexpitem()),
					array("title"=>"实验类型","type"=>"select","name"=>"typename","disable"=>"true","items"=>$this->getexptype()),
					//array("title"=>"实验指导","type"=>"kind","name"=>"guide"),
					array("title"=>"实验报告","type"=>"upfile","name"=>"reportfile"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addreport?aa=add","添加实验报告信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的实验id
				$expid=isset($_GET['id'])?$_GET['id']:"null";
				//获取开课的id
				$beginid=isset($_GET['beginid'])?$_GET['beginid']:"null";
				$stuid=$this->getstuid();//获取学生id
				
				//判断该生是否这个实验已经提交实验报告
				$report = D("Expreport")->where("beginid=$beginid and expid=$expid and stuid=$stuid")->find();
				
				$url="addreport?aa=add";//保存是修改实验报告 还是添加实验报告
				if($report!=null)
				{
					$url="addreport?aa=edit";
					
				}
				if($report["score"]!=null)
					$this->error("老师已经批改，你不能修改了");
				
				
				$Exps=D("ExpitemView")->where("expitem.id=$expid")->find();
				$Models=D("BegincourseView")->where("begincourse.id=$beginid")->find();
	
				//dump($Exps);
				//dump($Models);
				$forms[0]["val"]=$beginid;
				$forms[1]["val"]=$Models["userid"];//实验指导老师姓名
				$forms[2]["val"]=$Exps["id"];
				$forms[3]["val"]=$Exps["typeid"];
				//$forms[4]["val"]=$Exps["guide"];
				$forms[4]["val"]=$report["reportfile"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$report['id']);
				//$forms[]=array("title"=>"","type"=>"hidden","name"=>"expid","val"=>$expid);
				//调用显示编辑表单的方法
				$this->showeditform($forms, $url,"添加实验报告信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Expreport");
			
			$_POST["stuid"]=$this->getstuid();//应该从session里面获取stuid
			$_POST["reportfile"]=$_POST["reportfileupimg"][0];
			$beginid=$_POST["beginid"];
			if($action=="add")
			{
				
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showmyreport?id=$beginid");
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
					if (false != $Model->save($data)) {
						$this->success("操作成功",__URL__."/showmyreport?id=$beginid");
					} else {
						$this->error('操作失败');
					}
				}
	
			}
	
		}
	}
	
	//显示我的成绩
	public function showmygrade()
	{
		$beginid=$_POST["beginid"];
		$expid=$_POST["expid"];
		$stuid=$this->getstuid();//我登陆的时候的id
		$order=M("order");
		if($beginid==null||$expid==null)
		{
			$this->ajaxReturn("参数错误","参数错误",2);
			return;
		}
		//判断该生是否这个实验已经提交实验报告
		$report = D("Expreport")->where("beginid=$beginid and expid=$expid and stuid=$stuid")->find();
		if($report==null)
		{
			$this->ajaxReturn("你没有提交实验报告，不能查看成绩","没有成绩",2);
		}
	
		if($report["score"]!=null)
		{
			if($report["score"]!="")
			{
				$this->ajaxReturn($report["remark"],$report["score"],1);
				return;
			}
			else {
				$this->ajaxReturn("系统错误","查询失败",2);
				return;
			}
				
		}
		else
		{
			$this->ajaxReturn("老师还未批改","查询失败",2);
			return;
		}
	}
	//查看我某个开课课程下面的所有实验报告
	public function showmyreport()
	{	
		if(isset($_GET["id"]))
		{
			$beginid=$_GET["id"];
		}
		else
		{
			$this->error("参数错误");
		}
		//$report = D("Expreport")->where("beginid=$beginid and stuid=$stuid")->select();
		
		$stuid=$this->getstuid();//我登陆的时候的id
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"成绩"),
				array("id"=>"3","name"=>"评语"),
				array("id"=>"4","name"=>"课程名称"),
				
				array("id"=>"6","name"=>"实验名称"),
				array("id"=>"5","name"=>"开课老师"),
				array("id"=>"8","name"=>"学号"),
				array("id"=>"9","name"=>"姓名"),
		
		);
		$option="";
		//字段顺序不能和视图模型里面的不一致
		$filed="id,score,remark,coursename,name,expname,stuno,stuname";
		//查询条件就是stuid和开课id（不需要课程id，应为一个beginid就对应了一个课程id）
		$condtion="beginid=$beginid and stuid=$stuid";
		
		$this->showTable2("ExpreportView",$condtion,"showmyreport?id=$beginid",$arr,$filed,"我的实验报告信息列表",$option);
	}
	//查看在该开课下的实验项目下的所有实验报告
	public function showstureport()
	{
		
		if(isset($_GET["expid"])&&isset($_GET["beginid"]))
		{
			$expid=$_GET["expid"];
			$beginid=$_GET["beginid"];
		}
		else
		{
			$this->error("参数错误");
		}
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"成绩"),
				array("id"=>"3","name"=>"评语"),
				array("id"=>"4","name"=>"课程名称"),
		
				array("id"=>"6","name"=>"实验名称"),
				array("id"=>"5","name"=>"开课老师"),
				array("id"=>"8","name"=>"学号"),
				array("id"=>"9","name"=>"姓名"),
		
		);
		$option="";
		//字段顺序不能和视图模型里面的不一致
		$filed="id,score,remark,coursename,name,expname,stuno,stuname";
		//查询条件就是stuid和开课id（不需要课程id，应为一个beginid就对应了一个课程id）
		$condtion="beginid=$beginid and expid=$expid";
		$option["addgrade"]=true;
		$option["dl"]=true;
		$this->assign("downtype","report");
		$this->showTable2("ExpreportView",$condtion,"showstureport?beginid=$beginid&expid=$expid",$arr,$filed,"该实验项目所有的实验报告信息列表",$option);
		
	}
	
	
	
	//显示打分的界面的方法
	public function showscore()
	{
		$id=$_GET["id"];
		$forms=array(
				array("title"=>"成绩","type"=>"text-M","name"=>"score"),//成绩
				array("title"=>"评语","type"=>"text-M","name"=>"remark"),
		);
		$this->showform($forms, "editscore?id=$id","评定成绩","form");
	}
	//编辑分数
	public function editscore()
	{
		$id=isset($_POST["id"])?$_POST["id"]:$_GET["id"];
	
		$expreport=M("expreport");
	
		$data["score"]=$_POST["score"];//成绩
		$data["remark"]=$_POST["remark"];//评语
	
		if(!$expreport->where("id=$id")->save($data)) // 根据条件保存修改的数据
		{
			$this->ajaxReturn("操作失败","操作失败",2);
			return;
		}
		if(isset($_POST["id"]))
		{
			$this->ajaxReturn("操作成功","操作成功",1);
		}
		else {
			echo "操作成功！！！";
		}
	}
	
	//查看实验报告
	public function getreoprt()
	{
		$id=$_POST["id"];//获取id
		$report=M("expreport");
		$reportinfo=$report->where("id=$id")->find();
	
		if($reportinfo["reportfile"]!=null)
		{
			$this->ajaxReturn($reportinfo["reportfile"],"ok",1);
		}
		else
		{
			$this->ajaxReturn("没有可以下载的文件","ok",1);
		}
	}
	
	public function downAll()
	{
		$expid=$_GET["expid"];
		$beginid=$_GET["beginid"];
		$condtion="beginid=$beginid and expid=$expid";
		$Report=D("Expreport");
		$reportlist=$Report->where($condtion)->select();
		
		$filelist=array();
		foreach ($reportlist as $value) {
			$arr=explode("?",$value["reportfile"]);
			$file_name=urlencode($arr[0]);
			$file_name = str_replace("%EF%BB%BF", "", $file_name);
			$filelist[]="uploads/".$file_name;
		}
		require_once COMMONPATH.'createzip.class.php';
		$zip=new createzip();
		
		if($zip->create_zip($filelist,"uploads/temp.zip",true))
		{
			$Index=new IndexAction();
			$Index->dl_file("uploads/temp.zip");
		}
		else 
		{
			$this->error("压缩失败!");
		}
		
	}
	
	
	public function getguide()
	{
		$id=$_POST["id"];//获取id
	
		$exp=M("expitem");
		$expinfo=$exp->where("id=$id")->find();
		 if($expinfo!=null)
		{
			$this->ajaxReturn($expinfo["guidefile"],"ok",1);
		}
		else
		{
			$this->ajaxReturn("没有可以下载的文件","ok",1);
		}
	}
	
	public function  addexpitem()
	{
		$teacherid=5;
		
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"实验课程","type"=>"select","name"=>"courseid","items"=>$this->getbegincourse()),
					array("title"=>"实验名称","type"=>"text-M","name"=>"expname"),
					array("title"=>"实验指导","type"=>"kind","name"=>"guide"),
					array("title"=>"实验类型","type"=>"riadio","name"=>"type","items"=>$this->getexptype()),
					array("title"=>"学时","type"=>"text-M","name"=>"exphour"),
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
						$this->success("添加成功",__URL__."/showteacherbegin");
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
				$data["id"]=$id;
				if ($data) {
					if (false !== $Model->save($data)) {
						$this->success("修改成功",__URL__."/showteacherbegin");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	//获取登录用户的stuid
	public function getstuid()
	{
		if(isset($_SESSION["stuno"]))
		{
			$stuno=$_SESSION["stuno"];
			$model=M("stu")->where("stuno='$stuno'")->find();
			return $model['id'];
		}
		else
		{
			return null;
		}
		
	}
	//获取教师登陆的id
	public function getteacherid()
	{
		if(isset($_SESSION["username"]))
		{
			$username=$_SESSION["username"];
			$model=M("user")->where("username='$username'")->find();
			if($model["role"]==2)
			{
				return $model['id'];
			}
			else
			{
				$this->error("你的角色不是教师");
			}
		}
		else
		{
			return null;
		}
	
	}
	//获取班级的ids  
	public function  getstuclassids()
	{
		$stuid=$this->getstuid();//首先获取该学的的stuid
		$stu=M("stu")->where("id='$stuid'")->find();//查询出这个学生
		$classno=$stu["classno"];//获取该学生的自然班班号
		$class=M("class")->where("classno='$classno'")->find();
		
		$classid=$class["id"];//自然班号
		
		//到这 我们取得了这个学生的自然班班号
		$classstu=M("classstu")->where("stuid='$stuid'")->select();
		foreach ($classstu as $value) {
			$classid=$classid.','.$value["classid"];
		}
		return $classid;//返回这个的id
	}
	
	
	
	//获取开课信息
	public function getbegin()
	{
		$model=D("BegincourseView");
		$models=$model->where("")->select();
		$modelarr[0]="----选择开课课程-----";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['coursename']."--".$value['termname'];
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
	
	public function getteacher()
	{
		$model=D("UserView");
		$models=$model->where("role=2")->select();
		$modelarr[0]="----选择开课老师-----";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['name'];
		}
		return $modelarr;
	}
	public function getcourse()
	{
		$model=M("course");
		$models=$model->select();
		$modelarr[0]="-----选择课程---";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['coursename'];
		}
		return $modelarr;
	}
	//查询出该教师开课的课程
	public function getbegincourse()
	{
		$model=D("BegincourseView");
		$teacherid=$this->getteacherid();
		$models=$model->where("teacherid=$teacherid")->select();
		$modelarr[0]="----选择你的开课课程-----";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['courseid']]=$value['coursename']."--".$value['termname'];
		}
		return $modelarr;
	}
	public function getclass()
	{
		$model=M("class");
		$models=$model->where("")->select();//任何班都可以开课
		$modelsarr[0]="-----选择班---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['classname'];
		}
		return $modelsarr;
	}
	
	public function getterm()
	{
		$model=M("term");
		$models=$model->select();
		$modelarr[0]="-----选择学期 （自然班不选此项）---";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['termname'];
		}
		return $modelarr;
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
	
	
	public function getexpitem()
	{
		$model=M("expitem");
		$models=$model->select();
		//$coursearr[0]="-----选择课程---";
		foreach ($models as $key=>$value)
		{
			$modelarr[$value['id']]=$value['expname'];
		}
		return $modelarr;
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