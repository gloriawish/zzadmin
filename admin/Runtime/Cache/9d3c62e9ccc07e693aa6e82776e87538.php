<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//CH" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>全兼容form</title>
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/themes/base/jquery.ui.all.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.ui.widget.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo (PUBLICPATH); ?>/uploadify/uploadify.css"/>

<script src="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/artDialog.js"></script>
<link href="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/skins/black.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/plugins/iframeTools.source.js"></script>

<style>
	#exec_target{display:none;width:0;height:0;}
	#feedback{width:120px;margin:0 auto;}
	#feedback img{float:left;width:30px;height:30px;}	
</style>

<!--  
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/css/common.css" type="text/css" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/css/jquery.Jcrop.css" type="text/css" />
-->
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/js/jquery.Jcrop.js"></script>
<style type="text/css">
<!--.crop_preview{position:absolute; left:520px; top:0; width:150px; height:150px; overflow:hidden;}-->
</style>
<script language="JavaScript">
		var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
		var i=0;//初始化数组下标
		$(function() {
				$('#file_upload').uploadify({
				'auto'     : true,//关闭自动上传
				'removeTimeout' : 1,//文件队列上传完成1秒后删除
				'swf'      : '<?php echo (PUBLICPATH); ?>/uploadify/uploadify.swf',
				'uploader' : '__URL__/upload',
				'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
				'formData':{'id':'6','title':''},//在服务端使用$_POST['id']获取该数据,服务端代码上传成功后将在目录生成一个6.txt的文件
				'buttonText' : '选择文件',//设置按钮文本
				'multi'    : true,//允许同时上传多张图片
				'uploadLimit' : 10,//一次最多只允许上传10张图片
				'fileTypeDesc' : 'Image Files',//只允许上传图像
				'fileTypeExts' : '*.gif; *.jpg; *.png;*.doc;*.xls',//限制允许上传的图片后缀
				'fileSizeLimit' : '3000KB',//限制上传的图片不得超过200KB
				'onUploadStart' : function(file) {  
                    
                    $("#file_upload").uploadify("settings", "formData", {'id':6,'title':$("#imgtitle").val()});//设置上传参数的值  
                },
				//每次成功上传后执行的回调函数，从服务端返回数据到前端
				'onUploadSuccess' : function(file, data, response) {
					data=$.trim(data);
					data=encodeURI(data);
					data=data.replace("%EF%BB%BF","");//去除多余的字符，我也很奇怪  但是管他的
					data=decodeURI(data);
					jcrop(data);
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
		$('#img').empty();
		alert("清空了!");
	}
    //剪裁图片
    function jcrop(path)
    {
    	art.dialog.open('__APP__/Index/showcrop?path='+path, {
		    title: '剪裁图片',
		    init: function () {
		       
		    },
		    width: '800px', height: 'auto',lock: true,opacity: 0.87,
		    button: [
		       {
		    	name: '提交',
		        callback: function () {
		        	var iframe = this.iframe.contentWindow;
			    	if (!iframe.document.body) {
			        	alert('iframe还没加载完毕呢')
			        	return false;
			        };    
			        //获取剪裁的表单
			        var form = iframe.document.getElementById('crop_form');
			        
			        var x=(iframe.document.getElementById('x')).value;
			        var y=(iframe.document.getElementById('y')).value;
			        var w=(iframe.document.getElementById('w')).value;
			        var h=(iframe.document.getElementById('h')).value;
			        var cropw=(iframe.document.getElementById('cropw')).value;
			        var croph=(iframe.document.getElementById('croph')).value;
			        var cropimg=(iframe.document.getElementById('cropimg')).value;
			        //alert("x:"+x+",y"+y+",w"+w+",h"+h+",cropw"+cropw+",croph"+croph);
			        if(!parseInt(x))
			        {
			        	alert("请选择一个区域");
			        	return true;
			        }
			        $.ajax({
		    	   		type: "POST",
					    url: '__APP__/Index/crop',
					    data: {"x":x,"y":y,"w":w,"h":h,"cropw":cropw,"croph":croph,"cropimg":cropimg},
					    success: function (data) {
					    	
					    
					    	//解析json数据
					    	var json=eval('('+data+')');  
							var icon="succeed";
							if(json.status==2)//设置图标
							{
								icon="error";
							}
							//alert(json.data);剪裁成功
					    	//显示服务端传来的数据
					    	var throughBox = art.dialog.through;
					    	throughBox({
					    	    content: json.info,
					    	    lock: true,
					    	    icon:icon,
					    	    ok: function () {
					    	    	if(json.status!=2)
					    	    		{
							    	    	 
					    	    		//刷新页面
								        //var win = art.dialog.open.origin;//来源页面
								    	// 如果父页面重载或者关闭其子对话框全部会关闭
								    	//win.location.reload();
								        //var origin = artDialog.open.origin;
										//var input = origin.document.getElementById('cutimg');
										//input.value = json.data;
										//art.dialog.close();
										
										//showcut(json.data);
										$("#img").append('<img id="cropbox" style="width:100px;height100px"   src="__ROOT__/uploads/'+json.data+'"/>');
										$("#img").append('<input type="hidden" name="upimg[]" value="'+json.data+'"/>');
										
							    	    return true;
					    	    		}
					    	    	else
					    	    		{
					    	    		  return true;
					    	    		}
					    	    },
					    	    cancelVal: '关闭',
					    	    cancel: true //为true等价于function(){}
					    	});
					    },
					    cache: false
					});
			        //form.submit();
			        return true;
		        },
		        focus: true
		    },
		    {
	            name: '关闭',
	            callback: function () {
	            	return true;
	            }
	        }]
		});
    }
    
    
    function showcut(data)
    {
    	$("#img").append('<img id="cropbox" style="width:100px;height100px"   src="__ROOT__/uploads/'+data+'"/>');
		$("#img").append('<input type="hidden" name="upimg[]" value="'+data+'"/>');
		$("#imgtitle").val("");
    }
</script>



 <!-- kindediter的载入文件-->
<link rel="stylesheet" href="<?php echo (PUBLICPATH); ?>/kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo (PUBLICPATH); ?>/kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo (PUBLICPATH); ?>/kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="<?php echo (PUBLICPATH); ?>/kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="<?php echo (PUBLICPATH); ?>/kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor= K.create('textarea[name="content"]', {
				cssPath : '<?php echo (PUBLICPATH); ?>/kindeditor/plugins/code/prettify.css',
				uploadJson : '__ROOT__/public/php/upload_json.php',
				fileManagerJson : '__ROOT__/public/php/file_manager_json.php',
				allowFileManager : true,
				afterChange : function() {
					K('#count').html(this.count());
				}
			});
			prettyPrint();
		});
	</script>

</head>
<body>
<div id="body-wrapper">
  
  <div id="main-content">
   <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo ($title); ?></h3>
        <ul class="content-box-tabs">
          <!-- href must be unique and match the id of target div -->
          
        </ul>
        <div class="clear"></div>
      </div>
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab2">
           <?php echo ($form); ?>
           
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
     
    </div>
  <!-- End #main-content -->
</div>
</body>

</html>