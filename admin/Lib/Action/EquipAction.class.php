<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class EquipAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("equip");
	}
	
	//-----------------------显示实验设备的信息-------------------------------
	public function showequip()
	{
		//$model=D('EquipView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"设备编号"),
				array("id"=>"3","name"=>"名称"),
				array("id"=>"4","name"=>"品牌"),
				array("id"=>"5","name"=>"型号"),
				array("id"=>"6","name"=>"所属实验室"),
				array("id"=>"7","name"=>"学院"),
				array("id"=>"8","name"=>"状态"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,eno,ename,brand,model,labname,collegename,statename";
		$option["self1"]=array("title"=>"故障","url"=>"addfail?aa=showedit&id=","img"=>"exclamation.png");
		$option["self2"]=array("title"=>"借出","url"=>"addloan?aa=showedit&id=","img"=>"return.png");
		$option["edit"]="addequip";
		//$option["del"]=true;
		$condtion="";
		//$this->showTable2("EquipView",$condtion,"showequip",$arr,$filed,"实验设备信息列表",$option);
		
		
		
		if(!isset($_GET["eno"]))//有这个参数说明是搜索设备
		{
			$s="";
			//--------------从这个开始是为了能够分类查看的--------------
			if(isset($_GET["state"])&&$_GET["state"]!=0)//如果有state表示是要求分类数据,0表示查询全部
			{	
				$state=isset($_GET["state"])?$_GET["state"]:1;//查询状态
				
				switch ($state) {
					case 1: $s="正常"; //state=1
					break;
					case 2: $s="故障"; //state=2
					break;
					case 3: $s="损坏"; //state=3
					break;
					case 4:$s="借出"; //state=4
					break;
				}
				$condtion="equip.state=$state";
	
			}
			//填充左下角的状态
			$this->show_state($state,1);
			//-----------------------结束-----------------
		}
		else 
		{
	
			$eno=isset($_GET["eno"])?$_GET["eno"]:0;//设备编号
			$condtion="equip.eno='$eno'";
			$this->assign("type",1);
			$this->assign("search","equipsearch");//搜索按钮调用的是此方法
		}
		$this->showTable2("EquipView",$condtion,"showequip?state=$state",$arr,$filed,$s."实验设备信息列表",$option);
		
		
		
		
		
	}
	
	public function  addequip()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"设备编号","type"=>"text-M","name"=>"eno"),
					array("title"=>"设备名称","type"=>"text-M","name"=>"ename"),
					array("title"=>"品牌","type"=>"text-M","name"=>"brand"),
					array("title"=>"型号","type"=>"text-M","name"=>"model"),
					array("title"=>"序列号","type"=>"text-M","name"=>"serialno"),
				
					array("title"=>"设备类型","type"=>"riadio","name"=>"type","items"=>$this->getequiptype()),
					array("title"=>"购买时间","type"=>"time","name"=>"buytime"),
					array("title"=>"购买方式","type"=>"riadio","name"=>"buytype","items"=>$this->getbuytype()),
					array("title"=>"金额","type"=>"text-M","name"=>"money"),
					array("title"=>"所属实验室","type"=>"riadio","name"=>"lab","items"=>$this->getlab()),
					array("title"=>"保存位置","type"=>"text-M","name"=>"location"),
					array("title"=>"使用方式","type"=>"riadio","name"=>"usingtype","items"=>$this->getusetype()),
					array("title"=>"负责人","type"=>"select","name"=>"duty","items"=>$this->getstaff()),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addequip?aa=add","添加实验设备信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("equip");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["eno"];
				$forms[1]["val"]=$Models["ename"];
				$forms[2]["val"]=$Models["brand"];
				$forms[3]["val"]=$Models["model"];
				$forms[4]["val"]=$Models["serialno"];
				$forms[5]["val"]=$Models["type"];
				$forms[6]["val"]=$Models["buytime"];
				
				$forms[7]["val"]=$Models["buytype"];
				$forms[8]["val"]=$Models["money"];
				$forms[9]["val"]=$Models["lab"];
				$forms[10]["val"]=$Models["location"];
				$forms[11]["val"]=$Models["usingtype"];
				$forms[12]["val"]=$Models["duty"];
				$forms[13]["val"]=$Models["college"];
				
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addequip?aa=edit","修改实验设备信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Equip");
			if($action=="add")
			{
				$_POST['guide']=$_POST["content"];
				$_POST['guidefile']=$_POST["guidefileupimg"][0];
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showequip");
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
						$this->success("修改成功",__URL__."/showequip");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	
	
	//-----------------------显示故障设备信息-------------------------------
	public function showequipfail()
	{
		//$model=D('EquipfailView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"故障现象"),
				array("id"=>"3","name"=>"故障时间"),
				array("id"=>"4","name"=>"发现者"),
				array("id"=>"5","name"=>"故障原因"),
				array("id"=>"6","name"=>"设备编号"),
				array("id"=>"7","name"=>"设备名称"),
				array("id"=>"7","name"=>"所属实验室"),
				array("id"=>"8","name"=>"状态"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,phenomenon,failtime,discoverperson,failreason,eno,ename,labname,statename";
		$option["self1"]=array("title"=>"送修","url"=>"addrepair?aa=showedit&id=","img"=>"agree.png");
		$condtion="";
		
		
		if(!isset($_GET["eno"]))//有这个参数说明是搜索设备
		{
			$s="";
			//--------------从这个开始是为了能够分类查看的--------------
			if(isset($_GET["state"])&&$_GET["state"]!=0)//如果有state表示是要求分类数据,0表示查询全部
			{
				$state=isset($_GET["state"])?$_GET["state"]:1;//查询状态
					
				$condtion="equipfail.state=$state";
			
			}
			//填充左下角的状态
			$this->show_state($state,2);
			//-----------------------结束-----------------
		}
		else
		{
			$eno=isset($_GET["eno"])?$_GET["eno"]:0;//设备编号
			$condtion="equip.eno='$eno'";
			$this->assign("type",2);
			$this->assign("search","equipsearch");//搜索按钮调用的是此方法
		}
		$this->showTable2("EquipfailView",$condtion,"showequipfail?state=$state",$arr,$filed,"实验设备故障信息列表",$option);
	}
	
	//添加故障信息
	public function  addfail()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"设备编号","type"=>"text-M","name"=>"eno"),
					array("title"=>"设备名称","type"=>"text-M","name"=>"ename"),
					array("title"=>"品牌","type"=>"text-M","name"=>"brand"),
					array("title"=>"型号","type"=>"text-M","name"=>"model"),
					array("title"=>"序列号","type"=>"text-M","name"=>"serialno"),
					array("title"=>"所属实验室","type"=>"select","name"=>"lab","items"=>$this->getlab()),
					
					array("title"=>"故障现象","type"=>"text-L","name"=>"phenomenon"),
					array("title"=>"初步诊断","type"=>"text-L","name"=>"firstreason"),
					array("title"=>"发现人","type"=>"text-M","name"=>"discoverperson"),
					array("title"=>"发现时间","type"=>"time","name"=>"failtime"),
					array("title"=>"故障原因","type"=>"text-M","name"=>"failreason"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addfail?aa=add","添加故障设备信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("equip");
				$Models=$Model->where("id=$id")->find();
				//假如逻辑判断   如果已经是送修的就显示错误信息
				if($Models["state"]!=1)
					$this->error("抱歉,设备已故障或损坏或在维修中,不能进行此操作!");
				
				
				
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["eno"];
				$forms[1]["val"]=$Models["ename"];
				$forms[2]["val"]=$Models["brand"];
				$forms[3]["val"]=$Models["model"];
				$forms[4]["val"]=$Models["serialno"];
				$forms[5]["val"]=$Models["lab"];

				
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"eid","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addfail?aa=add","添加故障信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Equipfail");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						//应该修改这个设备的状态的2故障
						$this->changestate('Equip',$_POST["eid"],2);
						
						$this->success("添加成功",__URL__."/showequipfail");
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
				$data=$Model->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Model->save($data)) {
						$this->success("操作成功",__URL__."/showequipfail");
					} else {
						$this->error('操作失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	
	//-----------------------显示设备维修的信息-------------------------------
	public function showequiprepair()
	{
		//$model=D('EquiprepairView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"送修时间"),
				array("id"=>"3","name"=>"送修人"),
				array("id"=>"2","name"=>"修回时间"),
				array("id"=>"3","name"=>"修回人"),
				array("id"=>"4","name"=>"故障现象"),
				array("id"=>"5","name"=>"故障原因"),
				array("id"=>"6","name"=>"设备编号"),
				array("id"=>"7","name"=>"设备名称"),
				array("id"=>"8","name"=>"所属实验室"),
				array("id"=>"9","name"=>"状态"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,sendtime,sendperson,returntime,returnperson,phenomenon,failreason,eno,ename,labname,statename";
		//$option["self1"]=array("title"=>"送修","url"=>"addrepair?aa=showedit&id=","img"=>"agree1.png");
		$option["return"]=true;
		$condtion="";
		
		if(!isset($_GET["eno"]))//有这个参数说明是搜索设备
		{
			$s="";
			//--------------从这个开始是为了能够分类查看的--------------
			if(isset($_GET["state"])&&$_GET["state"]!=0)//如果有state表示是要求分类数据,0表示查询全部
			{
				$state=isset($_GET["state"])?$_GET["state"]:1;//查询状态
			
				$condtion="equiprepair.state=$state";
			
			}
			//填充左下角的状态
			$this->show_state($state,3);
			//-----------------------结束-----------------
		}
		else
		{
			$eno=isset($_GET["eno"])?$_GET["eno"]:0;//设备编号
			$condtion="equip.eno='$eno'";
			$this->assign("type",3);
			$this->assign("search","equipsearch");//搜索按钮调用的是此方法
		}
		
		
		$this->showTable2("EquiprepairView",$condtion,"showequiprepair?state=$state",$arr,$filed,"实验设备维修信息列表",$option);
	}
	
	//添加维修记录的方法
	public function  addrepair()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"设备编号","type"=>"text-M","name"=>"eno"),
					array("title"=>"设备名称","type"=>"text-M","name"=>"ename"),
					array("title"=>"品牌","type"=>"text-M","name"=>"brand"),
					array("title"=>"型号","type"=>"text-M","name"=>"model"),
					array("title"=>"故障现象","type"=>"text-L","name"=>"phenomenon"),
					array("title"=>"发现时间","type"=>"time","name"=>"failtime"),
					array("title"=>"故障原因","type"=>"text-M","name"=>"failreason"),
						
					array("title"=>"送修时间","type"=>"time","name"=>"sendtime"),
					array("title"=>"送修人员","type"=>"text-M","name"=>"sendperson"),
					array("title"=>"备注","type"=>"text-L","name"=>"remark"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addrepair?aa=add","添加维修信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=D("EquipfailView");
				$Models=$Model->where("equipfail.id=$id")->find();
				if($Models["stateid"]!=5)
					$this->error("抱歉,设备已送修或已修回,不能进行此操作!");
				//dump($Models);
				$forms[0]["val"]=$Models["eno"];
				$forms[1]["val"]=$Models["ename"];
				$forms[2]["val"]=$Models["brand"];
				$forms[3]["val"]=$Models["model"];
				$forms[4]["val"]=$Models["phenomenon"];
				$forms[5]["val"]=$Models["failtime"];
				$forms[6]["val"]=$Models["failreason"];
	
	
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"fid","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addrepair?aa=add","添加维修信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Equiprepair");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						//应该修改这个设备的状态的，两张表都需要修改
						$tempid=$this->changestate('Equipfail',$_POST["fid"],6);//已送修
						$this->changestate('Equip',$tempid,4);//维修中
						
						$this->success("添加成功",__URL__."/showequipfail");
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
				$data=$Model->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Model->save($data)) {
						$this->success("操作成功",__URL__."/showequipfail");
					} else {
						$this->error('操作失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	
	
	//-----------------------显示设备借出的信息-------------------------------
	public function showequiploan()
	{
		//$model=D('EquiploanView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"借用人"),
				array("id"=>"3","name"=>"借用事由"),
				array("id"=>"4","name"=>"借出时间"),
				array("id"=>"5","name"=>"约定归还时间"),
				array("id"=>"6","name"=>"归还时间"),
				array("id"=>"7","name"=>"归还人"),
				array("id"=>"8","name"=>"设备编号"),
				array("id"=>"9","name"=>"设备名称"),
				array("id"=>"10","name"=>"借出人"),
				array("id"=>"11","name"=>"所属实验室"),
				array("id"=>"12","name"=>"状态"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,loantarget,loanreason,loantime,agreetime,returntime,returnperson,eno,ename,staffname,labname,statename";
		//$option["self1"]=array("title"=>"送修","url"=>"addrepair?aa=showedit&id=","img"=>"agree1.png");
		$option["loanreturn"]=true;
		$condtion="";
		
		
		
		if(!isset($_GET["eno"]))//有这个参数说明是搜索设备
		{
			$s="";
			//--------------从这个开始是为了能够分类查看的--------------
			if(isset($_GET["state"])&&$_GET["state"]!=0)//如果有state表示是要求分类数据,0表示查询全部
			{
				$state=isset($_GET["state"])?$_GET["state"]:1;//查询状态
			
				$condtion="equiploan.state=$state";
			
			}
			//填充左下角的状态
			$this->show_state($state,4);
			//-----------------------结束-----------------
		}
		else
		{
			$eno=isset($_GET["eno"])?$_GET["eno"]:0;//设备编号
			$condtion="equip.eno='$eno'";
			$this->assign("type",4);
			$this->assign("search","equipsearch");//搜索按钮调用的是此方法
		}
		
		
		
		
		$this->showTable2("EquiploanView",$condtion,"showequiploan",$arr,$filed,"实验设备借出信息列表",$option);
	}
	
	//添加设备借出的方法
	public function  addloan()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"设备编号","type"=>"text-M","name"=>"eno"),
					array("title"=>"设备名称","type"=>"text-M","name"=>"ename"),
					array("title"=>"品牌","type"=>"text-M","name"=>"brand"),
					array("title"=>"型号","type"=>"text-M","name"=>"model"),
					array("title"=>"所属实验室","type"=>"select","name"=>"lab",'items'=>$this->getlab()),
					array("title"=>"存放位置","type"=>"time","name"=>"location"),
					
					array("title"=>"借用人","type"=>"text-M","name"=>"loantarget"),
					array("title"=>"借用事由","type"=>"text-M","name"=>"loanreason"),
					array("title"=>"借用时间","type"=>"time","name"=>"loantime"),
					array("title"=>"经手人","type"=>"select","name"=>"duty","items"=>$this->getstaff()),
					array("title"=>"约定归还时间","type"=>"time","name"=>"agreetime"),
					array("title"=>"备注","type"=>"text","name"=>"remark"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addloan?aa=add","添加借出信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=D("EquipView");
				$Models=$Model->where("equip.id=$id")->find();
				if($Models["stateid"]!=1)
					$this->error("抱歉,设备已送修或损坏或已借出,不能进行此操作!");
				//dump($Models);
				$forms[0]["val"]=$Models["eno"];
				$forms[1]["val"]=$Models["ename"];
				$forms[2]["val"]=$Models["brand"];
				$forms[3]["val"]=$Models["model"];
				$forms[4]["val"]=$Models["lab"];
				$forms[5]["val"]=$Models["location"];
				
	
	
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"eid","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addloan?aa=add","添加借出信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Equiploan");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						//应该修改这个设备的状态的，两张表都需要修改
						$this->changestate('Equip',$_POST["eid"],13);//已借出
						
	
						$this->success("添加成功",__URL__."/showequiploan");
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
				$data=$Model->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $Model->save($data)) {
						$this->success("操作成功",__URL__."/showequipfail");
					} else {
						$this->error('操作失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	
	
	
	
	//显示设备归还的界面
	public function showloanreturn()
	{
		$id=$_GET["id"];
		$Model=D("EquiploanView");
		$Models=$Model->where("equiploan.id=$id")->find();
		if($Models["stateid"]!=14)//不为14说明已经还了
			$this->error("抱歉,设备已归还,不能进行此操作!");
	
		$forms=array(
				array("title"=>"归还时间","type"=>"time","name"=>"returntime"),
				array("title"=>"归还人","type"=>"text-M","name"=>"returnperson"),
				array("title"=>"备注","type"=>"text-M","name"=>"remark",'val'=>$Models["remark"]),
		);
		$this->showeditform($forms, "equiploanreturn?id=$id","设备归还","form");
	}
	//设备归还
	public function equiploanreturn()
	{
		//dump($_POST);
		$id=$_GET["id"];
		$returntime=$_POST["returntime"];
		$returnperson=$_POST["returnperson"];
		$remark=$_POST["remark"];
		
		$model=m("equiploan");
		$models=$model->where("id=$id")->find();
	
		//设置信息
		$models["remark"]=$remark;
		$models["returntime"]=$returntime;
		$models["returnperson"]=$returnperson;
		//保存修改的数据
		if($model->save($models))
		{
			$this->changestate('Equip',$models['eid'],1);//已归还
			$this->changestate('Equiploan',$id,15);//已归还
			$this->success("操作成功");
		}
	}
	
	
	
	//显示设备修回
	public function showreturn()
	{
		$id=$_GET["id"];
		$Model=D("EquiprepairView");
		$Models=$Model->where("equiprepair.id=$id")->find();
		if($Models["stateid"]!=8)//不为8说明就是已经修好
			$this->error("抱歉,设备已修回,不能进行此操作!");
		
		$forms=array(
				array("title"=>"修回时间","type"=>"time","name"=>"returntime"),
				array("title"=>"修回人","type"=>"text-M","name"=>"returnperson"),
				array("title"=>"维修状态","type"=>"riadio","name"=>"state","items"=>array("9"=>"完全修好","10"=>"部分修好","11"=>"无法维修")),
		);
		$this->showform($forms, "equipreturn?id=$id","设备修回","form");
	}
	//设备修回
	public function equipreturn()
	{
		//dump($_POST);
		$id=$_GET["id"];
		$state=$_POST["state"];
		$returntime=$_POST["returntime"];
		$returnperson=$_POST["returnperson"];
		$state=$_POST["state"];
		$model=m("equiprepair");
		$models=$model->where("id=$id")->find();
		
		//设置状态
		$models["state"]=$state;
		$models["returntime"]=$returntime;
		$models["returnperson"]=$returnperson;
		//保存修改的数据
		if($model->save($models))
		{
			$tempid=$this->changestate('Equipfail',$models['fid'],7);//已修回
			if($state==9||$state==10)
			{
				$this->changestate('Equip',$tempid,1);//正常
			}
			else if($state==11) 
			{
				$this->changestate('Equip',$tempid,3);//损坏
			}
			$this->success("操作成功");
		}
	}
	
	
	
	//显示搜索界面
	
	public function showsearch()
	{
		$type=$_GET["type"];
		$s="";
		switch ($type) {
			case 1:
				$s="实验设备";
			break;
			case 2:
				$s="故障实验设备";
				break;
			case 3:
				$s="维修实验设备";
				break;
			case 4:
				$s="借出实验设备";
				break;
			
		}
		$forms=array(
				array("title"=>"设备编号","type"=>"text-M","name"=>"eno"),

		);
		$this->showform($forms, "showsearch",$s."设备搜索","form");
	}
	
	
	//修改设备状态的方法,返回该设备的 equip表中的id
	public function changestate($table,$eid,$state)
	{
		$model=D($table);
		$models=$model->where("id=$eid")->find();
		
		//设置状态
		$models["state"]=$state;
			
		$model->save($models);
		return $models["eid"];
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
	public function getstaff()
	{
		$staff=M("staff");
		$staffs=$staff->select();
		$staffarr[0]="----选择负责人-----";
		foreach ($staffs as $key=>$value)
		{
			$staffarr[$value['id']]=$value['name'];
		}
		return $staffarr;
	}
	public function getlab()
	{
		$model=M("lab");
		$models=$model->select();
		//$modelsarr[0]="-----选择存放位置---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['labname'];
		}
		return $modelsarr;
	}
	
	public function getequiptype()
	{
		$model=M("equiptype");
		$models=$model->select();
		//$modelsarr[0]="-----选择存放位置---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['typename'];
		}
		return $modelsarr;
	}
	public function getusetype()
	{
		$model=M("equipusetype");
		$models=$model->select();
		//$modelsarr[0]="-----选择存放位置---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['usetypename'];
		}
		return $modelsarr;
	}

	public function getbuytype()
	{
		$model=M("equipbuytype");
		$models=$model->select();
		//$modelsarr[0]="-----选择存放位置---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['buytypename'];
		}
		return $modelsarr;
	}
	
	
	//显示设备不同状态的设备信息
	public function show_state($equipstate,$num)
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();
		$model=M("equipstate");
		$models=$model->select();
		$items[0]="-----选择状态---";
		//把类别的二维数组转为一位数组
		foreach ($models as $key=>$value)
		{
			$items[$value['id']]=$value['statename'];
		}
		switch ($num) {
			case 1:
				
				$this->assign("type",1);
				$select=$F->editselect("state", $items, $equipstate);
			break;
			case 2:
				$this->assign("type",2);
				$select=$F->editselect("failstate", $items, $equipstate);
			break;
			case 3:
				$this->assign("type",3);
				$select=$F->editselect("repairstate", $items, $equipstate);
			break;
			case 4:
				$this->assign("type",4);
				$select=$F->editselect("loanstate", $items, $equipstate);
				break;
		}
		$this->assign("search","equipsearch");//搜索按钮调用的是此方法
		$this->assign("select",$select);
	}
}
?>