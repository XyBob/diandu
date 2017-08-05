<?php /* Smarty version Smarty-3.1.6, created on 2017-08-02 16:34:01
         compiled from "C:\wamp\www\diandu\Tpl\Index\home_index.html" */ ?>
<?php /*%%SmartyHeaderCode:308605959dae330bcb8-78998164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14371ae6dd3f96297f846e53d9caa94691bba6f0' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\Index\\home_index.html',
      1 => 1501662737,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308605959dae330bcb8-78998164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5959dae45778c',
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
<?php if ($_valid && !is_callable('content_5959dae45778c')) {function content_5959dae45778c($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/swiper.3.1.2.min.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/home_index.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			padding-bottom:2.45rem;
			/*padding-top:2.2rem;*/
		}
		.foot_nav{
			z-index:999;
		}
		/*-人气产品-*/
		.best_seller{
			padding-bottom:1rem;
		}
		.index_header{
			position:static;
		}
		#load_wrapper{
			height:calc(100% - 2.4rem);
			height:-webkit-calc(100% -2.4rem);
			background:#fff;
			box-sizing:border-box;
		}
		.fix_head{
			position:fixed;
			top:0;
			left:0;
			z-index:9;
			display:none;
		}
		.vegetable_market{
			width:100%;
			height:7.5rem;
			position:relative;
		}
		.img-responsive{
			width:100%;
			height:100%;
			display:block;
		}
		.pic_bottom{
			width:100%;
			position:absolute;
			bottom:0;
			padding-left:0.75rem;
			padding-bottom:0.25rem;
			background-image: linear-gradient(-180deg, rgba(0,0,0,0.00) 0%, rgba(0,0,0,0.70) 100%);
			box-sizing: border-box;
		}
		.pic_bottom .big_word{
			font-size: 0.9rem;
			color: #FFFFFF;
			text-overflow: ellipsis;
			overflow:hidden;
			white-space:nowrap;
			font-weight:bold;
		}
		.pic_bottom .small_word{
			font-size: 0.6rem;
			color: #FFFFFF;
			text-overflow: ellipsis;
			overflow:hidden;
			white-space:nowrap;
		}
		/*--菜市场距离--*/
		.vegetable_market .market_distance{
			background:rgba(0,0,0,0.6);
			height:2.5rem;
			display:flex;
			display:-webkit-flex;
			flex-direction:column;
			-webkit-flex-direction:column;
			justify-content:center;
			-webkit-justify-content:center;
			align-items:center;
			-webkit-align-items:center;
			position:absolute;
			top:0;
			right:0.75rem;
			color:#fff;
			min-width:2rem;
			padding:0 0.4rem;
		}
		.market_distance span{
			color:#fff;
			font-size:0.6rem;
		}
		.market_distance .word{
			margin-bottom:0.3rem;
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
	<a href="javascript:;" class="head_left">
		<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
		<i class="icon_pic1 icon_locate3x"></i>
	</a>
	<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 75%"<?php }?>>
		<span class="search_words">搜索商家、店铺</span>
		<i class="icon_pic1 icon_search3x"></i>
	</a>
	<a href="javascript:;"  onclick="do_qr()" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>
</div>
<div id="load_wrapper">
<div id="scroller">
	<!--头部-->
	<div class="index_header scroll_head">
		<a href="javascript:;" class="head_left">
			<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 75%"<?php }?>>
			<span class="search_words">搜索商家、店铺</span>
			<i class="icon_pic1 icon_search3x"></i>
		</a>
		<a href="javascript:;"  onclick="do_qr()" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>
	</div>
	<!--轮播图-->
	<div class="swiper-container banner_container">
        <div class="swiper-wrapper">
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cust_flash_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <div class="swiper-slide banner_slide">
            	<a href="javascript:;">
            		<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['pic'];?>
"/>
            	</a>
			</div>
			<?php } ?>
		</div>
		<div class="swiper-pagination banner-pagination"></div>
	</div>
	<!--店铺分类-->
	<div class="swiper-container store_container">
        <div class="swiper-wrapper">
			<?php  $_smarty_tpl->tpl_vars['store_type_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['store_type_list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_type_list_all']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['store_type_list']->key => $_smarty_tpl->tpl_vars['store_type_list']->value){
$_smarty_tpl->tpl_vars['store_type_list']->_loop = true;
?>
            <div class="swiper-slide store_slide">
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
            	<a href="/Index/shop_type_list?id=<?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_id'];?>
"  
            		class="store_link native_go">
            		<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['img_url'];?>
"/>
            		<span><?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>
</span>
            	</a>
				<?php } ?>
        	</div>
			<?php } ?>
    	</div>
    	<div class="swiper-pagination store-pagination"></div>
	</div>
	<!--todo 菜市场图片二期增加-->
	<div class="ve-market">
	<div class="vegetable_market"  <?php if (round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2)<=$_smarty_tpl->tpl_vars['vegetable_market']->value['range']){?>business_id = <?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['business_id'];?>
<?php }else{ ?>business_id=0<?php }?>>
		<img src="<?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['sign_pic'];?>
" class="img-responsive">
		<div class="pic_bottom">
			<p class="big_word"><?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['business_name'];?>
</p>
			<p class="small_word"><?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['address'];?>
</p>
		</div>
		
		<!--菜市场距离-->
		<?php if (round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2)<=$_smarty_tpl->tpl_vars['vegetable_market']->value['range']){?>
		<div class="market_distance">
			<span class="word">距离</span>
			<span><?php echo round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2);?>
Km</span>
		</div>
		<?php }?>
		<!--超出3公里信息提示-->
		<?php if (round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2)>$_smarty_tpl->tpl_vars['vegetable_market']->value['range']){?>
		<div class="market-notice show-address" >
			<i class="icon-warn"></i>
			<p>当前位置不在配送范围内，搜搜其他收货地址</p>
			<span></span>
		</div>
		<?php }?>
	</div>
	</div>
	<!--推荐店铺-->
	<div class="recom_store">
		<!--<div class="recom_title home_main_title">-->
			<!--<div class="title_cont">-->
				<!--<i class="icon_pic1 icon_splitline_left3x"></i>-->
				<!--<span class="title_words">推荐店铺</span>-->
				<!--<i class="icon_pic1 icon_splitline_right3x"></i>-->
			<!--</div>-->
			<!--<a href="/Index/shop_type_list" class="native_go more">查看更多</a>-->
		<!--</div>-->
		<div class="recom_cont">
			<!--<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="recom_list native_go">-->
				<!--<div class="store_info clearfix">-->
					<!--<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
" class="pic fl"/>-->
					<!--<div class="info fr">-->
						<!--<h6 class="store_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>-->
						<!--<div class="info_mid clearfix">-->
							<!--<ul class="star fl">-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
							<!--</ul>-->
							<!--<p class="distance fr"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</p>-->
						<!--</div>-->
						<!--<ul class="tag">-->
							<!--<li><?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>
</li>-->
						<!--</ul>-->
					<!--</div>-->
				<!--</div>-->
				<!--<p class="people_count">-->
					<!--<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>-->
					<!--<span>人去过</span>-->
				<!--</p>-->
				<!--优惠--二期做-->
			<!--
			<div class="favor_wrap">
				<ul class="favor">
					<li>
						<i class="icon_pic1 icon_pay3x"></i>
						<p class="favor_words">买单立享85折</p>
					</li>
					<li>
						<i class="icon_pic1 icon_ticket3x"></i>
						<p class="favor_words">领券立减8元</p>
					</li>
				</ul>
			</div>
			-->	
			</a>
		</div>
	</div>
	<!--人气产品-->
	<!--<div class="best_seller">
		<div class="seller_title home_main_title">
			<div class="title_cont">
				<i class="icon_pic1 icon_splitline_left3x"></i>
				<span class="title_words">人气产品</span>
				<i class="icon_pic1 icon_splitline_right3x"></i>
			</div>
			<p class="seller_title_info">此刻，你身边好几个小伙伴都买了这些产品。</p>
		</div>
		<ul class="seller_img_wrap clearfix">
			<li class="first_img fl">
				<a href="<?php echo $_smarty_tpl->tpl_vars['first_hot_goods']->value['link'];?>
" class="native_go">
					<img src="<?php echo $_smarty_tpl->tpl_vars['first_hot_goods']->value['pic'];?>
" alt="" />
					<div class="popular">
						<span class="pop_words">人气</span>
						<span class="pop_num">20</span>
					</div>
					<p class="seller_name"><?php echo $_smarty_tpl->tpl_vars['first_hot_goods']->value['title'];?>
</p>
				</a>
			</li>
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_goods_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<li class="fl">
				<a href="<?php echo $_smarty_tpl->tpl_vars['one']->value['link'];?>
" class="native_go">
					<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['pic'];?>
" alt="" />
					<p class="seller_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['title'];?>
</p>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>-->
	<!--附近店铺-->
	<div class="near_shop">
		<div class="recom_title home_main_title">
			<div class="title_cont ">
				<i class="icon_pic1 icon_splitline_left3x"></i>
				<span class="title_words">附近店铺</span>
				<i class="icon_pic1 icon_splitline_right3x"></i>
			</div>
			<a href="/Index/shop_type_list" class="native_go more">查看更多</a>
		</div>
		<div class="near_list_wrap">
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bussiness_local_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="near_list clearfix native_go">
				<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/" class="pic fl"/>
				<div class="near_info fr">
					<div class="info_head">
						<h6 class="near_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>
						<span class="near_distance"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</span>
					</div>
					<p class="near_address"><?php echo $_smarty_tpl->tpl_vars['one']->value['address'];?>
</p>
					<ul class="star fl">
						<?php $_smarty_tpl->tpl_vars['star_surplus'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<?php }?>
						<?php while ($_smarty_tpl->tpl_vars['star_surplus']->value-->0){?>
						<li class="fl icon_pic1 icon_star_blank3x"></li>
						<?php }?>
						<!--<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>-->
					</ul>
					<p class="people_count">
						<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>
						<span>人去过</span>
					</p>
				</div>
			</a>
			<?php } ?>
		</div>
	</div>
	<div id="pullUp">
	    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
	</div>
</div>
</div>
	<!--底部导航栏-->
	<ul class="foot_nav">
		<li class="active">
			<a href="/Index/home_index" class="native_go">
				<i class="icon_pic1 icon_home3x icon_home_s3x active"></i>
				<span class="nav_name">首页</span>
			</a>
		</li>
		<li id="take_out">
			<a href="/FrontMerchant/take_out_index" class="native_go">
				<i class="img_new_add_small icon_waimai"></i>
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
			<!--重新定位按钮-->
			<span class="refresh-address">重新定位</span>
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
	

	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1NyB7vqPhw6BhHXUvHum4NeD"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/swiper.3.1.2.jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/home_index_list.js"></script>
	<?php if (session('user_id')==62375||session('user_id')==62265){?><script type="text/javascript" src="__PUBLIC__/Js/front/front_js/vconsole.min.js"></script> <?php }?>
<script type="text/javascript">
	var a=<?php if ($_smarty_tpl->tpl_vars['a']->value){?><?php echo $_smarty_tpl->tpl_vars['a']->value;?>
<?php }else{ ?>1<?php }?>;
	var firstRow=<?php if ($_smarty_tpl->tpl_vars['firstRow']->value){?><?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
<?php }else{ ?>0<?php }?>;
	var total=<?php if ($_smarty_tpl->tpl_vars['total']->value){?><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
<?php }else{ ?>0<?php }?>;
	var t=<?php if ($_smarty_tpl->tpl_vars['t']->value){?><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
<?php }else{ ?>0<?php }?>;

	console.log("a:"+a);
	console.log("firstRow:"+firstRow);
	console.log("total:"+total);
	console.log("t:"+t);
    
    // 百度地图浏览器定位功能
    function myFun(result){
        var cityName = result.name;
				var geolocation = new BMap.Geolocation();
       			 var gc = new BMap.Geocoder();
        		geolocation.getCurrentPosition(function(r){
					if(this.getStatus() == BMAP_STATUS_SUCCESS){
						//alert('您的位置：'+r.point.lng+','+r.point.lat);
                        var pt = r.point;
                        gc.getLocation(pt, function (rs) {
                            var addComp = rs.addressComponents;

                            var province = addComp.province;
                            var city = addComp.city;
                            var area = addComp.district;

                            if (province != "" && city != "" && area != "") {
                                // alert(province);
                                //alert("当前定位城市:"+province+city+area,"/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng);
								//show_alert("当前定位城市:"+province+city+area);
                                window.location.href="/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng;

                            }
                            //alert("当前定位城市:"+cityName);
                        //
						});
					}
					else {
						alert('failed'+this.getStatus());
					}
				},{enableHighAccuracy: true})

    }
    var myCity = new BMap.LocalCity();
    if(a==1) {
        myCity.get(myFun);
    }
    //关于状态码
    //BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
    //BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
    //BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
    //BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
    //BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
    //BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
    //BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
    //BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
    //BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)
</script>
	<script type="text/javascript">
		if(!is_wechat()){
			$('.scroll_head').hide();
			$('.fix_head').css({
				'display':'flex',
				'position':'static'
			});
		}
		if(is_ios()){
			$(".vegetable_market .market-notice p").css("line-height","1.5rem");
		}
		new Swiper(".banner_container",{
			pagination: '.banner-pagination'
		});
		new Swiper(".store_container",{
			speed:600,
			pagination: '.store-pagination'
		});
		//底部导航栏
		$(".foot_nav li").on("click",function(){
			$(this).siblings().removeClass("active").find("i").removeClass("active");
			$(this).addClass("active").find("i").addClass("active");
			if($(this).attr('id')=='take_out'){
				$(this).find('i').addClass('icon_waimai_s');
			}
		});

		function do_qr(){
			//alert('qr');
			native_listen('qr','');
		}
		//菜市场地址提示
		$(".show-address").on("click",function(){
			$("#address-outer").show();
		});
		//地址弹层
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
			//console.log(111);
			local_latitude=lat;
			local_longitude=lon;
			$.ajax({
				url:'/FrontMerchant/change_near_business',
				dataType:'json',
				type:'post',
				data:{longitude:lon,latitude:lat,user_address_id:user_address_id},
				success:function(data){
					console.log(data);
					var html='';
					if(data.code==1){
						html+='<div class="vegetable_market"';
						if(data.data.distance<=data.data.range){
						//	html+='onclick="location.href='+'/FrontMerchant/take_out_shop/business_id/'+data.data.business_id+'"';
							html+='business_id ='+data.data.business_id;
						}else{
							html+='business_id = 0';
						}
						html+='>';
						html+='<img src="'+data.data.sign_pic+'" class="img-responsive">'+
										'<div class="pic_bottom">'+
										'<p class="big_word">'+data.data.business_name+'</p>'+
										'<p class="small_word">'+data.data.address+'</p>'+
										'</div>';

						if(data.data.distance<=data.data.range){
							html+='<div class="market_distance">'+
										'<span class="word">距离</span>'+
										'<span>'+data.data.distance+'Km</span>'+
									'</div>';
						}else{
							html+='<div class="market-notice show-address" >'+
									'<i class="icon-warn"></i>'+
									'<p>当前位置不在配送范围内，搜搜其他收货地址</p>'+
									'<span></span>' +
									'</div>'
						}
						html+='</div>';
						$('.ve-market').html(html)
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
		$(".ve-market").on("click",".vegetable_market",function(){
			var business_id = $(this).attr("business_id");
			
			if(business_id!='0'){
				if(!is_wechat()){
					var dataUrl = "/FrontMerchant/take_out_shop/business_id/"+business_id;
					var _json = JSON.stringify({
			            event: "to_jump",
			            params: {"url":dataUrl}
			        });
			        if(is_ios()){
						window.webkit.messageHandlers.webviewEvent.postMessage(_json);
					}else{
						window.ResultAndroid.webviewEvent(_json);
					}
				}else{
					window.location.href  = "/FrontMerchant/take_out_shop/business_id/"+business_id;
				}
			}
		});
		//点击重新定位
		$('.refresh-address').on("click",function(){
			myCity.get(myFun);
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
	
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/swiper.3.1.2.min.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/home_index.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			padding-bottom:2.45rem;
			/*padding-top:2.2rem;*/
		}
		.foot_nav{
			z-index:999;
		}
		/*-人气产品-*/
		.best_seller{
			padding-bottom:1rem;
		}
		.index_header{
			position:static;
		}
		#load_wrapper{
			height:calc(100% - 2.4rem);
			height:-webkit-calc(100% -2.4rem);
			background:#fff;
			box-sizing:border-box;
		}
		.fix_head{
			position:fixed;
			top:0;
			left:0;
			z-index:9;
			display:none;
		}
		.vegetable_market{
			width:100%;
			height:7.5rem;
			position:relative;
		}
		.img-responsive{
			width:100%;
			height:100%;
			display:block;
		}
		.pic_bottom{
			width:100%;
			position:absolute;
			bottom:0;
			padding-left:0.75rem;
			padding-bottom:0.25rem;
			background-image: linear-gradient(-180deg, rgba(0,0,0,0.00) 0%, rgba(0,0,0,0.70) 100%);
			box-sizing: border-box;
		}
		.pic_bottom .big_word{
			font-size: 0.9rem;
			color: #FFFFFF;
			text-overflow: ellipsis;
			overflow:hidden;
			white-space:nowrap;
			font-weight:bold;
		}
		.pic_bottom .small_word{
			font-size: 0.6rem;
			color: #FFFFFF;
			text-overflow: ellipsis;
			overflow:hidden;
			white-space:nowrap;
		}
		/*--菜市场距离--*/
		.vegetable_market .market_distance{
			background:rgba(0,0,0,0.6);
			height:2.5rem;
			display:flex;
			display:-webkit-flex;
			flex-direction:column;
			-webkit-flex-direction:column;
			justify-content:center;
			-webkit-justify-content:center;
			align-items:center;
			-webkit-align-items:center;
			position:absolute;
			top:0;
			right:0.75rem;
			color:#fff;
			min-width:2rem;
			padding:0 0.4rem;
		}
		.market_distance span{
			color:#fff;
			font-size:0.6rem;
		}
		.market_distance .word{
			margin-bottom:0.3rem;
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
	<a href="javascript:;" class="head_left">
		<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
		<i class="icon_pic1 icon_locate3x"></i>
	</a>
	<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 75%"<?php }?>>
		<span class="search_words">搜索商家、店铺</span>
		<i class="icon_pic1 icon_search3x"></i>
	</a>
	<a href="javascript:;"  onclick="do_qr()" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>
</div>
<div id="load_wrapper">
<div id="scroller">
	<!--头部-->
	<div class="index_header scroll_head">
		<a href="javascript:;" class="head_left">
			<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<a href="/Index/search_shop" class="native_go head_mid" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="width: 75%"<?php }?>>
			<span class="search_words">搜索商家、店铺</span>
			<i class="icon_pic1 icon_search3x"></i>
		</a>
		<a href="javascript:;"  onclick="do_qr()" class="saoma icon_pic1 icon_scan3x" <?php if ($_smarty_tpl->tpl_vars['is_wechat']->value==1){?>style="display: none"<?php }?>></a>
	</div>
	<!--轮播图-->
	<div class="swiper-container banner_container">
        <div class="swiper-wrapper">
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cust_flash_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <div class="swiper-slide banner_slide">
            	<a href="javascript:;">
            		<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['pic'];?>
"/>
            	</a>
			</div>
			<?php } ?>
		</div>
		<div class="swiper-pagination banner-pagination"></div>
	</div>
	<!--店铺分类-->
	<div class="swiper-container store_container">
        <div class="swiper-wrapper">
			<?php  $_smarty_tpl->tpl_vars['store_type_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['store_type_list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_type_list_all']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['store_type_list']->key => $_smarty_tpl->tpl_vars['store_type_list']->value){
$_smarty_tpl->tpl_vars['store_type_list']->_loop = true;
?>
            <div class="swiper-slide store_slide">
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
            	<a href="/Index/shop_type_list?id=<?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_id'];?>
"  
            		class="store_link native_go">
            		<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['img_url'];?>
"/>
            		<span><?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>
</span>
            	</a>
				<?php } ?>
        	</div>
			<?php } ?>
    	</div>
    	<div class="swiper-pagination store-pagination"></div>
	</div>
	<!--todo 菜市场图片二期增加-->
	<div class="ve-market">
	<div class="vegetable_market"  <?php if (round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2)<=$_smarty_tpl->tpl_vars['vegetable_market']->value['range']){?>business_id = <?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['business_id'];?>
<?php }else{ ?>business_id=0<?php }?>>
		<img src="<?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['sign_pic'];?>
" class="img-responsive">
		<div class="pic_bottom">
			<p class="big_word"><?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['business_name'];?>
</p>
			<p class="small_word"><?php echo $_smarty_tpl->tpl_vars['vegetable_market']->value['address'];?>
</p>
		</div>
		
		<!--菜市场距离-->
		<?php if (round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2)<=$_smarty_tpl->tpl_vars['vegetable_market']->value['range']){?>
		<div class="market_distance">
			<span class="word">距离</span>
			<span><?php echo round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2);?>
Km</span>
		</div>
		<?php }?>
		<!--超出3公里信息提示-->
		<?php if (round($_smarty_tpl->tpl_vars['vegetable_market']->value['distance']/1000,2)>$_smarty_tpl->tpl_vars['vegetable_market']->value['range']){?>
		<div class="market-notice show-address" >
			<i class="icon-warn"></i>
			<p>当前位置不在配送范围内，搜搜其他收货地址</p>
			<span></span>
		</div>
		<?php }?>
	</div>
	</div>
	<!--推荐店铺-->
	<div class="recom_store">
		<!--<div class="recom_title home_main_title">-->
			<!--<div class="title_cont">-->
				<!--<i class="icon_pic1 icon_splitline_left3x"></i>-->
				<!--<span class="title_words">推荐店铺</span>-->
				<!--<i class="icon_pic1 icon_splitline_right3x"></i>-->
			<!--</div>-->
			<!--<a href="/Index/shop_type_list" class="native_go more">查看更多</a>-->
		<!--</div>-->
		<div class="recom_cont">
			<!--<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="recom_list native_go">-->
				<!--<div class="store_info clearfix">-->
					<!--<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
" class="pic fl"/>-->
					<!--<div class="info fr">-->
						<!--<h6 class="store_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>-->
						<!--<div class="info_mid clearfix">-->
							<!--<ul class="star fl">-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
								<!--<li class="fl icon_pic1 icon_star_full3x"></li>-->
							<!--</ul>-->
							<!--<p class="distance fr"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</p>-->
						<!--</div>-->
						<!--<ul class="tag">-->
							<!--<li><?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>
</li>-->
						<!--</ul>-->
					<!--</div>-->
				<!--</div>-->
				<!--<p class="people_count">-->
					<!--<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>-->
					<!--<span>人去过</span>-->
				<!--</p>-->
				<!--优惠--二期做-->
			<!--
			<div class="favor_wrap">
				<ul class="favor">
					<li>
						<i class="icon_pic1 icon_pay3x"></i>
						<p class="favor_words">买单立享85折</p>
					</li>
					<li>
						<i class="icon_pic1 icon_ticket3x"></i>
						<p class="favor_words">领券立减8元</p>
					</li>
				</ul>
			</div>
			-->	
			</a>
		</div>
	</div>
	<!--人气产品-->
	<!--<div class="best_seller">
		<div class="seller_title home_main_title">
			<div class="title_cont">
				<i class="icon_pic1 icon_splitline_left3x"></i>
				<span class="title_words">人气产品</span>
				<i class="icon_pic1 icon_splitline_right3x"></i>
			</div>
			<p class="seller_title_info">此刻，你身边好几个小伙伴都买了这些产品。</p>
		</div>
		<ul class="seller_img_wrap clearfix">
			<li class="first_img fl">
				<a href="<?php echo $_smarty_tpl->tpl_vars['first_hot_goods']->value['link'];?>
" class="native_go">
					<img src="<?php echo $_smarty_tpl->tpl_vars['first_hot_goods']->value['pic'];?>
" alt="" />
					<div class="popular">
						<span class="pop_words">人气</span>
						<span class="pop_num">20</span>
					</div>
					<p class="seller_name"><?php echo $_smarty_tpl->tpl_vars['first_hot_goods']->value['title'];?>
</p>
				</a>
			</li>
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_goods_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<li class="fl">
				<a href="<?php echo $_smarty_tpl->tpl_vars['one']->value['link'];?>
" class="native_go">
					<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['pic'];?>
" alt="" />
					<p class="seller_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['title'];?>
</p>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>-->
	<!--附近店铺-->
	<div class="near_shop">
		<div class="recom_title home_main_title">
			<div class="title_cont ">
				<i class="icon_pic1 icon_splitline_left3x"></i>
				<span class="title_words">附近店铺</span>
				<i class="icon_pic1 icon_splitline_right3x"></i>
			</div>
			<a href="/Index/shop_type_list" class="native_go more">查看更多</a>
		</div>
		<div class="near_list_wrap">
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bussiness_local_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="near_list clearfix native_go">
				<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/" class="pic fl"/>
				<div class="near_info fr">
					<div class="info_head">
						<h6 class="near_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>
						<span class="near_distance"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</span>
					</div>
					<p class="near_address"><?php echo $_smarty_tpl->tpl_vars['one']->value['address'];?>
</p>
					<ul class="star fl">
						<?php $_smarty_tpl->tpl_vars['star_surplus'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<?php }?>
						<?php while ($_smarty_tpl->tpl_vars['star_surplus']->value-->0){?>
						<li class="fl icon_pic1 icon_star_blank3x"></li>
						<?php }?>
						<!--<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>-->
					</ul>
					<p class="people_count">
						<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>
						<span>人去过</span>
					</p>
				</div>
			</a>
			<?php } ?>
		</div>
	</div>
	<div id="pullUp">
	    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
	</div>
</div>
</div>
	<!--底部导航栏-->
	<ul class="foot_nav">
		<li class="active">
			<a href="/Index/home_index" class="native_go">
				<i class="icon_pic1 icon_home3x icon_home_s3x active"></i>
				<span class="nav_name">首页</span>
			</a>
		</li>
		<li id="take_out">
			<a href="/FrontMerchant/take_out_index" class="native_go">
				<i class="img_new_add_small icon_waimai"></i>
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
			<!--重新定位按钮-->
			<span class="refresh-address">重新定位</span>
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
	

	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1NyB7vqPhw6BhHXUvHum4NeD"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/swiper.3.1.2.jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/home_index_list.js"></script>
	<?php if (session('user_id')==62375||session('user_id')==62265){?><script type="text/javascript" src="__PUBLIC__/Js/front/front_js/vconsole.min.js"></script> <?php }?>
<script type="text/javascript">
	var a=<?php if ($_smarty_tpl->tpl_vars['a']->value){?><?php echo $_smarty_tpl->tpl_vars['a']->value;?>
<?php }else{ ?>1<?php }?>;
	var firstRow=<?php if ($_smarty_tpl->tpl_vars['firstRow']->value){?><?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
<?php }else{ ?>0<?php }?>;
	var total=<?php if ($_smarty_tpl->tpl_vars['total']->value){?><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
<?php }else{ ?>0<?php }?>;
	var t=<?php if ($_smarty_tpl->tpl_vars['t']->value){?><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
<?php }else{ ?>0<?php }?>;

	console.log("a:"+a);
	console.log("firstRow:"+firstRow);
	console.log("total:"+total);
	console.log("t:"+t);
    
    // 百度地图浏览器定位功能
    function myFun(result){
        var cityName = result.name;
				var geolocation = new BMap.Geolocation();
       			 var gc = new BMap.Geocoder();
        		geolocation.getCurrentPosition(function(r){
					if(this.getStatus() == BMAP_STATUS_SUCCESS){
						//alert('您的位置：'+r.point.lng+','+r.point.lat);
                        var pt = r.point;
                        gc.getLocation(pt, function (rs) {
                            var addComp = rs.addressComponents;

                            var province = addComp.province;
                            var city = addComp.city;
                            var area = addComp.district;

                            if (province != "" && city != "" && area != "") {
                                // alert(province);
                                //alert("当前定位城市:"+province+city+area,"/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng);
								//show_alert("当前定位城市:"+province+city+area);
                                window.location.href="/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng;

                            }
                            //alert("当前定位城市:"+cityName);
                        //
						});
					}
					else {
						alert('failed'+this.getStatus());
					}
				},{enableHighAccuracy: true})

    }
    var myCity = new BMap.LocalCity();
    if(a==1) {
        myCity.get(myFun);
    }
    //关于状态码
    //BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
    //BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
    //BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
    //BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
    //BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
    //BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
    //BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
    //BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
    //BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)
</script>
	<script type="text/javascript">
		if(!is_wechat()){
			$('.scroll_head').hide();
			$('.fix_head').css({
				'display':'flex',
				'position':'static'
			});
		}
		if(is_ios()){
			$(".vegetable_market .market-notice p").css("line-height","1.5rem");
		}
		new Swiper(".banner_container",{
			pagination: '.banner-pagination'
		});
		new Swiper(".store_container",{
			speed:600,
			pagination: '.store-pagination'
		});
		//底部导航栏
		$(".foot_nav li").on("click",function(){
			$(this).siblings().removeClass("active").find("i").removeClass("active");
			$(this).addClass("active").find("i").addClass("active");
			if($(this).attr('id')=='take_out'){
				$(this).find('i').addClass('icon_waimai_s');
			}
		});

		function do_qr(){
			//alert('qr');
			native_listen('qr','');
		}
		//菜市场地址提示
		$(".show-address").on("click",function(){
			$("#address-outer").show();
		});
		//地址弹层
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
			//console.log(111);
			local_latitude=lat;
			local_longitude=lon;
			$.ajax({
				url:'/FrontMerchant/change_near_business',
				dataType:'json',
				type:'post',
				data:{longitude:lon,latitude:lat,user_address_id:user_address_id},
				success:function(data){
					console.log(data);
					var html='';
					if(data.code==1){
						html+='<div class="vegetable_market"';
						if(data.data.distance<=data.data.range){
						//	html+='onclick="location.href='+'/FrontMerchant/take_out_shop/business_id/'+data.data.business_id+'"';
							html+='business_id ='+data.data.business_id;
						}else{
							html+='business_id = 0';
						}
						html+='>';
						html+='<img src="'+data.data.sign_pic+'" class="img-responsive">'+
										'<div class="pic_bottom">'+
										'<p class="big_word">'+data.data.business_name+'</p>'+
										'<p class="small_word">'+data.data.address+'</p>'+
										'</div>';

						if(data.data.distance<=data.data.range){
							html+='<div class="market_distance">'+
										'<span class="word">距离</span>'+
										'<span>'+data.data.distance+'Km</span>'+
									'</div>';
						}else{
							html+='<div class="market-notice show-address" >'+
									'<i class="icon-warn"></i>'+
									'<p>当前位置不在配送范围内，搜搜其他收货地址</p>'+
									'<span></span>' +
									'</div>'
						}
						html+='</div>';
						$('.ve-market').html(html)
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
		$(".ve-market").on("click",".vegetable_market",function(){
			var business_id = $(this).attr("business_id");
			
			if(business_id!='0'){
				if(!is_wechat()){
					var dataUrl = "/FrontMerchant/take_out_shop/business_id/"+business_id;
					var _json = JSON.stringify({
			            event: "to_jump",
			            params: {"url":dataUrl}
			        });
			        if(is_ios()){
						window.webkit.messageHandlers.webviewEvent.postMessage(_json);
					}else{
						window.ResultAndroid.webviewEvent(_json);
					}
				}else{
					window.location.href  = "/FrontMerchant/take_out_shop/business_id/"+business_id;
				}
			}
		});
		//点击重新定位
		$('.refresh-address').on("click",function(){
			myCity.get(myFun);
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