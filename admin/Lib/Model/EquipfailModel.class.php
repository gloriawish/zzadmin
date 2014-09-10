<?php
class EquipfailModel extends Model {
	// 自动验证设置
	protected $_validate = array(
			array('eid', 'require', '请选择设备', 1),//1为必须验证
			array('phenomenon', 'require', '请填故障现象', 1),//1为必须验证
			array('firstreason', 'require', '请填写初步诊断结果', 1),
			array('failtime', 'require', '请选择故障时间', 1),
			array('discoverperson', 'require', '请输入故障发现者', 1),//1为必须验证
			array('failreason', 'require', '请输入故障原因', 1),
	
	);
	// 自动填充设置
	protected $_auto = array(
			//添加进去就默认是未送修的
			array('state', '5', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>