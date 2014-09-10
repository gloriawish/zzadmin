<?php

/**
 * 动态生成表单的类
 * @author zz
 *
 */
class Form {
	
	function __construct()
	{
		
	}
	/**
	 * title 表示标题属性,type表示显示的控件类型[text-M,text-L,select,text....] item表示select的子项
	 * @param array $forms $forms=array(
		 array("title"=>"父版块","type"=>"select","name"=>"cate","items"=>array("1"=>"手机","2"=>"电脑","3"=>"相机")),
				array("title"=>"类别","type"=>"text-M","name"=>"cate"),
				array("title"=>"类别描述","type"=>"text-L","name"=>"cate_desc"),
		);
	 *@param string $action 表示提交的到方法
	 * @return string
	 */
	public function showform($forms,$action)
	{
	
		$s='<form id="form" action="'.$action.'" method="post" enctype="multipart/form-data"><fieldset>';
		foreach ($forms as $key=>$val)
		{
			//初始一个item
			
			$item="<p><label>".$val['title']."</label>";
				
			$name=$val["name"];
			
			switch ($val['type'])
			{
	
				//小文本框
				case "text-S":$item=$item."<input class='text-input small-input' type='text' id=$name name=$name />";
				break;
				//中文本框
				case "text-M":$item=$item."<input class='text-input medium-input datepicker' type='text' id=$name name=$name />";
				break;
				//大文本框
				case "text-L":$item=$item."<input class='text-input large-input' type='text' id=$name name=$name />";
				break;
				//下拉选框
				case "select":$item=$item.$this->select($name,$val['items']);
				break;
				//密码框
				case "pass":$item=$item."<input class='text-input medium-input' type='password' id=$name name=$name />";
				break;
				//单选框
				case "riadio":$item=$item.$this->riadio($name, $val['items']);
				break;
				//多选框
				case "check":$item=$item.$this->check($name, $val['items']);
				break;
				//文本框
				case "text":$item=$item."<textarea class='text-input textarea wysiwyg' id=$name name=$name cols='79' rows='15'></textarea>";
				break;
				//时间选择框
				case "time":$item=$item.'<script type="text/javascript" >$(function() {$( "#'.$name.'" ).datepicker({"dateFormat":"yy-mm-dd"});});</script>'."<input class='text-input small-input' type='text' id=$name name=$name />";
				break;
				//kindedit富文本框
				case "kind":$item=$item.'<textarea name="content" style="width:700px;height:400px;visibility:hidden;"></textarea>';
				break;
				//带文件名的文件上传框
				case "filetitle": $item=$item.'<input type="file" name="file_upload" id="file_upload" /><br/><input class="text-input small-input" type="text" id="imgtitle"  /><p>'.'<a href="'."javascript:$('#file_upload').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#file_upload').uploadify('cancel','*')".'">重置上传队列</a></p><div id="img"></div>';
				break;
				case "file": $item=$item.'<input type="file" name="file_upload" id="file_upload" /><br/><p>'.'<a href="'."javascript:$('#file_upload').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#file_upload').uploadify('cancel','*')".'">重置上传队列</a></p><div id="img"></div>';
				break;
				//可以出现多个上传文件框的   取值是   名字+upimg[]
				case "upfile":$item=$item.$this->getscript($name).'<input type="file" name="'.$name.'" id="'.$name.'" /><br/><p>'.'<a href="'."javascript:$('#$name').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#$name').uploadify('cancel','*')".'">重置上传队列</a></p><div id="'.$name.'img"></div>';
				break;
				//可以出现多个上传文件框的 带标题     取值是 名字+upimg[]
				case "upfiletitle":$item=$item.$this->getscript($name).'<input type="file" name="'.$name.'" id="'.$name.'" /><br/><input class="text-input small-input" type="text" id="'.$name.'imgtitle"  /><p>'.'<a href="'."javascript:$('#$name').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#$name').uploadify('cancel','*')".'">重置上传队列</a></p><div id="'.$name.'img"></div>';
				break;
			}
			$item=$item."</p>";
			$s=$s.$item;//加上去
		}
			
		return $s;
	}
	public function getscript($name)
	{
		$img=$name."img";
		$imgtitle=$name."imgtitle";
		$upimg=$name."upimg[]";
		$my_file = file_get_contents("public/js/up.js");
		$my_file=str_replace("{file_upload}","$name",$my_file);
		$my_file=str_replace("{img}","$img",$my_file);
		$my_file=str_replace("{imgtitle}","$imgtitle",$my_file);
		$my_file=str_replace("{upimg}","$upimg",$my_file);
		return $my_file;
	}
	/**
	 * 用来动态生成select表单
	 * @param string $name 表单的名字
	 * @param array $items 子项对应的key和value
	 * @return string
	 */
	public function select($name,$items)
	{
		$s="<select id=$name name=$name class='small-input'>";
	
		foreach ($items as $key=>$value) {
			$s=$s."<option value=$key>$value</option>";
		}
		$s=$s."</select>";
		return $s;
	}
	public function riadio($name,$items)
	{
		$s="";
		foreach ($items as $key=>$value) {
			$s=$s."<input type='radio' name=$name value=$key />$value&nbsp;&nbsp;";
		}
		return $s;
	}
	public function check($name,$items)
	{
		$s="";
		foreach ($items as $key=>$value) {
			$s=$s."<input type='checkbox' name=$name value=$key />$value<br />";
		}
		return $s;
	}
	public function showeditform($forms,$action)
	{
	
	
		foreach ($forms as $key=>$val)
		{
			//初始一个item
			$item='<form id="form" action="'.$action.'" method="post" enctype="multipart/form-data"><fieldset>';
			$item=$item."<p><label>".$val['title']."</label>";
	
			$name=$val["name"];
			$value=$val["val"];//把数据填到编辑表单中去
			if($value==null)
			{
					$value="&ensp;";
			}
			if($val["disable"]==null)//表示可以编辑的控件（没有被禁用）
			{
					switch ($val['type'])
					{
						case "text-S":$item=$item."<input class='text-input small-input datepicker' type='text' id=$name name=$name value=$value />";
						break;
						case "text-M":$item=$item."<input class='text-input medium-input datepicker' type='text' id=$name name=$name value=$value />";
						break;
						case "text-L":$item=$item."<input class='text-input large-input' type='text' id=$name name=$name value=$value />";
						break;
						case "hidden":$item=$item."<input class='text-input medium-input datepicker' type='hidden'    id=$name name=$name value=$value />";
						break;
						case "select":$item=$item.$this->editselect($name,$val['items'],$value,$val["disabled"]);break;
						case "pass":$item=$item."<input class='text-input medium-input' type='password' id=$name name=$name />";
						break;
						case "file": $item=$item.$this->editfile($value);
						break;
						case "filetitle": $item=$item.$this->editfile($value);
						break;
						case "riadio":$item=$item.$this->editriadio($name, $val['items'],$value);
						break;
						case "check":$item=$item.$this->editcheck($name, $val['items'],$value);
						break;
						case "text":$item=$item."<textarea class='text-input textarea wysiwyg' id=$name name=$name cols='79' rows='15'>".$value."</textarea>";
						break;
						case "time":$item=$item.'<script type="text/javascript" >$(function() {$( "#'.$name.'" ).datepicker({"dateFormat":"yy-mm-dd"});});</script>'."<input class='text-input small-input' type='text' id=$name name=$name value=$value />";
						break;
						case "kind":$item=$item.'<textarea name="content" style="width:700px;height:400px;visibility:hidden;">'.$value.'</textarea>';
						break;
						case "upfile":$item=$item.$this->getscript($name).$this->editupfile($name, $value);//编辑文件
						break;
						case "upfiletitle":$item=$item.$this->getscript($name).$this->editupfiletitle($name, $value);//显示多张图片的
						break;
					}
					$item=$item."</p>";
					$s=$s.$item;//加上去
			}
			else//该控件不可用
			{
				switch ($val['type'])
				{
					case "text-M":$item=$item."<input class='text-input medium-input datepicker' type='text' id=$name disabled='true' name=$name value=$value />"."<input type='hidden'  name=$name value=$value />";
					break;
					case "text-L":$item=$item."<input class='text-input large-input' type='text' disabled='true' id=$name name=$name value=$value />"."<input type='hidden'  name=$name value=$value />";
					break;
					case "select":$item=$item.$this->editselect($name,$val['items'],$value,true)."<input type='hidden'  name=$name value=$value />";
					break;
					case "riadio":$item=$item.$this->editriadio($name, $val['items'],$value,true)."<input type='hidden'  name=$name value=$value />";
					break;
					case "check":$item=$item.$this->editcheck($name, $val['items'],$value,true)."<input type='hidden'  name=$name value=$value />";
					break;
					case "time":$item=$item.'<script type="text/javascript" >$(function() {$( "#'.$name.'" ).datepicker({"dateFormat":"yy-mm-dd"});});</script>'."<input class='text-input small-input' disabled='true' type='text' id=$name name=$name value=$value />"."<input type='hidden'  name=$name value=$value />";
					break;
				}
				$item=$item."</p>";
				$s=$s.$item;//加上去
			}
		}
			
		return $s;
	}
	/**
	 * 
	 * @param unknown_type $name
	 * @param unknown_type $items
	 * @param unknown_type $selectval 被选中的值
	 * @return string
	 */
	public function editselect($name,$items,$selectval,$disabled=false)
	{
		if(!$disabled)
		{
			$s="<select id=$name name=$name class='small-input'>";
		}
		else {
			$s="<select name=$name class='small-input' disabled='$disabled'>";
		}
	
		foreach ($items as $key=>$value) {
			if($selectval==$key)
			{
				$s=$s."<option value=$key selected='selected'>$value</option>";
			}
			else 
			{
				$s=$s."<option value=$key>$value</option>";
			}
			
		}
		$s=$s."</select>";
		return $s;
	}
	//显示编辑时候的图片，是在form中写好了js的控件名时固定的
	public function editfile($value)
	{
		$s1='<input type="file" name="file_upload" id="file_upload" /><p>'.'<a href="'."javascript:$('#file_upload').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#file_upload').uploadify('cancel','*')".'">重置上传队列</a></p><div id="img">';
		$s2='</div><a href="javascript:void(0);"  onclick="removehtml()">清空</a>';
		
		if(!($value==""||$value==null))//如果为空就返回
		{
			$items="";
			if(is_array($value))
			{
				foreach ($value as $key=>$val) {
					
					$temp=$val["filesave"];
					$items.="<input type='hidden' name='upimg[]' value='$temp'/>";
		
					$items.="<img width='100px' height='100px'   src='__ROOT__/uploads/$temp'/>";
					
				}
				
			}
			else
			{
			$items.="<input type='hidden' name='upimg[]' value='$value'/>";
		
			$items.="<img width='100px' height='100px'   src='__ROOT__/uploads/$value'/>";
			}
		}
		
		
		return $s1.$items.$s2;
		
		
	}
	//编辑附件,控件名时动态的,一个附件,可以清空
	public function editupfile($name,$value)
	{
		$s1='<input type="file" name="'.$name.'" id="'.$name.'" /><br/><p>'.'<a href="'."javascript:$('#$name').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#$name').uploadify('cancel','*')".'">重置上传队列</a></p><div id="'.$name.'img">';
		$s2='</div><br/><a href="javascript:void(0);"  onclick="removehtml()">清空</a>';
	
		if(!($value==""||$value==null||$value==0))//如果为空就返回
		{
			$items="";
			if(!is_array($value))
			{
				$items.="<input type='hidden' name='".$name."upimg[]' value='$value'/>";
				
				$f=new Fun();
				$filetitle=$f->geturlval($value, "title");//获取显示的名字
				
				$items.="<img width='100px' height='100px'   src='__ROOT__/admin/Tpl/Index/images/WXBM.png' /><br/><a herf='#' onclick=download('$value')>$filetitle(<font color='red'>点击下载</font>)</a>";
			}
		}
	
	
		return $s1.$items.$s2;
	
	
	}
	//编辑图片,可以自定义名称的，有标题的,多个图片，不可以清空
	public function editupfiletitle($name,$value)
	{

		$s1='<input type="file" name="'.$name.'" id="'.$name.'" /><br/><input class="text-input small-input" type="text" id="'.$name.'imgtitle"  /><p>'.'<a href="'."javascript:$('#$name').uploadify('upload','*');".'">上传</a>&nbsp;<a href="'."javascript:$('#$name').uploadify('cancel','*')".'">重置上传队列</a></p><div id="'.$name.'img">';
		$s2='</div>';
	
		if(!($value==""||$value==null||$value==0))//如果为空就返回
		{
			$items="";
			if(is_array($value))
			{
				foreach ($value as $key=>$val) {
	
					$temp=$val["filesave"];
					$items.="<input type='hidden' name='".$name."upimg[]' value='$temp'/>";
						
					$items.="<img width='100px' height='100px'   src='__ROOT__/uploads/$temp'/>";
	
				}
					
			}
		}
	
	
		return $s1.$items.$s2;
	
	
	}
	//编辑riadio的
	public function editriadio($name,$items,$selectvalue,$disabled=false)
	{
		$s="";
		foreach ($items as $key=>$value) {
			if($selectvalue==$key)
			{
				$s=$s."<input type='radio' checked='checked'  name=$name value=$key />$value&nbsp;&nbsp;";
			}
			else 
			{
				$s=$s."<input type='radio'   name=$name value=$key />$value&nbsp;&nbsp;";
			}
		}
		return $s;
	}
	//编辑复选框的
	public function editcheck($name,$items,$selectvalue,$disabled=false)
	{
		$s="";
		foreach ($items as $key=>$value)
		 {
		 	if($selectvalue==$key)
		 	{
				$s=$s."<input type='checkbox' checked='checked' disabled='$disabled' name=$name value=$key />$value<br />";
		 	}
		 	else 
		 	{
		 		$s=$s."<input type='checkbox' disabled='$disabled' name=$name value=$key />$value<br />";
		 	}
		}
		return $s;
	}
	
}

?>