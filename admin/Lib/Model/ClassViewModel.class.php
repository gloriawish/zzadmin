<?php
class ClassViewModel extends  ViewModel {
	
	public $viewFields = array(
	
			'class'=>array('id','classno','classname','class','count','term'),
			'term'=>array('id'=>'termid','termname','_on'=>'class.term=term.id'),
			'college'=>array('id'=>'collegeid','collegename','_on'=>'class.college=college.id'),
				
	);
	
	
}

?>