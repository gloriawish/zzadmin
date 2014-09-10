<?php
class ExpitemModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('courseid', 'require', '请选择课程', 1),//1为必须验证
			array('courseid', 'bigzero', '请选择课程~', 1,'callback'),
			
			array('expname', 'require', '请填写实验名称', 1),
			array('guide', 'require', '请输入实验指导', 1),
			
			array('exphour', 'require', '请输入实验学时', 1),
			array('exphour', 'number', '实验学时为数字请输入正确的数字', 1),
			
			array('college', 'require', '请选学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	);
	// 自动填充设置
	protected $_auto = array(
			//array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>