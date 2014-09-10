<?php
require_once  COMMONPATH.'Fun.class.php';
require_once COMMONPATH.'BaseAction.class.php';
require_once COMMONPATH.'GetFileName.class.php';
require_once COMMONPATH.'readconf.class.php';
// 本类由系统自动生成，仅供测试用途
class IndexAction extends BaseAction {
    public function index(){
   
    	$this->checklogin();//检查是否登录了
    	
    	$this->assign("admin",session("username"));//设置登录验证
    	//$this->assign("lasttime",session("lasttime"));
    	//$this->assign("username",session("username"));
    	//$this->assign("count",session("count"));//显示登录次数
    	$theme=C(readconf::get_theme());//获取主题名->对应的主题文件夹名
    	$this->assign("theme",$theme);
    	switch ($_SESSION["role"]) {
    		case 1:
    			$this->assign("menu",$this->menu());
    		break;
    		case 2:
    			$this->assign("menu",$this->teachermenu());
    		break;
    		case 3:
    			$this->assign("menu",$this->mastermenu());
    		break;
    		default:
    			$this->assign("menu",$this->stumenu());
    		break;
    	}
  
    	
    	$theme=C(readconf::get_theme());//获取主题名->对应的主题文件夹名
    	$this->assign("theme",$theme);
    	
    	$s=M("notice")->order('id desc')->limit(10)->select();
    	$this->assign("notice_list",$s);
       	$this->display();
       
       
       
    }
    //生成菜单的方法
    public function menu()
    {
    
    	$menu=array(
    			"menus"=>array(
    					array(
    							"menuid"=>"28",
    							"icon"=>"icon-sys",
    							"menuname"=>"用户管理",
    							"menus"=>array(
    									array("menuname"=>"基本员工信息","icon"=>"icon-users","url"=>"__APP__/Staff/showstaff","target"=>"f1"),
    									array("menuname"=>"添加员工","icon"=>"icon-users","url"=>"__APP__/Staff/addstaff?aa=show","target"=>"f2"),
    									array("menuname"=>"领导信息表","icon"=>"icon-users","url"=>"__APP__/User/showuser?aa=show&role=4","target"=>"f3"),
    									array("menuname"=>"管理员信息表","icon"=>"icon-users","url"=>"__APP__/User/showuser?aa=show&role=1","target"=>"f4"),
    									array("menuname"=>"实验指导老师","icon"=>"icon-users","url"=>"__APP__/User/showuser?aa=show&role=2","target"=>"f5"),
    									array("menuname"=>"实验室工作人员信息表","icon"=>"icon-users","url"=>"__APP__/User/showuser?aa=show&role=3","target"=>"6"),
    									array("menuname"=>"添加用户","icon"=>"icon-users","url"=>"__APP__/User/adduser?aa=show","target"=>"f7"),
    									
    							)
    					),
    					array(
    							"menuid"=>"228",
    							"icon"=>"icon-sys",
    							"menuname"=>"实验室管理",
    							"menus"=>array(
    									array("menuname"=>"实验信息","icon"=>"icon-role","url"=>"__APP__/Lab/showlab","target"=>"ff1"),
    									array("menuname"=>"添加实验室","icon"=>"icon-role","url"=>"__APP__/Lab/addlab?aa=show","target"=>"ff2"),
    							)
    					),
    					array(
    							"menuid"=>"c28",
    							"icon"=>"icon-sys",
    							"menuname"=>"学生信息管理",
    							"menus"=>array(
    									array("menuname"=>"学生信息列表","icon"=>"icon-role","url"=>"__APP__/Stu/showstu","target"=>"fb1"),
    									array("menuname"=>"添加学生信息","icon"=>"icon-role","url"=>"__APP__/Stu/addstu?aa=show","target"=>"fb2"),
    									array("menuname"=>"从excle导入数据 ","icon"=>"icon-role","url"=>"__APP__/Import/index","target"=>"fb3"),
    							)
    					),
    					array(
    							"menuid"=>"8",
    							"icon"=>"icon-sys",
    							"menuname"=>"班级管理",
    							"menus"=>array(
    									array("menuname"=>"自然班级信息","icon"=>"icon-nav","url"=>"__APP__/Class/showclass?type=1","target"=>"a1"),
    									array("menuname"=>"教学班级信息","icon"=>"icon-nav","url"=>"__APP__/Class/showclass?type=2","target"=>"a2"),
    									array("menuname"=>"添加班级","icon"=>"icon-nav","url"=>"__APP__/Class/addclass?aa=show","target"=>"a3"),
    							)
    					),
    					array(
    							"menuid"=>"88",
    							"icon"=>"icon-sys",
    							"menuname"=>"实验项目管理",
    							"menus"=>array(
    									array("menuname"=>"实验项目列表","icon"=>"icon-nav","url"=>"__APP__/Expitem/showexpitem","target"=>"m1"),
    									array("menuname"=>"添加实验项目","icon"=>"icon-nav","url"=>"__APP__/Expitem/addexpitem?aa=show","target"=>"m2"),
    							)
    					),
    					array(
    							"menuid"=>"188",
    							"icon"=>"icon-sys",
    							"menuname"=>"课程管理",
    							"menus"=>array(
    									array("menuname"=>"课程信息","icon"=>"icon-nav","url"=>"__APP__/Course/showcourse","target"=>"fff1"),
    									array("menuname"=>"添加课程","icon"=>"icon-nav","url"=>"__APP__/Course/addcourse?aa=show","target"=>"fff2"),

    
    							)
    					),
    					array(
    							"menuid"=>"1828",
    							"icon"=>"icon-sys",
    							"menuname"=>"专业管理",
    							"menus"=>array(
    									array("menuname"=>"专业信息","icon"=>"icon-nav","url"=>"__APP__/Major/showmajor","target"=>"fffq1"),
    									array("menuname"=>"添加专业","icon"=>"icon-nav","url"=>"__APP__/Major/addmajor?aa=show","target"=>"ffqf2"),
    					
    					
    							)
    					),
    					array(
    							"menuid"=>"848",
    							"icon"=>"icon-sys",
    							"menuname"=>"开课管理",
    							"menus"=>array(
    									array("menuname"=>"开课信息","icon"=>"icon-nav","url"=>"__APP__/Begin/showbegin","target"=>"fa1"),
    									array("menuname"=>"添加开课信息","icon"=>"icon-nav","url"=>"__APP__/Begin/addbegin?aa=show","target"=>"fa2"),
    							)
    					),
    					array(
    							"menuid"=>"888",
    							"icon"=>"icon-sys",
    							"menuname"=>"公告管理",
    							"menus"=>array(
    									array("menuname"=>"公告列表","icon"=>"icon-nav","url"=>"__APP__/Notice/shownotice","target"=>"fd1"),
    									array("menuname"=>"添加公告","icon"=>"icon-nav","url"=>"__APP__/Notice/addnotice?aa=show","target"=>"fd2"),
    							)
    					),
    					array(
    							"menuid"=>"899",
    							"icon"=>"icon-sys",
    							"menuname"=>"系统设置",
    							"menus"=>array(
    									array("menuname"=>"系统信息","icon"=>"icon-nav","url"=>"__APP__/Sys","target"=>"fb0"),
    									array("menuname"=>"清除缓存","icon"=>"icon-nav","url"=>"__APP__/Cache","target"=>"fb1"),
    							)
    					),
    					/*
    					array(
    							"menuid"=>"1299",
    							"icon"=>"icon-sys",
    							"menuname"=>"耗材管理",
    							"menus"=>array(
    									array("menuname"=>"耗材配置信息","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsuminfo","target"=>"c1"),
    									array("menuname"=>"添加配置信息","icon"=>"icon-nav","url"=>"__APP__/Consum/addconsuminfo?aa=show","target"=>"c2"),
    									array("menuname"=>"库存信息","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsumable","target"=>"c3"),
    									array("menuname"=>"添加库存信息","icon"=>"icon-nav","url"=>"__APP__/Consum/addconsumable?aa=show","target"=>"c4"),
    									
    									array("menuname"=>"入库信息记录","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsumablenote?type=1","target"=>"c5"),
    									array("menuname"=>"出库信息记录","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsumablenote?type=2","target"=>"c6"),
    									array("menuname"=>"添加出入库信息记录","icon"=>"icon-nav","url"=>"__APP__/Consum/addconsumablenote?aa=show","target"=>"c7"),
    							)
    					),
    					array(
    							"menuid"=>"899",
    							"icon"=>"icon-sys",
    							"menuname"=>"实验设备管理",
    							"menus"=>array(
    									array("menuname"=>"实验室设备列表","icon"=>"icon-nav","url"=>"__APP__/Equip/showequip","target"=>"fv0"),
    									array("menuname"=>"添加设备","icon"=>"icon-nav","url"=>"__APP__/Equip/addequip?aa=show","target"=>"fv1"),
    									array("menuname"=>"设备故障列表","icon"=>"icon-nav","url"=>"__APP__/Equip/showequipfail","target"=>"fv3"),
    									array("menuname"=>"设备维修记录","icon"=>"icon-nav","url"=>"__APP__/Equip/showequiprepair","target"=>"fv4"),
    									array("menuname"=>"借出设备信息","icon"=>"icon-nav","url"=>"__APP__/Equip/showequiploan","target"=>"fv5"),
    							)
    					),*/
    					/*array(
    							"menuid"=>"8x99",
    							"icon"=>"icon-sys",
    							"menuname"=>"学生界面",
    							"menus"=>array(
    									array("menuname"=>"我的课程","icon"=>"icon-nav","url"=>"__APP__/Begin/showmybegin","target"=>"fs0"),
    							)
    					),*/
    					/*array(
    							"menuid"=>"8x99",
    							"icon"=>"icon-sys",
    							"menuname"=>"教师界面",
    							"menus"=>array(
    									array("menuname"=>"我的已开课程","icon"=>"icon-nav","url"=>"__APP__/Begin/showteacherbegin","target"=>"fm0"),
    									array("menuname"=>"添加实验项目","icon"=>"icon-nav","url"=>"__APP__/Begin/addexpitem?aa=show","target"=>"fm1"),
    							)
    					),*/
    			),
    	);
    	$v=json_encode($menu);
    	return $v;
    
    }
   
    //实验工作人员
    public function mastermenu()
    {
    	$staffid=$this->getstaffid();
    	$menu=array(
    			"menus"=>array(
    					array(
    							"menuid"=>"28",
    							"icon"=>"icon-sys",
    							"menuname"=>"个人信息",
    							"menus"=>array(
    									array("menuname"=>"个人资料","icon"=>"icon-users","url"=>"__APP__/Staff/addstaff?aa=showedit&id=$staffid","target"=>"f1"),
    							)
    					),
    	
    			),
    	);
    	if(isset($_SESSION["username"]))//是否登陆
    	{
    		$menu["menus"][]=array(
    							"menuid"=>"1299",
    							"icon"=>"icon-sys",
    							"menuname"=>"耗材管理",
    							"menus"=>array(
    									array("menuname"=>"耗材配置信息","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsuminfo","target"=>"c1"),
    									array("menuname"=>"添加配置信息","icon"=>"icon-nav","url"=>"__APP__/Consum/addconsuminfo?aa=show","target"=>"c2"),
    									array("menuname"=>"库存信息","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsumable","target"=>"c3"),
    									array("menuname"=>"添加库存信息","icon"=>"icon-nav","url"=>"__APP__/Consum/addconsumable?aa=show","target"=>"c4"),
    									
    									array("menuname"=>"入库信息记录","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsumablenote?type=1","target"=>"c5"),
    									array("menuname"=>"出库信息记录","icon"=>"icon-nav","url"=>"__APP__/Consum/showconsumablenote?type=2","target"=>"c6"),
    									array("menuname"=>"添加出入库信息记录","icon"=>"icon-nav","url"=>"__APP__/Consum/addconsumablenote?aa=show","target"=>"c7"),
    							)
    					);
    		$menu["menus"][]=array(
    							"menuid"=>"899",
    							"icon"=>"icon-sys",
    							"menuname"=>"实验设备管理",
    							"menus"=>array(
    									array("menuname"=>"实验室设备列表","icon"=>"icon-nav","url"=>"__APP__/Equip/showequip","target"=>"fv0"),
    									array("menuname"=>"添加设备","icon"=>"icon-nav","url"=>"__APP__/Equip/addequip?aa=show","target"=>"fv1"),
    									array("menuname"=>"设备故障列表","icon"=>"icon-nav","url"=>"__APP__/Equip/showequipfail","target"=>"fv3"),
    									array("menuname"=>"设备维修记录","icon"=>"icon-nav","url"=>"__APP__/Equip/showequiprepair","target"=>"fv4"),
    									array("menuname"=>"借出设备信息","icon"=>"icon-nav","url"=>"__APP__/Equip/showequiploan","target"=>"fv5"),
    							)
    					);
    	}
    	$v=json_encode($menu);
    	return $v;
    }
    
    //教师
    public function teachermenu()
    {
    	$staffid=$this->getstaffid();
    	$menu=array(
    			"menus"=>array(
    					array(
    							"menuid"=>"28",
    							"icon"=>"icon-sys",
    							"menuname"=>"个人信息",
    							"menus"=>array(
    									array("menuname"=>"个人资料","icon"=>"icon-users","url"=>"__APP__/Staff/addstaff?aa=showedit&id=$staffid","target"=>"f1"),
    							)
    					),
    
    			),
    	);
    	if(isset($_SESSION["username"]))//是否专题
    	{
    		$menu["menus"][]=array(
    				"menuid"=>"333x38",
    				"icon"=>"icon-sys",
    				"menuname"=>"我的开课信息",
    				"menus"=>array(
    						array("menuname"=>"我的已开课程","icon"=>"icon-nav","url"=>"__APP__/Begin/showteacherbegin","target"=>"fm0"),
    						array("menuname"=>"添加实验项目","icon"=>"icon-nav","url"=>"__APP__/Begin/addexpitem?aa=show","target"=>"fm1"),
    				)
    		);
    	}
    	$v=json_encode($menu);
    	return $v;
    
    }
    
    //学生的菜单
    public function stumenu()
    {
    	$stuid=$this->getstuid();
    	$menu=array(
    			"menus"=>array(
    					array(
    							"menuid"=>"28",
    							"icon"=>"icon-sys",
    							"menuname"=>"个人信息",
    							"menus"=>array(
    									array("menuname"=>"个人资料","icon"=>"icon-users","url"=>"__APP__/Stu/addstu?aa=showedit&id=$stuid","target"=>"f1"),
    							)
    					),
    
    			),
    	);
    	if(isset($_SESSION["stuno"]))//是否登陆
    	{
    		$menu["menus"][]=array(
    				"menuid"=>"33338",
    				"icon"=>"icon-sys",
    				"menuname"=>"我的开课信息",
    				"menus"=>array(
    						array("menuname"=>"我的课程","icon"=>"icon-nav","url"=>"__APP__/Begin/showmybegin","target"=>"fs0"),
    				)
    		);
    	}
    	$v=json_encode($menu);
    	return $v;
    
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
    			dump($model);
    			$this->error("你的角色不是教师");
    		}
    	}
    	else
    	{
    		return null;
    	}
    
    }
    public function getstaffid()
    {
    	if(isset($_SESSION["username"]))
    	{
    		$username=$_SESSION["username"];
    		$model=M("user")->where("username='$username'")->find();
    		return $model['staffid'];
    	}
    	else
    	{
    		return null;
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
    		return 1;
    	}
    
    }
    public function adminlogin()
    {
    	$this->display("login");
    }
    //后台验证登录的方法，管理员，或教师(应该具有特权，否则和学生一样)
    public function login()
    {
    	$username = isset($_POST['username'])?trim($_POST['username']):'';
    	$userpass = isset($_POST['userpass'])?trim($_POST['userpass']):'';
    	
    	if(strlen($userpass)<3)
    	{
    		
    		$this->error("密码太短$userpass");
    		return;
    	}
    	$user = M("user");
    	$stu=M("stu");
    	 
    	$temp = $user->where("username='$username'")->find();
//     	if($temp!=null)
//     	{
//     		$_SESSION["lasttime"]=$temp["lasttime"];
//     		$_SESSION["logincount"]=$temp["count"];
//     		$_SESSION["role"]=0;//管理员
    		
//     		$temp["count"]=$temp["count"]+1;
//     		$temp["lasttime"]=date("Y-m-d h:m:s");
//     		$user->where("username='$username'")->data($temp)->save();
//     	}
    	if($temp==null)//管理员如果为空，在判断看下是否是教师(特权教师)
    	{
    		$temp= $stu->where("stuno='$username'")->find();
    		if($temp==null)
    		{
    			$this->error("用户名不存在或输入错误");
    			return;
    		}
    		session('stuno',$username);  //设置session
    		$temp['userpass']=$temp["password"];
    	}
    	 
    	if(md5($userpass)!=$temp['userpass'])
    	{
    		$this->error("输入密码错误");
    		return;
    	}
    	else
    	{
	    	session('username',$username);  //设置session
	    	session('role',$temp["role"]);//设置角色	
	    	$this->success("登陆成功","__ROOT__/admin.php/Index/index");
    	}
  }
  //修改密码的方法
  public function changepass()
  {
  	if(isset($_SESSION["role"]))//不是学生
  	{
	  	$User=D("User");
	  	$username=session("username");//取出session中存储的用户名
	  	$data["userpass"]=md5($_GET["pass"]);//获取传来的新密码
	  	if($User->where("username='$username'")->data($data)->save()) //保存
	  	{
	  		echo $_GET["pass"];//返回新密码
	  	}
	  	else
	  	{
	  		echo "error";
	  	}
  	}
  	else 
  	{
  		$User=D("Stu");
  		$username=session("stuno");//取出session中存储的用户名
  		//$data=$User->where("stuno='$username'")->find();
  		$data["password"]=md5($_GET["pass"]);//获取传来的新密码
  		if($User->where("stuno='$username'")->data($data)->save()) //保存
  		{
  			echo $_GET["pass"];//返回新密码
  		}
  		else
  		{
  			echo "error";
  		}
  	}
  } 		  				
  public function loginout()
  {
  	unset($_SESSION["username"]);
  	unset($_SESSION["stuno"]);
  	unset($_SESSION["role"]);
  	echo "loginout";
  }
    		  				
    
    
    
    
    //奇怪的问题这个下载方法放在后台时不能正确运行
    /*
     * 下载的函数  传递参数为 file=xxxx.xls?title=yyy  显示为下载yyy文件
    */
    public function download()
    {
    	$f=new Fun();
    	$file_name=$_GET["file"];//获取文件名
    
    	$arr=explode("?", $file_name);
    
    	$filetitle=$f->geturlval($file_name, "title");//获取显示的名字
    
    	$encoded_filename = urlencode($filetitle);
    	$encoded_filename = str_replace("+", "%20", $encoded_filename);
    
    	$file_name=$arr[0];//这个才是文件名
    

    	//去除filename中多余的乱码
    	$file_name=urlencode($file_name);
    	$file_name = str_replace("%EF%BB%BF", "", $file_name);
    	
    	$filename="uploads/".$file_name;
    
    	if(!file_exists($filename)) //检查文件是否存在
    	{
    		echo  "文件找不到".$filename;
    		exit;
    	}
    	else
    	{
    		/*
    		$file = fopen($filename,"r"); // 打开文件
    		// 输入文件标签
    		Header("Content-type: application/octet-stream");
    		Header("Accept-Ranges: bytes");
    		Header("Accept-Length: ".filesize($filename));
    		Header("Content-Disposition: attachment; filename=" . $encoded_filename);
    		// 输出文件内容
    		echo fread($file,filesize($filename));
    		fclose($file);
    		exit();
    		*/      
    		$mimeType = $this->mime($filename);          

    		
    		
    		$filesize = filesize($filename);
    		//header("Pragma: public");   header("Expires: 0");
    		header('Content-Encoding: none');
    		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    		header("Content-Type: application/force-download");
    		header("Content-Type: {$mimeType}");
    		header("Content-Transfer-Encoding: binary");
    		//header($attachmentHeader);
    		Header("Content-Disposition: attachment; filename=" . $encoded_filename);
    		header('Pragma: cache');
    		header('Cache-Control: public, must-revalidate, max-age=0');
    		header("Content-Length: {$filesize}");
    		//**********************************
    		ob_clean();
    		flush();
    		//*********************************
    		readfile($filename);
    		exit;
    		
    		
    
    	}
    }
    
	//这个下载方法才没的问题
	public function dl_file($filename)
	{
			$Index=new IndexAction();
			$mimeType = $Index->mime($filename);          
    		$filesize = filesize($filename);
    		//header("Pragma: public");   header("Expires: 0");
    		header('Content-Encoding: none');
    		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    		header("Content-Type: application/force-download");
    		header("Content-Type: {$mimeType}");
    		header("Content-Transfer-Encoding: binary");
    		//header($attachmentHeader);
    		Header("Content-Disposition: attachment; filename=" . $filename);
    		header('Pragma: cache');
    		header('Cache-Control: public, must-revalidate, max-age=0');
    		header("Content-Length: {$filesize}");
    		//**********************************
    		ob_clean();
    		flush();
    		//*********************************
    		readfile($filename);
    		exit;
    		
	}
    
    public function mime($file)
    {
    	if (function_exists('finfo_open')) 
    	{            
    		$finfo = finfo_open(FILEINFO_MIME);            
    		$mime = finfo_file($finfo, $file);            
    		finfo_close($finfo);        
    	} 
    	elseif (function_exists('mime_content_type')) 
    	{            
    		$mime = mime_content_type($file);        
    	}
    }
    public function deletefile()
    {
    	$delfilelist=$_POST["delfilelist"];
    	//去除最后一个#号
    	$delfilename = substr(delfilename,0,-1);
    	$delfilelist = explode("#", $delfilelist);//把字符串分割为数组
    	//接下来从数据库删除此文件所对应的MD5记录,而且从uploads目录下删除
    	
    	$file=M("md5file");
    	$ret="";
    	foreach ($delfilelist as $value)
    	{
    		if($value!="")
    		{
	    		//-----这几部只是为了获取文件名------
	    		$file_name=$value;//获取文件名
		    	$arr=explode("?", $file_name);
		    	$file_name=$arr[0];//这个才是文件名
		    	//去除filename中多余的乱码
		    	$file_name=urlencode($file_name);
		    	$file_name = str_replace("%EF%BB%BF", "", $file_name);
		    	//----------------------
		    	//从数据库中删除此记录
		    	
		    	$file->where("filename='$file_name'")->delete();
	
		    	//从uploads目录下删除此文件
		    	$filepath="uploads/$file_name";
		    	
		    	
		    	if(file_exists($filepath)) //检查文件是否存在
		    	{
		    		$ret.="文件".$filepath."已删除";
		    		unlink($filepath);
		    	}
		    	else
		    	{
		    		$ret.="文件".$file_name."不存在";
		    	}
    		}
    	}
    	$this->ajaxReturn("删除成功",$ret,1);
    	
    }
    
    
    
    public function test()
    {
    	$forms=array(
					array("title"=>"控件1","type"=>"text-S","name"=>"1"),
					array("title"=>"控件2","type"=>"text-M","name"=>"2"),
					array("title"=>"控件3","type"=>"text-L","name"=>"3"),
    				array("title"=>"控件4","type"=>"upfile","name"=>"4"),
    				array("title"=>"控件5","type"=>"select","name"=>"5","items"=>array("1"=>"选项1","2"=>"选项2")),
					array("title"=>"控件6","type"=>"riadio","name"=>"6","items"=>array("1"=>"选项1","2"=>"选项2")),
    				array("title"=>"控件7","type"=>"check","name"=>"7","items"=>array("1"=>"选项1","2"=>"选项2")),
    				array("title"=>"控件8","type"=>"kind","name"=>"8"),

			);
    	$this->showform($forms, "","表单测试","bestform");
    }
    
}