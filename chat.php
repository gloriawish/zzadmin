<?php
		$server="localhost";
		$username="smkx_jxsf";
		$password="CGrMacV3";
		$link=mysql_connect($server,$username,$password);
		$database="smkx_db";
		mysql_select_db($database,$link);
		mysql_set_charset("utf-8");
		
		$ip=$_GET["ip"];
		$time=date("Y-m-d H:i:s");
		$insert="insert into serverip(sip,time) values('$ip','$time')";
		$result=mysql_query($insert);
		if($result>0)
		{
			echo "ok";
		}
		else
		{
			echo "no";
		}
?>