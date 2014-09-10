<?php
class EquiploanModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('eid', 'require', '请选择设备', 1),//1为必须验证
			array('loantarget', 'require', '请输入借用人', 1),//1为必须验证
			array('loanreason', 'require', '请填写借用缘由', 1),
			array('duty', 'require', '请选择负责人', 1),//1为必须验证
			array('agreetime', 'require', '请选择约定归还时间', 1),
	);
	// 自动填充设置
	protected $_auto = array(
			//添加进去就默认是未归还
			array('state', '14', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>