<?php
class ConsumableModel extends Model {
	// 自动验证设置
	protected $_validate = array(
			array('cid', '', '已存在库存', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('reserve', 'require', '请输入库存', 1),//1为必须验证
			array('lab', 'require', '请选择实验室', 1),//1为必须验证
			array('duty', 'require', '请选负责人', 1),
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	);
	// 自动填充设置
	protected $_auto = array(
			array('state', '1', self::MODEL_INSERT),
			//array('sum', '0', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>