<?php
class UserViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'user'=>array('id','staffid','username','role'),
			//'StaffView'=>array('name','titlename','majorname','_on'=>'user.staffid=StaffView.id'),
			'staff'=>array('no','name','sex','birth','_on'=>'staff.id=user.staffid'),
			
			'job'=>array('id'=>'jobid','jobname','_on'=>'staff.job=job.id'),
			'major'=>array('id'=>'majorid','majorname','_on'=>'staff.major=major.id'),
			'title'=>array('id'=>'titleid','titlename','_on'=>'staff.title=title.id'),
			
			
			'role'=>array('id'=>'roleid','rolename','_on'=>'user.role=role.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'staff.college=college.id'),
				
	);
	
	
}

?>