<?php
header("Content-type:text/html;charset=utf-8"); //看你用的是什么编码，要保持一致。
$files="config.inc.php";  //要写入的配置文件。
if(!is_writable($files)){    //判断是否有可写的权限，linux操作系统要注意这一点，windows不必注意。
    echo "<font color=red>文件不可写</font>";
    exit();
}
if(isset($_POST['install'])){  //获取用户提交的数据。
$host=$_POST['host'];
$user=$_POST['user'];
$password=$_POST['password'];
$dbname=$_POST['dbname'];
 
$config="<?php return array(";        //$config的内容就是要写入配置文件的内容。
$config.="\n";            //   /n是用来换行的。
$config.="'DB_TYPE'=>'mysql',";
$config.="\n";
$config.="'DB_HOST='>'".$host."',";
$config.="\n";
$config.="'DB_NAME'=>'".$dbname."',";
$config.="\n";  
$config.="'DB_USER'=>'".$user."',";
$config.="\n";  
$config.="'DB_PWD'=>'".$password."',";
$config.="\n";  
$config.="'DB_PORT'=>'3306',";
$config.="\n";
$config.="'DB_PREFIX'=>'zz_',";
$config.="\n";
$config.="'SHOW_PAGE_TRACE' =>false,";
$config.="\n";  
$config.=");?>";
 
$file = fopen($files, "w");   //以写入的方式打开config.php这个文件。
fwrite($file,$config);  //将配置信息写入config.php文件。
fclose($file);
if(!$conn=@mysql_connect($host,$user,$password)){
       echo '连接数据库失败！请返回上一页检查连接参数 <a href="javascript:history.go(-1)" mce_href="javascript:history.go(-1)"><font color=#ff0000>返回修改</font></a>';
       exit();
}else{
  	mysql_query("set names utf8;");   //设置数据库的编码，注意要与前面一致。
   if(!mysql_select_db($dbname,$conn)){   //如果数据库不存在，我们就进行创建。
   	     //$dbsql="CREATE DATABASE `$dbname`";
         $dbsql="CREATE DATABASE `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
         if(!mysql_query($dbsql)){
           echo '创建数据库失败，请确认是否有足够的权限！<a href="javascript:history.go(-1)" mce_href="javascript:history.go(-1)"><font color=#ff0000>返回修改</font></a>';
           exit();
          }
   }
	//下面根据你实际的表的结构跟初始化表的数据来写，这些sql语句，我们在导出时可以找到。
    
   	 include_once("public/sql.php");
     foreach($sql_query as $sql){
            if(!mysql_query($sql)){      //依次执行以上的sql语句，就是创建表和初始化数据。
            echo "<font color=red>已准备好安装,请刷新安装继续!!!!</font>";
            exit();
           }
           
     }
     mysql_close();
     echo "安装成功";//可以做一个跳转到首页。
     exit();
}
}
 
?>
<html>
<head><title>php安装程序的基本原理</title></head>
<body>
<form action="install.php" method="post">
<br/>
<font color="blue">填写主机：</font><input type="text" name="host" value="localhost">本地主机为localhost<br />
<br/><font color="blue">连接数据库的用户名：</font><input type="text" name="user" value="root"><br />
<br/><font color="blue">连接数据库的密码：</font><input type="text" name="password" value="123456"><br />
<br/><font color="blue">要创建的数据库名：</font><input type="text" name="dbname" value="testinstall"><br />
<br/><input type="submit" name="install" value="安装">
</form>
</body>
</html>