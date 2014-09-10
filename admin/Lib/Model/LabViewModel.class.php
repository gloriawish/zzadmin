<?php
class LabViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'lab'=>array('id','labno','labname','labinfo'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'lab.college=college.id'),
				
	);
	
	
}

?>