<?php
class ClassstuViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'classstu'=>array('id','classid','stuid'),
			'stu'=>array('stuno','stuname','sex','birth','idcard','classno','college','_on'=>'classstu.stuid=stu.id'),
			
			'sex'=>array('id'=>'sexid','sexname','_on'=>'stu.sex=sex.id'),
			
			'college'=>array('id'=>'collegeid','collegename','_on'=>'stu.college=college.id'),
				
	);
	
	
}

?>