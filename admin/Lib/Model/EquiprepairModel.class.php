<?php
class EquiprepairModel extends Model {
	// 自动验证设置
	protected $_validate = array(
			array('fid', 'require', '请选择设备', 1),//1为必须验证
			array('sendtime', 'require', '请选择送修时间', 1),//1为必须验证
			array('sendperson', 'require', '请填写送修人', 1),
	
	);
	// 自动填充设置
	protected $_auto = array(
			//添加进去就默认是未修回
			array('state', '8', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>