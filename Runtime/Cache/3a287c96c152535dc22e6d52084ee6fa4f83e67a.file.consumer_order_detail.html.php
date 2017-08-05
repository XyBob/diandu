<?php /* Smarty version Smarty-3.1.6, created on 2017-07-21 16:29:44
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\consumer_order_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:55605971bb783585e2-69351114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a287c96c152535dc22e6d52084ee6fa4f83e67a' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\consumer_order_detail.html',
      1 => 1498817384,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55605971bb783585e2-69351114',
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
  'unifunc' => 'content_5971bb7915336',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5971bb7915336')) {function content_5971bb7915336($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/consumer_order_detail.css?version={$version}"/>
<style type="text/css">
	.list_show .goods-li{
		height:100%;
		display:flex;
		display:-webkit-flex;
		align-items:center;
		-webkit-align-items:center;
		justify-content:space-between;
		-webkit-justify-content:space-between;
	    padding: 0.6rem 0.75rem 1.3rem 2rem;
	    box-sizing:border-box;
    	border-bottom: 1px solid #F1F4F7;
    	position:relative;
	}
	.list_show .goods-li .dishes{
		max-width:60%;
		display:flex;
		display:-webkit-flex;
		flex-direction:column;
		-webkit-flex-direction:column;
		justify-content:center;
		-webkit-justify-content:center;
	}
	.dishes .dishes-name{
		max-width:100%;
	}
	.dishes .dishes-type{
		font-size:0.6rem;
		color:#999;
	}
	.list_show .goods-li img{
		display:block;
		border:0;
		width:1.8rem;
		height:1.8rem;
		position:absolute;
		left:0;
		top:0.6rem;
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
            <div class="img_left"><img src="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
" class="img-responsive"></div>
            <div class="img_middle">
                <div class="the_top">
                    <div class="top_state">
                        <p class="name"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</p>
                        <div class="img_right red"> <?php if ($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==0&&$_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?>待评价<?php }elseif($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==1){?>已评价<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_status_name'];?>
<?php }?></div>
                        <!--<div class="img_right red">等待送达</div>
                        <div class="img_right red">待评价</div>
                        <div class="img_right red">未付款</div>
                        <div class="img_right red">已完成</div>
                        <div class="img_right red">已付款</div>-->
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
        <p class="customer_message"><span class="name">备注：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['user_remark'];?>
</span></p>
    </div>
    <!--todo 外卖订单列表展示-->
    <ul class="list_show">
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commodity_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        <li class="goods-li" <?php if ($_smarty_tpl->tpl_vars['this']->value['property_value_one']){?> style="padding-bottom:0.6rem;"}<?php }?>>
        	<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['base_pic'];?>
"/>
            <div class="fl dishes">
            	<span class="dishes-name">
            		<?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>

            	</span>
            	<sapn class="dishes-type">
                    <?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_one'];?>
<?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_two'];?>

            	</sapn>
            </div>
            <p class="fr clearfix">
            	<span class="fl number">X<?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</span>
            	<span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['commodity_price_sum'];?>
</span>
            </p>
        </li>
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['box_fee']->value){?>
        <li class="clearfix">
            <span class="fl dishes">餐盒费</span>
            </span><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['box_fee']->value;?>
</span></p>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['delivery_fee']){?>
        <li class="clearfix">
            <span class="fl dishes">配送费</span>
            </span><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['delivery_fee'];?>
</span></p>
        </li>
        <?php }?>
        <!--<li class="clearfix">-->
            <!--<span class="fl dishes">黯然销魂饭</span>-->
            <!--<p class="clearfix fr"><span class="fl number">X5</span><span class="fr money">¥110</span></p>-->
        <!--</li>-->
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['discount_mins_id']!=0){?>
        <li class="privilege full">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>商家满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['discount_mins_num'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['platform_discount_id']!=0){?>
        <li class="privilege full">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>平台满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['platform_discounts'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['coupon_id']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_ticket3x"></i><span>优惠券优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['coupon_amount'];?>
</div>
        </li>
        <?php }?>
    </ul>
</div>
<div class="total_money">实付：¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</div>

<!--todo 已取消状态->删除订单-->
<div class="follow_operation_delete operation_state_control" id="is_cancel" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==4){?> <?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="first red delete">删除订单</div>
</div>

<!--todo 等待送达->联系商家-->
<div class="follow_operation_send operation_state_control" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==2){?><?php }else{ ?>style="display:none" <?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="first red goods_sure">确认收货</div>
</div>


<!--todo 待评价->评价-->
<div class="follow_operation_payment operation_state_control"<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==3&&$_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==0){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="first red" id="evaluation">评价</div>
</div>

<!--todo 未付款->付款-->

<div class="follow_operation_processed operation_state_control"<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==0){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer" id="cancel_no_pay">取消</div>
    <form action="/FrontOrder/create_order_and_pay" id="myform" method="post">
        <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
">
        <div class="first red agreed_refund">付款</div>
    </form>
</div>


<!--todo　已经完成-->
<div class="have_finished operation_state_control" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?><?php }else{ ?>style="display:none"<?php }?>>
    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==1){?>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="delete first red">删除</div>
    <?php }?>

</div>


<!--todo 已经付款-->
<div class="have_payment operation_state_control" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==1){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="cancel_order first red">取消订单</div>
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
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['province'];?>
<?php echo $_smarty_tpl->tpl_vars['user_address']->value['city'];?>
<?php echo $_smarty_tpl->tpl_vars['user_address']->value['area'];?>
<?php echo $_smarty_tpl->tpl_vars['user_address']->value['address'];?>
</li>
        </ul>
    </div>
</div>
<!--todo 订单信息-->
<div class="order_information">
    <p class="order_info">订单信息</p>
    <p class="order_control"><span class="order_left">订单号：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</span></p>
    <p class="order_control"><span class="order_left">下单时间</span><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M");?>
</span></p>
    <p class="order_control pay_style"><span class="order_left">支付方式</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['payway_name'];?>
</span></p>
</div>
<!--todo 删除订单提示-->
<div class="modal modal_del">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">确定要删除该订单？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">删除</div>
        </div>
    </div>
</div>
<!--todo　联系商家-->
<div class="phone_bot_wrap modal">
    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
">呼叫<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
</a>
    <span class="cancel">取消</span>
</div>
<!--todo 收货成功-->
<div class="modal_success">
    <div class="modal_content">
        <div class="tips_icon icon_success_b"></div>
        <p class="text">确认收货成功</p>
    </div>
</div>
<!--todo 取消订单-->
<div class="modal_choose cancel modal">
    <div class="content">
        <div class="title">取消订单？</div>
        <div class="scroll_answer_list">
            <ul class="answer_choose_list">
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">不想买了</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">拍错了，取消重拍</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">晚点买</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">其他</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
            </ul>
        </div>
        <div class="modal_fixed clearfix">
            <div class="fl text-center">
                <div class="modal_confirm">确认</div>
            </div>
            <div class="fl text-center">
                <div class="cancel">取消</div>
            </div>
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
    order_id=<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
;
    var cancel_reason='';
    //console.log(order_id);
</script>

<!--todo 公用的弹框控制-->
<script>
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
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
</script>
<script>
    /*todo 删除订单*/
    $('.operation_state_control .delete').on('click',function(){
        $('.modal_del').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_del .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/del_order",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    show_alert('删除成功！');
                    setTimeout(function(){
                        $('.modal_alert').hide();
                        window.location.href="/FrontUserCenter/my_order";

                    },1000)
                }
                else{
                    show_alert('删除失败！');
                    setTimeout(function(){
                        $('.modal_alert').hide();
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
    /*todo 评价商家*/
    $('#evaluation').on('click',function () {
        window.location.href='/FrontUserCenter/evaluation/order_id/'+order_id;
    })
    /*todo 联系商家*/
    $('.ask_merchants').on('click',function(){
        $('.phone_bot_wrap').show();
        $('body').css('overflow','hidden');
    });
</script>
<script>
    /*todo　确认收货*/
    $('.goods_sure').on('click',function(){
        $('.modal_success').show();
        $('body').css('overflow','hidden');
        $('.img_right').html('待评价');
        setTimeout(function(){
            $('.modal_success').hide();
        },1000)
        $('.follow_operation_send').hide();
        $('.have_finished').show();
        $('.follow_operation_payment').show();
        $.ajax({
            url:"/FrontOrder/confirm_goods",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    console.log(d);
                }
                else{
                    console.log(d);
                }
            },
            error:function(e){
                console.log(e);
            }
        })

    });
</script>
<script>
    var is_insert=1;
    /*todo 付款*/
    $('.agreed_refund').on('click',function(){
            location.href="/FrontOrder/create_order_and_pay/order_id/"+order_id;
    });
</script>
<script >
    var why='';
    $(".circle_out").on("click",function(){
         why = $(this).siblings().html();
         console.log(why)
    });
</script>
<script>
    /*todo 取消已付款订单*/
    $('.have_payment .cancel_order').on('click',function(){
        $('.modal_choose.cancel').show().css('display','flex');
        $('body').css('overflow','hidden');
    });
    $('.modal_confirm').on('click',function(){
        $.ajax({
            url:"/FrontOrder/cancel_the_payment_order",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
                cancel_reason:cancel_reason,
            },
            success:function(d){
                if(d=="success"){
                    //$('.img_right').html('');
                    $('.modal_choose').hide();
                    $('.operation_state_control').hide();
                    $('.img_right').html('退款中');

                }
                else if(d=="success_no"){
                    $('.modal_choose').hide();
                    $('.operation_state_control').hide();
                    $('.img_right').html('已取消');
                    setTimeout(function(){
                        show_alert('订单取消成功');
                    },1000);
                    $('#is_cancel').show();
                }
                else if(d=="order_is_change"){
                    $('.modal_choose').hide();
                    setTimeout(function(){
                        show_alert('订单状态已改变，请刷新');
                    },1000);
                }
            },
            error:function(e){
                console.log(e);
            }
        })

    });
    /*todo 取消未付款订单*/
    $('.ask_customer').on('click',function(){
        $('.modal_choose.cancel').show().css('display','flex');
        $('body').css('overflow','hidden');
    });

    $('.scroll_answer_list .show_choose').on('click',function(){
        $(this).addClass('active').siblings().removeClass('active');
        cancel_reason=$(this).children(":first").text();
        $(this).find('.icon_market').addClass('icon_selected_b');
        $(this).siblings().find('.icon_market').removeClass('icon_selected_b');
    });
    /*todo 删除弹框的控制*/
    $('.modal_choose.cancel .content').on('click',function(){
        event.stopPropagation();/*todo 阻止冒泡*/
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
	

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/consumer_order_detail.css?version={$version}"/>
<style type="text/css">
	.list_show .goods-li{
		height:100%;
		display:flex;
		display:-webkit-flex;
		align-items:center;
		-webkit-align-items:center;
		justify-content:space-between;
		-webkit-justify-content:space-between;
	    padding: 0.6rem 0.75rem 1.3rem 2rem;
	    box-sizing:border-box;
    	border-bottom: 1px solid #F1F4F7;
    	position:relative;
	}
	.list_show .goods-li .dishes{
		max-width:60%;
		display:flex;
		display:-webkit-flex;
		flex-direction:column;
		-webkit-flex-direction:column;
		justify-content:center;
		-webkit-justify-content:center;
	}
	.dishes .dishes-name{
		max-width:100%;
	}
	.dishes .dishes-type{
		font-size:0.6rem;
		color:#999;
	}
	.list_show .goods-li img{
		display:block;
		border:0;
		width:1.8rem;
		height:1.8rem;
		position:absolute;
		left:0;
		top:0.6rem;
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
            <div class="img_left"><img src="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
" class="img-responsive"></div>
            <div class="img_middle">
                <div class="the_top">
                    <div class="top_state">
                        <p class="name"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</p>
                        <div class="img_right red"> <?php if ($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==0&&$_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?>待评价<?php }elseif($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==1){?>已评价<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_status_name'];?>
<?php }?></div>
                        <!--<div class="img_right red">等待送达</div>
                        <div class="img_right red">待评价</div>
                        <div class="img_right red">未付款</div>
                        <div class="img_right red">已完成</div>
                        <div class="img_right red">已付款</div>-->
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
        <p class="customer_message"><span class="name">备注：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['user_remark'];?>
</span></p>
    </div>
    <!--todo 外卖订单列表展示-->
    <ul class="list_show">
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commodity_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        <li class="goods-li" <?php if ($_smarty_tpl->tpl_vars['this']->value['property_value_one']){?> style="padding-bottom:0.6rem;"}<?php }?>>
        	<img src="<?php echo $_smarty_tpl->tpl_vars['this']->value['base_pic'];?>
"/>
            <div class="fl dishes">
            	<span class="dishes-name">
            		<?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>

            	</span>
            	<sapn class="dishes-type">
                    <?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_one'];?>
<?php echo $_smarty_tpl->tpl_vars['this']->value['property_value_two'];?>

            	</sapn>
            </div>
            <p class="fr clearfix">
            	<span class="fl number">X<?php echo $_smarty_tpl->tpl_vars['this']->value['number'];?>
</span>
            	<span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['commodity_price_sum'];?>
</span>
            </p>
        </li>
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['box_fee']->value){?>
        <li class="clearfix">
            <span class="fl dishes">餐盒费</span>
            </span><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['box_fee']->value;?>
</span></p>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['delivery_fee']){?>
        <li class="clearfix">
            <span class="fl dishes">配送费</span>
            </span><span class="fr money">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['delivery_fee'];?>
</span></p>
        </li>
        <?php }?>
        <!--<li class="clearfix">-->
            <!--<span class="fl dishes">黯然销魂饭</span>-->
            <!--<p class="clearfix fr"><span class="fl number">X5</span><span class="fr money">¥110</span></p>-->
        <!--</li>-->
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['discount_mins_id']!=0){?>
        <li class="privilege full">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>商家满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['discount_mins_num'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['platform_discount_id']!=0){?>
        <li class="privilege full">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>平台满减优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['platform_discounts'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order_info']->value['coupon_id']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_ticket3x"></i><span>优惠券优惠</span></div>
            <div class="money">- ¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['coupon_amount'];?>
</div>
        </li>
        <?php }?>
    </ul>
</div>
<div class="total_money">实付：¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</div>

<!--todo 已取消状态->删除订单-->
<div class="follow_operation_delete operation_state_control" id="is_cancel" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==4){?> <?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="first red delete">删除订单</div>
</div>

<!--todo 等待送达->联系商家-->
<div class="follow_operation_send operation_state_control" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==2){?><?php }else{ ?>style="display:none" <?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="first red goods_sure">确认收货</div>
</div>


<!--todo 待评价->评价-->
<div class="follow_operation_payment operation_state_control"<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==3&&$_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==0){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="first red" id="evaluation">评价</div>
</div>

<!--todo 未付款->付款-->

<div class="follow_operation_processed operation_state_control"<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==0){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_customer" id="cancel_no_pay">取消</div>
    <form action="/FrontOrder/create_order_and_pay" id="myform" method="post">
        <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
">
        <div class="first red agreed_refund">付款</div>
    </form>
</div>


<!--todo　已经完成-->
<div class="have_finished operation_state_control" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==3){?><?php }else{ ?>style="display:none"<?php }?>>
    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['is_evaluate']==1){?>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="delete first red">删除</div>
    <?php }?>

</div>


<!--todo 已经付款-->
<div class="have_payment operation_state_control" <?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==1){?><?php }else{ ?>style="display:none"<?php }?>>
    <div class="first grey ask_merchants">联系商家</div>
    <div class="cancel_order first red">取消订单</div>
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
            <li><?php echo $_smarty_tpl->tpl_vars['user_address']->value['province'];?>
<?php echo $_smarty_tpl->tpl_vars['user_address']->value['city'];?>
<?php echo $_smarty_tpl->tpl_vars['user_address']->value['area'];?>
<?php echo $_smarty_tpl->tpl_vars['user_address']->value['address'];?>
</li>
        </ul>
    </div>
</div>
<!--todo 订单信息-->
<div class="order_information">
    <p class="order_info">订单信息</p>
    <p class="order_control"><span class="order_left">订单号：</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</span></p>
    <p class="order_control"><span class="order_left">下单时间</span><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M");?>
</span></p>
    <p class="order_control pay_style"><span class="order_left">支付方式</span><span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['payway_name'];?>
</span></p>
</div>
<!--todo 删除订单提示-->
<div class="modal modal_del">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">确定要删除该订单？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure">删除</div>
        </div>
    </div>
</div>
<!--todo　联系商家-->
<div class="phone_bot_wrap modal">
    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
">呼叫<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
</a>
    <span class="cancel">取消</span>
</div>
<!--todo 收货成功-->
<div class="modal_success">
    <div class="modal_content">
        <div class="tips_icon icon_success_b"></div>
        <p class="text">确认收货成功</p>
    </div>
</div>
<!--todo 取消订单-->
<div class="modal_choose cancel modal">
    <div class="content">
        <div class="title">取消订单？</div>
        <div class="scroll_answer_list">
            <ul class="answer_choose_list">
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">不想买了</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">拍错了，取消重拍</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">晚点买</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">其他</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
            </ul>
        </div>
        <div class="modal_fixed clearfix">
            <div class="fl text-center">
                <div class="modal_confirm">确认</div>
            </div>
            <div class="fl text-center">
                <div class="cancel">取消</div>
            </div>
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
    order_id=<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
;
    var cancel_reason='';
    //console.log(order_id);
</script>

<!--todo 公用的弹框控制-->
<script>
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
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
</script>
<script>
    /*todo 删除订单*/
    $('.operation_state_control .delete').on('click',function(){
        $('.modal_del').show();
        $('body').css('overflow','hidden');
    });
    $('.modal_del .sure').on('click',function(){
        $.ajax({
            url:"/FrontOrder/del_order",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    show_alert('删除成功！');
                    setTimeout(function(){
                        $('.modal_alert').hide();
                        window.location.href="/FrontUserCenter/my_order";

                    },1000)
                }
                else{
                    show_alert('删除失败！');
                    setTimeout(function(){
                        $('.modal_alert').hide();
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
    /*todo 评价商家*/
    $('#evaluation').on('click',function () {
        window.location.href='/FrontUserCenter/evaluation/order_id/'+order_id;
    })
    /*todo 联系商家*/
    $('.ask_merchants').on('click',function(){
        $('.phone_bot_wrap').show();
        $('body').css('overflow','hidden');
    });
</script>
<script>
    /*todo　确认收货*/
    $('.goods_sure').on('click',function(){
        $('.modal_success').show();
        $('body').css('overflow','hidden');
        $('.img_right').html('待评价');
        setTimeout(function(){
            $('.modal_success').hide();
        },1000)
        $('.follow_operation_send').hide();
        $('.have_finished').show();
        $('.follow_operation_payment').show();
        $.ajax({
            url:"/FrontOrder/confirm_goods",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
            },
            success:function(d){
                if(d=="success"){
                    console.log(d);
                }
                else{
                    console.log(d);
                }
            },
            error:function(e){
                console.log(e);
            }
        })

    });
</script>
<script>
    var is_insert=1;
    /*todo 付款*/
    $('.agreed_refund').on('click',function(){
            location.href="/FrontOrder/create_order_and_pay/order_id/"+order_id;
    });
</script>
<script >
    var why='';
    $(".circle_out").on("click",function(){
         why = $(this).siblings().html();
         console.log(why)
    });
</script>
<script>
    /*todo 取消已付款订单*/
    $('.have_payment .cancel_order').on('click',function(){
        $('.modal_choose.cancel').show().css('display','flex');
        $('body').css('overflow','hidden');
    });
    $('.modal_confirm').on('click',function(){
        $.ajax({
            url:"/FrontOrder/cancel_the_payment_order",
            type:"POST",
            dataType:"text",
            data:{
                order_id:order_id,
                cancel_reason:cancel_reason,
            },
            success:function(d){
                if(d=="success"){
                    //$('.img_right').html('');
                    $('.modal_choose').hide();
                    $('.operation_state_control').hide();
                    $('.img_right').html('退款中');

                }
                else if(d=="success_no"){
                    $('.modal_choose').hide();
                    $('.operation_state_control').hide();
                    $('.img_right').html('已取消');
                    setTimeout(function(){
                        show_alert('订单取消成功');
                    },1000);
                    $('#is_cancel').show();
                }
                else if(d=="order_is_change"){
                    $('.modal_choose').hide();
                    setTimeout(function(){
                        show_alert('订单状态已改变，请刷新');
                    },1000);
                }
            },
            error:function(e){
                console.log(e);
            }
        })

    });
    /*todo 取消未付款订单*/
    $('.ask_customer').on('click',function(){
        $('.modal_choose.cancel').show().css('display','flex');
        $('body').css('overflow','hidden');
    });

    $('.scroll_answer_list .show_choose').on('click',function(){
        $(this).addClass('active').siblings().removeClass('active');
        cancel_reason=$(this).children(":first").text();
        $(this).find('.icon_market').addClass('icon_selected_b');
        $(this).siblings().find('.icon_market').removeClass('icon_selected_b');
    });
    /*todo 删除弹框的控制*/
    $('.modal_choose.cancel .content').on('click',function(){
        event.stopPropagation();/*todo 阻止冒泡*/
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