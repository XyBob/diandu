<?php /* Smarty version Smarty-3.1.6, created on 2017-07-27 11:26:46
         compiled from "C:\wamp\www\diandu\Tpl\FrontMerchant\take_out_shop.html" */ ?>
<?php /*%%SmartyHeaderCode:2052159672afc6c3d02-26571670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a88148f4cc06cd06d31b8eec03f6895c64211f7' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontMerchant\\take_out_shop.html',
      1 => 1500949044,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2052159672afc6c3d02-26571670',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59672afd1a73e',
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
<?php if ($_valid && !is_callable('content_59672afd1a73e')) {function content_59672afd1a73e($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/home_flexslider.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/order_detail.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/market/take_out.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style type="text/css">
	body{
		background:#fff;
	}
	.flexslider .slides > li a{
		display:flex;
		display:-webkit-flex;
	}
	.modal{
		z-index:99;
	}
	.shop-car-cont .shop-list .goods-name{
		display:flex;
		display:-webkit-flex;
		flex-direction:column;
		-webkit-flex-direction:column;
		justify-content:center;
		-webkit-justify-content:center;
	}
	.pop-up{
		z-index:999;
		background:rgba(0,0,0,0.7);
	}
	/*--顶部返回按钮--*/
	#current_page_arrow{
		width:1.5rem;
		height:1.5rem;
		position:absolute;
		left:0.75rem;
		top:0.2rem;
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
	
	<div class="out-shop-head" >
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<div class="shape" style="background:url(<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
) center no-repeat;"></div>
		<div class="out-info-cont">
			<div class="top clearfix">
				<img src="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
" class="shop-img fl"/>
				<div class="out-shop-info fr">
					<h6><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</h6>
					<p class="signature">店铺简介：<?php echo $_smarty_tpl->tpl_vars['business_info']->value['desc'];?>
</p>
					<div class="clearfix">
						<span class="fl grade">店铺评分：<?php echo $_smarty_tpl->tpl_vars['business_info']->value['star'];?>
</span>
						<!--商家状态-->
						<?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_open']==1){?>
						<span class="fl business state">营业中</span>
						<?php }else{ ?>
						<span class="fl rest state">休息中</span>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="bot clearfix">
				<!--代金券-->
				<div class="voucher-wrap fl slider-wrapper flexslider">
					<ul class="voucher-list slider-content slides">
						<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vouchers_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
						<li>
							<a href="/FrontMerchant/coupon_detail/vouchers_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['vouchers_id'];?>
" class="voucher-link">
								<i class="icon_pic1 icon_ticket3x"></i>
								<p class="voucher-intro">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['num'];?>
商家代金券（点此立抢）</p>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!--点击代金券真正跳转链接-->
				<!--<a href="/FrontMerchant/coupon_detail/coupon_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['vouchers_id'];?>
" class="fixed-voucher-link"></a>-->
				<div class="collect fr">
					<i class="icon_pic1 icon_like3x icon_like_selected3x <?php if ($_smarty_tpl->tpl_vars['like_num']->value){?>active<?php }?>"></i>
					<span>收藏</span>
				</div>
			</div>
		</div>
	</div>
	<!--商品列表-->
	<div class="out-shop-main clearfix">
		<!--左侧菜单按钮-->
		<div class="left-menu-wrap fl">
			<ul class="left-menu">
				<!--<li class="menu-name click-menu-name">
					<span>热销</span>
				</li>-->
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
				<li class="menu-name <?php if ($_smarty_tpl->tpl_vars['i']->value=='0'){?>click-menu-name<?php }?>" <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
>
					<span><?php echo $_smarty_tpl->tpl_vars['this']->value['class_name'];?>
</span>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!--右侧商品-->
		<div class="right-goods-wrap fl">
			<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
			<div class="right-goods">

				<h6><?php echo $_smarty_tpl->tpl_vars['this']->value['class_name'];?>
</h6>
				<div class="goods-info-wrap">
					<?php  $_smarty_tpl->tpl_vars['this1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['this']->value['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this1']->key => $_smarty_tpl->tpl_vars['this1']->value){
$_smarty_tpl->tpl_vars['this1']->_loop = true;
?>
					<div class="goods-info" data-flag="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
" stock="<?php echo $_smarty_tpl->tpl_vars['this1']->value['stock'];?>
" >
						<a href="/FrontMerchant/item_detail/item_id/<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
" data-url="" class="goods-link clearfix native_go">
							<img data-src="<?php echo $_smarty_tpl->tpl_vars['this1']->value['base_pic'];?>
?imageView2/1/w/100/h/100/q/100/" class="fl goods-img"/>
							<ul class="fr">
								<li class="goods-name"><?php echo $_smarty_tpl->tpl_vars['this1']->value['item_name'];?>
</li>
								<li class="sale">销量<?php echo $_smarty_tpl->tpl_vars['this1']->value['sales_num'];?>
</li>
								<li class="price">¥<span><?php echo $_smarty_tpl->tpl_vars['this1']->value['mall_price'];?>
</span></li>
							</ul>
						</a>
						<?php if ($_smarty_tpl->tpl_vars['this1']->value['has_sku']==1){?>
						<ul class="right-btn clearfix">
							<li class="choose-type" item_id="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
">选规格</li>
						</ul>
						<?php }else{ ?>
						<ul class="right-btn clearfix">
							<li class="reduce" data-item_id="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number']){?>style="display: list-item;"<?php }?>></li>
							<li class="goods-num" <?php if ($_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number']){?>style="display: list-item;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number']){?><?php echo $_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number'];?>
<?php }?></li>
							<li class="add" data-item_id="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
"></li>
						</ul>
						<?php }?>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<!--底部按钮-->
	<div class="out-foot <?php if ($_smarty_tpl->tpl_vars['shopping_cart_list']->value){?>car-have-goods<?php }?>">
		<div class="shop-car-icon">
			<span class="total-num"><?php if ($_smarty_tpl->tpl_vars['shopping_cart_list']->value){?><?php echo $_smarty_tpl->tpl_vars['total_number']->value;?>
<?php }?></span>
		</div>
		<div class="price-box">
			<p class="goods-price">¥<span class="total-price-val"><?php if ($_smarty_tpl->tpl_vars['total_price']->value){?><?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
<?php }?></span></p>
			<p class="deliver-price">配送费¥<span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee'];?>
</span></p>
		</div>
		<p class="send-out-price">¥<span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['start_delivery_fee'];?>
</span>起送</p>
		<!--去结算按钮-->
		<a href="/FrontOrder/submit_order/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" class="go-count native_go">去结算</a>
		<!--底部提示信息          后台数据嵌套时，foot-info里的span可考虑删除，传值到前台做判断-->
		<p class="foot-info" style="display:none;">
			已满<span class="met-val">80</span>元可减<span class="favor-val">30</span>元
		</p>
	</div>
	<!--购物车-->
	<div class="shop-car-outer hide">
		<div class="shop-car-shape"></div>
		<div class="shop-car-inner">
			<h6 class="car-title clearfix">
				<p class="shop-name fl"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</p>
				<span class="del-car fr">清空购物车</span>
			</h6>
			<ul class="shop-car-cont">
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shopping_cart_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
				<li class="shop-list clearfix" data-flag="<?php echo $_smarty_tpl->tpl_vars['this']->value['item_id'];?>
" data-sku_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['item_sku_price_id'];?>
" stock="<?php echo $_smarty_tpl->tpl_vars['this']->value['stock'];?>
">
					<div class="goods-name fl">
						<p><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</p>
						<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['this']->value['sku_value'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
						<p class="small-word"><?php echo $_smarty_tpl->tpl_vars['this']->value['sku_value'];?>
</p>
						<?php }?>
					</div>
					<!--<p class="goods-name fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</p>-->
					<p class="goods-price fl">¥<span class="price-val"><?php echo $_smarty_tpl->tpl_vars['this']->value['mall_price'];?>
</span></p>
					<ul class="right-btn fr">
						<li class="reduce"></li>
						<li class="goods-num"><?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</li>
						<li class="add">
							<i class="icon_market icon_add"></i>
						</li>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<!--清除购物车弹窗-->
	<div class="modal modal_del">
	    <div class="modal_content">
	        <div class="tips_icon icon_warning"></div>
	        <p class="warning">确定要清空购物车？</p>
	        <div class="operation">
	            <div class="cancel">取消</div>
	            <div class="sure clear">清空</div>
	        </div>
	    </div>
	</div>
<!--弹窗-->
<div class="pop-up">请选择规格</div>

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
	
<script src="/Public/Js/front/jquery.flexslider.js" type="text/javascript" charset="utf-8"></script>
<script src="__PUBLIC__/Js/lazy-load-img.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Js/front/front_js/take_out_shop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var business_id='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
';
var total_price='<?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
';
	if(total_price){
		showFoot();
	};
</script>

<script type="text/javascript">
	var lazyLoadImg = new LazyLoadImg({
        el: document.querySelector('.right-goods-wrap'),
        mode: 'default', //默认模式，将显示原图，diy模式，将自定义剪切，默认剪切居中部分
        time: 300, // 设置一个检测时间间隔
        complete: true, //页面内所有数据图片加载完成后，是否自己销毁程序，true默认销毁，false不销毁
        position: { // 只要其中一个位置符合条件，都会触发加载机制
          top: 0, // 元素距离顶部
          right: 0, // 元素距离右边
          bottom: 0, // 元素距离下面
          left: 0 // 元素距离左边
        },
        before: function () { // 图片加载之前执行方法
          
        },
        success: function (el) { // 图片加载成功执行方法
         
        },
        error: function (el) { // 图片加载失败执行方法
          el.src = '/Public/Images/front/front_img/logo3x.png'
        }
  	})
	
	//顶部返回按钮
	if(!is_wechat()){
		$(".index_header").css("paddingLeft","2rem");
	}else{
		$("#current_page_arrow").hide();
	}
	$("#current_page_arrow").on("click",function(){
		history.go(-1);
	});
	$('.choose-type').on('click',function(){
		var item_id=$(this).attr('item_id');
		location.href='/FrontMerchant/item_detail/item_id/'+item_id
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
	
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/home_flexslider.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/order_detail.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/market/take_out.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style type="text/css">
	body{
		background:#fff;
	}
	.flexslider .slides > li a{
		display:flex;
		display:-webkit-flex;
	}
	.modal{
		z-index:99;
	}
	.shop-car-cont .shop-list .goods-name{
		display:flex;
		display:-webkit-flex;
		flex-direction:column;
		-webkit-flex-direction:column;
		justify-content:center;
		-webkit-justify-content:center;
	}
	.pop-up{
		z-index:999;
		background:rgba(0,0,0,0.7);
	}
	/*--顶部返回按钮--*/
	#current_page_arrow{
		width:1.5rem;
		height:1.5rem;
		position:absolute;
		left:0.75rem;
		top:0.2rem;
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

	
	<div class="out-shop-head" >
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<div class="shape" style="background:url(<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
) center no-repeat;"></div>
		<div class="out-info-cont">
			<div class="top clearfix">
				<img src="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
" class="shop-img fl"/>
				<div class="out-shop-info fr">
					<h6><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</h6>
					<p class="signature">店铺简介：<?php echo $_smarty_tpl->tpl_vars['business_info']->value['desc'];?>
</p>
					<div class="clearfix">
						<span class="fl grade">店铺评分：<?php echo $_smarty_tpl->tpl_vars['business_info']->value['star'];?>
</span>
						<!--商家状态-->
						<?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_open']==1){?>
						<span class="fl business state">营业中</span>
						<?php }else{ ?>
						<span class="fl rest state">休息中</span>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="bot clearfix">
				<!--代金券-->
				<div class="voucher-wrap fl slider-wrapper flexslider">
					<ul class="voucher-list slider-content slides">
						<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vouchers_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
						<li>
							<a href="/FrontMerchant/coupon_detail/vouchers_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['vouchers_id'];?>
" class="voucher-link">
								<i class="icon_pic1 icon_ticket3x"></i>
								<p class="voucher-intro">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['num'];?>
商家代金券（点此立抢）</p>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!--点击代金券真正跳转链接-->
				<!--<a href="/FrontMerchant/coupon_detail/coupon_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['vouchers_id'];?>
" class="fixed-voucher-link"></a>-->
				<div class="collect fr">
					<i class="icon_pic1 icon_like3x icon_like_selected3x <?php if ($_smarty_tpl->tpl_vars['like_num']->value){?>active<?php }?>"></i>
					<span>收藏</span>
				</div>
			</div>
		</div>
	</div>
	<!--商品列表-->
	<div class="out-shop-main clearfix">
		<!--左侧菜单按钮-->
		<div class="left-menu-wrap fl">
			<ul class="left-menu">
				<!--<li class="menu-name click-menu-name">
					<span>热销</span>
				</li>-->
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
				<li class="menu-name <?php if ($_smarty_tpl->tpl_vars['i']->value=='0'){?>click-menu-name<?php }?>" <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
>
					<span><?php echo $_smarty_tpl->tpl_vars['this']->value['class_name'];?>
</span>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!--右侧商品-->
		<div class="right-goods-wrap fl">
			<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
			<div class="right-goods">

				<h6><?php echo $_smarty_tpl->tpl_vars['this']->value['class_name'];?>
</h6>
				<div class="goods-info-wrap">
					<?php  $_smarty_tpl->tpl_vars['this1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['this']->value['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this1']->key => $_smarty_tpl->tpl_vars['this1']->value){
$_smarty_tpl->tpl_vars['this1']->_loop = true;
?>
					<div class="goods-info" data-flag="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
" stock="<?php echo $_smarty_tpl->tpl_vars['this1']->value['stock'];?>
" >
						<a href="/FrontMerchant/item_detail/item_id/<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
" data-url="" class="goods-link clearfix native_go">
							<img data-src="<?php echo $_smarty_tpl->tpl_vars['this1']->value['base_pic'];?>
?imageView2/1/w/100/h/100/q/100/" class="fl goods-img"/>
							<ul class="fr">
								<li class="goods-name"><?php echo $_smarty_tpl->tpl_vars['this1']->value['item_name'];?>
</li>
								<li class="sale">销量<?php echo $_smarty_tpl->tpl_vars['this1']->value['sales_num'];?>
</li>
								<li class="price">¥<span><?php echo $_smarty_tpl->tpl_vars['this1']->value['mall_price'];?>
</span></li>
							</ul>
						</a>
						<?php if ($_smarty_tpl->tpl_vars['this1']->value['has_sku']==1){?>
						<ul class="right-btn clearfix">
							<li class="choose-type" item_id="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
">选规格</li>
						</ul>
						<?php }else{ ?>
						<ul class="right-btn clearfix">
							<li class="reduce" data-item_id="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number']){?>style="display: list-item;"<?php }?>></li>
							<li class="goods-num" <?php if ($_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number']){?>style="display: list-item;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number']){?><?php echo $_smarty_tpl->tpl_vars['this1']->value['shopping_cart_number'];?>
<?php }?></li>
							<li class="add" data-item_id="<?php echo $_smarty_tpl->tpl_vars['this1']->value['item_id'];?>
"></li>
						</ul>
						<?php }?>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<!--底部按钮-->
	<div class="out-foot <?php if ($_smarty_tpl->tpl_vars['shopping_cart_list']->value){?>car-have-goods<?php }?>">
		<div class="shop-car-icon">
			<span class="total-num"><?php if ($_smarty_tpl->tpl_vars['shopping_cart_list']->value){?><?php echo $_smarty_tpl->tpl_vars['total_number']->value;?>
<?php }?></span>
		</div>
		<div class="price-box">
			<p class="goods-price">¥<span class="total-price-val"><?php if ($_smarty_tpl->tpl_vars['total_price']->value){?><?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
<?php }?></span></p>
			<p class="deliver-price">配送费¥<span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee'];?>
</span></p>
		</div>
		<p class="send-out-price">¥<span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['start_delivery_fee'];?>
</span>起送</p>
		<!--去结算按钮-->
		<a href="/FrontOrder/submit_order/business_id/<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
" class="go-count native_go">去结算</a>
		<!--底部提示信息          后台数据嵌套时，foot-info里的span可考虑删除，传值到前台做判断-->
		<p class="foot-info" style="display:none;">
			已满<span class="met-val">80</span>元可减<span class="favor-val">30</span>元
		</p>
	</div>
	<!--购物车-->
	<div class="shop-car-outer hide">
		<div class="shop-car-shape"></div>
		<div class="shop-car-inner">
			<h6 class="car-title clearfix">
				<p class="shop-name fl"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</p>
				<span class="del-car fr">清空购物车</span>
			</h6>
			<ul class="shop-car-cont">
				<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shopping_cart_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
				<li class="shop-list clearfix" data-flag="<?php echo $_smarty_tpl->tpl_vars['this']->value['item_id'];?>
" data-sku_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['item_sku_price_id'];?>
" stock="<?php echo $_smarty_tpl->tpl_vars['this']->value['stock'];?>
">
					<div class="goods-name fl">
						<p><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</p>
						<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['this']->value['sku_value'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
						<p class="small-word"><?php echo $_smarty_tpl->tpl_vars['this']->value['sku_value'];?>
</p>
						<?php }?>
					</div>
					<!--<p class="goods-name fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</p>-->
					<p class="goods-price fl">¥<span class="price-val"><?php echo $_smarty_tpl->tpl_vars['this']->value['mall_price'];?>
</span></p>
					<ul class="right-btn fr">
						<li class="reduce"></li>
						<li class="goods-num"><?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</li>
						<li class="add">
							<i class="icon_market icon_add"></i>
						</li>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<!--清除购物车弹窗-->
	<div class="modal modal_del">
	    <div class="modal_content">
	        <div class="tips_icon icon_warning"></div>
	        <p class="warning">确定要清空购物车？</p>
	        <div class="operation">
	            <div class="cancel">取消</div>
	            <div class="sure clear">清空</div>
	        </div>
	    </div>
	</div>
<!--弹窗-->
<div class="pop-up">请选择规格</div>

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
	
<script src="/Public/Js/front/jquery.flexslider.js" type="text/javascript" charset="utf-8"></script>
<script src="__PUBLIC__/Js/lazy-load-img.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Js/front/front_js/take_out_shop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var business_id='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
';
var total_price='<?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
';
	if(total_price){
		showFoot();
	};
</script>

<script type="text/javascript">
	var lazyLoadImg = new LazyLoadImg({
        el: document.querySelector('.right-goods-wrap'),
        mode: 'default', //默认模式，将显示原图，diy模式，将自定义剪切，默认剪切居中部分
        time: 300, // 设置一个检测时间间隔
        complete: true, //页面内所有数据图片加载完成后，是否自己销毁程序，true默认销毁，false不销毁
        position: { // 只要其中一个位置符合条件，都会触发加载机制
          top: 0, // 元素距离顶部
          right: 0, // 元素距离右边
          bottom: 0, // 元素距离下面
          left: 0 // 元素距离左边
        },
        before: function () { // 图片加载之前执行方法
          
        },
        success: function (el) { // 图片加载成功执行方法
         
        },
        error: function (el) { // 图片加载失败执行方法
          el.src = '/Public/Images/front/front_img/logo3x.png'
        }
  	})
	
	//顶部返回按钮
	if(!is_wechat()){
		$(".index_header").css("paddingLeft","2rem");
	}else{
		$("#current_page_arrow").hide();
	}
	$("#current_page_arrow").on("click",function(){
		history.go(-1);
	});
	$('.choose-type').on('click',function(){
		var item_id=$(this).attr('item_id');
		location.href='/FrontMerchant/item_detail/item_id/'+item_id
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