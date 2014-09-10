<?php
		$server="localhost";
		$username="smkx_jxsf";
		$password="CGrMacV3";
		$link=mysql_connect($server,$username,$password);
		$database="smkx_db";
		mysql_select_db($database,$link);
		mysql_set_charset("utf-8");
	
		$time=date("yy-mm-dd");
		$select="select * from serverip order by id desc limit 1";
		//echo $select;
		$result=mysql_query($select);
		$row=mysql_fetch_row($result);
		echo $row[1];
			
			

		
?>