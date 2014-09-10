<?php
class UserModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('staffid', '', '该用户已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('username', 'require', '请填写用户名', 1),//1为必须验证
			array('userpass', 'require', '请输入密码', 1),
			array('role', 'require', '请选择角色', 1),
			
			
	
	);
	// 自动填充设置
	protected $_auto = array(
			array('state', '1', self::MODEL_INSERT),
			array('userpass','md5',self::MODEL_BOTH,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>