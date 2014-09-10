<?php
Load('extend');
class BaseAction extends  Action
{
	//删除操作
	public function delete($table)
	{
		$id=isset($_GET['id'])?$_GET['id']:"null";//获取要删除的id
		 
		//$table=isset($_GET['table'])?$_GET['table']:"null";//获取要删除的表
		 
		$info=M($table);
		 
		 
		if($info->where("id=$id")->delete())
		{
			$this->ajaxReturn("删除成功","删除成功$id",1);
		}
		else
		{
		$this->ajaxReturn("操作失败","操作失败$id",2);
		}
		 
	}
	/**
	 * 
	 * @param 临时文件 $tempfile
	 * @param 保存文件名 $filename
	 */
	public function checkfileMD5($tempfile,$filename)
	{
		$file=M("md5file");
		
		$md5= md5_file($tempfile);//获取准备上传的文件的MD5值
		
		$temp=$file->where("md5='$md5'")->find();
		if($temp==null)//不存在这个MD5值时说明可以上传,并把这个MD5值加入数据库
		{
			$data=array(
					"md5"=>$md5,
					"filename"=>$filename
			);
			$file->data($data)->add();
			return false;
		}
		else
		{
			return $temp["filename"];//存在这个MD5值得话就返回这个文件的名称
		}
	}
	
	
	
	
	
	
	//上传
	public function upload() {
		$targetFolder = 'uploads'; //设置上传目录
	
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . '/' . $_FILES['Filedata']['name'])) {
			//echo 1;
		} else {
			//echo 0;
		}
		if (!empty($_FILES)) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$title=isset($_POST['title'])?$_POST['title']:$_FILES['Filedata']['name'];//获取图片标题没有就默认文件名

			// Validate the file type
			$fileTypes = C('ext'); //允许的文件后缀
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			//生成随机的文件名
			$file=new GetFileName();
			$filesave=$file->GetName().".".$fileParts['extension'];
			
			$targetFile =$targetFolder. '/' . $filesave;//上传后的图片路径
			
			//----------------------md5--------------------------------------
			if($this->checkfileMD5($tempFile,$filesave))//如果存在这个文件,就只用返回已存在的那个文件的名称
			{
				$filesave=$this->checkfileMD5($tempFile,$filesave);
					
				exit($filesave."?title=".$title);
			}
			//----------------------------------------------------------------------
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				echo $filesave."?title=".$title;;//上传成功后返回给前端的数据
			} else {
				echo '不支持的文件类型';
			}
		}
	}
	
	
	//上传
	public function upload2() {
		//本文件由uploadify官方提供，第一php网对其进行了修改和注释
		$targetFolder = 'uploads'; //设置上传目录
	
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . '/' . $_FILES['file']['name'])) {
			//echo 1;
		} else {
			//echo 0;
		}
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			 
			$targetFile =$targetFolder. '/' . $_FILES['file']['name'];//上传后的图片路径
			 
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); //允许的文件后缀
			$fileParts = pathinfo($_FILES['file']['name']);
			 
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				echo $_FILES['file']['name'];//上传成功后返回给前端的数据
				file_put_contents($_POST['id'].'.txt','上传成功了！');
			} else {
				echo '不支持的文件类型';
			}
		}
	}
	
	
	//显示剪裁的界面
	public function showcrop()
	{
		$path=$_GET["path"];
		$this->assign("path",$path);
		$this->display("jcrop");
	}
	//保存剪裁图片
	public function crop()
	{
		$src = $_POST["cropimg"];//获取文件路径
		$arr = explode("?", $src);//获取文件名
		$src="..".$arr[0];
		$image = $src;
	
		$cropw=$_POST["cropw"];//具体显示的宽
		$croph=$_POST["croph"];//具体显示的高
		$w=$_POST['w'];//相对的宽
		$h=$_POST['h'];//相对的高
	
		$info  = $this->getImageInfo($image);
	
		$cw=floor(($w/$cropw)*$info["width"]);//按比例剪裁的宽
		$ch=floor(($h/$croph)*$info["height"]);//按比例剪裁的高
	
		$cx=($info["width"]/$cropw)*$_POST["x"];//按比例的x坐标
		$cy=($info["height"]/$croph)*$_POST["y"];//按比例的y坐标
		//dump($_POST);
		//dump($info);
		//echo $cw."--".$ch."----------";
		//echo $cx."--".$cy;
		$path=$this->thumb($image,$cw,$ch,0,0,$cx,$cy);
		//../manager/uploads/......
		
		$path=basename($path);//获取文件路径中的文件名
		$this->ajaxReturn($path,"剪裁成功",1);
	
	
	}
	
	
	
	/**
	 *
	 * @param string $tbname 显示的表名
	 * @param int $pagesize 每页显示个数
	 * @param int $showcount 显示多少页
	 * @param string $url 分页的跳转地址，一般是本身函数名
	 * @param array $arr  表头显示的数组		$arr=array(
	 array("id"=>"1","name"=>"编号"),
	 array("id"=>"2","name"=>"类别名称"),
	 array("id"=>"3","name"=>"描述"),
	 array("id"=>"4","name"=>"父级编号")
	 );
	 *@param string $filed 显示的字段，要和表头对应起来"id,cate_name,cate_desc"
	 */
	public function showTable($tbname,$condtion="",$pagesize,$showcount,$url,$tableHead,$filed,$titlename,$editaction="",$delaction="delete",$okaction="",$look="",$which="table",$grade="")
	{
		require COMMONPATH.'SubPages.class.php';
		$info=M($tbname);
		$infos=$info->where($condtion)->select();
	
		$pageCurrent=isset($_GET['p'])?intval($_GET['p']):1;
		//上面只得到总数的信息
		$page_size=$pagesize;//每页显示数量
		$nums=count($infos);//计算查询出来的数量//总条目数
		$sub_pages=$showcount; //每次显示的页数
		$offset=($pageCurrent-1)*$page_size;//数据分页的偏移位置
		if(!strpos($url,"?"))//没有？号
		{
			$url=$url."?";
		}
		else {
			$url=$url."&";
		}
		
		$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,$url."p=",1);
		$this->assign('pageinfo',$subPages->show_SubPages(2));
	
		//get_class_methods($this);获取当前方法名
		
		$showinfo=$info->field($filed)->where($condtion)->order("id desc")->limit("$offset,$page_size")->select();
	
		if($grade!="")
			$this->assign("ok5",true);
		else
			$this->assign("ok5",false);
		if($look!="")
			$this->assign("ok4",true);
		else
			$this->assign("ok4",false);
		if($editaction!="")
			$this->assign("ok3",true);
		else 
			$this->assign("ok3",false);
		if($delaction!="")
			$this->assign("ok2",true);
		else
			$this->assign("ok2",false);
		if($okaction!="")
			$this->assign("ok1",true);
		else
			$this->assign("ok1",false);
	
		$this->assign("title",$titlename);
	
		$this->assign("edit",$editaction);
	
		$this->assign("table",$tbname);//给删除操作提供表
		
		$this->assign("ok",$okaction);
		
	
		$this->assign("delete",$delaction);
	
		$this->assign("list",$tableHead);
	
	
	
		$this->assign("info",$showinfo);
	
		$this->display("Index:".$which);//加上Index表示显示的是Index下的模板
	}
	public function showTable2($tbname,$condtion="",$url,$tableHead,$filed,$titlename,$option,$which="table")
	{
		require COMMONPATH.'SubPages.class.php';
		$info=D($tbname);
		$infos=$info->where($condtion)->select();
	
		$pageCurrent=isset($_GET['p'])?intval($_GET['p']):1;
		//上面只得到总数的信息
		$page_size=readconf::get_pagecount();//每页显示数量,从数据库设置中读取
		$nums=count($infos);//计算查询出来的数量//总条目数
		$sub_pages=readconf::get_subpages(); //每次显示的页数,从数据库读取
		$offset=($pageCurrent-1)*$page_size;//数据分页的偏移位置
		if(!strpos($url,"?"))//没有？号
		{
			$url=$url."?";
		}
		else {
			$url=$url."&";
		}
		
		$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,$url."p=",1);
		$this->assign('pageinfo',$subPages->show_SubPages(2));
	
		//get_class_methods($this);获取当前方法名
		
		$showinfo=$info->field($filed)->where($condtion)->order("id desc")->limit("$offset,$page_size")->select();
		
		//可以的自定义三个按钮
		$selfbutton1=$option["self1"];
		
		if($selfbutton1!="")
		{
			$this->assign("selfbutton1",true);
			$this->assign("selftitle1",$selfbutton1["title"]);
			$this->assign("selfurl1",$selfbutton1["url"]);
			$this->assign("selfimg1",$selfbutton1["img"]);
		}
		else
			$this->assign("selfbutton1",false);
		$selfbutton2=$option["self2"];
		if($selfbutton2!="")
		{
			$this->assign("selfbutton2",true);
			$this->assign("selftitle2",$selfbutton2["title"]);
			$this->assign("selfurl2",$selfbutton2["url"]);
			$this->assign("selfimg2",$selfbutton2["img"]);
		}
		else
			$this->assign("selfbutton2",false);
		
		$selfbutton3=$option["self3"];
		if($selfbutton3!="")
		{
			$this->assign("selfbutton3",true);
			$this->assign("selftitle3",$selfbutton3["title"]);
			$this->assign("selfurl3",$selfbutton3["url"]);
			$this->assign("selfimg3",$selfbutton3["img"]);
		}
		else
			$this->assign("selfbutton3",false);
		
		$loanreturn=$option["loanreturn"];
		if($loanreturn!="")
			$this->assign("loanreturn",true);
		else
			$this->assign("loanreturn",false);
		
		$lookgrade=$option["lookgrade"];
		if($lookgrade!="")
			$this->assign("lookgrade",true);
		else
			$this->assign("lookgrade",false);
		
		
		$addgrade=$option["addgrade"];
		if($addgrade!="")
			$this->assign("addgrade",true);
		else
			$this->assign("addgrade",false);
		
		
		$add=$option["add"];
		if($add!="")
			$this->assign("add",true);
		else
			$this->assign("add",false);
		
		$agreeone=$option["return"];
		
		if($agreeone!="")
			$this->assign("okreturn",true);
		else
			$this->assign("okreturn",false);
		
		$dl=$option["dl"];
		if($dl!="")
			$this->assign("okdwon",true);
		else
			$this->assign("okdwon",false);

		$look=$option["look"];
		if($look!="")
			$this->assign("oklook",true);
		else
			$this->assign("oklook",false);
		$editaction=$option["edit"];
		if($editaction!="")
			$this->assign("okedit",true);
		else 
			$this->assign("okedit",false);
		$delaction=$option["del"];
		if($delaction!="")
			$this->assign("okdel",true);
		else
			$this->assign("okdel",false);
		$okaction=$option["ok"];
		if($okaction!="")
			$this->assign("okok",true);
		else
			$this->assign("okok",false);
	
		$this->assign("title",$titlename);
	
		$this->assign("edit",$editaction);
	
		$this->assign("table",$tbname);//给删除操作提供表
		
		$this->assign("ok",$okaction);
		
	
		$this->assign("delete",$delaction);
	
		$this->assign("list",$tableHead);
	
	
	
		$this->assign("info",$showinfo);
	
		$this->display("Index:".$which);//加上Index表示显示的是Index下的模板
	}
	
	/**
	 * 显示表单的方法,动态改变表单构造
	 * @param unknown_type $forms
	 * @param unknown_type $action
	 */
	public function showform($forms,$action,$title,$tplname="form")
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();//创建一个动态生成表单的类
		$this->assign("form",$F->showform($forms,$action));
		$this->assign("title",$title);
		$this->display("Index:".$tplname);
	}
	//显示编辑的表单
	public function showeditform($forms,$action,$title,$form="form")
	{
		require COMMONPATH.'Form.class.php';
		$F=new Form();//创建一个动态生成表单的类
		$this->assign("form",$F->showeditform($forms, $action));
		$this->assign("title",$title);
		$this->display("Index:".$form);
	}
	//显示树状的结构
	public function showTreeCate($tree,$tbname,$arr,$titlename,$editaction="",$delaction="delete",$okaction="")
	{


		$this->assign("title",$titlename);
	
		$this->assign("edit",$editaction);
	
		$this->assign("table",$tbname);//给删除操作提供表
	
		$this->assign("delete",$delaction);
	
		$this->assign("list",$arr);//显示的列
	
		if($okaction!="")
			$this->assign("ok1",true);
		else
			$this->assign("ok1",false);
		if($delaction!="")
			$this->assign("ok2",true);
		else
			$this->assign("ok2",false);
		if($editaction!="")
			$this->assign("ok3",true);
		else
			$this->assign("ok3",false);
	
		$this->assign("info",$tree);
	
		$this->display("Index:table");
	}
	
	
	//插入数据
	public function insert($table,$data)
	{
		$info=M($table);
		return $info->data($data)->add();
	
	}
	//更新数据
	public function update($table,$id,$data)
	{
		$info=M($table);
		return $info->where("id=$id")->save($data);
	}
	//更新数据,主键自己指定
	public function updatebyfiled($table,$filed="id",$id,$data)
	{
		$info=M($table);
		return $info->where("$filed=$id")->save($data);
	}
	//成功页面
	public function showsuccess()
	{
		$this->display("Index:success");
	
	}
	
	//预览的方法，主要是预览新闻，公告的内容
	public function showlook()
	{
		$id=isset($_GET['id'])?$_GET['id']:"null";//获取id
		$tbname=isset($_GET['tbname'])?$_GET['tbname']:"null";//获取表名
			
		$info=M($tbname);
			
		$infos=$info->where("id=$id")->find();
			
		$this->assign("title",$infos["title"]);
			
		$this->assign("author",$infos["author"]);
			
		$this->assign("time",$infos["time"]);
			
		if(isset($infos["content"]))
			$this->assign("content",$infos["content"]);
		else if (isset($infos["orderdetail"]))
			$this->assign("content",$infos["orderdetail"]);
		else if (isset($infos["guide"]))
			$this->assign("content",$infos["guide"]);
			
			
		$this->display("Index:look");
			
			
	}
	
	
	
	/**
	 * 此方法会自动根据表单的项往数据库里面插入数据
	 * @param String $table  表名
	 * @param array $forms 表单数据
	 */
	public function zz_insert($table="",$forms,$isTime="")
	{
		if($table!="")//表名不能为空
		{
			$data=array();
			foreach ($forms as $key=>$value)//通过创建的表单的项，从POST中自动获取数据
			{
				$data[$value["name"]]=$_POST[$value[name]];
			}
			if($isTime!="")//添加时间
			{
				$data[$isTime]=date("Y-m-d h:m:s");
			}
			dump($forms);
			return $this->insert($table, $data);//返回插入结果
		}
		else
		{
			return "表名不能为空";
		}
	}
	/**
	 * 此方法只自动获取POST表单数据修改数据的
	 * @param unknown_type $table
	 * @param unknown_type $id
	 * @param unknown_type $forms
	 * @param unknown_type $isTime
	 * @return string
	 */
	public function zz_update($table="",$id,$forms="",$isTime="")
	{
		if($table!="")//表名不能为空
		{
			$data=array();
			foreach ($forms as $key=>$value)//通过创建的表单的项，从POST中自动获取数据
			{
				$data[$value["name"]]=$_POST[$value[name]];
			}
			if($isTime!="")//添加时间
			{
				$data[$isTime]=date("Y-m-d h:m:s");
			}
			return $this->updatebyfiled($table,"id" ,$id, $data);//返回插入结果
		}
		else
		{
			return "表名不能为空";
		}
	}
	/**
	 * 判断用户是否登录的方法，没有登陆则跳转到登录页面
	 */
	public function checklogin()
	{
		if(empty($_SESSION["username"])&&empty($_SESSION["stuno"]))
		{
			$this->error("你没有登录或登录超时请重新登录!","__ROOT__/admin.php/Index/adminlogin");
		}
	
	}
	
	//清除缓存的方法
	function clearCache($type=0,$path=NULL) {
		if(is_null($path)) {
			switch($type) {
				case 0:// 模版缓存目录
					$path = CACHE_PATH;
					break;
				case 1:// 数据缓存目录
					$path   =   TEMP_PATH;
					break;
				case 2:// 日志目录
					$path   =   LOG_PATH;
					break;
				case 3:// 数据目录
					$path   =   DATA_PATH;
			}
		}
		import('@.ORG.Dir');
		Dir::del($path);
	}
	//对应上面的方法
	public function clear()
	{
		/*
			foreach($dirs as $value)
			{
		$this->clearCache($type=0,$path=$value);
	
		}*/
		$path=NULL;
		$this->clearCache($type=0,$path);
	
	}
	
	/**
	 * 图片裁剪函数，支持指定定点裁剪和方位裁剪两种裁剪模式
	 * @param <string>  $src_file       原图片路径
	 * @param <int>     $new_width      裁剪后图片宽度（当宽度超过原图片宽度时，去原图片宽度）
	 * @param <int>     $new_height     裁剪后图片高度（当宽度超过原图片宽度时，去原图片高度）
	 * @param <int>     $type           裁剪方式，1-方位模式裁剪；0-定点模式裁剪。
	 * @param <int>     $pos            方位模式裁剪时的起始方位（当选定点模式裁剪时，此参数不起作用）
	 *                                      1为顶端居左，2为顶端居中，3为顶端居右；
	 *                                      4为中部居左，5为中部居中，6为中部居右；
	 *                                      7为底端居左，8为底端居中，9为底端居右；
	 * @param <int>     $start_x        起始位置X （当选定方位模式裁剪时，此参数不起作用）
	 * @param <int>     $start_y        起始位置Y（当选定方位模式裁剪时，此参数不起作用）
	 * @return <string>                 裁剪图片存储路径
	 */
	function thumb($src_file, $new_width, $new_height, $type = 1, $pos = 5, $start_x = 0, $start_y = 0) {
		
		require_once COMMONPATH.'GetFileName.class.php';
		$pathinfo = pathinfo($src_file);
		//生成随机的文件名
		$file=new GetFileName();
		//$file->GetName();
		//$dst_file = $pathinfo['dirname'] . '/' . $pathinfo['filename'] .'_crop.' . $pathinfo['extension'];
		$dst_file = $pathinfo['dirname'] . '/' .$file->GetName().'.' . $pathinfo['extension'];
		
	
		if (!file_exists($dst_file)) {
			if ($new_width < 1 || $new_height < 1) {
				echo "params width or height error !";
				exit();
			}
			if (!file_exists($src_file)) {
				echo $src_file . " is not exists !";
				exit();
			}
			// 图像类型
			$img_type = exif_imagetype($src_file);
			$support_type = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
			if (!in_array($img_type, $support_type, true)) {
				echo "只支持jpg、png、gif格式图片裁剪";
				exit();
			}
			/* 载入图像 */
			switch ($img_type) {
				case IMAGETYPE_JPEG :
					$src_img = imagecreatefromjpeg($src_file);
					break;
				case IMAGETYPE_PNG :
					$src_img = imagecreatefrompng($src_file);
					break;
				case IMAGETYPE_GIF :
					$src_img = imagecreatefromgif($src_file);
					break;
				default:
					echo "载入图像错误!";
					exit();
			}
			/* 获取源图片的宽度和高度 */
			$src_width = imagesx($src_img);
			$src_height = imagesy($src_img);
			/* 计算剪切图片的宽度和高度 */
			$mid_width = ($src_width < $new_width) ? $src_width : $new_width;
			$mid_height = ($src_height < $new_height) ? $src_height : $new_height;
			/* 初始化源图片剪切裁剪的起始位置坐标 */
			switch ($pos * $type) {
				case 1://1为顶端居左
					$start_x = 0;
					$start_y = 0;
					break;
				case 2://2为顶端居中
					$start_x = ($src_width - $mid_width) / 2;
					$start_y = 0;
					break;
				case 3://3为顶端居右
					$start_x = $src_width - $mid_width;
					$start_y = 0;
					break;
				case 4://4为中部居左
					$start_x = 0;
					$start_y = ($src_height - $mid_height) / 2;
					break;
				case 5://5为中部居中
					$start_x = ($src_width - $mid_width) / 2;
					$start_y = ($src_height - $mid_height) / 2;
					break;
				case 6://6为中部居右
					$start_x = $src_width - $mid_width;
					$start_y = ($src_height - $mid_height) / 2;
					break;
				case 7://7为底端居左
					$start_x = 0;
					$start_y = $src_height - $mid_height;
					break;
				case 8://8为底端居中
					$start_x = ($src_width - $mid_width) / 2;
					$start_y = $src_height - $mid_height;
					break;
				case 9://9为底端居右
					$start_x = $src_width - $mid_width;
					$start_y = $src_height - $mid_height;
					break;
				default://随机
					break;
			}
			// 为剪切图像创建背景画板
			$mid_img = imagecreatetruecolor($mid_width, $mid_height);
			//拷贝剪切的图像数据到画板，生成剪切图像
			imagecopy($mid_img, $src_img, 0, 0, $start_x, $start_y, $mid_width, $mid_height);
			// 为裁剪图像创建背景画板
			$new_img = imagecreatetruecolor($new_width, $new_height);
			//拷贝剪切图像到背景画板，并按比例裁剪
			imagecopyresampled($new_img, $mid_img, 0, 0, 0, 0, $new_width, $new_height, $mid_width, $mid_height);
	
			/* 按格式保存为图片 */
			switch ($img_type) {
				case IMAGETYPE_JPEG :
					imagejpeg($new_img, $dst_file, 100);
					break;
				case IMAGETYPE_PNG :
					imagepng($new_img, $dst_file, 9);
					break;
				case IMAGETYPE_GIF :
					imagegif($new_img, $dst_file, 100);
					break;
				default:
					break;
			}
		}
		return ltrim($dst_file, '.');
	}
	/**
	 * 获取图片信息
	 * @param unknown_type $img
	 * @return multitype:unknown string number Ambigous <> |boolean
	 */
	function getImageInfo($img) {
		$imageInfo = getimagesize($img);
		if( $imageInfo!== false) {
			$imageType = strtolower(substr(image_type_to_extension($imageInfo[2]),1));
			$imageSize = filesize($img);
			$info = array(
					"width"		=>$imageInfo[0],
					"height"	=>$imageInfo[1],
					"type"		=>$imageType,
					"size"		=>$imageSize,
					"mime"		=>$imageInfo['mime'],
			);
			return $info;
		}else {
			return false;
		}
	}

	
}