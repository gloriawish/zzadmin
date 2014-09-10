<?php
class BegincourseViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'begincourse'=>array('id','state','remark'),
			
			
			'class'=>array('id'=>'classid','classno','classname','class','_on'=>'begincourse.classid=class.id'),
			
			'user'=>array('id'=>"userid",'staffid','username','role','_on'=>'begincourse.teacherid=user.id'),

			'staff'=>array('name','_on'=>'staff.id=user.staffid'),
			
			'course'=>array('id'=>'courseid','courseno','coursename','classhour','_on'=>'begincourse.courseid=course.id'),
			
			
			'major'=>array('id'=>'majorid','majorname','_on'=>'course.major=major.id'),
			
			
			'coursetype'=>array('id'=>'propertiesid','typename'=>'propertiesname','_on'=>'course.properties=coursetype.id'),
			
			'term'=>array('id'=>'termid','termname','_on'=>'begincourse.term=term.id'),
			
			'college'=>array('id'=>'collegeid','collegename','_on'=>'begincourse.college=college.id'),
				
	);
	
	
}

?>