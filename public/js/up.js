 <script language="JavaScript">
		var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
		var i=0;//初始化数组下标
		$(function() {
				$('#{file_upload}').uploadify({
				'auto'     : false,//关闭自动上传
				'removeTimeout' : 1,//文件队列上传完成1秒后删除
				'swf'      : '__ROOT__/public/uploadify/uploadify.swf',
				'uploader' : '__URL__/upload',
				'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
				'formData':{'id':'6','title':''},//在服务端使用$_POST['id']获取该数据,服务端代码上传成功后将在目录生成一个6.txt的文件
				'buttonText' : '选择文件',//设置按钮文本
				'multi'    : true,//允许同时上传多张图片
				'uploadLimit' : 10,//一次最多只允许上传10张图片
				'fileTypeDesc' : 'Image Files',//只允许上传图像
				'fileTypeExts' : '*.gif; *.jpg; *.png;*.doc;*.xls;*.docx;*.pdf',//限制允许上传的图片后缀
				'fileSizeLimit' : '1000KB',//限制上传的图片不得超过200KB
				'onUploadStart' : function(file) {  
                    
                    $("#{file_upload}").uploadify("settings", "formData", {'id':6,'title':$("#{imgtitle}").val()});//设置上传参数的值  
                },
				//每次成功上传后执行的回调函数，从服务端返回数据到前端
				'onUploadSuccess' : function(file, data, response) {
					img_id_upload[i]=data;
					data=$.trim(data);
					data=encodeURI(data);
					data=data.replace("%EF%BB%BF","");//去除多余的字符，我也很奇怪  但是管他的
					data=decodeURI(data);
					
				    if(data.indexOf("jpg")>0||data.indexOf("jpg")>0||data.indexOf("png")>0)
				    {
						$("#{img}").append('<img width="100px" height="100px"   src="__ROOT__/uploads/'+data+'"/>');
					}
				   else
				   {
					 var fname=data.split("?");
					 var showfname=fname[1].substring(6);
					 $("#{img}").append("附件"+(i+1)+":"+showfname+"<br/>");   
				   }
				   $("#{img}").append('<input type="hidden" name="{upimg}" value="'+data+'"/>');
				   $("#{imgtitle}").val("");
				   i++;
				},
				//上传队列全部完成后执行的回调函数
				'onQueueComplete' : function(queueData) {
				if(img_id_upload.length>0)
					{
					//alert('成功上传的文件有：'+encodeURIComponent(img_id_upload));
					}
				}
				});
			});
    </script>
    <script>
    function removehtml()
	{
    	var file=document.getElementsByName('{upimg}');
    	var filelist="";//表示文件名格式用#隔开
    	if(file.length)
        {
	       	for (i = 0; i < file.length; i++) 
	       	{  
	       		filelist+=file[i].value + "#";
	       	}  
       }
		$('#{img}').empty();
		$.post('__APP__/Index/deletefile', {delfilelist:filelist},function(data, status) {
			var json=eval('('+data+')');  
			alert(json.info);
			//alert(data);
		});
		
	}
    </script>
    