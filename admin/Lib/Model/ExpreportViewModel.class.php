<?php
class ExpreportViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'expreport'=>array('id','score','state','remark'),
			
			'begincourse'=>array('id'=>'beginid','state'=>"beginstate",'remark'=>'beginremark','_on'=>'expreport.beginid=begincourse.id'),
				
				
			'class'=>array('id'=>'classid','classno','classname','class','_on'=>'begincourse.classid=class.id'),
				
			

			'course'=>array('id'=>'courseid','courseno','coursename','classhour','_on'=>'begincourse.courseid=course.id'),
			
			'expitem'=>array('id'=>'expid','expname','guide','type','exphour','guidefile','_on'=>'expreport.expid=expitem.id'),
			
			'user'=>array('id'=>"userid",'staffid','username','role','_on'=>'begincourse.teacherid=user.id'),
				
			'staff'=>array('name','_on'=>'staff.id=user.staffid'),
			
			'stu'=>array('id'=>'stuid','stuno','stuname','sex','birth','idcard','_on'=>'expreport.stuid=stu.id'),
			
			
				
			
			//'major'=>array('id'=>'majorid','majorname','_on'=>'course.major=major.id'),
				
				
			//'coursetype'=>array('id'=>'propertiesid','typename'=>'propertiesname','_on'=>'course.properties=coursetype.id'),
				
			'term'=>array('id'=>'termid','termname','_on'=>'begincourse.term=term.id'),
				
			//'college'=>array('id'=>'collegeid','collegename','_on'=>'begincourse.college=college.id'),
	);
	
	
}

?>