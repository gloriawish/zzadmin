<?php
class NoticeViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'notice'=>array('id','title','content','time','type'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'notice.college=college.id'),
				
	);
	
	
}

?>