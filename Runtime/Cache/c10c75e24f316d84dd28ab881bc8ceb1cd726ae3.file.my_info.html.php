<?php /* Smarty version Smarty-3.1.6, created on 2017-07-31 13:22:34
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\my_info.html" */ ?>
<?php /*%%SmartyHeaderCode:20544597ebe9a665ce1-05830293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c10c75e24f316d84dd28ab881bc8ceb1cd726ae3' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\my_info.html',
      1 => 1497684431,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20544597ebe9a665ce1-05830293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pc_site' => 0,
    'version' => 0,
    'user_id' => 0,
    'wx_share_link' => 0,
    'share_info' => 0,
    'signPackage' => 0,
    'tpl_path' => 0,
    'has_deflt_addr' => 0,
    'default_addr_string' => 0,
    'first' => 0,
    'client_ip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_597ebe9abda90',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597ebe9abda90')) {function content_597ebe9abda90($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
<!-- CSS -->
<link rel="stylesheet" href="__PUBLIC__/Css/front/style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/colors.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/skeleton.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/layout.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/ddsmoothmenu.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/elastislide.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/home_flexslider.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/light_box.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Plugins/jPops/jquery.jpops.min-v3.css">


<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/my_info.css?version={$version}"/>
<style></style>


<!-- 失败默认图片 -->
<script>
  function no_pic(obj) {
    obj.setAttribute("src", "/Public/Images/front/nopicture.png");
}
</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!-- <div class="container"> -->
	<?php if (@ACTION_NAME=='index'){?>
	<?php echo $_smarty_tpl->getSubTemplate ("top_ads.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
	<?php }?>
	<?php if (@ACTION_NAME!='login'){?>
	<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
	<?php }?>
	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>我的信息</h1>
    <div class="header_right" id="del_info"><span>清空信息</span></div>
</div>
<!--todo 信息列表-->
<ul class="list_content">
    <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['this']->value['message_type']==1){?>
    <li class="list message" id="<?php echo $_smarty_tpl->tpl_vars['this']->value['message_id'];?>
">
        <h2><?php echo $_smarty_tpl->tpl_vars['this']->value['message_title'];?>
</h2>
        <p class="describe"><?php echo $_smarty_tpl->tpl_vars['this']->value['describe'];?>
</p>
        <p class="text-right"><?php echo date('Y-m-d  H:i:s',$_smarty_tpl->tpl_vars['this']->value['addtime']);?>
</p>
    </li>
    <?php }elseif($_smarty_tpl->tpl_vars['this']->value['message_type']==3){?>
    <li class="list message order_info" id="<?php echo $_smarty_tpl->tpl_vars['this']->value['message_id'];?>
">
        <h2><?php echo $_smarty_tpl->tpl_vars['this']->value['message_title'];?>
</h2>
        <p class="describe"><?php echo $_smarty_tpl->tpl_vars['this']->value['describe'];?>
</p>
        <p class="text-right"><?php echo date('Y-m-d  H:i:s',$_smarty_tpl->tpl_vars['this']->value['addtime']);?>
</p>
    </li>
    <?php }elseif($_smarty_tpl->tpl_vars['this']->value['message_type']==2){?>
    <li class="list add_message order_info">
        <h2 class="label_tips"><span class="">新增订单</span><span class="times"><?php echo date('Y-m-d  H:i:s',$_smarty_tpl->tpl_vars['this']->value['addtime']);?>
</span></h2>
        <p class="describe add">您有一份新增订单</p>
        <div class="control"><div class="prompt_btn order" order_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['order_id'];?>
">立即处理</div></div>
    </li>
    <?php }?>
    <?php } ?>
   <!-- <li class="list add_message">
        <h2 class="label_tips"><span class="">新增订单</span><span class="times">2017-05-17  18:20:33</span></h2>
        <p class="describe add">通知信息的具体内容，提现结果通知，商家站内信等。</p>
        <div class="control"><div class="prompt_btn" onclick="location.href='/Index/my_order_detail'">立即处理</div></div>
    </li>-->
</ul>

	<!-- </div> -->
	<?php if (@ACTION_NAME!='login'){?>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
	<?php echo $_smarty_tpl->getSubTemplate ("customer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	<script>
		var user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		//分享信息
		var link = '<?php echo $_smarty_tpl->tpl_vars['wx_share_link']->value;?>
';
		var img = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['pic'];?>
';
		var title = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['head_title'];?>
';
		var desc = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['desc'];?>
';
		var appId = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';
		var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
		var nonceStr = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';
		var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';
	</script>
	<!--JS-->
	<script src="__PUBLIC__/Js/front/jquery-1.8.2.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/common.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.easing.1.3.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/ddsmoothmenu.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.flexslider.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.elastislide.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.jcarousel.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.accordion.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/light_box.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Plugins/jPops/jquery.jpops.min-v3.js"></script>
	<script src="__PUBLIC__/Js/front/html5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>
	<!--end js-->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	

<script type="text/javascript">
    /*todo 头部返回控制*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
    $('.message').on('click',function(){
        var id=$(this).attr('id');
        var url='/FrontUserCenter/message_detail/message_id/'+id;
        location.href=url;
    });
    $('.order').on('click',function(){
        var order_id=$(this).attr('order_id');
        var url='/FrontOrder/my_order_detail/order_id/'+order_id;
        location.href=url;
    });
    /*todo 清除信息*/
    $('#del_info').on('click',function(){
        $.ajax({
            url:'/FrontUserCenter/clear_message',
            data:'',
            type:'post',
            dataType:'json',
            success:function(){
            console.log();
            }
        });
        $('.order_info').remove();
    });
</script>


</body>
</html>
 
<?php }else{ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="format-detection" content="email=no" />
	<meta name="apple-mobile-web-app-title" content="盈软微分销" />
	<?php if (@ACTION_NAME=='cart'){?>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">  
	<?php }?>
	<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
	<link href="__PUBLIC__/Css/front/common.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<!--雪碧图-->
	<link href="__PUBLIC__/Css/front/front_css/sprites_img.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<link href="__PUBLIC__/Css/front/front_css/sprites_img_person.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">

	<link href="<?php echo $_smarty_tpl->tpl_vars['tpl_path']->value;?>
/css/header_footer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<link href="__PUBLIC__/Css/front/layer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<!--<script src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
	<script src="__JS__/front/jquery-1.12.1.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/my_info.css?version={$version}"/>
<style></style>


</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>我的信息</h1>
    <div class="header_right" id="del_info"><span>清空信息</span></div>
</div>
<!--todo 信息列表-->
<ul class="list_content">
    <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['this']->value['message_type']==1){?>
    <li class="list message" id="<?php echo $_smarty_tpl->tpl_vars['this']->value['message_id'];?>
">
        <h2><?php echo $_smarty_tpl->tpl_vars['this']->value['message_title'];?>
</h2>
        <p class="describe"><?php echo $_smarty_tpl->tpl_vars['this']->value['describe'];?>
</p>
        <p class="text-right"><?php echo date('Y-m-d  H:i:s',$_smarty_tpl->tpl_vars['this']->value['addtime']);?>
</p>
    </li>
    <?php }elseif($_smarty_tpl->tpl_vars['this']->value['message_type']==3){?>
    <li class="list message order_info" id="<?php echo $_smarty_tpl->tpl_vars['this']->value['message_id'];?>
">
        <h2><?php echo $_smarty_tpl->tpl_vars['this']->value['message_title'];?>
</h2>
        <p class="describe"><?php echo $_smarty_tpl->tpl_vars['this']->value['describe'];?>
</p>
        <p class="text-right"><?php echo date('Y-m-d  H:i:s',$_smarty_tpl->tpl_vars['this']->value['addtime']);?>
</p>
    </li>
    <?php }elseif($_smarty_tpl->tpl_vars['this']->value['message_type']==2){?>
    <li class="list add_message order_info">
        <h2 class="label_tips"><span class="">新增订单</span><span class="times"><?php echo date('Y-m-d  H:i:s',$_smarty_tpl->tpl_vars['this']->value['addtime']);?>
</span></h2>
        <p class="describe add">您有一份新增订单</p>
        <div class="control"><div class="prompt_btn order" order_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['order_id'];?>
">立即处理</div></div>
    </li>
    <?php }?>
    <?php } ?>
   <!-- <li class="list add_message">
        <h2 class="label_tips"><span class="">新增订单</span><span class="times">2017-05-17  18:20:33</span></h2>
        <p class="describe add">通知信息的具体内容，提现结果通知，商家站内信等。</p>
        <div class="control"><div class="prompt_btn" onclick="location.href='/Index/my_order_detail'">立即处理</div></div>
    </li>-->
</ul>

	<?php if (@ACTION_NAME=='mall_home'||@ACTION_NAME=='all_order'||@ACTION_NAME=='pre_pay_order'||@ACTION_NAME=='pre_deliver_order'||@ACTION_NAME=='pre_confirm_order'||@ACTION_NAME=='wallet'||@ACTION_NAME=='personal_center'||@ACTION_NAME=='mall_list'||@ACTION_NAME=='item_list'){?>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	<!--提示层-->
  <div id="tan_wrap"><div id="tan"></div></div>
	<!--todo 提示信息的弹框-->
	<div class="modal_alert">
		<div class="modal_content">
			<div class="icon_add_person icon_shanchutishi"></div>
			<p class="text"></p>
			<div class="tips_text">我知道了</div>
		</div>
	</div>
	<script>
		$('.modal_alert').on('click',function(){
			$(this).hide();
			$('body').css('overflow','scroll');
		});
		function show_alert(text){
			$('.modal_alert').show();
			$('.modal_alert .text').html(text);
			$('body').css('overflow','hidden');
		}
	var has_deflt_addr = "<?php echo $_smarty_tpl->tpl_vars['has_deflt_addr']->value;?>
";
	var default_addr = "<?php echo $_smarty_tpl->tpl_vars['default_addr_string']->value;?>
";
	var first = "<?php echo $_smarty_tpl->tpl_vars['first']->value;?>
";	
    function no_pic(obj) {
        obj.setAttribute("src", "/Public/Images/front/front_img/logo3x.png");
    }
    $('img').attr('onerror', 'no_pic(this)');
	</script>
	<script src="__JS__/front/custom.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/front/layer.m.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PLG__/native/native_event.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/clipboard.min.js"></script>
	<script>
	//获取后台数据
	ip = "<?php echo $_smarty_tpl->tpl_vars['client_ip']->value;?>
";
	az_id = 1;
	user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
	</script>
	<script>
		var user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		//分享信息
		var link = '<?php echo $_smarty_tpl->tpl_vars['wx_share_link']->value;?>
';
		var img = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['pic'];?>
';
		var title = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['head_title'];?>
';
		var desc = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['desc'];?>
';
		var appId = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';
		var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
		var nonceStr = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';
		var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';
//alert('title = ' + title + ', desc = ' + desc + ', link = ' + link + ', img = ' + img);
		function no_pic(obj) {
        obj.setAttribute("src", "/Public/Images/front/front_img/logo3x.png");
    }
    $('img').attr('onerror', 'no_pic(this)');
	</script>
	<?php if (@ACTION_NAME!='mall_home'&&@ACTION_NAME!='item_list'&&@ACTION_NAME!='item_detail'){?>
	<script type="text/javascript">
		//用户是否登录
		$(function(){
			if(user_id == null || user_id == 0 || user_id == '' || user_id == '0'){
				//console.log('没登录');
				native_listen('no_login');
			}
		})
	</script>
	<script src="__PUBLIC__/Js/hybird.js"></script>
	<?php }?>
	<!--JS-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>

    <!-- <script src="/stat.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script> -->
	

<script type="text/javascript">
    /*todo 头部返回控制*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
    $('.message').on('click',function(){
        var id=$(this).attr('id');
        var url='/FrontUserCenter/message_detail/message_id/'+id;
        location.href=url;
    });
    $('.order').on('click',function(){
        var order_id=$(this).attr('order_id');
        var url='/FrontOrder/my_order_detail/order_id/'+order_id;
        location.href=url;
    });
    /*todo 清除信息*/
    $('#del_info').on('click',function(){
        $.ajax({
            url:'/FrontUserCenter/clear_message',
            data:'',
            type:'post',
            dataType:'json',
            success:function(){
            console.log();
            }
        });
        $('.order_info').remove();
    });
</script>


	<?php if (@ACTION_NAME=='mall_home'){?>
		<script type="text/javascript">
		     $('#slider_cont').flexslider({
		          animation: "fade",
		          direction: "horizontal",
		          easing: "swing",
		      });
		</script>
	<?php }?>
</body>
</html>
<?php }?>
<?php }} ?>