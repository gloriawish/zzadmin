<?php
require COMMONPATH.'Fun.class.php';
require COMMONPATH.'BaseAction.class.php';
require COMMONPATH.'GetFileName.class.php';
require COMMONPATH.'readconf.class.php';
require COMMONPATH.'reader.php';//导入xls的包
class ImportAction extends BaseAction
{
	public function Index()
	{
		
		$forms=array(
				array("title"=>"excle文件","type"=>"upfile","name"=>"exclefile"),
		);
		$this->showform($forms, "import_in_mysql","导入数据","bestform");
	}
	public function import_in_mysql()
	{
		if(isset($_POST["exclefileupimg"]))
		{
			$uploadfile=$_POST["exclefileupimg"][0];
			$arr = explode("?", $uploadfile);//获取文件名  123.jpg?title=abc
			$uploadfile=$arr[0];
			
			$uploadfilepath = "./uploads/".$uploadfile;//构造出路径 uploads/123.jpg
		}
	
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('utf-8');
	
		$data->read($uploadfilepath);//读取要导入数据库的文件
		error_reporting(E_ALL ^ E_NOTICE);
	
		$Stu=D("Stu");
		//$User->startTrans();//启动事务;
	
		$filed=C("excle");//获取字段对应的列
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++)
		{
		$col=$data->sheets[0]['cells'][$i];
		$arr=array(
				"stuno"=>$col[$filed["stuno"]],
				"stuname"=>$col[$filed["stuname"]],
				"password"=>$col[$filed["password"]],
					"sex"=>$col[$filed["sex"]],
				"idcard"=>$col[$filed["idcard"]],
					"classno"=>$col[$filed["classno"]],
					"college"=>"1",
		);
				$Stu->create($arr);
				echo $Stu->getError()."<br/>";
				if(!$Stu->add())//如果发生数据添加失败就回滚
				{
		$Stu->rollback();//不成功，回滚
		echo "导入失败回滚";
		return;
		}
				echo $arr["stuno"]."导入成功<br/>";
		}
		$Stu->commit();//成功提交
	
		}
	
	
	
	
	
	//创建上传路径的函数，上传到public的data下面去
	function getnames($exname)
	{
		$dir = "./public/data/".date("Y-n-j",time()+3600*8)."/";
		$i=1;
		if(!is_dir($dir))
		{
			mkdir($dir,0777);
		}
		while(true){
			if(!is_file($dir.$i.".".$exname))
			{
				$name=$i.".".$exname;
				break;
			}
			$i++;
		}
		return $dir.$name;
	}
	
	//导入数据库的方法，只导入了
	public function add_in_mysql()
	{
		if(!empty($_FILES['efile']['name']))
		{
		
			$exname=strtolower(substr($_FILES['efile']['name'],(strrpos($_FILES['efile']['name'],'.')+1)));
			$uploadfile = $this->getnames($exname);//上传后文件所在的路径
			@move_uploaded_file($_FILES['efile']['tmp_name'], $uploadfile);
				
		}
		
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('utf-8');

		$data->read($uploadfile);//读取要导入数据库的文件
		error_reporting(E_ALL ^ E_NOTICE);
		
		$Stu=D("Stu");
		//$User->startTrans();//启动事务;
		
		$filed=C("excle");//获取字段对应的列
		for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++)
		{
			$col=$data->sheets[0]['cells'][$i];
			$arr=array(
					"stuno"=>$col[$filed["stuno"]],
					"stuname"=>$col[$filed["stuname"]],
					"password"=>$col[$filed["password"]],
					"sex"=>$col[$filed["sex"]],
					"idcard"=>$col[$filed["idcard"]],
					"classno"=>$col[$filed["classno"]],
					"college"=>"1",
					);
				$Stu->create($arr);
				echo $Stu->getError()."<br/>";
				if(!$Stu->add())//如果发生数据添加失败就回滚
				{
					$Stu->rollback();//不成功，回滚
					echo "导入失败回滚";
					return;
				}
				echo $arr["stuno"]."导入成功<br/>";
		}
		$Stu->commit();//成功提交
		
	}
}
?>
