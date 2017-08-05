<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 14:42:43
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\my_recom_shop.html" */ ?>
<?php /*%%SmartyHeaderCode:17271597596e3488043-21070354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3ce903365ccc5260175c4c1d34cd0d348bb02ed' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\my_recom_shop.html',
      1 => 1494221962,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17271597596e3488043-21070354',
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
  'unifunc' => 'content_597596e43c55d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597596e43c55d')) {function content_597596e43c55d($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

	<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			background:#fff;
		}
		.near_shop{
			margin-top:0;
		}
		.star li {
		    margin-right: 0.25rem;
		}
		/*-营业额-*/
		.turnover{
		    position: absolute;
		    bottom: 0;
		    right: 0;
		    font-size: 0.6rem;
			color: #F93B23;
		}
		#load_wrapper{
			height:calc(100% - 2.7rem);
			height:-webkit-calc(100% - 2.7rem);
			top:2.7rem;
		}
		.total_none{
			width:100%;
			font-size:0.8rem;
			line-height:3rem;
			color:#999;
			text-align:center;
		}
	</style>

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
	
	<!--头部--> 
	<div class="header">
	    <div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
	    <h1>我推荐的店铺</h1>
	</div>
	<div id="load_wrapper">
		<div id="scroller" style="<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
			<div id="pullDown" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>>
			    <span class="pullDownIcon"></span>
			</div>
			<div class="near_shop">
				<div class="near_list_wrap">
					<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
					<a class="near_list clearfix native_go">
						<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['sign_pic'];?>
" class="pic fl"/>
						<div class="near_info fr">
							<div class="info_head">
								<h6 class="near_name"><?php echo $_smarty_tpl->tpl_vars['this']->value['business_name'];?>
</h6>
							</div>
							<p class="near_address"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</p>
							<ul class="star fl">
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<!--<li class="fl icon_pic1 icon_star_blank3x"></li>-->
							</ul>
							<!--营业额-->
							<p class="turnover">日营业额：<?php echo $_smarty_tpl->tpl_vars['this']->value['turnover'];?>
元</p>
						</div>
					</a>
					<?php } ?>
					<!--<a class="near_list clearfix native_go">
						<img src="/Public/Images/testImg/test1.jpg" class="pic fl"/>
						<div class="near_info fr">
							<div class="info_head">
								<h6 class="near_name">润东五金店润东五金店</h6>
							</div>
							<p class="near_address">杭州市江干区新元金沙城5栋1单元</p>
							<ul class="star fl">
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_blank3x"></li>
							</ul>
							&lt;!&ndash;营业额&ndash;&gt;
							<p class="turnover">营业额：13.5万元</p>
						</div>
					</a>-->
				</div>
			</div>
			<div id="pullUp">
			    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
			</div>
		</div>
		<p class="total_none" style="<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>display:none;<?php }else{ ?>display:block;<?php }?>">暂无推荐的店铺</p>
	</div>

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
	
<script>
	var firstRow='<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
';
	firstRow = Number(firstRow);
	var total='<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
';
	total = Number(total);
</script>

	<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/my_recom_shop_list.js"></script>
	<script type="text/javascript">
		$("#current_page_arrow").on("click",function(){
			history.go(-1);
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
	
	<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			background:#fff;
		}
		.near_shop{
			margin-top:0;
		}
		.star li {
		    margin-right: 0.25rem;
		}
		/*-营业额-*/
		.turnover{
		    position: absolute;
		    bottom: 0;
		    right: 0;
		    font-size: 0.6rem;
			color: #F93B23;
		}
		#load_wrapper{
			height:calc(100% - 2.7rem);
			height:-webkit-calc(100% - 2.7rem);
			top:2.7rem;
		}
		.total_none{
			width:100%;
			font-size:0.8rem;
			line-height:3rem;
			color:#999;
			text-align:center;
		}
	</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<!--头部--> 
	<div class="header">
	    <div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
	    <h1>我推荐的店铺</h1>
	</div>
	<div id="load_wrapper">
		<div id="scroller" style="<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
			<div id="pullDown" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>>
			    <span class="pullDownIcon"></span>
			</div>
			<div class="near_shop">
				<div class="near_list_wrap">
					<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
					<a class="near_list clearfix native_go">
						<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['sign_pic'];?>
" class="pic fl"/>
						<div class="near_info fr">
							<div class="info_head">
								<h6 class="near_name"><?php echo $_smarty_tpl->tpl_vars['this']->value['business_name'];?>
</h6>
							</div>
							<p class="near_address"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</p>
							<ul class="star fl">
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<!--<li class="fl icon_pic1 icon_star_blank3x"></li>-->
							</ul>
							<!--营业额-->
							<p class="turnover">日营业额：<?php echo $_smarty_tpl->tpl_vars['this']->value['turnover'];?>
元</p>
						</div>
					</a>
					<?php } ?>
					<!--<a class="near_list clearfix native_go">
						<img src="/Public/Images/testImg/test1.jpg" class="pic fl"/>
						<div class="near_info fr">
							<div class="info_head">
								<h6 class="near_name">润东五金店润东五金店</h6>
							</div>
							<p class="near_address">杭州市江干区新元金沙城5栋1单元</p>
							<ul class="star fl">
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_full3x"></li>
								<li class="fl icon_pic1 icon_star_blank3x"></li>
							</ul>
							&lt;!&ndash;营业额&ndash;&gt;
							<p class="turnover">营业额：13.5万元</p>
						</div>
					</a>-->
				</div>
			</div>
			<div id="pullUp">
			    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
			</div>
		</div>
		<p class="total_none" style="<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>display:none;<?php }else{ ?>display:block;<?php }?>">暂无推荐的店铺</p>
	</div>

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
	
<script>
	var firstRow='<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
';
	firstRow = Number(firstRow);
	var total='<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
';
	total = Number(total);
</script>

	<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/my_recom_shop_list.js"></script>
	<script type="text/javascript">
		$("#current_page_arrow").on("click",function(){
			history.go(-1);
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