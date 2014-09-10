<?php
class ExpitemViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'expitem'=>array('id','expname','guide','type','exphour','guidefile','_type'=>'LEFT'),
			'course'=>array('id'=>'courseid','coursename','_on'=>'expitem.courseid=course.id','_type'=>'LEFT'),
			
			'major'=>array('id'=>'majorid','majorname','_on'=>'course.major=major.id'),
			
			'exptype'=>array('id'=>'typeid','typename','_on'=>'expitem.type=exptype.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'expitem.college=college.id'),
	);
	
	
}

?>