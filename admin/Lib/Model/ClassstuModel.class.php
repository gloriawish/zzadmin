<?php
class ClassstuModel extends Model {
	// 自动验证设置
	protected $_validate = array(
			array('stuid', '', '该学号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('stuid', 'require', '请输入学生id', 1),//1为必须验证
			array('classid', 'require', '请输入班级id', 1),
			
	
	);
	// 自动填充设置
	protected $_auto = array(
			//array('password', '000000', self::MODEL_INSERT),
			//array('password','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>