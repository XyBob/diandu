<?php /* Smarty version Smarty-3.1.6, created on 2017-07-13 20:51:49
         compiled from "C:\wamp\www\diandu\Tpl\Index\search_shop.html" */ ?>
<?php /*%%SmartyHeaderCode:669259676ce5e220e0-13859027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '412df16e7e28d7bfbec24d0244bd33960fc437ca' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\Index\\search_shop.html',
      1 => 1497921062,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '669259676ce5e220e0-13859027',
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
  'unifunc' => 'content_59676ce67897d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59676ce67897d')) {function content_59676ce67897d($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/shop_type_list.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			background:#fff;
		}
		/*-头部搜索框-*/
		.index_header .head_mid{
			height:1.4rem;
			width:100%;
			position:relative;
		}
		.head_mid .search_words{
			color:#fff;
			opacity:1 !important;
			font-size:0.75rem;
			height:1.4rem;
		}
		.search_words::-webkit-input-placeholder{
			color:#fff;
			opacity:0.5;
		}
		.search_btn{
			display:block;
			width:2.1rem;
			height:100%;
			position:absolute;
			top:0;
			right:0;
			background:none !important;
		}
		/*-搜索结果列表-*/
		.recom_cont{
			background:#fff;
		}
		.recom_cont .recom_list{
			border-top:0;
			border-bottom: 1px solid #F1F4F7;
		}
		.recom_store{
			margin-top:0;
		}
		/*-上拉-*/
		#load_wrapper{
			top:2.2rem;
			height:calc(100% - 2.2rem);
			height:-webkit-calc(100% - 2.2rem);
			height:-moz-calc(100% - 2.2rem);
		}
		/*-没有搜索结果-*/
		.search_none{
			width:100%;
			text-align:center;
			/*line-height:10rem;*/
			background:#fff;
			color:#666;
			font-size:0.9rem;
			position:absolute;
			top:2.2rem;
			left:0;
		}
		.search_none .no_results{
			width:5.5rem;
			height:4.95rem;
			background: url(/Public/Images/front/front_img/blank_01_03@3x.png) no-repeat;
			background-size:100% 100%;
			margin:3.75rem auto 0.85rem;
		}
		.search_form{
			width:100%;
			display:flex;
			align-items:center;
			justify-content:space-between;
		}
		.default_content{
			padding:2.2rem 0 0 0.75rem;
		}
		.default_content .label_name{
			height:2.2rem;
			line-height:2.2rem;
			font-size: 0.7rem;
			color: #999999;
			border-bottom: 1px solid #E1E1E1;
			margin-right:0.75rem;
		}
		.default_content .content_list{
			display: flex;
			flex-direction: row;
			justify-content: flex-start;
			flex-wrap:wrap;
			padding-top:1rem;
		}
		.default_content .content_list .list_name{
			padding:0.3rem 0.4rem;
			font-size: 0.65rem;
			color: #3D9FE9;
			border: 1px solid #3D9FE9;
			border-radius: 0.3rem;
			margin-right:0.5rem;
			margin-bottom:0.75rem;
			max-width:100%;
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
			box-sizing: border-box;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:2rem;
			height:100%;
			position:absolute;
			left:0;
			top:0;
			display:flex;
			display:-webkit-flex;
			align-items:center;
			-webkit-align-items:center;
			justify-content:center;
			-webkit-justify-content:center;
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
	<div class="index_header">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<a href="javascript:;" class="head_left" style="display:none;">
			<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<div class="head_mid">
			<input class="search_words" name="key_words" placeholder="搜索商家、店铺" value="<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
">
			<i class="icon_pic1 icon_search3x"></i>
			<input type="button" class="search_btn"/>
		</div>
	</div>
	<!--搜索结果列表-->
	<!--todo 未输入状态  默认展示 店都二期-->
<?php if (!$_smarty_tpl->tpl_vars['ok']->value){?>
	<div class="default_content">
		<div class="label_name">热门搜索</div>
		<div class="content_list">
			<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_search_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
			<div class="list_name key_words" ><?php echo $_smarty_tpl->tpl_vars['this']->value['hot_search_words'];?>
</div>
			<?php } ?>
		</div>
	</div>
<?php }?>

	<!--有结果-->
	<div id="load_wrapper" <?php if (!$_smarty_tpl->tpl_vars['business_list']->value){?>style="display: none"<?php }?>>
		<div id="scroller">
			<div class="recom_store">
				<div class="recom_cont">
					<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
					<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="recom_list native_go">
						<div class="shop_info clearfix">
							<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
" class="pic fl"/>
							<div class="info fl">
								<h6 class="shop_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>
								<div class="info_mid clearfix">
									<ul class="star fl">
										<?php $_smarty_tpl->tpl_vars['star_surplus'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
										<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
										<li class="fl icon_pic1 icon_star_full3x"></li>
										<?php }?>
										<?php while ($_smarty_tpl->tpl_vars['star_surplus']->value-->0){?>
										<li class="fl icon_pic1 icon_star_blank3x"></li>
										<?php }?>
									</ul>
									<!--todo 店都一期-->
									<p class="distance fr"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</p>
								</div>
								<!--todo 店都一期第三行展示-->
								<ul class="tag">
									<li><?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>
</li>
								</ul>
							</div>
						</div>
					</a>

					<!--无结果-->

					<?php } ?>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>
			<div id="pullUp">
			    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载...</span>
			</div>
			<?php }?>
		</div>
	</div>
<?php if (!$_smarty_tpl->tpl_vars['business_list']->value&&$_smarty_tpl->tpl_vars['ok']->value){?>
<div class="search_none" style="">
	<div class="no_results"></div>
	<span>换个关键词试试吧</span>
</div>
<?php }?>


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
        var firstRow=<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
;
        var total=<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
;
        var key_words='<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
';
	</script>

	<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
 	<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/search_shop_list.js"></script>
	<script type="text/javascript">
		//顶部返回按钮
		if(!is_wechat()){
			$(".index_header").css("paddingLeft","2rem");
		}else{
			$("#current_page_arrow").hide();
		}
		$("#current_page_arrow").on("click",function(){
			history.go(-1);
		});
		$('.content_list').on("click",".key_words",function(){
			var key_words=$(this).text();
			console.log("key_words=="+key_words);
			var url='/Index/search_shop/key_words/'+key_words;
			location.href=url;
		});
		$('.search_btn').on('click',function(){
			var key_words = $(".search_words").val();
			var url='/Index/search_shop/key_words/'+key_words;
			location.href=url;
		});
		$(".search_words").on("keypress",function(e){
			var keyCode = e.keyCode;
			console.log(keyCode);
			if(keyCode=="13"){
				var key_words = $(".search_words").val();
				var url='/Index/search_shop/key_words/'+key_words;
				location.href=url;
			}
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
	
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/shop_type_list.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			background:#fff;
		}
		/*-头部搜索框-*/
		.index_header .head_mid{
			height:1.4rem;
			width:100%;
			position:relative;
		}
		.head_mid .search_words{
			color:#fff;
			opacity:1 !important;
			font-size:0.75rem;
			height:1.4rem;
		}
		.search_words::-webkit-input-placeholder{
			color:#fff;
			opacity:0.5;
		}
		.search_btn{
			display:block;
			width:2.1rem;
			height:100%;
			position:absolute;
			top:0;
			right:0;
			background:none !important;
		}
		/*-搜索结果列表-*/
		.recom_cont{
			background:#fff;
		}
		.recom_cont .recom_list{
			border-top:0;
			border-bottom: 1px solid #F1F4F7;
		}
		.recom_store{
			margin-top:0;
		}
		/*-上拉-*/
		#load_wrapper{
			top:2.2rem;
			height:calc(100% - 2.2rem);
			height:-webkit-calc(100% - 2.2rem);
			height:-moz-calc(100% - 2.2rem);
		}
		/*-没有搜索结果-*/
		.search_none{
			width:100%;
			text-align:center;
			/*line-height:10rem;*/
			background:#fff;
			color:#666;
			font-size:0.9rem;
			position:absolute;
			top:2.2rem;
			left:0;
		}
		.search_none .no_results{
			width:5.5rem;
			height:4.95rem;
			background: url(/Public/Images/front/front_img/blank_01_03@3x.png) no-repeat;
			background-size:100% 100%;
			margin:3.75rem auto 0.85rem;
		}
		.search_form{
			width:100%;
			display:flex;
			align-items:center;
			justify-content:space-between;
		}
		.default_content{
			padding:2.2rem 0 0 0.75rem;
		}
		.default_content .label_name{
			height:2.2rem;
			line-height:2.2rem;
			font-size: 0.7rem;
			color: #999999;
			border-bottom: 1px solid #E1E1E1;
			margin-right:0.75rem;
		}
		.default_content .content_list{
			display: flex;
			flex-direction: row;
			justify-content: flex-start;
			flex-wrap:wrap;
			padding-top:1rem;
		}
		.default_content .content_list .list_name{
			padding:0.3rem 0.4rem;
			font-size: 0.65rem;
			color: #3D9FE9;
			border: 1px solid #3D9FE9;
			border-radius: 0.3rem;
			margin-right:0.5rem;
			margin-bottom:0.75rem;
			max-width:100%;
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
			box-sizing: border-box;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:2rem;
			height:100%;
			position:absolute;
			left:0;
			top:0;
			display:flex;
			display:-webkit-flex;
			align-items:center;
			-webkit-align-items:center;
			justify-content:center;
			-webkit-justify-content:center;
		}
	</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<!--头部-->
	<div class="index_header">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<a href="javascript:;" class="head_left" style="display:none;">
			<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<div class="head_mid">
			<input class="search_words" name="key_words" placeholder="搜索商家、店铺" value="<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
">
			<i class="icon_pic1 icon_search3x"></i>
			<input type="button" class="search_btn"/>
		</div>
	</div>
	<!--搜索结果列表-->
	<!--todo 未输入状态  默认展示 店都二期-->
<?php if (!$_smarty_tpl->tpl_vars['ok']->value){?>
	<div class="default_content">
		<div class="label_name">热门搜索</div>
		<div class="content_list">
			<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_search_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
			<div class="list_name key_words" ><?php echo $_smarty_tpl->tpl_vars['this']->value['hot_search_words'];?>
</div>
			<?php } ?>
		</div>
	</div>
<?php }?>

	<!--有结果-->
	<div id="load_wrapper" <?php if (!$_smarty_tpl->tpl_vars['business_list']->value){?>style="display: none"<?php }?>>
		<div id="scroller">
			<div class="recom_store">
				<div class="recom_cont">
					<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
					<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="recom_list native_go">
						<div class="shop_info clearfix">
							<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
" class="pic fl"/>
							<div class="info fl">
								<h6 class="shop_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>
								<div class="info_mid clearfix">
									<ul class="star fl">
										<?php $_smarty_tpl->tpl_vars['star_surplus'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
										<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
										<li class="fl icon_pic1 icon_star_full3x"></li>
										<?php }?>
										<?php while ($_smarty_tpl->tpl_vars['star_surplus']->value-->0){?>
										<li class="fl icon_pic1 icon_star_blank3x"></li>
										<?php }?>
									</ul>
									<!--todo 店都一期-->
									<p class="distance fr"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</p>
								</div>
								<!--todo 店都一期第三行展示-->
								<ul class="tag">
									<li><?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>
</li>
								</ul>
							</div>
						</div>
					</a>

					<!--无结果-->

					<?php } ?>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>
			<div id="pullUp">
			    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载...</span>
			</div>
			<?php }?>
		</div>
	</div>
<?php if (!$_smarty_tpl->tpl_vars['business_list']->value&&$_smarty_tpl->tpl_vars['ok']->value){?>
<div class="search_none" style="">
	<div class="no_results"></div>
	<span>换个关键词试试吧</span>
</div>
<?php }?>


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
        var firstRow=<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
;
        var total=<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
;
        var key_words='<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
';
	</script>

	<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
 	<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/search_shop_list.js"></script>
	<script type="text/javascript">
		//顶部返回按钮
		if(!is_wechat()){
			$(".index_header").css("paddingLeft","2rem");
		}else{
			$("#current_page_arrow").hide();
		}
		$("#current_page_arrow").on("click",function(){
			history.go(-1);
		});
		$('.content_list').on("click",".key_words",function(){
			var key_words=$(this).text();
			console.log("key_words=="+key_words);
			var url='/Index/search_shop/key_words/'+key_words;
			location.href=url;
		});
		$('.search_btn').on('click',function(){
			var key_words = $(".search_words").val();
			var url='/Index/search_shop/key_words/'+key_words;
			location.href=url;
		});
		$(".search_words").on("keypress",function(e){
			var keyCode = e.keyCode;
			console.log(keyCode);
			if(keyCode=="13"){
				var key_words = $(".search_words").val();
				var url='/Index/search_shop/key_words/'+key_words;
				location.href=url;
			}
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