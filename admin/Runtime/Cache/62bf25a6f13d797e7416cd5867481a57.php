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
<link href="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/skins/black.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (PUBLICPATH); ?>/artDialog4.1.6/plugins/iframeTools.source.js"></script>
<script type="text/javascript">
	//显示审核的列表
	function showagree(id)
	{
		art.dialog.open('__APP__/Order/showagree?id='+id, {
		    title: '审核',
		    init: function () {
		       
		    },
		    width: '420px', height: 'auto',lock: true,opacity: 0.87,
		    ok: function () {
		    	var iframe = this.iframe.contentWindow;
		    	if (!iframe.document.body) {
		        	alert('iframe还没加载完毕呢')
		        	return false;
		        };
		        var form = iframe.document.getElementById('agreeform');

		        form.submit();//提交页面
		        return false;
		    	
		    },
		    cancel: true
		});
	
	}
	//显示是否删除的窗口
	function showdelete()
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
		    	    url: 'test3',
		    	    success: function (data) {
		    	    	art.dialog.open('success', {title: '提示信息'});
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
                 <?php if(is_array($list)): foreach($list as $key=>$vo): ?><th><?php echo ($vo["name"]); ?></th><?php endforeach; endif; ?>
				<th>操作</th>
              </tr>
            </thead>
          <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    
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
                <?php if(is_array($vo)): foreach($vo as $key=>$item): ?><td><?php echo ($item); ?></td><?php endforeach; endif; ?>
                <td>
                  <!-- Icons -->
                  <?php if($okok): ?><a href="###" onclick="showagree(<?php echo ($vo["id"]); ?>)" title="同意"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/ok.png" alt="Edit" /></a><?php endif; ?>
				  <?php if($okdel): ?><a href="###" title="删除"  onclick="showdelete(<?php echo ($vo["id"]); ?>)">
                   <img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/cross.png" alt="Delete" />
                   </a><?php endif; ?>
				<?php if($okedit): ?><a title="编辑" href="__URL__/<?php echo ($edit); ?>?aa=showedit&id=<?php echo ($vo["id"]); ?>"><img alt="Edit Meta" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/hammer_screwdriver.png"/></a><?php endif; ?>
				<?php if($oklook): ?><a title="预览"  onclick="showlook(<?php echo ($vo["id"]); ?>,'<?php echo ($table); ?>')" href="###"><img alt="Edit Meta" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/look.png"/></a><?php endif; ?>
				 </td>
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