<?php
class EquiprepairViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'equiprepair'=>array('id','sendtime','sendperson','returntime','returnperson','flag','remark'),
			
			'equipfail'=>array('id'=>'fid','phenomenon','failreason','_on'=>'equiprepair.fid=equipfail.id'),
			
			'equip'=>array('id'=>'eid','eno','ename','brand','model','_on'=>'equipfail.eid=equip.id'),
			
			'lab'=>array('id'=>'labid','labname','_on'=>'equip.lab=lab.id'),
			
			'equipstate'=>array('id'=>'stateid','statename','_on'=>'equiprepair.state=equipstate.id'),
			//'equipbuytype'=>array('id'=>'buyid','buytypename','_on'=>'equip.buytype=equipbuytype.id'),
			//'equipusetype'=>array('id'=>'useid','usetypename','_on'=>'equip.usingtype=equipusetype.id'),
			//'college'=>array('id'=>'collegeid','collegename','_on'=>'equip.college=college.id'),
			//'equipstate'=>array('id'=>'stateid','statename','_on'=>'equip.state=equipstate.id'),
				
	);
	
	
}

?>