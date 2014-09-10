<?php
class CourseViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'course'=>array('id','courseno','coursename','properties','classhour'),
			'major'=>array('id'=>'majorid','majorname','_on'=>'course.major=major.id'),
			
			'coursetype'=>array('id'=>'propertiesid','typename'=>'propertiesname','_on'=>'course.properties=coursetype.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'course.college=college.id'),
				
	);
	
	
}

?>