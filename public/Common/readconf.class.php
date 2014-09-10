<?php

/*
 * 读取系统配置表中数据的类
 */
class readconf {
	
	//每页显示数量的
	public static function get_pagecount()
	{
		$conf=M("conf");//读取配置表
		
		$confinfo=$conf->where("conf_name='PAGECOUNT'")->find();
		
		return $confinfo["conf_value"];
		
	}
	public static function set_pagecount($value)
	{
		$conf=M("conf");//读取配置表
		
		$data["conf_value"]=$value;
		
		$conf->where("conf_name='PAGECOUNT'")->save($data);
		
	}
	//审核人数标准的方法
	public static function get_count()
	{
		$conf=M("conf");//读取配置表
		
		$confinfo=$conf->where("conf_name='COUNT'")->find();
		
		return $confinfo["conf_value"];
	}
	//获取最大预约人数
	public static function get_maxcount()
	{
		$conf=M("conf");//读取配置表
		
		$confinfo=$conf->where("conf_name='MAX_COUNT'")->find();
		
		return $confinfo["conf_value"];
	}
	
	//获取最大预约日期的
	public static function  get_maxday()
	{
		$conf=M("conf");
		$confinfo=$conf->where("conf_name='MAXDAY'")->find();
		
		return $confinfo["conf_value"];
	}
	public static function set_maxday($value)
	{
		$conf=M("conf");//读取配置表
		
		$data["conf_value"]=$value;
		
		$conf->where("conf_name='MAXDAY'")->data($data)->save();
		
	}
	//获取最早预约日期
	public static function get_minday()
	{
		$conf=M("conf");
		$confinfo=$conf->where("conf_name='MINDAY'")->find();
		
		return $confinfo["conf_value"];
	}
	
	public static function set_minday($value)
	{
		$conf=M("conf");//读取配置表
		
		$data["conf_value"]=$value;
		
		$conf->where("conf_name='MINDAY'")->data($data)->save();
	}
	
	public static function get_subpages()
	{
		$conf=M("conf");//读取配置表
	
		$confinfo=$conf->where("conf_name='SUB_SIZE'")->find();
	
		return $confinfo["conf_value"];
	
	}
	public static function get_theme()
	{
		$conf=M("conf");//读取配置表
	
		$confinfo=$conf->where("conf_name='THEME'")->find();
	
		return $confinfo["conf_value"];
	
	}
}

?>