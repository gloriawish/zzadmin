<?php
class LabModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('labno', '', '该编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('labname', 'require', '请填实验室名称', 1),//1为必须验证
			
			array('labinfo', 'require', '请填写实验室描述信息', 1),
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
			
	
	);
	// 自动填充设置
	protected $_auto = array(
			//array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>