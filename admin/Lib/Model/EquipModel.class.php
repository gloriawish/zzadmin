<?php
class EquipModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			array('eno', '', '该编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('eno', 'require', '请填设备编号', 1),//1为必须验证
			array('ename', 'require', '请填设备名称', 1),//1为必须验证
			array('brand', 'require', '请填写品牌', 1),
			array('model', 'require', '请填写型号', 1),
			array('type', 'require', '请选择设备类型', 1),//1为必须验证
			array('buytime', 'require', '请输入购买时间', 1),
			array('buytype', 'require', '请选择购买类型', 1),
			array('lab', 'require', '请选择所属实验室', 1),
			array('usingtype', 'require', '请选择使用方式', 1),
			array('duty', 'require', '请选择负责人', 1),
			array('college', 'require', '请选择学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	);
	// 自动填充设置
	protected $_auto = array(
			array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
}

?>