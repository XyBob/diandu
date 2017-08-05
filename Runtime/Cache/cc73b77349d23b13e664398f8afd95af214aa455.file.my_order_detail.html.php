<?php /* Smarty version Smarty-3.1.6, created on 2017-07-31 13:41:36
         compiled from "C:\wamp\www\diandu\Tpl\FrontOrder\my_order_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:272865971bbc596ac97-86985321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc73b77349d23b13e664398f8afd95af214aa455' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontOrder\\my_order_detail.html',
      1 => 1500865050,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272865971bbc596ac97-86985321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5971bbc66f269',
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
<?php if ($_valid && !is_callable('content_5971bbc66f269')) {function content_5971bbc66f269($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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


<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/order_detail.css?version={$version}"/>
<style type="text/css">
	.order_list_detail{
	    border-bottom: 1px solid #F1F4F7;
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
    	padding: 0.5rem 0.75rem 1rem 2rem;
    	position:relative;
	}
	.order_list_detail img{
		display:block;
		border:0;
		width:1.8rem;
		height:1.8rem;
		position:absolute;
		left:0;
		top:0.5rem;
	}
	.order_list .goods-label{
	    max-width: 60%;
	    display: flex;
	    display: -webkit-flex;
	    flex-direction: column;
	    -webkit-flex-direction: column;
	    justify-content: center;
	    -webkit-justify-content: center;
	    font-size: 0.9rem;
	    color: #333333;
	}
	.order_list .grey_number {
	    font-size: 0.6rem;
	    color: #999999;
	    margin-right: 2.5rem;
	}
	.order_list .label {
	    font-size: 0.9rem;
	    color: #333333;
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
	
<header>
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>订单详情</h1>
</header>
<div class="content">
    <div class="list_top">
        <div class="img_info">
            <div class="img_left"><img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive"></div>
            <div class="img_middle">
                <div class="the_top">
                    <div class="top_state">
                        <p class="name"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</p>
                        <div class="img_right red"><?php if ($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==0&&$_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?>未评价<?php }elseif($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==1){?>已评价<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_status_name'];?>
<?php }?></div>
                        <!--<div class="img_right red">派送中</div>
                        <div class="img_right red">已付款</div>
                        <div class="img_right red">待处理</div>-->
                    </div>
                    <p class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M");?>
</p>
                </div>
            </div>
        </div>
    </div>
    <!--todo 待处理信息是否展示-->
    <div class="no_deal_with" >
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==5){?>
        <p class="because"><span class="name">事项：</span><span>申请退款</span></p>
        <p class="because"><span class="name">原因：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['cancel_reason'];?>
</span></p>
        <?php }?>
        <p class="customer_message"><span class="name">客户留言：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['user_remark'];?>
</span></p>
    </div>
    <!--todo 外卖订单列表展示-->
    <ul class="list_show order_list">
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commodity_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        
        <li class="order_list_detail goods-label-li" <?php if ($_smarty_tpl->tpl_vars['this']->value['property_value_one']!=''||$_smarty_tpl->tpl_vars['this']->value['property_value_two']!=''){?>style="padding-bottom:0.5rem;"<?php }?> >
        	<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['base_pic'];?>
"/>
            <div class="label goods-label">
            	<span class="label-name"><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</span>
            	<?php if ($_smarty_tpl->tpl_vars['this']->value['property_value_one']!=''||$_smarty_tpl->tpl_vars['this']->value['property_value_two']!=''){?>
            	<span class="label-type"><?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_one'];?>
<?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_two'];?>
</span>
             	<?php }?>
            </div>
            <div class="">
            	<span class="grey_number">X<?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</span>
            	<span class="label goods-price">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['commodity_price_sum'];?>
</span>
            </div>
        </li>
        
        <!--<li class="clearfix">
        	<div class="goods-label fl">
        		<span class="dishes"><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</span>
	            <sapn class="dishes-type">
	                <?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_one'];?>
<?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_two'];?>

	            </sapn>
        	</div>
            <p class="clearfix">
            	<span class="fl number">X<?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</span>
            	<span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['commodity_price_sum'];?>
</span>
            </p>
        </li>-->
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['box_fee']){?>
        <li class="clearfix make-box">
            <span class="fl dishes">餐盒费</span>
            <p class="clearfix fr"><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['box_fee'];?>
</span></p>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['delivery_fee']){?>
        <li class="clearfix send-box">
            <span class="fl dishes">配送费</span>
            <p class="clearfix fr"><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['delivery_fee'];?>
</span></p>
        </li>
        <?php }?>
        <!--<li class="clearfix">-->
            <!--<span class="fl dishes">黯然销魂饭</span>-->
            <!--<p class="clearfix fr"><span class="fl number">X5</span><span class="fr money">¥110</span></p>-->
        <!--</li>-->
        <!--<li class="clearfix">-->
            <!--<span class="fl dishes">黯然销魂饭</span>-->
            <!--<p class="clearfix fr"><span class="fl number">X5</span><span class="fr money">¥110</span></p>-->
        <!--</li>-->
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['discount_mins_id']!=0){?>
        <li class="privilege full merchant-favor">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>商家满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['discount_mins_num'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['platform_discount_id']!=0){?>
        <li class="privilege full platform-favor">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>平台满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['platform_discounts'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['coupon_id']!=0){?>
        <li class="privilege ticket-favor">
            <div class="left_control"><i class="icon_pic1 icon_ticket3x"></i><span>优惠券优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['coupon_amount'];?>
</div>
        </li>
        <?php }?>
    </ul>
</div>
<div class="total_money">实付：¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</div>
<!--todo 取消状态->删除订单-->
<div class="follow_operation_delete" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first red">删除订单</div>
</div>
<!--todo 派送中状态->联系客户-->
<div class="follow_operation_send" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==2){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer">联系客户</div>
</div>
<!--todo 已付款状态->打印小票  发货-->
<div class="follow_operation_payment" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==1){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer">联系客户</div>
    <div class="second red goods">发货</div>
</div>
<!--todo 待处理状态->联系客户 同意退款-->
<div class="follow_operation_processed" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==5){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer">联系客户</div>
    <div class="refused_refund second red">拒绝退款</div>
    <div class="first blue agreed_refund">同意退款</div>
</div>
<div class="follow_operation_payment">
	<div class="first blue print">打印小票</div>
</div>
<!--todo 配送信息-->
<div class="shipping_information">
    <p class="send_info">配送信息</p>
    <p class="send_limit"><span class="send_time">送达时间</span><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['arrive_time'],"%Y-%m-%d %H:%M");?>
</span></p>
    <div class="shipping_details send_limit">
        <div class="address">收货地址</div>
        <ul class="address_info">
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['realname'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['mobile'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['address'];?>
</li>
        </ul>
    </div>
</div>
<!--todo 订单信息-->
<div class="order_information">
    <p class="order_info">订单信息</p>
    <p class="order_control"><span class="order_left">订单号：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</span></p>
    <p class="order_control"><span class="order_left">下单时间</span><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span></p>
    <p class="order_control pay_style"><span class="order_left">支付方式</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['payway_name'];?>
</span></p>
</div>
<!--todo 删除地址提示-->
<div class="modal modal_del">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">确定要删除该地址？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">删除</div>
        </div>
    </div>
</div>
<!--todo　联系客户-->
<div class="phone_bot_wrap modal">
    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['user_address']->value['mobile'];?>
">呼叫<?php echo $_smarty_tpl->tpl_vars['user_address']->value['mobile'];?>
</a>
    <span class="cancel">取消</span>
</div>
<!--todo 发票打印中-->
<div class="modal_success">
    <div class="modal_content">
        <div class="tips_icon icon_success_b"></div>
        <p class="text">小票打印中</p>
    </div>
</div>
<!--todo　发货-->
<div class="modal modal_goods">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">外卖是否已经准备完善？</p>
        <div class="operation">
            <div class="cancel">等等发货</div>
            <div class="sure">立马发货</div>
        </div>
    </div>
</div>
<!--todo 同意退款-->
<div class="modal modal_refund">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">是否同意退款？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">确定</div>
        </div>
    </div>
</div>
<!--todo 拒绝退款-->
<div class="modal modal_no_refund">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">是否拒绝退款？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">确定</div>
        </div>
    </div>
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
    var order_id=<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
;
    var order_sn = '<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
';
</script>

<!--todo 公用的弹框控制-->
<script>
	$("#current_page_arrow").on("click",function(){
		history.go(-1);
	});
    /*todo 模态框通用的控制*/
    $('.modal').on('click',function(){
        $(this).hide();
        $('body').css('overflow','scroll');
    });
    /*todo 删除弹框的控制*/
    $('.modal .modal_content').on('click',function(){
        event.stopPropagation();/*todo 阻止冒泡*/
    });
    /*todo 点击弹框中的取消按钮*/
    $('.modal .cancel').on('click',function(){
        $('.modal').hide();
        $('body').css('overflow','scroll');
    });
</script>
<script>
    /*todo 删除订单*/
    $('.follow_operation_delete').on('click',function(){
        $('.modal_del').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_del .sure').on('click',function(){

    });
</script>
<script>
    /*todo 联系客户*/
    $('.ask_customer').on('click',function(){
        $('.phone_bot_wrap').show();
        $('body').css('overflow','hidden');
    });
</script>
<script>
	//打印数据
	function printContInfo(){
		var printCont = {
			'userInfo':'',
			'goodsInfo':'',
			'sendInfo':'',
			'orderInfo':''
		};
		//个人信息
		var userInfo = {
			'userName':'',
			'userImg':'',
			'userOrderTime':'',
			'userNote':''
		};
		userInfo.userName = $(".list_top .name").text();
		userInfo.userImg = $(".list_top .img-responsive").attr("src");
		userInfo.userOrderTime = $(".list_top .time").text();
		userInfo.userNote = $(".customer_message .name").text();
		//商品信息、餐盒费、配送费、商家满减优惠、平台满减优惠、优惠券优惠、实付
		var goodsInfo = {
			'goodsList':'',
			'priceInfo':{
				'makeBoxPrice':'',
				'sendPrice':'',
				'merchantFavor':'',
				'platformFavor':'',
				'ticketFavor':'',
				'totalPrice':'',
			}
		};
		var goodsList = [];
		if($(".order_list .make-box")){
			goodsInfo.priceInfo.makeBoxPrice = $(".make-box .money").text();
		}
		if($(".order_list .send-box")){
			goodsInfo.priceInfo.sendPrice = $(".send-box .money").text();
		}
		if($(".order_list .merchant-favor")){
			goodsInfo.priceInfo.merchantFavor = $(".merchant-favor .money").text();
		}
		if($(".order_list .platform-favor")){
			goodsInfo.priceInfo.platformFavor = $(".platform-favor .money").text();
		}
		if($(".order_list .ticket-favor")){
			goodsInfo.priceInfo.ticketFavor = $(".ticket-favor .money").text();
		}
		goodsInfo.priceInfo.totalPrice = $(".total_money").text();
		$(".order_list .order_list_detail").each(function(){
			var listInfo = {
				'goodsImg':$(this).find("img").attr("src"),
				'goodsName':$(this).find(".label-name").text(),
				'goodsType':'',
				'goodsNum':$(this).find(".grey_number").text(),
				'goodsPrice':$(this).find(".goods-price").text(),
			};
			if($(this).find(".label-type")){
				listInfo.goodsType = $(this).find(".label-type").text();
			}
			goodsList.push(listInfo);
		});
		goodsInfo.goodsList = goodsList;
		//配送信息
		var sendInfo = {
			'sendTime':$(".shipping_information .send_limit").find("span").eq(1).text(),
			'addressUserName':$(".address_info li").eq(0).text(),
			'addressUserTel':$(".address_info li").eq(1).text(),
			'addressName':$(".address_info li").eq(2).text()
		};
		//订单信息
		var orderInfo = {
			'orderNum':$(".order_information .order_control").eq(0).find('span').eq(1).text(),
			'orderTime':$(".order_information .order_control").eq(1).find('span').eq(1).text(),
			'orderPayType':$(".order_information .order_control").eq(2).find('span').eq(1).text(),
		};
		//printCont.userInfo = userInfo;
		//printCont.goodsInfo = goodsInfo;
		//printCont.sendInfo = sendInfo;
		//printCont.orderInfo = orderInfo;
		//printCont = JSON.stringify(printCont);

        printCont = {
            'userInfo':userInfo,
            'goodsInfo':goodsInfo,
            'sendInfo':sendInfo,
            'orderInfo':orderInfo
        };

		return printCont;
	}
    /*todo　打印小票*/
    $('.print').on('click',function(){
//        $('.modal_success').show();
//        $('body').css('overflow','hidden');
//        setTimeout(function(){
//            $('.modal_success').hide();
//        },1000)
		
		
		var content = printContInfo();
		console.log(content);
        native_listen('print_order',{
            "content":content,
            "order_sn":order_sn
        })

    });
</script>
<script type="text/javascript">
    /*todo 发货*/
    $('.goods').on('click',function(){
        $('.modal_goods').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_goods .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/deliver_goods",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    //show_alert('发货成功！');
                        $('.follow_operation_payment').hide();
                        $('.modal_goods').hide();
                        $('.follow_operation_send').show();
                        $('.img_right').html('已发货');
                        //window.location.href="/FrontUserCenter/my_order";

                }
                else if(d=="order_is_change"){
                    show_alert('订单状态已改变，请刷新！');
                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }else{
                    show_alert('失败！');
                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    });
</script>
<script>
    /*todo 同意退款*/
    $('.agreed_refund').on('click',function(){
        $('.modal_refund').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_refund .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/agree_cancel",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                console.log($.trim(d));
                if($.trim(d)=="success"){
                    console.log('come in');
                    show_alert('已退款！');
                    setTimeout(function(){
                        $('.modal_refund').hide();
                        $('.follow_operation_processed').hide();
                        $('.img_right').html('已退款');
                        //window.location.href="/FrontUserCenter/my_order";


                    },1000)
                }
                else{
                    console.log('come oo');
                    show_alert('同意退款失败，请联系客服！');

                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    });
</script>
<script>
    /*todo 拒绝退款*/
    $('.refused_refund').on('click',function(){
        $('.modal_no_refund').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_no_refund .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/refuse_cancel",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    //show_alert('拒绝！');
                    setTimeout(function(){
                        $('.modal_refund').hide();
                        $('.follow_operation_processed').hide();
                        $('.modal_no_refund').hide();
                        $('.img_right').html('总后台介入');
                        //window.location.href="/FrontUserCenter/my_order";


                    },1000)
                }
                else{
                    show_alert('失败！');
                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    });
</script>

<script>

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
	

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/order_detail.css?version={$version}"/>
<style type="text/css">
	.order_list_detail{
	    border-bottom: 1px solid #F1F4F7;
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
    	padding: 0.5rem 0.75rem 1rem 2rem;
    	position:relative;
	}
	.order_list_detail img{
		display:block;
		border:0;
		width:1.8rem;
		height:1.8rem;
		position:absolute;
		left:0;
		top:0.5rem;
	}
	.order_list .goods-label{
	    max-width: 60%;
	    display: flex;
	    display: -webkit-flex;
	    flex-direction: column;
	    -webkit-flex-direction: column;
	    justify-content: center;
	    -webkit-justify-content: center;
	    font-size: 0.9rem;
	    color: #333333;
	}
	.order_list .grey_number {
	    font-size: 0.6rem;
	    color: #999999;
	    margin-right: 2.5rem;
	}
	.order_list .label {
	    font-size: 0.9rem;
	    color: #333333;
	}
</style>


</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<header>
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>订单详情</h1>
</header>
<div class="content">
    <div class="list_top">
        <div class="img_info">
            <div class="img_left"><img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive"></div>
            <div class="img_middle">
                <div class="the_top">
                    <div class="top_state">
                        <p class="name"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</p>
                        <div class="img_right red"><?php if ($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==0&&$_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?>未评价<?php }elseif($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==1){?>已评价<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_status_name'];?>
<?php }?></div>
                        <!--<div class="img_right red">派送中</div>
                        <div class="img_right red">已付款</div>
                        <div class="img_right red">待处理</div>-->
                    </div>
                    <p class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M");?>
</p>
                </div>
            </div>
        </div>
    </div>
    <!--todo 待处理信息是否展示-->
    <div class="no_deal_with" >
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==5){?>
        <p class="because"><span class="name">事项：</span><span>申请退款</span></p>
        <p class="because"><span class="name">原因：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['cancel_reason'];?>
</span></p>
        <?php }?>
        <p class="customer_message"><span class="name">客户留言：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['user_remark'];?>
</span></p>
    </div>
    <!--todo 外卖订单列表展示-->
    <ul class="list_show order_list">
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commodity_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        
        <li class="order_list_detail goods-label-li" <?php if ($_smarty_tpl->tpl_vars['this']->value['property_value_one']!=''||$_smarty_tpl->tpl_vars['this']->value['property_value_two']!=''){?>style="padding-bottom:0.5rem;"<?php }?> >
        	<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['base_pic'];?>
"/>
            <div class="label goods-label">
            	<span class="label-name"><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</span>
            	<?php if ($_smarty_tpl->tpl_vars['this']->value['property_value_one']!=''||$_smarty_tpl->tpl_vars['this']->value['property_value_two']!=''){?>
            	<span class="label-type"><?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_one'];?>
<?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_two'];?>
</span>
             	<?php }?>
            </div>
            <div class="">
            	<span class="grey_number">X<?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</span>
            	<span class="label goods-price">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['commodity_price_sum'];?>
</span>
            </div>
        </li>
        
        <!--<li class="clearfix">
        	<div class="goods-label fl">
        		<span class="dishes"><?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>
</span>
	            <sapn class="dishes-type">
	                <?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_one'];?>
<?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_two'];?>

	            </sapn>
        	</div>
            <p class="clearfix">
            	<span class="fl number">X<?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</span>
            	<span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['commodity_price_sum'];?>
</span>
            </p>
        </li>-->
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['box_fee']){?>
        <li class="clearfix make-box">
            <span class="fl dishes">餐盒费</span>
            <p class="clearfix fr"><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['box_fee'];?>
</span></p>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['delivery_fee']){?>
        <li class="clearfix send-box">
            <span class="fl dishes">配送费</span>
            <p class="clearfix fr"><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['delivery_fee'];?>
</span></p>
        </li>
        <?php }?>
        <!--<li class="clearfix">-->
            <!--<span class="fl dishes">黯然销魂饭</span>-->
            <!--<p class="clearfix fr"><span class="fl number">X5</span><span class="fr money">¥110</span></p>-->
        <!--</li>-->
        <!--<li class="clearfix">-->
            <!--<span class="fl dishes">黯然销魂饭</span>-->
            <!--<p class="clearfix fr"><span class="fl number">X5</span><span class="fr money">¥110</span></p>-->
        <!--</li>-->
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['discount_mins_id']!=0){?>
        <li class="privilege full merchant-favor">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>商家满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['discount_mins_num'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['platform_discount_id']!=0){?>
        <li class="privilege full platform-favor">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>平台满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['platform_discounts'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['coupon_id']!=0){?>
        <li class="privilege ticket-favor">
            <div class="left_control"><i class="icon_pic1 icon_ticket3x"></i><span>优惠券优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['coupon_amount'];?>
</div>
        </li>
        <?php }?>
    </ul>
</div>
<div class="total_money">实付：¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</div>
<!--todo 取消状态->删除订单-->
<div class="follow_operation_delete" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first red">删除订单</div>
</div>
<!--todo 派送中状态->联系客户-->
<div class="follow_operation_send" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==2){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer">联系客户</div>
</div>
<!--todo 已付款状态->打印小票  发货-->
<div class="follow_operation_payment" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==1){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer">联系客户</div>
    <div class="second red goods">发货</div>
</div>
<!--todo 待处理状态->联系客户 同意退款-->
<div class="follow_operation_processed" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==5){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer">联系客户</div>
    <div class="refused_refund second red">拒绝退款</div>
    <div class="first blue agreed_refund">同意退款</div>
</div>
<div class="follow_operation_payment">
	<div class="first blue print">打印小票</div>
</div>
<!--todo 配送信息-->
<div class="shipping_information">
    <p class="send_info">配送信息</p>
    <p class="send_limit"><span class="send_time">送达时间</span><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['arrive_time'],"%Y-%m-%d %H:%M");?>
</span></p>
    <div class="shipping_details send_limit">
        <div class="address">收货地址</div>
        <ul class="address_info">
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['realname'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['mobile'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['address'];?>
</li>
        </ul>
    </div>
</div>
<!--todo 订单信息-->
<div class="order_information">
    <p class="order_info">订单信息</p>
    <p class="order_control"><span class="order_left">订单号：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</span></p>
    <p class="order_control"><span class="order_left">下单时间</span><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span></p>
    <p class="order_control pay_style"><span class="order_left">支付方式</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['payway_name'];?>
</span></p>
</div>
<!--todo 删除地址提示-->
<div class="modal modal_del">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">确定要删除该地址？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">删除</div>
        </div>
    </div>
</div>
<!--todo　联系客户-->
<div class="phone_bot_wrap modal">
    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['user_address']->value['mobile'];?>
">呼叫<?php echo $_smarty_tpl->tpl_vars['user_address']->value['mobile'];?>
</a>
    <span class="cancel">取消</span>
</div>
<!--todo 发票打印中-->
<div class="modal_success">
    <div class="modal_content">
        <div class="tips_icon icon_success_b"></div>
        <p class="text">小票打印中</p>
    </div>
</div>
<!--todo　发货-->
<div class="modal modal_goods">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">外卖是否已经准备完善？</p>
        <div class="operation">
            <div class="cancel">等等发货</div>
            <div class="sure">立马发货</div>
        </div>
    </div>
</div>
<!--todo 同意退款-->
<div class="modal modal_refund">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">是否同意退款？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">确定</div>
        </div>
    </div>
</div>
<!--todo 拒绝退款-->
<div class="modal modal_no_refund">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">是否拒绝退款？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">确定</div>
        </div>
    </div>
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
    var order_id=<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
;
    var order_sn = '<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
';
</script>

<!--todo 公用的弹框控制-->
<script>
	$("#current_page_arrow").on("click",function(){
		history.go(-1);
	});
    /*todo 模态框通用的控制*/
    $('.modal').on('click',function(){
        $(this).hide();
        $('body').css('overflow','scroll');
    });
    /*todo 删除弹框的控制*/
    $('.modal .modal_content').on('click',function(){
        event.stopPropagation();/*todo 阻止冒泡*/
    });
    /*todo 点击弹框中的取消按钮*/
    $('.modal .cancel').on('click',function(){
        $('.modal').hide();
        $('body').css('overflow','scroll');
    });
</script>
<script>
    /*todo 删除订单*/
    $('.follow_operation_delete').on('click',function(){
        $('.modal_del').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_del .sure').on('click',function(){

    });
</script>
<script>
    /*todo 联系客户*/
    $('.ask_customer').on('click',function(){
        $('.phone_bot_wrap').show();
        $('body').css('overflow','hidden');
    });
</script>
<script>
	//打印数据
	function printContInfo(){
		var printCont = {
			'userInfo':'',
			'goodsInfo':'',
			'sendInfo':'',
			'orderInfo':''
		};
		//个人信息
		var userInfo = {
			'userName':'',
			'userImg':'',
			'userOrderTime':'',
			'userNote':''
		};
		userInfo.userName = $(".list_top .name").text();
		userInfo.userImg = $(".list_top .img-responsive").attr("src");
		userInfo.userOrderTime = $(".list_top .time").text();
		userInfo.userNote = $(".customer_message .name").text();
		//商品信息、餐盒费、配送费、商家满减优惠、平台满减优惠、优惠券优惠、实付
		var goodsInfo = {
			'goodsList':'',
			'priceInfo':{
				'makeBoxPrice':'',
				'sendPrice':'',
				'merchantFavor':'',
				'platformFavor':'',
				'ticketFavor':'',
				'totalPrice':'',
			}
		};
		var goodsList = [];
		if($(".order_list .make-box")){
			goodsInfo.priceInfo.makeBoxPrice = $(".make-box .money").text();
		}
		if($(".order_list .send-box")){
			goodsInfo.priceInfo.sendPrice = $(".send-box .money").text();
		}
		if($(".order_list .merchant-favor")){
			goodsInfo.priceInfo.merchantFavor = $(".merchant-favor .money").text();
		}
		if($(".order_list .platform-favor")){
			goodsInfo.priceInfo.platformFavor = $(".platform-favor .money").text();
		}
		if($(".order_list .ticket-favor")){
			goodsInfo.priceInfo.ticketFavor = $(".ticket-favor .money").text();
		}
		goodsInfo.priceInfo.totalPrice = $(".total_money").text();
		$(".order_list .order_list_detail").each(function(){
			var listInfo = {
				'goodsImg':$(this).find("img").attr("src"),
				'goodsName':$(this).find(".label-name").text(),
				'goodsType':'',
				'goodsNum':$(this).find(".grey_number").text(),
				'goodsPrice':$(this).find(".goods-price").text(),
			};
			if($(this).find(".label-type")){
				listInfo.goodsType = $(this).find(".label-type").text();
			}
			goodsList.push(listInfo);
		});
		goodsInfo.goodsList = goodsList;
		//配送信息
		var sendInfo = {
			'sendTime':$(".shipping_information .send_limit").find("span").eq(1).text(),
			'addressUserName':$(".address_info li").eq(0).text(),
			'addressUserTel':$(".address_info li").eq(1).text(),
			'addressName':$(".address_info li").eq(2).text()
		};
		//订单信息
		var orderInfo = {
			'orderNum':$(".order_information .order_control").eq(0).find('span').eq(1).text(),
			'orderTime':$(".order_information .order_control").eq(1).find('span').eq(1).text(),
			'orderPayType':$(".order_information .order_control").eq(2).find('span').eq(1).text(),
		};
		//printCont.userInfo = userInfo;
		//printCont.goodsInfo = goodsInfo;
		//printCont.sendInfo = sendInfo;
		//printCont.orderInfo = orderInfo;
		//printCont = JSON.stringify(printCont);

        printCont = {
            'userInfo':userInfo,
            'goodsInfo':goodsInfo,
            'sendInfo':sendInfo,
            'orderInfo':orderInfo
        };

		return printCont;
	}
    /*todo　打印小票*/
    $('.print').on('click',function(){
//        $('.modal_success').show();
//        $('body').css('overflow','hidden');
//        setTimeout(function(){
//            $('.modal_success').hide();
//        },1000)
		
		
		var content = printContInfo();
		console.log(content);
        native_listen('print_order',{
            "content":content,
            "order_sn":order_sn
        })

    });
</script>
<script type="text/javascript">
    /*todo 发货*/
    $('.goods').on('click',function(){
        $('.modal_goods').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_goods .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/deliver_goods",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    //show_alert('发货成功！');
                        $('.follow_operation_payment').hide();
                        $('.modal_goods').hide();
                        $('.follow_operation_send').show();
                        $('.img_right').html('已发货');
                        //window.location.href="/FrontUserCenter/my_order";

                }
                else if(d=="order_is_change"){
                    show_alert('订单状态已改变，请刷新！');
                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }else{
                    show_alert('失败！');
                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    });
</script>
<script>
    /*todo 同意退款*/
    $('.agreed_refund').on('click',function(){
        $('.modal_refund').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_refund .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/agree_cancel",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                console.log($.trim(d));
                if($.trim(d)=="success"){
                    console.log('come in');
                    show_alert('已退款！');
                    setTimeout(function(){
                        $('.modal_refund').hide();
                        $('.follow_operation_processed').hide();
                        $('.img_right').html('已退款');
                        //window.location.href="/FrontUserCenter/my_order";


                    },1000)
                }
                else{
                    console.log('come oo');
                    show_alert('同意退款失败，请联系客服！');

                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    });
</script>
<script>
    /*todo 拒绝退款*/
    $('.refused_refund').on('click',function(){
        $('.modal_no_refund').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_no_refund .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/refuse_cancel",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    //show_alert('拒绝！');
                    setTimeout(function(){
                        $('.modal_refund').hide();
                        $('.follow_operation_processed').hide();
                        $('.modal_no_refund').hide();
                        $('.img_right').html('总后台介入');
                        //window.location.href="/FrontUserCenter/my_order";


                    },1000)
                }
                else{
                    show_alert('失败！');
                    setTimeout(function(){
                        $('.modal_content').hide();

                    },1000)
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    });
</script>

<script>

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