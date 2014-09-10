<?php
class ConsumablenoteViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'consumablenote'=>array('id','conid','amount','time','type','remark'),
				
			'consumable'=>array('cid','_on'=>'consumablenote.conid=consumable.id'),
			
			'consuminfo'=>array('cno','cname','brand','_on'=>'consumable.cid=consuminfo.id'),

			'staff'=>array('id'=>'staffid','name','_on'=>'consumable.duty=staff.id'),

				
	);
	
	
}

?>