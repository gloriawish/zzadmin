<?php
class ConsuminfoModel extends Model {
	// 自动验证设置
	protected $_validate = array(
			array('cno', '', '编号已存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('cno', 'require', '请输入耗材编号', 1),//1为必须验证
			array('cname', 'require', '请输入耗材名称', 1),//1为必须验证
			array('prickle', 'require', '请输入单位', 1),//1为必须验证
			array('brand', 'require', '请输入品牌', 1),
	);
	// 自动填充设置
	protected $_auto = array(
			array('type', '1', self::MODEL_INSERT),
			//array('sum', '0', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>