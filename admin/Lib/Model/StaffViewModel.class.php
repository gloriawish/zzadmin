<?php
class StaffViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'staff'=>array('id','no','name','sex','birth'),
			'sex'=>array('id'=>'sexid','sexname','_on'=>'staff.sex=sex.id'),
			'job'=>array('id'=>'jobid','jobname','_on'=>'staff.job=job.id'),
			'major'=>array('id'=>'majorid','majorname','_on'=>'staff.major=major.id'),
			'title'=>array('id'=>'titleid','titlename','_on'=>'staff.title=title.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'staff.college=college.id'),
	
	);
	
	
}

?>