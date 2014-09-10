<?php
class EquiploanViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'equiploan'=>array('id','loantarget','loanreason','loantime','agreetime','returntime','returnperson','remark'),
			
			'equip'=>array('id'=>'eid','eno','ename','brand','model','_on'=>'equiploan.eid=equip.id'),
			
			
			
			'staff'=>array('id'=>'staffid','name'=>'staffname','_on'=>'equiploan.duty=staff.id'),
			'lab'=>array('id'=>'labid','labname','_on'=>'equip.lab=lab.id'),
			'equipstate'=>array('id'=>'stateid','statename','_on'=>'equiploan.state=equipstate.id'),

				
	);
	
	
}

?>