<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/themes/base/jquery.ui.all.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo (APP_TMPL_PATH); ?>/Index/resources/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/js/simpla.jquery.configuration.js"></script>

<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo (PUBLICPATH); ?>/uploadify/jquery.ui.widget.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo (PUBLICPATH); ?>/uploadify/uploadify.css"/>

<script src="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/artDialog.js"></script>
<link href="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/skins/opera.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/plugins/iframeTools.source.js"></script>

<script type="text/javascript">

//设备修回
function equipreturn(id)
{
	art.dialog.open('__APP__/Equip/showreturn?id='+id, {
	    title: '设备修回',
	    init: function () {
	       
	    },
	    width: '420px', height: 'auto',lock: true,opacity: 0.87,
	    button: [
	       {
	    	name: '确定',
	        callback: function () {
	        	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        var form = iframe.document.getElementById('form');
		        //----------------这一部分只是为了测试是否能通过ajax提交数据---------
				//获取选中的值
		       var returntime =(iframe.document.getElementById('returntime')).value;//获取成绩
		       var returnperson=(iframe.document.getElementById('returnperson')).value;
		       form.submit();
		        
	          return false;
	        },
	        focus: true
	    },
	    {
            name: '关闭',
            callback: function () {
            	 //刷新页面
		        var win = art.dialog.open.origin;//来源页面
		    	// 如果父页面重载或者关闭其子对话框全部会关闭
		    	win.location.reload();
            }
        }]
	});

}



//设备归还
function loanreturn(id)
{
	art.dialog.open('__APP__/Equip/showloanreturn?id='+id, {
	    title: '设备归还',
	    init: function () {
	       
	    },
	    width: '420px', height: 'auto',lock: true,opacity: 0.87,
	    button: [
	       {
	    	name: '确定',
	        callback: function () {
	        	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        var form = iframe.document.getElementById('form');
		        form.submit();
		        
	          return false;
	        },
	        focus: true
	    },
	    {
            name: '关闭',
            callback: function () {
            	 //刷新页面
		        var win = art.dialog.open.origin;//来源页面
		    	// 如果父页面重载或者关闭其子对话框全部会关闭
		    	win.location.reload();
            }
        }]
	});

}


//设备搜索
function equipsearch(type)
{
	art.dialog.open('__APP__/Equip/showsearch?type='+type, {
	    title: '搜索',
	    init: function () {
	       
	    },
	    width: '420px', height: 'auto',lock: true,opacity: 0.87,
	    button: [
	       {
	    	name: '确定',
	        callback: function () {
	        	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        var form = iframe.document.getElementById('form');
		        var eno =(iframe.document.getElementById('eno')).value;//获取开放时间
		        //form.submit();
		        
		        //刷新页面
		        var win = art.dialog.open.origin;//来源页面
		    	// 如果父页面重载或者关闭其子对话框全部会关闭
		    	if(type==1)//设备搜索
		    	{
		    		win.location.href="__APP__/Equip/showequip?eno="+eno;
		    	}
		    	else if(type==2)//故障设备搜索
		    	{
		    		win.location.href="__APP__/Equip/showequipfail?eno="+eno;
		    	}
		    	else if(type==3)//维修设备搜索
		    	{
		    		win.location.href="__APP__/Equip/showequiprepair?eno="+eno;
		    	}
		    	else if(type==4)//设备借出
		    	{
		    		win.location.href="__APP__/Equip/showequiploan?eno="+eno;
		    	}
	          return false;
	        },
	        focus: true
	    },
	    {
            name: '关闭',
            callback: function () {
            	 //刷新页面
		        var win = art.dialog.open.origin;//来源页面
		    	// 如果父页面重载或者关闭其子对话框全部会关闭
		    	win.location.reload();
            }
        }]
	});

}





//显示添加学生的界面
function showaddstu(id)
{
	art.dialog.open('__APP__/Class/showaddstu?id='+id, {
	    title: '添加学生',
	    init: function () {
	       
	    },
	    width: '800px', height: '500px',lock: true,opacity: 0.87,
	    button: [
	       {
	    	name: '提交',
	        callback: function () {
	        	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        var form = iframe.document.getElementById('addform');
		        //----------------这一部分只是为了测试是否能通过ajax提交数据---------
				//获取选中的值
		       var check=iframe.document.getElementsByName('idcheck[]');
		       var ALL=iframe.document.getElementsByName('ALLSTU')[0].checked;
		       var classno=iframe.document.getElementById('classno').value;
		        var ischeck="";//表示选中了的
		        var nocheck="";//表示未选中的
		        if(check.length)
		         {
		        	for (i = 0; i < check.length; i++) 
		        	{  
			        	 if (check[i].checked) 
			        	 {  
			        		 ischeck += check[i].value + "#";  
			        	 } 
			        	 else
			        	 {
			        		 nocheck += check[i].value + "#";  
			        	 }
		        	 }  
		        }
				//-------------------------------------end---------------------------
		        //通过ajax提交数据
		        var classid =(iframe.document.getElementById('classid')).value;//获取当前班的id
		        
		       $.ajax({
		    	   		type: "POST",
					    url: '__APP__/Class/addstu',
					    data: {checkd:ischeck,nocheckd:nocheck,classid:classid,isall:ALL,'classno':classno},
					    success: function (data) {
					    	
					    	//解析json数据
					    	var json=eval('('+data+')');  
							var icon="succeed";
							if(json.status==2)//设置图标
							{
								icon="error";
							}
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
									        var win = art.dialog.open.origin;//来源页面
									    	// 如果父页面重载或者关闭其子对话框全部会关闭
									    	win.location.reload();
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
		        
	          return false;
	        },
	        focus: true
	    },
	    {
            name: '关闭',
            callback: function () {
            	 //刷新页面
		        var win = art.dialog.open.origin;//来源页面
		    	// 如果父页面重载或者关闭其子对话框全部会关闭
		    	win.location.reload();
            }
        }]
	});

}

//显示我的实验成绩 和评语
function showmygrade(beginid,expid)
{
	
	 $.ajax({
	   		type: "POST",
		    url: '__APP__/Begin/showmygrade',
		    data: {beginid:beginid,expid:expid},
		    success: function (data) {
		    	
		    	var info=$.parseJSON(data);
		    	//解析json数据
				if(info.status==1)//等于2表示失败了
				{
					art.dialog({
					    background: '#9F9', // 背景色
					    opacity: 0.87,	// 透明度
					    content: '你的成绩是<font color="blue">'+info.info+"</font><br/><br/>评语:"+info.data,
					    icon: 'succeed',
					    ok: function () {
					       
					        return true;
					    },
					    cancel: true
					});
				}
				else
					{
					  alert(info.data);
					}
		    },
		    cache: false
		});
}

//给实验报告打成绩
function grade(id)
{
	art.dialog.open('__APP__/Begin/showscore?id='+id, {
	    title: '成绩',
	    init: function () {
	       
	    },
	    width: '420px', height: 'auto',lock: true,opacity: 0.87,
	    button: [
	       {
	    	name: '提交',
	        callback: function () {
	        	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        var form = iframe.document.getElementById('form');
		        //----------------这一部分只是为了测试是否能通过ajax提交数据---------
				//获取选中的值
		       var score =(iframe.document.getElementById('score')).value;//获取成绩
		       var remark=(iframe.document.getElementById('remark')).value;
				//-------------------------------------end---------------------------
		        //通过ajax提交数据

		       $.ajax({
		    	   		type: "POST",
					    url: '__APP__/Begin/editscore',
					    data: {"score":score,"id":id,"remark":remark},
					    success: function (data) {
					    	
					    	//解析json数据
					    	var json=eval('('+data+')');  
							var icon="succeed";
							if(json.status==2)//设置图标
							{
								icon="error";
							}
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
									        var win = art.dialog.open.origin;//来源页面
									    	// 如果父页面重载或者关闭其子对话框全部会关闭
									    	win.location.reload();
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
		        
	          return false;
	        },
	        focus: true
	    },
	    {
            name: '关闭',
            callback: function () {
            	 //刷新页面
		        var win = art.dialog.open.origin;//来源页面
		    	// 如果父页面重载或者关闭其子对话框全部会关闭
		    	win.location.reload();
            }
        }]
	});

}





	//下载文件的方法
	function download(id,type)
	{
		var url="";
		if(type=="guide")
		{
			url="getguide";
		}
		else if(type=="report")
		{
			url="getreoprt";
		}
		 $.ajax({
 	   		type: "POST",
			    url: '__APP__/Begin/'+url,
			    data: {"id":id},
			    success: function (data) {
			    	
			    	//解析json数据
			    	var json=eval('('+data+')');  
					var icon="succeed";
					if(json.status==1)//设置图标
					{
						window.open('__ROOT__/admin.php/Index/download?file='+json.data);
						
					}
					else
					{
						alert(json.data);
					}
			    },
			    cache: false
			});
		
	}
	//显示是否删除的窗口
	function showdelete(id)
	{
		art.dialog({
		    lock: true,
		    background: '#600', // 背景色
		    opacity: 0.87,	// 透明度
		    content: '你确定要删除',
		    icon: 'error',
		    ok: function ()
		    {
				//通过这个方法删除
		    	// jQuery ajax   
		    	$.ajax({
		    	    url: '__URL__/del',
		    	    data: {"id":id},
		    	    success: function (data) {
		    	    	//解析json数据
				    	var json=eval('('+data+')');  
						var icon="succeed";
						if(json.status==1)//设置图标
						{
			    	    	art.dialog({
							    content: json.info,
							    lock: true,
							    ok: function () {
							    		//刷新页面
							        	var win = art.dialog.open.origin;//来源页面
							    		// 如果父页面重载或者关闭其子对话框全部会关闭
							    		win.location.reload();
							    },
							    cancelVal: '关闭',
							    cancel: true //为true等价于function(){}
							});
						}
						else
						{
								alert(json.data);
						}

		    	    },
		    	    cache: false
		    	});
		    },
		    cancel: true
		});
	}
	
	function showlook(id,tbname)
	{
		art.dialog.open('__APP__/Index/showlook?tbname='+tbname+'&id='+id, {
		    title: '预览',
		    init: function () {
		       
		    },
		    width: 'auto', height: 'auto',lock: true,opacity: 0.87,
		    ok: function () {
		    	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        

		        form.submit();//提交页面
		        return false;
		    	
		    },
		    cancel: true
		});
	
	}
</script>
<script>
$(function(){
	$("#state").change(function(){
		
		var state=$("#state").val();
		window.location.href="__APP__/Equip/showequip?state="+state;
	});
});
$(function(){
	$("#failstate").change(function(){
		
		var state=$("#failstate").val();
		window.location.href="__APP__/Equip/showequipfail?state="+state;
	});
});
$(function(){
	$("#repairstate").change(function(){
		
		var state=$("#repairstate").val();
		
		window.location.href="__APP__/Equip/showequiprepair?state="+state;
	});
});
$(function(){
	$("#loanstate").change(function(){
		
		var state=$("#loanstate").val();
		
		window.location.href="__APP__/Equip/showequiploan?state="+state;
	});
});
$(function(){
	$("#classno").change(function(){
		
		var classno=$("#classno").val();
		window.location.href="__APP__/Stu/showstu?classid=<?php echo ($classid); ?>&classno="+classno;
	});
});
$(function(){
	$("#class").change(function(){
		
		var classnum=$("#class").val();
		window.location.href="__APP__/Class/showclass?type=<?php echo ($classtype); ?>&class="+classnum;
	});
});
$(function(){
	$("#course").change(function(){
		
		var courseid=$("#course").val();
		window.location.href="__APP__/Expitem/showexpitem?courseid="+courseid;
	});
});
$(function(){
	$("#major").change(function(){
		
		var major=$("#major").val();
		window.location.href="__APP__/Course/showcourse?major="+major;
	});
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
          <!--<li><a href="#tab1" class="default-tab">Table</a></li>-->
          <!-- href must be unique and match the id of target div -->
          <!--<li><a href="#tab2">Forms</a></li>-->
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- id必须和上面一样 -->
          
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox" />
                </th>
                 <?php if(is_array($list)): foreach($list as $key=>$vo): ?><th><?php echo ($vo["name"]); ?></th><?php endforeach; endif; ?>
				<th>操作</th>
				 <?php if($notify_report): ?><th>提示信息</th><?php endif; ?>
				<?php if($notify_report_teacher): ?><th>提示信息</th><?php endif; ?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    <?php echo ($select); echo ($otherform); ?>
                     <a href="###" onclick="<?php echo ($search); ?>(<?php echo ($type); ?>)"  alt="搜索"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/look3.png" style="width:20px;height:20px;" alt="搜索" />搜索</a>
                   </div>
                  <div class="pagination" style=" font-size:14px;">
                  	<?php echo ($pageinfo); ?>
                   </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
            <!--循环输出-->
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td>
                  <input type="checkbox"  name="idcheck" />
                </td>
                <?php if(is_array($vo)): foreach($vo as $key=>$item): ?><td><?php echo (msubstr($item,0,15,'utf-8',false)); ?></td><!-- 截取字符串 --><?php endforeach; endif; ?>
                <td>
                  <!-- Icons -->
                  <?php if($selfbutton1): ?><a  href="<?php echo ($selfurl1); echo ($vo["id"]); ?>" title="<?php echo ($selftitle1); ?>"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/<?php echo ($selfimg1); ?>" style="width:20px;height:20px;" alt="<?php echo ($selftitle1); ?>" /></a><?php endif; ?>
				  <?php if($selfbutton2): ?><a  href="<?php echo ($selfurl2); echo ($vo["id"]); ?>" title="<?php echo ($selftitle2); ?>"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/<?php echo ($selfimg2); ?>" style="width:20px;height:20px;" alt="<?php echo ($selftitle2); ?>" /></a><?php endif; ?>
				  <?php if($selfbutton3): ?><a  href="<?php echo ($selfurl3); echo ($vo["id"]); ?>" title="<?php echo ($selftitle3); ?>"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/<?php echo ($selfimg3); ?>" style="width:20px;height:20px;" alt="<?php echo ($selftitle3); ?>" /></a><?php endif; ?>
                  <?php if($okreturn): ?><a href="###" onclick="equipreturn(<?php echo ($vo["id"]); ?>)" title="同意"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/ok.png" alt="同意" /></a><?php endif; ?>
				  <?php if($loanreturn): ?><a href="###" onclick="loanreturn(<?php echo ($vo["id"]); ?>)" title="归还"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/return.png" style="width:20px;height:20px;" alt="归还" /></a><?php endif; ?>
				  
				  <?php if($add): ?><a href="###" onclick="showaddstu(<?php echo ($vo["id"]); ?>)" title="添加"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/add.png" style="width:20px;height:20px;" alt="添加" /></a><?php endif; ?>
				  <?php if($lookgrade): ?><a title="成绩"  onclick="showmygrade(<?php echo ($beginid); ?>,<?php echo ($vo["id"]); ?>)" href="###"><img alt="成绩" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/look.png"/></a><?php endif; ?>
				  <?php if($addgrade): ?><a title="给实验报告打成绩"  onclick="grade(<?php echo ($vo["id"]); ?>)" href="###"><img alt="给实验报告打成绩" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/pencil_48.png"/></a><?php endif; ?>
				  
				  
                  <?php if($okok): ?><a href="###" onclick="showagree(<?php echo ($vo["id"]); ?>,<?php echo ($type); ?>)" title="同意"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/ok.png" alt="同意" /></a><?php endif; ?>
				  <?php if($okdel): ?><a href="###" title="删除"  onclick="showdelete(<?php echo ($vo["id"]); ?>)">
                   <img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/cross.png" alt="Delete" />
                   </a><?php endif; ?>
				<?php if($okedit): ?><a title="编辑" href="__URL__/<?php echo ($edit); ?>?aa=showedit&id=<?php echo ($vo["id"]); ?>"><img alt="编辑" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/hammer_screwdriver.png"/></a><?php endif; ?>
				<?php if($oklook): ?><a title="预览"  onclick="showlook(<?php echo ($vo["id"]); ?>,'<?php echo ($table); ?>')" href="###"><img alt="预览" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/look.png"/></a><?php endif; ?>
                 
                 <?php if($okdwon): ?><a title="下载"  href="###" onclick="download(<?php echo ($vo["id"]); ?>,'<?php echo ($downtype); ?>')"><img alt="下载" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/dl.png"/></a><?php endif; ?>
				 </td>
				 <?php if($notify_report): echo (find_report($vo["id"],$beginid)); endif; ?>
				 <?php if($notify_report_teacher): echo (find_report_teacher($vo["id"],$beginid)); endif; ?>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
        
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>