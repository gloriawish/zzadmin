<?php
class MajorModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('major', '', '该编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('majorname', 'require', '请填专业名称', 1),//1为必须验证
			
	
	);
	// 自动填充设置
	protected $_auto = array(
			//array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>