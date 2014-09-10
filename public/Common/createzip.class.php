<?php  

class createzip
{
/*  @creates a compressed zip file  将多个文件压缩成一个zip文件的函数 
*   @$files 数组类型  实例array("1.jpg","2.jpg");   
*   @destination  目标文件的路径  如"c:/androidyue.zip" 
*   @$overwrite 是否为覆盖与目标文件相同的文件 
*   @Recorded By Androidyue 
*   @Blog:http://thinkblog.sinaapp.com 
 */  
function create_zip($files = array(),$destination = '',$overwrite = false) 
{  
    //如果zip文件已经存在并且设置为不重写返回false  
    if(file_exists($destination) && !$overwrite) { return false; }  
    $valid_files = array();  
    //if files were passed in...  
    //获取到真实有效的文件名  
    if(is_array($files)) {  
        //cycle through each file  
        foreach($files as $file) {  
        //make sure the file exists  
            if(file_exists($file)) {  
            $valid_files[] = $file;  
            }  
        }  
    }  
    //如果存在真实有效的文件  
    if(count($valid_files)) 
    {  
        //create the archive  
        $zip = new ZipArchive();  
        //打开文件       如果文件已经存在则覆盖，如果没有则创建  
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {  
            return false;  
        }  
        //向压缩文件中添加文件  
        foreach($valid_files as $file) {  
            $zip->addFile($file,$file);  
        }  
        //关闭文件  
        $zip->close();  
        //检测文件是否存在  
        return file_exists($destination);  
    }
    else{  
        //如果没有真实有效的文件返回false  
        return false;  
    }  
}  

}
/****  
//测试函数 
$files=array('temp.php','test.php'); 
create_zip($files, 'myzipfile.zip', true); 
****/  
?>  


