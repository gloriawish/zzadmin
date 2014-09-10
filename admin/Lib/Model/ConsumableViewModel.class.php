<?php
class ConsumableViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'consumable'=>array('id','cid','reserve','sum','college','state','remark'),
			
			
			'consuminfo'=>array('cno','cname','_on'=>'consumable.cid=consuminfo.id'),
			
			'lab'=>array('id'=>'labid','labname','_on'=>'consumable.lab=lab.id'),
			
			'staff'=>array('id'=>'staffid','name','_on'=>'consumable.duty=staff.id'),
			
			'college'=>array('id'=>'collegeid','collegename','_on'=>'consumable.college=college.id'),
				
	);
	
	
}

?>