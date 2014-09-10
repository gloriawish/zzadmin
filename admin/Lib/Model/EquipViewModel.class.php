<?php
class EquipViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'equip'=>array('id','eno','ename','brand','model','serialno','buytime','buytype','money','location'),
			
			'equiptype'=>array('id'=>'typeid','typename','_on'=>'equip.type=equiptype.id'),
			
			'lab'=>array('id'=>'labid','labname','_on'=>'equip.lab=lab.id'),
			'equipbuytype'=>array('id'=>'buyid','buytypename','_on'=>'equip.buytype=equipbuytype.id'),
			'equipusetype'=>array('id'=>'useid','usetypename','_on'=>'equip.usingtype=equipusetype.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'equip.college=college.id'),
			'equipstate'=>array('id'=>'stateid','statename','_on'=>'equip.state=equipstate.id'),
				
	);
	
	
}

?>