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


<script>
$(function(){
	$("#classno").change(function(){
		
		var classno=$("#classno").val();
		window.location.href="__APP__/Class/showaddstu?id=<?php echo ($classid); ?>&classno="+classno;
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
            <form action="###"  id="addform"  method="post">
          <input type="hidden" id="classid" name="classid" value="<?php echo ($classid); ?>"/>
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox" />
                </th>
                 <?php if(is_array($list)): foreach($list as $key=>$vo): ?><th><?php echo ($vo["name"]); ?></th><?php endforeach; endif; ?>
				<th>操作</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div >
                    <?php echo ($select); echo ($otherform); ?>
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
                  <input type="checkbox"  name="idcheck[]"  value="<?php echo ($vo["id"]); ?>"/>
                </td>
                <?php if(is_array($vo)): foreach($vo as $key=>$item): ?><td><?php echo (msubstr($item,0,15,'utf-8',false)); ?></td><!-- 截取字符串 --><?php endforeach; endif; ?>
                <td>
                  <!-- Icons -->
                  <?php if($selfbutton1): ?><a  href="<?php echo ($selfurl1); echo ($vo["id"]); ?>" title="<?php echo ($selftitle1); ?>"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/<?php echo ($selfimg1); ?>" style="width:20px;height:20px;" alt="<?php echo ($selftitle1); ?>" /></a><?php endif; ?>
				  <?php if($selfbutton2): ?><a  href="<?php echo ($selfurl2); echo ($vo["id"]); ?>" title="<?php echo ($selftitle2); ?>"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/<?php echo ($selfimg2); ?>" style="width:20px;height:20px;" alt="<?php echo ($selftitle2); ?>" /></a><?php endif; ?>
				  <?php if($selfbutton3): ?><a  href="<?php echo ($selfurl3); echo ($vo["id"]); ?>" title="<?php echo ($selftitle3); ?>"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/<?php echo ($selfimg3); ?>" style="width:20px;height:20px;" alt="<?php echo ($selftitle3); ?>" /></a><?php endif; ?>
                  <?php if($okuser): ?><a href="###" onclick="equipreturn(<?php echo ($vo["id"]); ?>)" title="同意"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/ok.png" alt="同意" /></a><?php endif; ?>
				  <?php if($loanreturn): ?><a href="###" onclick="loanreturn(<?php echo ($vo["id"]); ?>)" title="归还"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/return.png" style="width:20px;height:20px;" alt="归还" /></a><?php endif; ?>
				  
				  <?php if($add): ?><a href="###" onclick="showaddstu(<?php echo ($vo["id"]); ?>)" title="添加"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/add.png" style="width:20px;height:20px;" alt="添加" /></a><?php endif; ?>
				  
                  <?php if($ok1): ?><a href="###" onclick="showagree(<?php echo ($vo["id"]); ?>,<?php echo ($type); ?>)" title="同意"><img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/ok.png" alt="同意" /></a><?php endif; ?>
				  <?php if($ok2): ?><a href="###" title="删除"  onclick="showdelete(<?php echo ($vo["id"]); ?>)">
                   <img src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/cross.png" alt="Delete" />
                   </a><?php endif; ?>
				<?php if($ok3): ?><a title="编辑" href="__URL__/<?php echo ($edit); ?>?aa=showedit&id=<?php echo ($vo["id"]); ?>"><img alt="编辑" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/hammer_screwdriver.png"/></a><?php endif; ?>
				<?php if($ok4): ?><a title="预览"  onclick="showlook(<?php echo ($vo["id"]); ?>,'<?php echo ($table); ?>')" href="###"><img alt="预览" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/look.png"/></a><?php endif; ?>
                 <?php if($ok5): ?><a title="成绩"  onclick="grade(<?php echo ($vo["id"]); ?>)" href="###"><img alt="成绩" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/linkedin.png"/></a><?php endif; ?>
                 <?php if($ok6): ?><a title="下载"  href="###" onclick="download(<?php echo ($vo["id"]); ?>)"><img alt="下载" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/dl.png"/></a><?php endif; ?>
                 <?php if($ok7): ?><a title="同意"  href="###" onclick="agreeone(<?php echo ($vo["id"]); ?>)"><img alt="同意" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/agree.png"/></a>
                 	 <a title="不同意"  href="###" onclick="noagreeone(<?php echo ($vo["id"]); ?>)"><img alt="不同意" style="width:20px;height:20px;" src="<?php echo (APP_TMPL_PATH); ?>/Index/resources/images/icons/no.png"/></a><?php endif; ?>
				 </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             
            </tbody>
          </table>
          </form>
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