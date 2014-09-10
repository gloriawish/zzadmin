<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class ConsumAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("consumable");
	}
	public function showconsumable()
	{
		//$model=D('ConsumableView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"库存"),
				array("id"=>"3","name"=>"耗材编号"),
				array("id"=>"4","name"=>"耗材名称"),
				array("id"=>"5","name"=>"负责人"),
				array("id"=>"6","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,reserve,cno,cname,name,collegename";
		$option["edit"]="addconsumable";
		$option["del"]=true;
		$condtion="collegename='计算机学院'";
		$this->showTable2("ConsumableView",$condtion,"showconsumable",$arr,$filed,"耗材库存信息",$option);
	}
	public function showconsuminfo()
	{
		//$model=D('Consuminfo');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"耗材编号"),
				array("id"=>"3","name"=>"耗材名称"),
				array("id"=>"4","name"=>"计量单位"),
				array("id"=>"5","name"=>"品牌"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,cno,cname,prickle,brand";
		$option["edit"]="addconsuminfo";
		$option["del"]=true;
		$condtion="";
		$this->showTable2("Consuminfo",$condtion,"showconsuminfo",$arr,$filed,"耗材配置信息",$option);
	}
	
	public function  addconsumable()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"耗材种类","type"=>"select","name"=>"cid","items"=>$this->getconsuminfo()),
					array("title"=>"库存","type"=>"text-M","name"=>"reserve"),
					array("title"=>"存放位置","type"=>"select","name"=>"lab","items"=>$this->getlab()),
					array("title"=>"负责人","type"=>"select","name"=>"duty","items"=>$this->getstaff()),
					array("title"=>"学院","type"=>"select","name"=>"college","items"=>$this->getcollege()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addconsumable?aa=add","添加库存信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("consumable");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["cid"];
				$forms[1]["val"]=$Models["reserve"];
				$forms[2]["val"]=$Models["lab"];
				$forms[3]["val"]=$Models["duty"];
				$forms[4]["val"]=$Models["college"];

				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addconsumable?aa=edit","修改库存信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Consumable");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showconsumable");
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
						$this->success("修改成功",__URL__."/showconsumable");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	public function  addconsuminfo()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"耗材编号","type"=>"text-M","name"=>"cno"),
					array("title"=>"耗材名称","type"=>"text-M","name"=>"cname"),
					array("title"=>"计量单位","type"=>"text-M","name"=>"prickle"),
					array("title"=>"品牌","type"=>"text-M","name"=>"brand"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addconsuminfo?aa=add","添加耗材信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("consuminfo");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["cno"];
				$forms[1]["val"]=$Models["cname"];
				$forms[2]["val"]=$Models["prickle"];
				$forms[3]["val"]=$Models["brand"];
	
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addconsuminfo?aa=edit","修改耗材信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Consuminfo");
			if($action=="add")
			{
				$data=$Model->create();
				if ($data) {
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showconsuminfo");
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
						$this->success("修改成功",__URL__."/showconsuminfo");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	
	
	//出库 和进库管理
	
	public function showconsumablenote()
	{
		$type=isset($_GET["type"])?$_GET["type"]:1;
		if($type==1)
		{
			$s="入库数量";
			$ss="耗材入库信息记录";
		}
		else 
		{
			$s="出库数量";
			$ss="耗材出库信息记录";
		}
		//$model=D('ConsumablenoteView');
		//dump($model->select());
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>$s),
				array("id"=>"3","name"=>"时间"),
				array("id"=>"4","name"=>"备注"),
				array("id"=>"5","name"=>"耗材编号"),
				array("id"=>"6","name"=>"耗材名称"),
				array("id"=>"7","name"=>"品牌"),
				array("id"=>"8","name"=>"经手人"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		
		$filed="id,amount,time,remark,cno,cname,brand,name";
		//$option["edit"]="addconsumablenote";
		//$option["del"]=true;
		$condtion="consumablenote.type=$type";
		$this->showTable2("ConsumablenoteView",$condtion,"showconsumablenote",$arr,$filed,$ss,$option);
	}
	public function  addconsumablenote()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
	
			$forms=array(
					array("title"=>"库存记录","type"=>"select","name"=>"conid",'items'=>$this->getconsumable()),
					array("title"=>"操作数量","type"=>"text-M","name"=>"amount"),
					array("title"=>"经手人","type"=>"select","name"=>"duty",'items'=>$this->getstaff()),
					array("title"=>"操作类型","type"=>"riadio","name"=>"type","items"=>array("1"=>"入库","2"=>"出库")),
					array("title"=>"备注","type"=>"text","name"=>"remark"),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "addconsumablenote?aa=add","添加耗材出入库信息","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$Model=M("consumablenote");
				$Models=$Model->where("id=$id")->find();
	
				//dump($Models["classname"]);
				$forms[0]["val"]=$Models["conid"];
				$forms[1]["val"]=$Models["amount"];
				$forms[2]["val"]=$Models["duty"];
				$forms[3]["val"]=$Models["type"];
				$forms[4]["val"]=$Models["remark"];
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Models["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "addconsumablenote?aa=edit","修改耗材信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$Model = D("Consumablenote");
			if($action=="add")
			{
				$_POST["time"]=date("Y-m-d h:m:s");
				$data=$Model->create();
				if ($data) {
					$this->changenum($data["conid"],$data["type"],$data["amount"]);
					if (false !== $Model->add()) {
						$this->success("添加成功",__URL__."/showconsumablenote");
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
						$this->success("修改成功",__URL__."/showconsumablenote");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	//修改库存的数量
	public function changenum($conid,$type,$amount)
	{
		$model=D("Consumable");
		$models=$model->where("id=$conid")->find();
		//$model->startTrans();//开始事物
		if($type==1)//入库
		{
			if($amount>0)
			{
				$models["reserve"]=$models["reserve"]+$amount;
				$models["sum"]=$models["sum"]+$amount;
			}
			else
			{
				$this->error("请出入正整数!");
			}
		
		}
		else
		{
			if($models["reserve"]>=$amount)
			{
				$models["reserve"]=$models["reserve"]-$amount;
			}
			else
			{
				$this->error("库存数量不够");
			}
			
		}
		$model->save($models);
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
	
	public function getlab()
	{
		$model=M("lab");
		$models=$model->select();
		$modelsarr[0]="-----选择存放位置---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['labname'];
		}
		return $modelsarr;
	}
	public function getconsumable()
	{
		$model=D("ConsumableView");
		$models=$model->select();
		$modelsarr[0]="-----选择库存记录---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['cname'].'  --  库存量='.$value['reserve'];
		}
		return $modelsarr;
	}
	public function getconsuminfo()
	{
		$model=D("consuminfo");
		$models=$model->select();
		$modelsarr[0]="-----选择耗材信息---";
		foreach ($models as $key=>$value)
		{
			$modelsarr[$value['id']]=$value['cname'];
		}
		return $modelsarr;
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
}
?>