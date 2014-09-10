<?php
class NoticeModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('title', 'require', '请填公告标题', 1),//1为必须验证
			array('content', 'require', '请填公共内容', 1),//1为必须验证
			array('type', 'require', '请选择类型', 1),
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	);
	// 自动填充设置
	protected $_auto = array(
			//array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>