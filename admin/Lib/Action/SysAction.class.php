<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
//系统信息控制器
class SysAction extends  BaseAction
{
	
	public function index()
	{
		$arr=array(
				array("id"=>"1","name"=>"编号"),
				array("id"=>"2","name"=>"系统信息"),
				array("id"=>"3","name"=>"值"),

		);

		$condtion="";
		$filed="id,conf_title,conf_value";
		$option["edit"]="edit";
		$this->showTable2("conf",$condtion,"__APP__/Sys/index",$arr,$filed,"系统信息",$option,"sysinfo");
		//$this->showTable("conf",$condtion,readconf::get_pagecount(),5,"__APP__/Sys/index",$arr,$filed,"系统信息","edit","","","","sysinfo");

	}
	public function edit()
	{
		//获取传来的id
		$id=isset($_GET['id'])?$_GET['id']:"null";
		if($id==6)//表示是编辑主题
		{
			$arr=array(
					"theme"=>"默认",
					"theme1"=>"主题1",
					"theme2"=>"主题2",
					"theme3"=>"主题3",
					"theme4"=>"主题4",
					"theme5"=>"主题5",
					"theme6"=>"主题6",
					"theme7"=>"主题7",
					"theme8"=>"主题8",
					);
			$forms=array(
					array("title"=>"参数","type"=>"text-M","name"=>"conf_title"),
					array("title"=>"值","type"=>"select","name"=>"conf_value","items"=>$arr),
			
			);
		}
		else
		{
			$forms=array(
					array("title"=>"参数","type"=>"text-M","name"=>"conf_title"),
					array("title"=>"值","type"=>"text-M","name"=>"conf_value"),
			
			);
		}
	
		$info=M("conf");
		$infos=$info->where("id=$id")->find();
		
		$forms[0]["val"]=$infos["conf_title"];
		$forms[1]["val"]=$infos["conf_value"];

		
		$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$infos["id"]);
		
		//调用显示编辑表单的方法
		$this->showeditform($forms, "save","修改系统信息","bestform");
	}
	public function save()
	{
		$id=isset($_POST['id'])?$_POST['id']:"null";
		
		$data=array(
				"conf_title"=>$_POST["conf_title"],
				"conf_value"=>$_POST["conf_value"],
		);
		if($this->update("conf", $id, $data))//更新数据
		{
			$this->success("更新成功",__URL__."/index");
		}
		else
		{
			dump($data);
			$this->error("更新失败失败"+$id);
		
		}
	}
	public function showmysql()
	{
		$model = M();
		$result = $model->query("SHOW TABLE STATUS");
		$this->assign("re",$result);
		$this->display("Index:mysqltable");
	}
	public function clear()
	{
		if ($_GET["table"]=='') {
			$this->error('未选择要清空的数据表');
		}else {
			$table =$_GET["table"];
			$model = M();
			$query = "TRUNCATE TABLE $table";
			$model->query($query);

			$this->success("数据表单清空成功","showmysql");
		}
	}
	
}