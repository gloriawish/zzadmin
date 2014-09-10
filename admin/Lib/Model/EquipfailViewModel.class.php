<?php
class EquipfailViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'equipfail'=>array('id','phenomenon','firstreason','failtime','discoverperson','failreason'),
			
			'equip'=>array('id'=>'eid','eno','ename','brand','model','_on'=>'equipfail.eid=equip.id'),
			
			'equiptype'=>array('id'=>'typeid','typename','_on'=>'equip.type=equiptype.id'),
			
			'lab'=>array('id'=>'labid','labname','_on'=>'equip.lab=lab.id'),
			
			'equipstate'=>array('id'=>'stateid','statename','_on'=>'equipfail.state=equipstate.id'),
			//'equipbuytype'=>array('id'=>'buyid','buytypename','_on'=>'equip.buytype=equipbuytype.id'),
			//'equipusetype'=>array('id'=>'useid','usetypename','_on'=>'equip.usingtype=equipusetype.id'),
			//'college'=>array('id'=>'collegeid','collegename','_on'=>'equip.college=college.id'),
			//'equipstate'=>array('id'=>'stateid','statename','_on'=>'equip.state=equipstate.id'),
				
	);
	
	
}

?>