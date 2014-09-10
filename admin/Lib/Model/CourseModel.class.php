<?php
class CourseModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('courseno', '', '该编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('courseno', 'require', '请输入课程编号', 1),//1为必须验证
			
			array('coursename', 'require', '请填课程名称', 1),//1为必须验证
			
			array('major', 'require', '请选择专业', 1),
			array('major', 'bigzero', '请选择专业~', 1,'callback'),
			
			array('properties', 'require', '请选择课程性质', 1),
			
			array('classhour', 'require', '请填写学时', 1),
			array('classhour', 'number', '学时为数字请输入正确的数字', 1),
			
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	);
	// 自动填充设置
	protected $_auto = array(
			array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>