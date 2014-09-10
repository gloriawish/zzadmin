<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class UserAction extends BaseAction {
	
	public function del()
	{
		$id=$_POST["id'"];
		$this->delete("user");
	}
	public function showuser()
	{
		$role=isset($_GET["role"])?$_GET["role"]:1;
		$arr=array(
				array("id"=>"1","name"=>"id"),
				array("id"=>"2","name"=>"用户名"),
				array("id"=>"3","name"=>"编号"),
				array("id"=>"4","name"=>"姓名"),
				array("id"=>"5","name"=>"职称"),
				array("id"=>"6","name"=>"角色"),
				array("id"=>"7","name"=>"学院"),
	
		);
		//字段顺序不能和视图模型里面的不一致
		$filed="id,username,no,name,titlename,rolename,collegename";
		$option["edit"]="adduser";
		$option["del"]=true;
		$condtion="role=$role";
		$this->showTable2("UserView",$condtion,"showuser",$arr,$filed,"系统用户信息",$option);
	}
	
	public function  adduser()
	{
		$action=isset($_GET['aa'])?$_GET['aa']:"null";
		if($action=="show"||$action=="showedit")
		{
				
			$forms=array(
					array("title"=>"员工编号","type"=>"select","name"=>"staffid","items"=>$this->getstaff()),
					array("title"=>"用户名","type"=>"text-M","name"=>"username"),
					array("title"=>"密码","type"=>"pass","name"=>"userpass"),
					array("title"=>"角色","type"=>"riadio","name"=>"role","items"=>$this->getrole()),
			);
	
	
			if($action=="show")
			{
				//调用显示表单的方法
				$this->showform($forms, "adduser?aa=add","添加系统用户","bestform");
			}
			else if($action=="showedit")
			{
				//获取传来的id
				$id=isset($_GET['id'])?$_GET['id']:"null";
	
				$User=M("user");
				$Users=$User->where("id=$id")->find();
	
				$forms[0]["val"]=$Users["staffid"];
				$forms[1]["val"]=$Users["username"];
				$forms[2]["val"]=$Users["userpass"];
				$forms[3]["val"]=$Users["role"];
	
				$forms[]=array("title"=>"","type"=>"hidden","name"=>"id","val"=>$Users["id"]);
	
				//调用显示编辑表单的方法
				$this->showeditform($forms, "adduser?aa=edit","修改系统用户信息","bestform");
	
			}
	
	
		}
		else if($action=="add"||$action=="edit")
		{
			//这是利用了Thinkphp的模型实现的
			$User = D("User");
			if($action=="add")
			{
				$data=$User->create();
				if ($data) {
					if (false !== $User->add()) {
						$this->success("添加成功",__URL__."/showuser");
					} else {
						$this->error('数据写入错误');
					}
				}
				else
				{
					header("Content-Type:text/html; charset=utf-8");
					exit($User->getError() . ' [ <a href="javascript:history.back()">返 回</a> ]');
				}
	
			}
			else if($action=="edit")
			{
				$id=isset($_POST['id'])?$_POST['id']:"null";
				$data=$User->create();
				$data["id"]=$id;
				if ($data) {
					if (false !== $User->save($data)) {
						$this->success("修改成功",__URL__."/showuser");
					} else {
						$this->error('修改失败');
					}
				}
	
			}
	
		}
	}
	
	public function getrole()
	{
		$role=M("role");
		$roles=$role->select();
		foreach ($roles as $key=>$value)
		{
			$rolearr[$value['id']]=$value['rolename'];
		}
		return $rolearr;
	}
	public function getstaff()
	{
		$staff=M("staff");
		$staffs=$staff->select();
		foreach ($staffs as $key=>$value)
		{
			$staffarr[$value['id']]=$value['name'];
		}
		return $staffarr;
	}
	
}
?>