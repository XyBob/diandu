<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 16:44:06
         compiled from "C:\wamp\www\diandu\Tpl\FrontMerchant\take_out_index.html" */ ?>
<?php /*%%SmartyHeaderCode:7228595d8db63d80e9-82711806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b90bea48fa46a575b3e909423980d45c39901b75' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontMerchant\\take_out_index.html',
      1 => 1500885636,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7228595d8db63d80e9-82711806',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595d8db708c6d',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595d8db708c6d')) {function content_595d8db708c6d($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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
<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/home_index.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/market/take_out.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style type="text/css">
	body{
		background:#fff;
		padding-top:2.2rem;
	}
	.index_header{
		position:static;
	}
	.fix_head{
		position:fixed;
		top:0;
		left:0;
		z-index:9;
		display:none;
	}
	#load_wrapper{
		top:0;
		height:calc(100% - 2.4rem);
		height:-webkit-calc(100% -2.4rem);
	}
	#scroller{
		padding-bottom:2.4rem;
	}
	.index_header .head_mid{
		width:74%;
	}
	.head_left .locate_name{
		max-width:3.5rem;
		text-overflow:ellipsis;
		white-space:nowrap;
	}
	/*-头部搜索框-*/
	.address-outer .head_mid{
		height:1.4rem;
		position:relative;
		width:93%;
	}
	.address-outer .search_words{
		color:#fff;
		opacity:1 !important;
		font-size:0.75rem;
		height:1.4rem;
		background:none !important;
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
	#current_page_arrow{
		height:100%;
		display:flex;
		align-items:center;
		
	}
	.head_mid .search-input{
		width:90%;
	}
	.address-outer{
		position:absolute;
	}
	/*--顶部返回按钮--*/
	.current_page_arrow{
		width:2rem;
		height:2.2rem;
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
	
<div class="index_header fix_head">
	<div class="left_header native_back current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
	<a href="javascript:;" class="head_left">
		<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['name'];?>
</span>
		<i class="icon_pic1 icon_locate3x"></i>
	</a>
	<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 80%"<?php }?>>
		<span class="search_words">黄焖鸡米饭</span>
		<i class="icon_pic1 icon_search3x"></i>
	</a>
	<!--<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>-->
	<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" style="display:none"></a>
</div>
<div id="load_wrapper">
<div id="scroller">
<div class="index_header scroll_head">
		<div class="left_header native_back current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<a href="javascript:;" class="head_left">
			<span class="locate_name"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['name'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 80%"<?php }?>>
			<span class="search_words">搜索商家、店铺</span>
			<i class="icon_pic1 icon_search3x"></i>
		</a>
		<!--<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>-->
		<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" style="display:none"></a>
</div>
<!--外卖商家列表-->
<div class="take_out_wrap">
	<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['take_out_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
	<a href="javascript:;" onclick="go_take_out_index('<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
')" class="take_out_list">
		<div class="shop-info clearfix">
			<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/" class="fl shop-img"/>
			<div class="info fr">
				<h6 class="shop-name"><?php echo $_smarty_tpl->tpl_vars['this']->value['business_name'];?>
</h6>
				<div class="info-mid clearfix">
					<ul class="star fl">
						<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['this']->value['star'], null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['this']->value['star']-->0){?>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<?php }?>
						<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
						<li class="fl icon_pic1 icon_star_blank3x"></li>
						<?php }?>
					</ul>
					<span class="delivery-time fr">约<?php echo $_smarty_tpl->tpl_vars['this']->value['delivery_time'];?>
分钟送达</span>
				</div>
				<div class="info-bot clearfix">
					<div class="right fl">
						<span class="send-price">起送 ¥<?php echo $_smarty_tpl->tpl_vars['this']->value['start_delivery_fee'];?>
&nbsp;|&nbsp;</span>
						<span class="person-price">人均 ¥<?php echo $_smarty_tpl->tpl_vars['this']->value['consumption'];?>
</span>
					</div>
					<div class="left fr">
						<span class="distance fr"><?php if ($_smarty_tpl->tpl_vars['this']->value['distance']/1000<100){?><<?php }else{ ?>><?php }?>&nbsp;<?php echo sprintf("%.1f",$_smarty_tpl->tpl_vars['this']->value['distance']/1000);?>
Km</span>
						<p class="address fr"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</p>
					</div>
				</div>
			</div>
		</div>
		<!--优惠信息-->
		<div class="favor_wrap">
			<ul class="favor">
				<?php if ($_smarty_tpl->tpl_vars['this']->value['discount_minus_list']){?>
				<li>
					<i class="icon_pic1 icon_pay3x"></i>
					<p class="favor_words"><?php  $_smarty_tpl->tpl_vars['this1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this1']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['this']->value['discount_minus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this1']->key => $_smarty_tpl->tpl_vars['this1']->value){
$_smarty_tpl->tpl_vars['this1']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this1']->key;
?><?php if ('key'>0){?>,<?php }?>满<?php echo $_smarty_tpl->tpl_vars['this1']->value['amount_limit'];?>
减<?php echo $_smarty_tpl->tpl_vars['this1']->value['num'];?>
元<?php } ?></p>
				</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['this']->value['voucher']){?>
				<li>
					<i class="icon_pic1 icon_ticket3x"></i>
					<p class="favor_words">领券立减<?php echo $_smarty_tpl->tpl_vars['this']->value['voucher']['num'];?>
元</p>
				</li>
				<?php }?>
			</ul>
		</div>
	</a>
	<?php } ?>
</div>
<div id="pullUp">
    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
</div>
</div>
</div>
<!--选择地址弹层-->
<div class="address-outer" id="address-outer">
	<div class="address-inner" id="address-inner">
		<div class="index_header">
			<div class="left_header" id="current_page_arrow">
		        <div class="icon_add_person icon_left_white"></div>
		    </div>
			<div class="head_mid">
				<input class="search_words search-input" id="key_words" placeholder="搜索地址" value="<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
">
				<i class="icon_pic1 icon_search3x"></i>
				<input type="button" class="search_btn"/>
			</div>
		</div>
		<!--当前地址-->
		<div class="now-address">
			<p class="now-address-cont"   longitude="<?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['point']['x'];?>
" latitude="<?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['point']['y'];?>
"  ><?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['name'];?>
</p>
		</div>
		<!--收货地址-->
		<?php if ($_smarty_tpl->tpl_vars['user_address_list']->value){?>
		<div class="shop-address-wrap user_address">
			<h6>收货地址</h6>
			<ul class="shop-address">
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
				<li class="shop-address-list set_address" longitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['longitude'];?>
" latitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['latitude'];?>
" user_address_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
					<div class="list-head">
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['this']->value['realname'];?>
</span>
						<span class="tel"><?php echo $_smarty_tpl->tpl_vars['this']->value['mobile'];?>
</span>
					</div>
					<p class="list-bot"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</p>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php }?>
		<!--附近地址-->
		<div class="near-address-wrap">
			<h6>附近地址</h6>
			<ul class="near-address">
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['near_building']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value!=0){?>
				<li class="near-address-list set_address" longitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['point']['x'];?>
" latitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['point']['y'];?>
"><?php echo $_smarty_tpl->tpl_vars['this']->value['name'];?>
</li>
				<?php }?>
				<?php } ?>
			</ul>
		</div>
	</div>
	
	<!--搜索结果地址-->
<!--	<div class="search-address-wrap">
		<ul class="search-address">
			<li class="search-address-list">乐富海邦园乐富海邦园</li>
			<li class="search-address-list">乐富海邦园乐富海邦园</li>
		</ul>
</div>-->
</div>
<!--底部导航栏-->
<ul class="foot_nav">
	<li>
		<a href="/Index/home_index" class="native_go">
			<i class="icon_pic1 icon_home3x icon_home_s3x"></i>
			<span class="nav_name">首页</span>
		</a>
	</li>
	<li id="take_out" class="active">
		<a href="/FrontMerchant/take_out_index" class="native_go">
			<i class="img_new_add_small icon_waimai icon_waimai_s active"></i>
			<span class="nav_name">外 卖</span>
		</a>
	</li>
	<li>
		<a href="/FrontUserCenter/my_order" class="native_go">
			<i class="icon_pic1 Shape3x icon_order_s3x"></i>
			<span class="nav_name">订单</span>
		</a>
	</li>
	<li>
		<a href="/FrontUserCenter/person_center" class="native_go">
			<i class="icon_pic1 icon_mine3x icon_mine_s3x"></i>
			<span class="nav_name">我的</span>
		</a>
	</li>
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
	
<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/take_out_list.js"></script>
<script type="text/javascript">
	var total=parseInt('<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
');
	var firstRow=parseInt('<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
');
	var local_latitude='<?php echo $_smarty_tpl->tpl_vars['local_latitude']->value;?>
';
	var local_longitude='<?php echo $_smarty_tpl->tpl_vars['local_longitude']->value;?>
';

	
</script>

<script type="text/javascript">
	function go_take_out_index(id){
		console.log(1111);
		var url = '/FrontMerchant/take_out_shop/business_id/'+id;
		if(!is_wechat()){
			var _json = JSON.stringify({
	            event: "to_jump",
	            params: {"url":url}
	        });
	        if(is_ios()){
				window.webkit.messageHandlers.webviewEvent.postMessage(_json);
			}else{
				window.ResultAndroid.webviewEvent(_json);
			}

		}else{
			location.href = url;
		}
	}
	//底部导航栏
	$(".foot_nav li").on("click",function(){
		$(this).siblings().removeClass("active").find("i").removeClass("active");
		$(this).addClass("active").find("i").addClass("active");
		if($(this).attr('id')!='take_out'){
			$("#take_out").find('i').removeClass('icon_waimai_s');
		}
	})
	//顶部返回按钮
	if(!is_wechat()){
		$(".scroll_head").css("paddingLeft","2rem");
		$(".fix_head").css("paddingLeft","2rem");
	}else{
		$(".current_page_arrow").hide();
	}
	$(".current_page_arrow").on("click",function(){
		history.go(-1);
	});
	var addScroll = new iScroll('address-outer');
	
	$(".head_left").on("click",function(){
		$(".address-outer").show();
		setTimeout(function(){
			addScroll.refresh();
		},200);
	})
	$("#current_page_arrow").on("click",function(){
		$(".address-outer").hide();
	});
	//选地址
	//当前定位地址
	$(".now-address-cont").on("click",function(){
		var html = $(this).html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		var lon = $(this).attr('longitude');
		var lat = $(this).attr('latitude');
		var user_address_id = 0;
		set_lon_and_lat(lon,lat,user_address_id);
	});
	//收货地址
	$(".shop-address-wrap").on("click",".shop-address-list",function(){
		var html = $(this).find(".list-bot").html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		console.log("收货地址=="+html);
		var lan = $(this).attr('longitude');
		var lat = $(this).attr('latitude');
		var user_address_id = $(this).attr('user_address_id');
		set_lon_and_lat(lan,lat,user_address_id);
	});
	//附近地址
	$(".near-address-wrap").on("click",".near-address-list",function(){
		var html = $(this).html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		console.log("附近地址=="+html);
		var lon = $(this).attr('longitude');
		var lat = $(this).attr('latitude');
		var user_address_id = 0;
		set_lon_and_lat(lon,lat,user_address_id);
	});
	//搜索结果地址
	$(".search-address-wrap").on("click",".search-address-list",function(){
		var html = $(this).html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		console.log("搜索结果地址=="+html);
	});

	function set_lon_and_lat(lon,lat,user_address_id){
		local_latitude=lat;
		local_longitude=lon;
		$.ajax({
			url:'/FrontMerchant/set_take_out_lan_and_lat',
			dataType:'json',
			type:'post',
			data:{longitude:lon,latitude:lat,user_address_id:user_address_id},
			success:function(data){
				num=1;
				total=parseInt(data.total);
				console.log(data);
				if(data.code==1){
					data=data.data;
						var len = parseInt(data.length);
						var html = '';
						for (var i = 0; i < len; i++) {
							var sign=(data[i].distance/1000)>100?'>':'<';
							var discount_html='';
							var voucher_html='';
							if(data[i].discount_minus_list){
								discount_html='<li><i class="icon_pic1 icon_pay3x"></i><p class="favor_words">';
								for(var l=0;l<data[i].discount_minus_list.length;l++){
									if(l>0){
										discount_html+=',';
									}
									discount_html+='满'+data[i].discount_minus_list[l].amount_limit+'减'+data[i].discount_minus_list[i].num+'元';

								}

							}
							discount_html+='</p></li>';
							if(data[i].voucher){
								voucher_html='<li><i class="icon_pic1 icon_ticket3x"></i><p class="favor_words">';
								voucher_html+='领券立减'+data[i].voucher.num+'元';
							}
							voucher_html+='</p></li>';
							html +='<a href="/FrontMerchant/take_out_shop/business_id/'+data[i].business_id+'" class="take_out_list">'+
									'<div class="shop-info clearfix">'+
									'<img src="'+data[i].sign_pic+'" class="fl shop-img"/>'+
									'<div class="info fr">'+
									'<h6 class="shop-name">'+data[i].business_name+'</h6>'+
									'<div class="info-mid clearfix">'+
									'<ul class="star fl">';
							for(var j=0;j<data[i].star;j++)
							{
								html+='<li class="fl icon_pic1 icon_star_full3x"></li>'
							}
							for(var k=0;k<(5-data[i].star);k++){
								html+='<li class="fl icon_pic1 icon_star_blank3x"></li>'
							}
							html+='</ul>'+
									'<span class="delivery-time fr">约'+data[i].delivery_time+'分钟送达</span>'+
									'</div>'+
									'<div class="info-bot clearfix">'+
									'<div class="right fl">'+
									'<span class="send-price">起送 ¥'+data[i].start_delivery_fee+'&nbsp;|&nbsp;</span>'+
									'<span class="person-price">人均 ¥'+data[i].consumption+'</span>'+
									'</div>'+
									'<div class="left fr">'+
									'<span class="distance fr">'+sign+'&nbsp;'+(data[i].distance/1000).toFixed(1)+'Km</span>'+
									'<p class="address fr">'+data[i].address+'</p>'+
									'</div>'+
									'</div>'+
									'</div>'+
									'</div>'+
									'<div class="favor_wrap">'+
									'<ul class="favor">'+discount_html+voucher_html+
									'</ul>'+
									'</div>'+
									'</a>';
						}
						$('.take_out_wrap').html(html);
					}
			}
		});
	}
	//右侧地址搜索按钮
	$(".search_btn").on("click",function(){
		var html=$('#key_words').val();
		$.ajax({
			url:'/FrontMerchant/get_building_by_key_words',
			dataType:'json',
			type:'post',
			data:{key_words:html},
			success:function(data) {
				console.log(data);
				if(data){
					var len=parseInt(data.length);
					$('.user_address').hide();
					var html='';
					for(var i=0;i<len;i++){
					html+='<li class="near-address-list set_address" longitude="'+data[i].point.lng+'" latitude="'+data[i].point.lat+'">'+data[i].name+'</li>'
					}
					console.log(html);
					$('.near-address').html(html);
					setTimeout(function(){
						addScroll.refresh();
					},200);
				}
			}
		});
	});
	//回车键搜索地址
	$(".search-input").on("keypress",function(e){
		var html=$('#key_words').val();
		var keyCode = e.keyCode;
		if(keyCode=="13"){
			$.ajax({
				url:'/FrontMerchant/get_building_by_key_words',
				dataType:'json',
				type:'post',
				data:{key_words:html},
				success:function(data) {
					if(data){
						var len=parseInt(data.length);
						$('.user_address').hide();
						var html='';
						for(var i=0;i<len;i++){
						html+='<li class="near-address-list set_address" longitude="'+data[i].point.lng+'" latitude="'+data[i].point.lat+'">'+data[i].name+'</li>'
						}
						console.log(html);
						$('.near-address').html(html);
						setTimeout(function(){
							addScroll.refresh();
						},200);
					}
				}
			});
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
<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/home_index.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/market/take_out.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style type="text/css">
	body{
		background:#fff;
		padding-top:2.2rem;
	}
	.index_header{
		position:static;
	}
	.fix_head{
		position:fixed;
		top:0;
		left:0;
		z-index:9;
		display:none;
	}
	#load_wrapper{
		top:0;
		height:calc(100% - 2.4rem);
		height:-webkit-calc(100% -2.4rem);
	}
	#scroller{
		padding-bottom:2.4rem;
	}
	.index_header .head_mid{
		width:74%;
	}
	.head_left .locate_name{
		max-width:3.5rem;
		text-overflow:ellipsis;
		white-space:nowrap;
	}
	/*-头部搜索框-*/
	.address-outer .head_mid{
		height:1.4rem;
		position:relative;
		width:93%;
	}
	.address-outer .search_words{
		color:#fff;
		opacity:1 !important;
		font-size:0.75rem;
		height:1.4rem;
		background:none !important;
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
	#current_page_arrow{
		height:100%;
		display:flex;
		align-items:center;
		
	}
	.head_mid .search-input{
		width:90%;
	}
	.address-outer{
		position:absolute;
	}
	/*--顶部返回按钮--*/
	.current_page_arrow{
		width:2rem;
		height:2.2rem;
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

	
<div class="index_header fix_head">
	<div class="left_header native_back current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
	<a href="javascript:;" class="head_left">
		<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['name'];?>
</span>
		<i class="icon_pic1 icon_locate3x"></i>
	</a>
	<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 80%"<?php }?>>
		<span class="search_words">黄焖鸡米饭</span>
		<i class="icon_pic1 icon_search3x"></i>
	</a>
	<!--<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>-->
	<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" style="display:none"></a>
</div>
<div id="load_wrapper">
<div id="scroller">
<div class="index_header scroll_head">
		<div class="left_header native_back current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<a href="javascript:;" class="head_left">
			<span class="locate_name"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['name'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 80%"<?php }?>>
			<span class="search_words">搜索商家、店铺</span>
			<i class="icon_pic1 icon_search3x"></i>
		</a>
		<!--<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>-->
		<a href="javascript:;" class="saoma icon_pic1 icon_scan3x" style="display:none"></a>
</div>
<!--外卖商家列表-->
<div class="take_out_wrap">
	<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['take_out_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
	<a href="javascript:;" onclick="go_take_out_index('<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
')" class="take_out_list">
		<div class="shop-info clearfix">
			<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/" class="fl shop-img"/>
			<div class="info fr">
				<h6 class="shop-name"><?php echo $_smarty_tpl->tpl_vars['this']->value['business_name'];?>
</h6>
				<div class="info-mid clearfix">
					<ul class="star fl">
						<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['this']->value['star'], null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['this']->value['star']-->0){?>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<?php }?>
						<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
						<li class="fl icon_pic1 icon_star_blank3x"></li>
						<?php }?>
					</ul>
					<span class="delivery-time fr">约<?php echo $_smarty_tpl->tpl_vars['this']->value['delivery_time'];?>
分钟送达</span>
				</div>
				<div class="info-bot clearfix">
					<div class="right fl">
						<span class="send-price">起送 ¥<?php echo $_smarty_tpl->tpl_vars['this']->value['start_delivery_fee'];?>
&nbsp;|&nbsp;</span>
						<span class="person-price">人均 ¥<?php echo $_smarty_tpl->tpl_vars['this']->value['consumption'];?>
</span>
					</div>
					<div class="left fr">
						<span class="distance fr"><?php if ($_smarty_tpl->tpl_vars['this']->value['distance']/1000<100){?><<?php }else{ ?>><?php }?>&nbsp;<?php echo sprintf("%.1f",$_smarty_tpl->tpl_vars['this']->value['distance']/1000);?>
Km</span>
						<p class="address fr"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</p>
					</div>
				</div>
			</div>
		</div>
		<!--优惠信息-->
		<div class="favor_wrap">
			<ul class="favor">
				<?php if ($_smarty_tpl->tpl_vars['this']->value['discount_minus_list']){?>
				<li>
					<i class="icon_pic1 icon_pay3x"></i>
					<p class="favor_words"><?php  $_smarty_tpl->tpl_vars['this1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this1']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['this']->value['discount_minus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this1']->key => $_smarty_tpl->tpl_vars['this1']->value){
$_smarty_tpl->tpl_vars['this1']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this1']->key;
?><?php if ('key'>0){?>,<?php }?>满<?php echo $_smarty_tpl->tpl_vars['this1']->value['amount_limit'];?>
减<?php echo $_smarty_tpl->tpl_vars['this1']->value['num'];?>
元<?php } ?></p>
				</li>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['this']->value['voucher']){?>
				<li>
					<i class="icon_pic1 icon_ticket3x"></i>
					<p class="favor_words">领券立减<?php echo $_smarty_tpl->tpl_vars['this']->value['voucher']['num'];?>
元</p>
				</li>
				<?php }?>
			</ul>
		</div>
	</a>
	<?php } ?>
</div>
<div id="pullUp">
    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
</div>
</div>
</div>
<!--选择地址弹层-->
<div class="address-outer" id="address-outer">
	<div class="address-inner" id="address-inner">
		<div class="index_header">
			<div class="left_header" id="current_page_arrow">
		        <div class="icon_add_person icon_left_white"></div>
		    </div>
			<div class="head_mid">
				<input class="search_words search-input" id="key_words" placeholder="搜索地址" value="<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
">
				<i class="icon_pic1 icon_search3x"></i>
				<input type="button" class="search_btn"/>
			</div>
		</div>
		<!--当前地址-->
		<div class="now-address">
			<p class="now-address-cont"   longitude="<?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['point']['x'];?>
" latitude="<?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['point']['y'];?>
"  ><?php echo $_smarty_tpl->tpl_vars['near_building']->value[0]['name'];?>
</p>
		</div>
		<!--收货地址-->
		<?php if ($_smarty_tpl->tpl_vars['user_address_list']->value){?>
		<div class="shop-address-wrap user_address">
			<h6>收货地址</h6>
			<ul class="shop-address">
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
				<li class="shop-address-list set_address" longitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['longitude'];?>
" latitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['latitude'];?>
" user_address_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
					<div class="list-head">
						<span class="name"><?php echo $_smarty_tpl->tpl_vars['this']->value['realname'];?>
</span>
						<span class="tel"><?php echo $_smarty_tpl->tpl_vars['this']->value['mobile'];?>
</span>
					</div>
					<p class="list-bot"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</p>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php }?>
		<!--附近地址-->
		<div class="near-address-wrap">
			<h6>附近地址</h6>
			<ul class="near-address">
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['near_building']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value!=0){?>
				<li class="near-address-list set_address" longitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['point']['x'];?>
" latitude="<?php echo $_smarty_tpl->tpl_vars['this']->value['point']['y'];?>
"><?php echo $_smarty_tpl->tpl_vars['this']->value['name'];?>
</li>
				<?php }?>
				<?php } ?>
			</ul>
		</div>
	</div>
	
	<!--搜索结果地址-->
<!--	<div class="search-address-wrap">
		<ul class="search-address">
			<li class="search-address-list">乐富海邦园乐富海邦园</li>
			<li class="search-address-list">乐富海邦园乐富海邦园</li>
		</ul>
</div>-->
</div>
<!--底部导航栏-->
<ul class="foot_nav">
	<li>
		<a href="/Index/home_index" class="native_go">
			<i class="icon_pic1 icon_home3x icon_home_s3x"></i>
			<span class="nav_name">首页</span>
		</a>
	</li>
	<li id="take_out" class="active">
		<a href="/FrontMerchant/take_out_index" class="native_go">
			<i class="img_new_add_small icon_waimai icon_waimai_s active"></i>
			<span class="nav_name">外 卖</span>
		</a>
	</li>
	<li>
		<a href="/FrontUserCenter/my_order" class="native_go">
			<i class="icon_pic1 Shape3x icon_order_s3x"></i>
			<span class="nav_name">订单</span>
		</a>
	</li>
	<li>
		<a href="/FrontUserCenter/person_center" class="native_go">
			<i class="icon_pic1 icon_mine3x icon_mine_s3x"></i>
			<span class="nav_name">我的</span>
		</a>
	</li>
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
	
<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/take_out_list.js"></script>
<script type="text/javascript">
	var total=parseInt('<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
');
	var firstRow=parseInt('<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
');
	var local_latitude='<?php echo $_smarty_tpl->tpl_vars['local_latitude']->value;?>
';
	var local_longitude='<?php echo $_smarty_tpl->tpl_vars['local_longitude']->value;?>
';

	
</script>

<script type="text/javascript">
	function go_take_out_index(id){
		console.log(1111);
		var url = '/FrontMerchant/take_out_shop/business_id/'+id;
		if(!is_wechat()){
			var _json = JSON.stringify({
	            event: "to_jump",
	            params: {"url":url}
	        });
	        if(is_ios()){
				window.webkit.messageHandlers.webviewEvent.postMessage(_json);
			}else{
				window.ResultAndroid.webviewEvent(_json);
			}

		}else{
			location.href = url;
		}
	}
	//底部导航栏
	$(".foot_nav li").on("click",function(){
		$(this).siblings().removeClass("active").find("i").removeClass("active");
		$(this).addClass("active").find("i").addClass("active");
		if($(this).attr('id')!='take_out'){
			$("#take_out").find('i').removeClass('icon_waimai_s');
		}
	})
	//顶部返回按钮
	if(!is_wechat()){
		$(".scroll_head").css("paddingLeft","2rem");
		$(".fix_head").css("paddingLeft","2rem");
	}else{
		$(".current_page_arrow").hide();
	}
	$(".current_page_arrow").on("click",function(){
		history.go(-1);
	});
	var addScroll = new iScroll('address-outer');
	
	$(".head_left").on("click",function(){
		$(".address-outer").show();
		setTimeout(function(){
			addScroll.refresh();
		},200);
	})
	$("#current_page_arrow").on("click",function(){
		$(".address-outer").hide();
	});
	//选地址
	//当前定位地址
	$(".now-address-cont").on("click",function(){
		var html = $(this).html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		var lon = $(this).attr('longitude');
		var lat = $(this).attr('latitude');
		var user_address_id = 0;
		set_lon_and_lat(lon,lat,user_address_id);
	});
	//收货地址
	$(".shop-address-wrap").on("click",".shop-address-list",function(){
		var html = $(this).find(".list-bot").html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		console.log("收货地址=="+html);
		var lan = $(this).attr('longitude');
		var lat = $(this).attr('latitude');
		var user_address_id = $(this).attr('user_address_id');
		set_lon_and_lat(lan,lat,user_address_id);
	});
	//附近地址
	$(".near-address-wrap").on("click",".near-address-list",function(){
		var html = $(this).html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		console.log("附近地址=="+html);
		var lon = $(this).attr('longitude');
		var lat = $(this).attr('latitude');
		var user_address_id = 0;
		set_lon_and_lat(lon,lat,user_address_id);
	});
	//搜索结果地址
	$(".search-address-wrap").on("click",".search-address-list",function(){
		var html = $(this).html();
		$(".locate_name").html(html);
		$(".address-outer").hide();
		console.log("搜索结果地址=="+html);
	});

	function set_lon_and_lat(lon,lat,user_address_id){
		local_latitude=lat;
		local_longitude=lon;
		$.ajax({
			url:'/FrontMerchant/set_take_out_lan_and_lat',
			dataType:'json',
			type:'post',
			data:{longitude:lon,latitude:lat,user_address_id:user_address_id},
			success:function(data){
				num=1;
				total=parseInt(data.total);
				console.log(data);
				if(data.code==1){
					data=data.data;
						var len = parseInt(data.length);
						var html = '';
						for (var i = 0; i < len; i++) {
							var sign=(data[i].distance/1000)>100?'>':'<';
							var discount_html='';
							var voucher_html='';
							if(data[i].discount_minus_list){
								discount_html='<li><i class="icon_pic1 icon_pay3x"></i><p class="favor_words">';
								for(var l=0;l<data[i].discount_minus_list.length;l++){
									if(l>0){
										discount_html+=',';
									}
									discount_html+='满'+data[i].discount_minus_list[l].amount_limit+'减'+data[i].discount_minus_list[i].num+'元';

								}

							}
							discount_html+='</p></li>';
							if(data[i].voucher){
								voucher_html='<li><i class="icon_pic1 icon_ticket3x"></i><p class="favor_words">';
								voucher_html+='领券立减'+data[i].voucher.num+'元';
							}
							voucher_html+='</p></li>';
							html +='<a href="/FrontMerchant/take_out_shop/business_id/'+data[i].business_id+'" class="take_out_list">'+
									'<div class="shop-info clearfix">'+
									'<img src="'+data[i].sign_pic+'" class="fl shop-img"/>'+
									'<div class="info fr">'+
									'<h6 class="shop-name">'+data[i].business_name+'</h6>'+
									'<div class="info-mid clearfix">'+
									'<ul class="star fl">';
							for(var j=0;j<data[i].star;j++)
							{
								html+='<li class="fl icon_pic1 icon_star_full3x"></li>'
							}
							for(var k=0;k<(5-data[i].star);k++){
								html+='<li class="fl icon_pic1 icon_star_blank3x"></li>'
							}
							html+='</ul>'+
									'<span class="delivery-time fr">约'+data[i].delivery_time+'分钟送达</span>'+
									'</div>'+
									'<div class="info-bot clearfix">'+
									'<div class="right fl">'+
									'<span class="send-price">起送 ¥'+data[i].start_delivery_fee+'&nbsp;|&nbsp;</span>'+
									'<span class="person-price">人均 ¥'+data[i].consumption+'</span>'+
									'</div>'+
									'<div class="left fr">'+
									'<span class="distance fr">'+sign+'&nbsp;'+(data[i].distance/1000).toFixed(1)+'Km</span>'+
									'<p class="address fr">'+data[i].address+'</p>'+
									'</div>'+
									'</div>'+
									'</div>'+
									'</div>'+
									'<div class="favor_wrap">'+
									'<ul class="favor">'+discount_html+voucher_html+
									'</ul>'+
									'</div>'+
									'</a>';
						}
						$('.take_out_wrap').html(html);
					}
			}
		});
	}
	//右侧地址搜索按钮
	$(".search_btn").on("click",function(){
		var html=$('#key_words').val();
		$.ajax({
			url:'/FrontMerchant/get_building_by_key_words',
			dataType:'json',
			type:'post',
			data:{key_words:html},
			success:function(data) {
				console.log(data);
				if(data){
					var len=parseInt(data.length);
					$('.user_address').hide();
					var html='';
					for(var i=0;i<len;i++){
					html+='<li class="near-address-list set_address" longitude="'+data[i].point.lng+'" latitude="'+data[i].point.lat+'">'+data[i].name+'</li>'
					}
					console.log(html);
					$('.near-address').html(html);
					setTimeout(function(){
						addScroll.refresh();
					},200);
				}
			}
		});
	});
	//回车键搜索地址
	$(".search-input").on("keypress",function(e){
		var html=$('#key_words').val();
		var keyCode = e.keyCode;
		if(keyCode=="13"){
			$.ajax({
				url:'/FrontMerchant/get_building_by_key_words',
				dataType:'json',
				type:'post',
				data:{key_words:html},
				success:function(data) {
					if(data){
						var len=parseInt(data.length);
						$('.user_address').hide();
						var html='';
						for(var i=0;i<len;i++){
						html+='<li class="near-address-list set_address" longitude="'+data[i].point.lng+'" latitude="'+data[i].point.lat+'">'+data[i].name+'</li>'
						}
						console.log(html);
						$('.near-address').html(html);
						setTimeout(function(){
							addScroll.refresh();
						},200);
					}
				}
			});
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