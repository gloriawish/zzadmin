<?php
$arr1=array(
	//前台
	'URL_MODEL'=>1, 
	
	'LOAD_EXT_CONFIG'=>'user',

);

$arr2=include  '.'/__ROOT__.'/config.inc.php';

return array_merge($arr1,$arr2);
/*
				//-------------如果使用上面的出错的话把下面的注释取消，把上面的注释了或删除---------------
return array(
		'DB_TYPE'=>'mysql',
		'DB_HOST='>'localhost',  //修改为服务器IP地址
		'DB_NAME'=>'zzadmin',	//修改为数据库名称
		'DB_USER'=>'root',		//修改为用户名
		'DB_PWD'=>'root',		//修改为用户密码
		'DB_PORT'=>'3306',
		'DB_PREFIX'=>'zz_',
		'SHOW_PAGE_TRACE' =>false,
		//前台
	    'URL_MODEL'=>1, 
		"PAGE_SIZE"=>'10',
		"theme"=>"default",
		"theme1"=>"cupertino",
		"theme2"=>"dark-hive",
		"theme3"=>"gray",
		"theme4"=>"green",
		"theme5"=>"orange",
		"theme6"=>"pepper-grinder",
		"theme7"=>"pink",
		"theme8"=>"sunny",
		"excle"=>array(
				"stuno"=>1,
				"stuname"=>2,
				"password"=>1,
				"sex"=>3,
				"idcard"=>4,
				"classno"=>5,
				),
		'ext'=> array('jpg','jpeg','gif','png','doc','xls','docx','pdf')
		
		);

*/

?>