<?php /* Smarty version Smarty-3.1.6, created on 2017-07-03 12:55:09
         compiled from "C:\wamp\www\diandu\frame\Tpl\comm_dispatch_jump.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60815959ce2d132e17-50341093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ea60f22b197c9977e728be3daffadd4c3bbf156' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\frame\\Tpl\\comm_dispatch_jump.tpl',
      1 => 1492479521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60815959ce2d132e17-50341093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'error' => 0,
    'waitSecond' => 0,
    'jumpUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5959ce2d200b7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5959ce2d200b7')) {function content_5959ce2d200b7($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>跳转提示</title>
<style type="text/css">

*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; background: url(/Public/Images/acp/dis_jump1.jpg); }
.clearfix{*zoom:1;}
.clearfix:after{display: block;content: " ";height:0;visibility:hidden;clear: both;}
.fl{float: left;}
.fr{float: right;}
.msgbox{ width: 652px;  height: 293px; margin: 0 auto; margin-top: 100px; padding-top: 107px; background: url(/Public/Images/acp/dis_jump2.png) no-repeat;}
.msgbox-info{width:533px; height: 246px; margin-left: 58px; position: relative;}
.emo{ display: block; width: 61px; height: 61px; position: absolute; top: 55px; left: 99px;}
.success,.error{width:350px; height: 61px;line-height: 1.2em; font-size: 22px;position: absolute; top: 70px; left: 167px;}
.msg-jump{ width: 248px; height: 26px; line-height: 26px; overflow: hidden;position: absolute; top: 138px; left: 175px;}
.msg-jump-le{ float: left; width: 178px; height: 26px; line-height: 26px; color: #3d3f41; text-align: center; font-size: 14px;}
.msg-jump-le b{ color: #ff5400;}
.msg-jump-ri{ float: left; width: 70px; height: 26px; overflow: hidden; text-align: center;}
.msg-jump-ri a{ color: #fff; text-decoration: none; font-size: 14px;}

</style>
</head>
<body>
	<div class="msgbox">
		<div class="msgbox-info clearfix">
			<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
				<span class="emo fl"><img src="/Public/Images/acp/dis_jump4.png"></span>
				<span class="success fl"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
			<?php }else{ ?>
				<span class="emo fl"><img src="/Public/Images/acp/dis_jump3.png"></span>
				<span class="error fl"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
			<?php }?>
			<div class="msg-jump">
				<div class="msg-jump-le">页面将在<b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b>秒后自动跳转</div>
				<div class="msg-jump-ri"><a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">我知道了</a></div>
			</div>
		</div>
		
	</div>

	<!--<div class="system-message" style="display:none;">
		<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
		<h1>:)</h1>
		<p class="success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
		<?php }else{ ?>
		<h1>:(</h1>
		<p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
		<?php }?>
		<p class="detail"></p>
		<p class="jump">
		页面自动 <a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">跳转</a> 等待时间： <b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b>
		</p>
	</div>-->

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>

</body>
</html>
<?php }} ?>