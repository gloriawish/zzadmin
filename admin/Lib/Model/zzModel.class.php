<?php
class zzModel  extends Model{
	
	public function  bigzero($data)
	{
		if($data==0)
			return false;
		else
			return true;
	}
}

?>