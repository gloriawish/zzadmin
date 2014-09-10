<?php
class StaffModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('no', '', '编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('name', 'require', '请填写用姓名', 1),//1为必须验证
			array('sex', 'require', '请选择性别', 1),
			array('birth', 'require', '请选择出生日期', 1),
			array('title', 'require', '请选择职称',1),
			array('job', 'require', '请选择工作', 1),
			array('major', 'require', '请选择专业',1),
			array('college', 'require', '请选择学院',1),
			array('college', '1,10', '请选择学院~', 0,'between'),
			
	
	);
	// 自动填充设置
	protected $_auto = array(
				
	);
	
}

?>