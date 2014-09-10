<?php
include_once 'BeginAction.class.php';
	function find_report($expid,$beginid)
	{
		$b=new BeginAction();
		$stuid=$b->getstuid();//我登陆的时候的id
		$order=M("order");
		$state="";
		if($beginid==null||$expid==null)
		{
			$state= "参数错误";
		}
		//判断该生是否这个实验已经提交实验报告
		$report = D("Expreport")->where("beginid=$beginid and expid=$expid and stuid=$stuid")->find();

		
		if($report!=null)
		{
			if($report["score"]!="")
			{
				$state= $report["score"];
			}
			else {
				$state= "老师还未批改";
			}
		
		}
		else
		{
			 
			 $state= "未提交实验报告";
		}
			return  "<td><font color='red'>".$state."</font></td>";
		return $expid." ".$beginid." ".$stuid;
	}
	function find_report_teacher($expid,$beginid)
	{
		$state="";
		
		if($beginid==null||$expid==null)
		{
			$state= "参数错误";
		}
		$condtion="beginid=$beginid and expid=$expid";
		//判断该生是否这个实验已经提交实验报告
		$report = D("ExpreportView")->where($condtion)->select();
	
	
		if($report!=null)
		{
			$num=count($report);
			$nullscore=0;
			$isscore=0;
			foreach ($report as $key => $value) {
				if($value["score"]==null)
					$nullscore++;
				else
					$isscore++;
			}
			$state= "已经有".$num."个学生提交了实验报告<br/>其中还有".$nullscore."个学生未打成绩";
		}
		else
		{
	
			$state= "还没有学生提交实验报告";
		}
		return  "<td><font color='red'>".$state."</font></br><a href='downAll?expid=$expid&beginid=$beginid'>下载</a></td>";
	}
	
?>