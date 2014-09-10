<?php
class StuModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('stuno', '', '该学号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('stuno', 'require', '请填写学号', 1),//1为必须验证
			array('stuname', 'require', '请填写姓名', 1),//1为必须验证
			
			array('sex', 'require', '请选择性别', 1),//1为必须验证
			
			array('idcard', 'require', '请输入身份证号', 1),
			array('idcard', 18, '身份证长度不正确', 1,'length'),//验证长度
			
			array('classno', 'require', '请选择班号', 1),
			array('classno', 'bigzero', '请选择班号~', 1,'callback'),
				
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	
	);
	// 自动填充设置
	protected $_auto = array(
			array('password', '000000', self::MODEL_INSERT),
			array('password','md5',self::MODEL_BOTH,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>