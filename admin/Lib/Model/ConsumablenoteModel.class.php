<?php
class ConsumablenoteModel extends Model {
	// 自动验证设置
	protected $_validate = array(
			//array('conid', '', '已存在库存', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('conid', 'require', '请选择库存记录', 1),//1为必须验证
			array('amount', 'require', '请输入数量', 1),//1为必须验证
			array('duty', 'require', '请选择经手人', 1),//1为必须验证
			array('type', 'require', '请选入库还是出库', 1),
	);
	// 自动填充设置
	protected $_auto = array(
			//array('time','time',self:: MODEL_INSERT,'function'),
			//array('state', '1', self::MODEL_INSERT),
			//array('sum', '0', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>