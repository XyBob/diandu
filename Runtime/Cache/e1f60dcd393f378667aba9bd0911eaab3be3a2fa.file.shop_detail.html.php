<?php /* Smarty version Smarty-3.1.6, created on 2017-07-20 21:02:37
         compiled from "C:\wamp\www\diandu\Tpl\Index\shop_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:25510595a158e6d5297-31965078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1f60dcd393f378667aba9bd0911eaab3be3a2fa' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\Index\\shop_detail.html',
      1 => 1500555755,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25510595a158e6d5297-31965078',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595a158f5a8cb',
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
<?php if ($_valid && !is_callable('content_595a158f5a8cb')) {function content_595a158f5a8cb($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/swiper.3.1.2.min.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/shop_detail.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		/*-获取成功的弹框-*/
		.layermcont{
			text-align:center;
			color:#323232;
		}
		.layermchild  .layermbtn span{
			color:#323232;
		}
		.near_recom{
			width:100%;
			height:2.9rem;
			line-height:2.9rem;
			font-size: 0.8rem;
			color: #666666;
			box-sizing:border-box;
			padding-left:0.75rem;
		}
		.near_list_wrap .near_list{
			background:#fff;
			border-bottom:1px solid #F1F4F7;;
		}
		/*-隐藏收藏后的页码样式-*/
		.detail_container .detail_pagination{
			right:3.5rem;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:1.5rem;
			height:1.5rem;
			position:absolute;
			left:0.5rem;
			top:0.5rem;
			display:flex;
			display:-webkit-flex;
			align-items:center;
			-webkit-align-items:center;
			justify-content:center;
			-webkit-justify-content:center;
			background:rgba(0,0,0,0.5);
			z-index:999;
			border-radius:50%;
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
	
	<!--轮播图-->
	<div class="detail_banner_wrap">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<div class="swiper-container detail_container">
	        <div class="swiper-wrapper">
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['evn_pic_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['one']->key;
?>
	            <div class="swiper-slide detail_slide">
	            	<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value;?>
"/>
				</div>
				<?php } ?>
				<!--<div class="swiper-slide detail_slide">-->
	            	<!--<img src="/Public/Images/testImg/test3.jpg"/>-->
				<!--</div>-->
			</div>
			<div class="swiper-pagination detail_pagination"></div>
		</div>
		<!--收藏-->
		<div class="like_btn_wrap circle_bg">
			<span class="like_btn icon_pic1 icon_like3x icon_like_selected3x"></span>
		</div>
		<!--页码图片-->
		<i class="icon_pic1 icon_detail_banner3x pagination_icon"></i>
	</div>
	<!--店名-->
	<div class="detail_info_wrap">
		<div class="title_wrap">
			<h1 class="shop_name"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</h1>
			<div class="star_wrap clearfix">
				<ul class="star fl">
					<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['business_info']->value['stars'], null, 0);?>
					<?php while ($_smarty_tpl->tpl_vars['business_info']->value['stars']-->0){?>
					<li class="fl icon_pic1 icon_star_full3x"></li>
					<?php }?>
					<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
					<li class="fl icon_pic1 icon_star_blank3x"></li>
					<?php }?>
					<li class="fl score"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['star'];?>
</li>
					<!--<li class="fl icon_pic1 icon_star_blank3x "></li>-->
				</ul>
				<span class="per_expense fl">人均&nbsp;:&nbsp;&nbsp;¥<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
</span>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['business_info']->value['business_classify_id']!='25'&&$_smarty_tpl->tpl_vars['is_wechat']->value==1){?>
			<a href="/FrontMerchantOrder/buy_bill/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" class="native_go pay_btn">买单</a>
			<?php }?>
		</div>
		<div class="detail_info_bot">
			<!--<a href="/Index/get_map/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">-->
			<a href="/Index/get_map/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" id="map" class="address_icon native_go">
				<i class="icon_pic1 icon_location3x"></i>
			</a>
			<a href="/Index/get_map/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" id="maps" class="address_info native_go"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['address'];?>
</a>
			<!--</a>-->
			<a href="javascript:;" class="phone_wrap">
				<i class="icon_pic1 icon_phone3x"></i>
			</a>
		</div>
	</div>
	<!--todo 外卖优惠的标题-->
<?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_out']==1&&$_smarty_tpl->tpl_vars['business_info']->value['out_status']==1&&$_smarty_tpl->tpl_vars['business_info']->value['is_open']==1){?>
	<div class="preferential">
		<div class="preferential_title">
			<span class="preferential_img"></span>
			<span>本店外送</span>
			<!--<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['out_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>-->
			<!--<span class="red">（满<?php echo $_smarty_tpl->tpl_vars['this']->value['amount_limit'];?>
减<?php echo $_smarty_tpl->tpl_vars['this']->value['num'];?>
）</span>-->
			<!--<?php } ?>-->
		</div>
		<a class="preferential_right" href="/FrontMerchant/take_out_shop/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">进入门店</a>
	</div>
<?php }?>
	<!--&lt;!&ndash;优惠&ndash;&gt;-->
	<div class="favor_wrap">
		<?php if ($_smarty_tpl->tpl_vars['active_break']->value){?>
		<a class="native_go pay" href="/FrontMerchantOrder/buy_bill/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">
			<div class="pay_top">
				<i class="icon_pic1 icon_pay3x"></i>

				<span class="pay_words">买单</span>

				<div class="pay_num">
					已售&nbsp;
					<span><?php echo $_smarty_tpl->tpl_vars['in_cost_num']->value;?>
</span>
					&nbsp;
				</div>
			</div>
			<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_break']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['this']->value['scope']==1||$_smarty_tpl->tpl_vars['this']->value['scope']==0){?>
			<span class="pay_favor">满<?php echo $_smarty_tpl->tpl_vars['this']->value['amount_limit'];?>
减<?php echo $_smarty_tpl->tpl_vars['this']->value['num'];?>
</span>
			<?php }?>
			<?php } ?>
		</a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['active_coupon']->value){?>
		<?php  $_smarty_tpl->tpl_vars['coupon_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_coupon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon_item']->key => $_smarty_tpl->tpl_vars['coupon_item']->value){
$_smarty_tpl->tpl_vars['coupon_item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['scope']==1){?>
		<div class="ticket">
			<div class="ticket_top">
				<i class="icon_pic1 icon_ticket3x"></i>
				<span class="ticket_words">买单立减</span>
				<div class="ticket_num">
					已领&nbsp;
					<span class=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
><?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['all_receive'];?>
</span>
					&nbsp;张
				</div>
			</div>
			<div class="ticket_bot">
				<span class="ticket_favor">领券满<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['amount_limit'];?>
元减<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['num'];?>
元</span>

				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: hidden">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: visible">已获取</span>-->

				<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['have']==1){?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: none">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: inline">已获取</span>
				<?php }else{ ?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: inline">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: none">已获取</span>
				<?php }?>
				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: visible">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: hidden">已获取</span>-->

			</div>
		</div>
		<?php }?>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['coupon_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_coupon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon_item']->key => $_smarty_tpl->tpl_vars['coupon_item']->value){
$_smarty_tpl->tpl_vars['coupon_item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['scope']==2){?>
		<div class="ticket">
			<div class="ticket_top">
				<i class="icon_pic1 icon_ticket3x"></i>
				<span class="ticket_words">外卖优惠券</span>
				<div class="ticket_num">
					已领&nbsp;
					<span class=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
><?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['all_receive'];?>
</span>
					&nbsp;张
				</div>
			</div>
			<div class="ticket_bot">
				<span class="ticket_favor">领券满<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['amount_limit'];?>
元减<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['num'];?>
元</span>

				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: hidden">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: visible">已获取</span>-->

				<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['have']==1){?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: none">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: inline">已获取</span>
				<?php }else{ ?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: inline">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: none">已获取</span>
				<?php }?>
				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: visible">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: hidden">已获取</span>-->

			</div>
		</div>
		<?php }?>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['coupon_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_coupon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon_item']->key => $_smarty_tpl->tpl_vars['coupon_item']->value){
$_smarty_tpl->tpl_vars['coupon_item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['scope']==0){?>
		<div class="ticket">
			<div class="ticket_top">
				<i class="icon_pic1 icon_ticket3x"></i>
				<span class="ticket_words">到店和外送立减</span>
				<div class="ticket_num">
					已领&nbsp;
					<span class=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
><?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['all_receive'];?>
</span>
					&nbsp;张
				</div>
			</div>
			<div class="ticket_bot">
				<span class="ticket_favor">领券满<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['amount_limit'];?>
元减<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['num'];?>
元</span>

				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: hidden">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: visible">已获取</span>-->

				<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['have']==1){?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: none">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: inline">已获取</span>
				<?php }else{ ?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: inline">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: none">已获取</span>
				<?php }?>
				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: visible">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: hidden">已获取</span>-->

			</div>
		</div>
		<?php }?>
		<?php } ?>
		<?php }?>
	</div>
	<!--更多信息-->
	<div class="more_detail">
		<h6 class="more_detail_title">更多信息</h6>
		<ul class="more_detail_list">
			<!--<li>
				<i></i>
				<span>营业时间：10:00-22:00</span>
			</li>-->
			<li>
				<i></i>
				<span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['desc'];?>
</span>
			</li>

		</ul>
	</div>
	<!--附近推荐-->
<?php if (!empty($_smarty_tpl->tpl_vars['bussiness_near_lists']->value)){?>
	<div class="near_shop">
		<h6 class="near_recom">附近推荐</h6>
		<div class="near_list_wrap">
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bussiness_near_lists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="near_list clearfix native_go">
				<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
" class="pic fl"/>
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
						<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<?php }?>
						<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
						<span class="icon_pic1 icon_star_blank3x"></span>
						<?php }?>
						<!--<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>-->
						<!--<li class="fl icon_pic1 icon_star_blank3x"></li>-->
					</ul>
					<p class="people_count">
						<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>
						<span>人去过</span>
					</p>
				</div>
			</a>
			<?php }
if (!$_smarty_tpl->tpl_vars['one']->_loop) {
?>
			<div class="none_more">&nbsp;附近没有店铺了&nbsp;</div>
			<?php } ?>

		</div>
	</div>
<?php }?>
	<!--没有更多了-->
	<div class="none_more">-&nbsp;已经到底了&nbsp;-</div>

	<!--弹出电话-->
	<div class="phone_bot_wrap">
		<a href="tel:<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
">呼叫<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
</a>
		<span class="cancel">取消</span>
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
	

<script type="text/javascript" src="__PUBLIC__/Js/front/swiper.min.js"></script>
<script>
		var lat=<?php echo $_smarty_tpl->tpl_vars['lat']->value;?>
;
		var lng=<?php echo $_smarty_tpl->tpl_vars['lng']->value;?>
;

</script>


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
	new Swiper(".detail_container",{
		pagination : '.swiper-pagination',
		paginationType : 'fraction'
	});
	//点击收藏
	$(".like_btn_wrap").on("click",function(){
		$(this).find("span").toggleClass("active");
	});
	$(".phone_bot_wrap").on("click",function(){
		$(this).hide();
		$("body").css("overflow","scroll");
	});
	//点击电话图标
	$(".phone_wrap").on("click",function(){
		$(".phone_bot_wrap").show();
		$("body").css("overflow","hidden");
	});
	
	//点击立即获取
	$(".ticket_get").on("click",function(){
	    console.log($(this).attr('id'));
	    var vouchersid = $(this).attr('id');
	    $.ajax(
        {
            url:"/Index/get_voucher",
			type:"POST",
            data:{
                voucherid:vouchersid
        		},
            timeout:10000,
                success:function(data){
				console.log(data);
                if(data=="receive"){
                    var ticketNum =  $('.'+vouchersid).text();
                    $("body").css("overflow","hidden");
                    ticketNum = Number(ticketNum) + 1;
                    $('.'+vouchersid).text(ticketNum);
                    $('#'+vouchersid).next().show();
                    $('#'+vouchersid).hide();

                    //$(".ticket_have").show();
                    layer.open({
                        content: '领取成功',
                        title: false,
                        btn: ['确定'],
                    });
				}
				if(data=="received"){
                    layer.open({
                        content: '已经领取过了',
                        title: false,
                        btn: ['确定'],
                    });
				}
				if(data=="login"){
                    layer.open({
                        content: '请先登录',
                        title: false,
                        btn: ['确定'],
                    });
				}

        }
        });

	});
	$(document).on("click",".layermmain,.laymshade",function(){
		$("body").css("overflow","scroll");
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
	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/swiper.3.1.2.min.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/shop_detail.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/near_shop.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		/*-获取成功的弹框-*/
		.layermcont{
			text-align:center;
			color:#323232;
		}
		.layermchild  .layermbtn span{
			color:#323232;
		}
		.near_recom{
			width:100%;
			height:2.9rem;
			line-height:2.9rem;
			font-size: 0.8rem;
			color: #666666;
			box-sizing:border-box;
			padding-left:0.75rem;
		}
		.near_list_wrap .near_list{
			background:#fff;
			border-bottom:1px solid #F1F4F7;;
		}
		/*-隐藏收藏后的页码样式-*/
		.detail_container .detail_pagination{
			right:3.5rem;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:1.5rem;
			height:1.5rem;
			position:absolute;
			left:0.5rem;
			top:0.5rem;
			display:flex;
			display:-webkit-flex;
			align-items:center;
			-webkit-align-items:center;
			justify-content:center;
			-webkit-justify-content:center;
			background:rgba(0,0,0,0.5);
			z-index:999;
			border-radius:50%;
		}
	</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<!--轮播图-->
	<div class="detail_banner_wrap">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<div class="swiper-container detail_container">
	        <div class="swiper-wrapper">
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['evn_pic_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['one']->key;
?>
	            <div class="swiper-slide detail_slide">
	            	<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value;?>
"/>
				</div>
				<?php } ?>
				<!--<div class="swiper-slide detail_slide">-->
	            	<!--<img src="/Public/Images/testImg/test3.jpg"/>-->
				<!--</div>-->
			</div>
			<div class="swiper-pagination detail_pagination"></div>
		</div>
		<!--收藏-->
		<div class="like_btn_wrap circle_bg">
			<span class="like_btn icon_pic1 icon_like3x icon_like_selected3x"></span>
		</div>
		<!--页码图片-->
		<i class="icon_pic1 icon_detail_banner3x pagination_icon"></i>
	</div>
	<!--店名-->
	<div class="detail_info_wrap">
		<div class="title_wrap">
			<h1 class="shop_name"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</h1>
			<div class="star_wrap clearfix">
				<ul class="star fl">
					<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['business_info']->value['stars'], null, 0);?>
					<?php while ($_smarty_tpl->tpl_vars['business_info']->value['stars']-->0){?>
					<li class="fl icon_pic1 icon_star_full3x"></li>
					<?php }?>
					<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
					<li class="fl icon_pic1 icon_star_blank3x"></li>
					<?php }?>
					<li class="fl score"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['star'];?>
</li>
					<!--<li class="fl icon_pic1 icon_star_blank3x "></li>-->
				</ul>
				<span class="per_expense fl">人均&nbsp;:&nbsp;&nbsp;¥<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
</span>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['business_info']->value['business_classify_id']!='25'&&$_smarty_tpl->tpl_vars['is_wechat']->value==1){?>
			<a href="/FrontMerchantOrder/buy_bill/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" class="native_go pay_btn">买单</a>
			<?php }?>
		</div>
		<div class="detail_info_bot">
			<!--<a href="/Index/get_map/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">-->
			<a href="/Index/get_map/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" id="map" class="address_icon native_go">
				<i class="icon_pic1 icon_location3x"></i>
			</a>
			<a href="/Index/get_map/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" id="maps" class="address_info native_go"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['address'];?>
</a>
			<!--</a>-->
			<a href="javascript:;" class="phone_wrap">
				<i class="icon_pic1 icon_phone3x"></i>
			</a>
		</div>
	</div>
	<!--todo 外卖优惠的标题-->
<?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_out']==1&&$_smarty_tpl->tpl_vars['business_info']->value['out_status']==1&&$_smarty_tpl->tpl_vars['business_info']->value['is_open']==1){?>
	<div class="preferential">
		<div class="preferential_title">
			<span class="preferential_img"></span>
			<span>本店外送</span>
			<!--<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['out_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>-->
			<!--<span class="red">（满<?php echo $_smarty_tpl->tpl_vars['this']->value['amount_limit'];?>
减<?php echo $_smarty_tpl->tpl_vars['this']->value['num'];?>
）</span>-->
			<!--<?php } ?>-->
		</div>
		<a class="preferential_right" href="/FrontMerchant/take_out_shop/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">进入门店</a>
	</div>
<?php }?>
	<!--&lt;!&ndash;优惠&ndash;&gt;-->
	<div class="favor_wrap">
		<?php if ($_smarty_tpl->tpl_vars['active_break']->value){?>
		<a class="native_go pay" href="/FrontMerchantOrder/buy_bill/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">
			<div class="pay_top">
				<i class="icon_pic1 icon_pay3x"></i>

				<span class="pay_words">买单</span>

				<div class="pay_num">
					已售&nbsp;
					<span><?php echo $_smarty_tpl->tpl_vars['in_cost_num']->value;?>
</span>
					&nbsp;
				</div>
			</div>
			<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_break']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['this']->value['scope']==1||$_smarty_tpl->tpl_vars['this']->value['scope']==0){?>
			<span class="pay_favor">满<?php echo $_smarty_tpl->tpl_vars['this']->value['amount_limit'];?>
减<?php echo $_smarty_tpl->tpl_vars['this']->value['num'];?>
</span>
			<?php }?>
			<?php } ?>
		</a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['active_coupon']->value){?>
		<?php  $_smarty_tpl->tpl_vars['coupon_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_coupon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon_item']->key => $_smarty_tpl->tpl_vars['coupon_item']->value){
$_smarty_tpl->tpl_vars['coupon_item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['scope']==1){?>
		<div class="ticket">
			<div class="ticket_top">
				<i class="icon_pic1 icon_ticket3x"></i>
				<span class="ticket_words">买单立减</span>
				<div class="ticket_num">
					已领&nbsp;
					<span class=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
><?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['all_receive'];?>
</span>
					&nbsp;张
				</div>
			</div>
			<div class="ticket_bot">
				<span class="ticket_favor">领券满<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['amount_limit'];?>
元减<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['num'];?>
元</span>

				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: hidden">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: visible">已获取</span>-->

				<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['have']==1){?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: none">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: inline">已获取</span>
				<?php }else{ ?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: inline">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: none">已获取</span>
				<?php }?>
				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: visible">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: hidden">已获取</span>-->

			</div>
		</div>
		<?php }?>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['coupon_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_coupon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon_item']->key => $_smarty_tpl->tpl_vars['coupon_item']->value){
$_smarty_tpl->tpl_vars['coupon_item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['scope']==2){?>
		<div class="ticket">
			<div class="ticket_top">
				<i class="icon_pic1 icon_ticket3x"></i>
				<span class="ticket_words">外卖优惠券</span>
				<div class="ticket_num">
					已领&nbsp;
					<span class=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
><?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['all_receive'];?>
</span>
					&nbsp;张
				</div>
			</div>
			<div class="ticket_bot">
				<span class="ticket_favor">领券满<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['amount_limit'];?>
元减<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['num'];?>
元</span>

				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: hidden">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: visible">已获取</span>-->

				<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['have']==1){?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: none">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: inline">已获取</span>
				<?php }else{ ?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: inline">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: none">已获取</span>
				<?php }?>
				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: visible">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: hidden">已获取</span>-->

			</div>
		</div>
		<?php }?>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['coupon_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['active_coupon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon_item']->key => $_smarty_tpl->tpl_vars['coupon_item']->value){
$_smarty_tpl->tpl_vars['coupon_item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['scope']==0){?>
		<div class="ticket">
			<div class="ticket_top">
				<i class="icon_pic1 icon_ticket3x"></i>
				<span class="ticket_words">到店和外送立减</span>
				<div class="ticket_num">
					已领&nbsp;
					<span class=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
><?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['all_receive'];?>
</span>
					&nbsp;张
				</div>
			</div>
			<div class="ticket_bot">
				<span class="ticket_favor">领券满<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['amount_limit'];?>
元减<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['num'];?>
元</span>

				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: hidden">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: visible">已获取</span>-->

				<?php if ($_smarty_tpl->tpl_vars['coupon_item']->value['have']==1){?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: none">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: inline">已获取</span>
				<?php }else{ ?>
				<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="display: inline">立即获取</span>
				<span class="ticket_have ticket_btn" style="display: none">已获取</span>
				<?php }?>
				<!--<span class="ticket_get ticket_btn" id=<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value['vouchers_id'];?>
 style="visibility: visible">立即获取</span>-->
				<!--<span class="ticket_have ticket_btn" style="visibility: hidden">已获取</span>-->

			</div>
		</div>
		<?php }?>
		<?php } ?>
		<?php }?>
	</div>
	<!--更多信息-->
	<div class="more_detail">
		<h6 class="more_detail_title">更多信息</h6>
		<ul class="more_detail_list">
			<!--<li>
				<i></i>
				<span>营业时间：10:00-22:00</span>
			</li>-->
			<li>
				<i></i>
				<span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['desc'];?>
</span>
			</li>

		</ul>
	</div>
	<!--附近推荐-->
<?php if (!empty($_smarty_tpl->tpl_vars['bussiness_near_lists']->value)){?>
	<div class="near_shop">
		<h6 class="near_recom">附近推荐</h6>
		<div class="near_list_wrap">
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bussiness_near_lists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="near_list clearfix native_go">
				<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
" class="pic fl"/>
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
						<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<?php }?>
						<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
						<span class="icon_pic1 icon_star_blank3x"></span>
						<?php }?>
						<!--<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>
						<li class="fl icon_pic1 icon_star_full3x"></li>-->
						<!--<li class="fl icon_pic1 icon_star_blank3x"></li>-->
					</ul>
					<p class="people_count">
						<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>
						<span>人去过</span>
					</p>
				</div>
			</a>
			<?php }
if (!$_smarty_tpl->tpl_vars['one']->_loop) {
?>
			<div class="none_more">&nbsp;附近没有店铺了&nbsp;</div>
			<?php } ?>

		</div>
	</div>
<?php }?>
	<!--没有更多了-->
	<div class="none_more">-&nbsp;已经到底了&nbsp;-</div>

	<!--弹出电话-->
	<div class="phone_bot_wrap">
		<a href="tel:<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
">呼叫<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
</a>
		<span class="cancel">取消</span>
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
	

<script type="text/javascript" src="__PUBLIC__/Js/front/swiper.min.js"></script>
<script>
		var lat=<?php echo $_smarty_tpl->tpl_vars['lat']->value;?>
;
		var lng=<?php echo $_smarty_tpl->tpl_vars['lng']->value;?>
;

</script>


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
	new Swiper(".detail_container",{
		pagination : '.swiper-pagination',
		paginationType : 'fraction'
	});
	//点击收藏
	$(".like_btn_wrap").on("click",function(){
		$(this).find("span").toggleClass("active");
	});
	$(".phone_bot_wrap").on("click",function(){
		$(this).hide();
		$("body").css("overflow","scroll");
	});
	//点击电话图标
	$(".phone_wrap").on("click",function(){
		$(".phone_bot_wrap").show();
		$("body").css("overflow","hidden");
	});
	
	//点击立即获取
	$(".ticket_get").on("click",function(){
	    console.log($(this).attr('id'));
	    var vouchersid = $(this).attr('id');
	    $.ajax(
        {
            url:"/Index/get_voucher",
			type:"POST",
            data:{
                voucherid:vouchersid
        		},
            timeout:10000,
                success:function(data){
				console.log(data);
                if(data=="receive"){
                    var ticketNum =  $('.'+vouchersid).text();
                    $("body").css("overflow","hidden");
                    ticketNum = Number(ticketNum) + 1;
                    $('.'+vouchersid).text(ticketNum);
                    $('#'+vouchersid).next().show();
                    $('#'+vouchersid).hide();

                    //$(".ticket_have").show();
                    layer.open({
                        content: '领取成功',
                        title: false,
                        btn: ['确定'],
                    });
				}
				if(data=="received"){
                    layer.open({
                        content: '已经领取过了',
                        title: false,
                        btn: ['确定'],
                    });
				}
				if(data=="login"){
                    layer.open({
                        content: '请先登录',
                        title: false,
                        btn: ['确定'],
                    });
				}

        }
        });

	});
	$(document).on("click",".layermmain,.laymshade",function(){
		$("body").css("overflow","scroll");
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