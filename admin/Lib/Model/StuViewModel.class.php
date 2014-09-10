<?php
class StuViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'stu'=>array('id','stuno','stuname','sex','birth','idcard','classno','college'),
			'sex'=>array('id'=>'sexid','sexname','_on'=>'stu.sex=sex.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'stu.college=college.id'),
				
	);
	
	
}

?>