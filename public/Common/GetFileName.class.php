<?php

class GetFileName {
	
	public function GetName()
	{
		$f=new Fun();
		$ip=$f->get_client_ip();//获取ip
		$s=explode('.',$ip);
		
		foreach ($s as $v)
		{
			$ss.=$v;
		}	
		$t=date('YmdHis',time());
		$random=$f->rand_string(3);
		$filename=$ss.$t.$random;
		return $filename;
		
	}
}

?>