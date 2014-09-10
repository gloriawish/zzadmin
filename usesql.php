<?php
/*
$file = fopen("sql.php", "a");//追加写文件
$fp = fopen( "manager_db.sql", 'r' );//读

fwrite($file,"<?php\r\n");
while ( !feof ( $fp) )
{
	$buffer = fgets($fp, 10240);
	//$buffer = stream_get_line( $fp, 1024, ";" );
	$config="\$sql_query[]=\"$buffer\";\r\n";
	fwrite($file,$config);
	
	
}
fwrite($file,"?>\r\n");
fclose($file);
*/
$file = fopen("sql.php", "a");//追加写文件
$get_sql_data = file_get_contents("zzadmin.sql",dirname(__FILE__));
$explode = explode(";",$get_sql_data);
$cnt = count($explode);
fwrite($file,"<?php\r\n");
for($i=0;$i<$cnt ;$i++){

	$sql = $explode[$i];
	$config="\$sql_query[]=\"$sql\";\r\n";
	fwrite($file,$config);
	
}
fwrite($file,"?>\r\n");
fclose($file);





function readLine($file, $line_num, $delimiter="n")
{
	/*** set the counter to one ***/
	$i = 1;

	/*** open the file for reading ***/
	$fp = fopen( $file, 'r' );

	/*** loop over the file pointer ***/
	while ( !feof ( $fp) )
	{
		/*** read the line into a buffer ***/
		$buffer = stream_get_line( $fp, 1024, $delimiter );
		/*** if we are at the right line number ***/
		if( $i == $line_num )
		{
			/*** return the line that is currently in the buffer ***/
			return $buffer;
		}
		/*** increment the line counter ***/
		$i++;
		/*** clear the buffer ***/
		$buffer = '';
	}
	return false;
}

?>