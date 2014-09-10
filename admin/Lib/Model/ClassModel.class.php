<?php
class ClassModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('classno', '', '该编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('classno', 'require', '请填班级编号', 1),//1为必须验证
			
			array('classname', 'require', '请填班级名称', 1),//1为必须验证
			array('class', 'require', '请选择年级', 1),
			
			array('count', 'require', '请输入该班人数', 1),
			array('count', 'number', '班级人数为数字请输入正确的数字', 1),
			
			array('type', 'require', '请选择班级类型', 1),
			
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
			//array('term', 'require', '请选开班学期', 1),
	);
	// 自动填充设置
	protected $_auto = array(
			//array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>