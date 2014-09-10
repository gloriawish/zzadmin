<?php
class ExpreportModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('beginid', 'require', '请选择开课课程', 1),//1为必须验证
			array('expid', 'require', '请选择实验项目', 1),
			array('stuid', 'require', '请输入学生id', 1),
			array('reportfile', 'require', '请选择实验报告', 1),
	);
	// 自动填充设置
	protected $_auto = array(
			array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>