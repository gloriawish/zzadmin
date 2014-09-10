<?php
class BegincourseModel extends zzModel {
	// 自动验证设置
	protected $_validate = array(
			//array('classid', '', '该编号已经存在', 0, 'unique', self::MODEL_INSERT),//判断用户名是否存在
			array('classid', 'require', '请选择开课班级', 1),//1为必须验证
			array('classid', 'bigzero', '请选择开课班级~', 1,'callback'),
			
			array('teacherid', 'require', '请选择开课老师', 1),
			array('teacherid', 'bigzero', '请选择开课老师~', 1,'callback'),
			
			
			array('courseid', 'require', '请选择课程', 1),
			array('courseid', 'bigzero', '请选择课程~', 1,'callback'),
			
			array('term', 'require', '请选择开课学期', 1),
			array('term', 'bigzero', '请选择开课学期~', 1,'callback'),
			
			array('college', 'require', '请填学院', 1),
			array('college', '1,10', '请选择学院~', 0,'between'),
	);
	// 自动填充设置
	protected $_auto = array(
			array('state', '1', self::MODEL_INSERT),
			//array('userpass','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
// 	public function  bigzero($data)
// 	{
// 		if($data==0)
// 			return false;
// 		else
// 			return true;
// 	}
}

?>