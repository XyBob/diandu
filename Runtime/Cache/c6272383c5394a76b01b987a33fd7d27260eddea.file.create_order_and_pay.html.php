<?php /* Smarty version Smarty-3.1.6, created on 2017-07-14 16:20:35
         compiled from "C:\wamp\www\diandu\Tpl\FrontOrder\create_order_and_pay.html" */ ?>
<?php /*%%SmartyHeaderCode:3213159672d09258391-55764892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6272383c5394a76b01b987a33fd7d27260eddea' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontOrder\\create_order_and_pay.html',
      1 => 1500020432,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3213159672d09258391-55764892',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59672d0980181',
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
<?php if ($_valid && !is_callable('content_59672d0980181')) {function content_59672d0980181($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/buy_bill.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<style type="text/css">
    body {
        background: #fff;
    }
    .pay_detail_title{
    	padding-left:2.6rem;
    }
    /*--顶部返回按钮--*/
	#current_page_arrow{
		width:1.2rem;
		height:1.2rem;
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
	
<div class="pay_detail_wrap">
	<div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h3 class="pay_detail_title">支付订单</h3>
    <ul class="pay_detail">
        <li class="pay_money" id="amount" amount="0.01">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</li>
        <li class="pay_shop"><?php echo $_smarty_tpl->tpl_vars['business_name']->value;?>
</li>
        <li class="pay_order_number">买单订单号：<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</li>
    </ul>
</div>
<ul class="pay_type_wrap">
    <li class="pay_type_list" pay_way="wx">
        <i class="icon_pic1 icon_wechatpay3x"></i>

        <div class="type_intro">
            <p class="type_name">微信支付</p>

            <p class="pay_intro">推荐安装微信5.0及以上版本的用户使用</p>
        </div>
        <i class="icon_pic1 icon_select3x type_select"></i>
    </li>
   <!-- <li class="pay_type_list" pay_way="wallet">
        <i class="person_page_img icon_yuezhif"></i>

        <div class="type_intro">
            <p class="type_name">余额支付</p>

            <p class="pay_intro">推荐使用</p>
        </div>
        <i class="icon_pic1 icon_select3x type_select type_select_none"></i>
    </li>-->
    <?php if ($_smarty_tpl->tpl_vars['ua']->value!='Wx'){?>
    <li class="pay_type_list" pay_way="ali">
        <i class="person_page_img icon_yuezhif"></i>

        <div class="type_intro">
            <p class="type_name">支付宝支付</p>

            <p class="pay_intro">推荐使用</p>
        </div>
        <i class="icon_pic1 icon_select3x type_select type_select_none"></i>
    </li>
    <?php }?>
</ul>
<!--确认支付-->
<a href="javascript:;" class="pay_bill_btn" onclick="pay()">确认支付</a>

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
    var order_id = '<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
';
    var ua = '<?php echo $_smarty_tpl->tpl_vars['ua']->value;?>
';
    var business_id = '<?php echo $_smarty_tpl->tpl_vars['business_id']->value;?>
';
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
    var pay_way = 'wx';
    //点击选择支付方式
    $(".pay_type_list").on("click", function () {
        pay_way = $(this).attr('pay_way');
        $(this).children(".type_select").removeClass("type_select_none");
        $(this).siblings().children(".type_select").addClass("type_select_none");
    });

    function pay() {
        var url = '/FrontMerchantOrder/get_wx_param';
        var coin_num = $('#amount').attr("amount");
        if (coin_num > 0) {//获取微信支付参数
            if (pay_way == 'wx') {
                if(ua=='Wx'){
                    url = "/FrontMerchantOrder/get_wx_param";//用微信打开+微信支付
                }else{
                    url = "/FrontMerchantOrder/get_mobile_wxpay_param";//用app打开+微信支付
                }
            } else if(pay_way == 'ali'){
               // url = "/FrontMerchantOrder/wallet_pay";//钱包支付
                url = "/FrontMerchantOrder/get_mobile_alipay_param";
            }
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: {
                    coin_num: coin_num,
                    order_id: order_id,
                    business_id:business_id,
                },
                timeout: 10000,
                success: function (d) {
                    console.log(d);
                    if (pay_way == 'wx') {
                        if(ua=='Wx'){//用微信打开+微信支付
                            if (d.code == 0) {
                                //微信支付
                                jsApiParameters = d.msg;
                                callpay();
                            } else {
                                show_alert(d.msg);
                            }


                        }else{//用app打开+微信支付
                            if (d) {
                                var pay_param = d;
                                native_listen('wx_pay',{
                                    parameter : pay_param,
                                });
                            } else {
                                show_alert(d.msg);
                            }
                        }

                    }else if(pay_way == 'ali'){
                        if(d)
                        {
                            console.log(111);
                            var pay_param = d;
                            native_listen('ali_pay',{
                                parameter : pay_param,
                            });
                        }else{
                            show_alert("支付失败");
                        }
                        $(".pay_loading").hide();
                    }else if(pay_way=='wallet'){
                        if(d.code==1) {
                            show_alert(d.msg);
                            location.href = '/FrontOrder/pay_success/order_id/' + order_id;
                        }else{
                            show_alert(d.msg);
                        }
                        $(".pay_loading").hide();
                    }
                    $(".pay_loading").hide();
                },
                error: function (e) {
                    console.log(e);
                    $(".pay_loading").hide();
                    show_alert("error:" + e.msg);
                }
            });
        } else {
            show_alert('金额错误');
        }
    }
    function callpay() {
        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            } else if (document.attachEvent) {
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        } else {
            jsApiCall();
        }
    }


    function jsApiCall() {
        //alert(jsApiParameters);
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                jQuery.parseJSON(jsApiParameters),
                function (res) {
                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                        //后续操作
                        location.href = '/FrontOrder/pay_success/order_id/' + order_id;
                    }
                    else {
                    }
                }
        );
    }


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
	
<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/buy_bill.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<style type="text/css">
    body {
        background: #fff;
    }
    .pay_detail_title{
    	padding-left:2.6rem;
    }
    /*--顶部返回按钮--*/
	#current_page_arrow{
		width:1.2rem;
		height:1.2rem;
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

	
<div class="pay_detail_wrap">
	<div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h3 class="pay_detail_title">支付订单</h3>
    <ul class="pay_detail">
        <li class="pay_money" id="amount" amount="0.01">¥<?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</li>
        <li class="pay_shop"><?php echo $_smarty_tpl->tpl_vars['business_name']->value;?>
</li>
        <li class="pay_order_number">买单订单号：<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</li>
    </ul>
</div>
<ul class="pay_type_wrap">
    <li class="pay_type_list" pay_way="wx">
        <i class="icon_pic1 icon_wechatpay3x"></i>

        <div class="type_intro">
            <p class="type_name">微信支付</p>

            <p class="pay_intro">推荐安装微信5.0及以上版本的用户使用</p>
        </div>
        <i class="icon_pic1 icon_select3x type_select"></i>
    </li>
   <!-- <li class="pay_type_list" pay_way="wallet">
        <i class="person_page_img icon_yuezhif"></i>

        <div class="type_intro">
            <p class="type_name">余额支付</p>

            <p class="pay_intro">推荐使用</p>
        </div>
        <i class="icon_pic1 icon_select3x type_select type_select_none"></i>
    </li>-->
    <?php if ($_smarty_tpl->tpl_vars['ua']->value!='Wx'){?>
    <li class="pay_type_list" pay_way="ali">
        <i class="person_page_img icon_yuezhif"></i>

        <div class="type_intro">
            <p class="type_name">支付宝支付</p>

            <p class="pay_intro">推荐使用</p>
        </div>
        <i class="icon_pic1 icon_select3x type_select type_select_none"></i>
    </li>
    <?php }?>
</ul>
<!--确认支付-->
<a href="javascript:;" class="pay_bill_btn" onclick="pay()">确认支付</a>

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
    var order_id = '<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
';
    var ua = '<?php echo $_smarty_tpl->tpl_vars['ua']->value;?>
';
    var business_id = '<?php echo $_smarty_tpl->tpl_vars['business_id']->value;?>
';
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
    var pay_way = 'wx';
    //点击选择支付方式
    $(".pay_type_list").on("click", function () {
        pay_way = $(this).attr('pay_way');
        $(this).children(".type_select").removeClass("type_select_none");
        $(this).siblings().children(".type_select").addClass("type_select_none");
    });

    function pay() {
        var url = '/FrontMerchantOrder/get_wx_param';
        var coin_num = $('#amount').attr("amount");
        if (coin_num > 0) {//获取微信支付参数
            if (pay_way == 'wx') {
                if(ua=='Wx'){
                    url = "/FrontMerchantOrder/get_wx_param";//用微信打开+微信支付
                }else{
                    url = "/FrontMerchantOrder/get_mobile_wxpay_param";//用app打开+微信支付
                }
            } else if(pay_way == 'ali'){
               // url = "/FrontMerchantOrder/wallet_pay";//钱包支付
                url = "/FrontMerchantOrder/get_mobile_alipay_param";
            }
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: {
                    coin_num: coin_num,
                    order_id: order_id,
                    business_id:business_id,
                },
                timeout: 10000,
                success: function (d) {
                    console.log(d);
                    if (pay_way == 'wx') {
                        if(ua=='Wx'){//用微信打开+微信支付
                            if (d.code == 0) {
                                //微信支付
                                jsApiParameters = d.msg;
                                callpay();
                            } else {
                                show_alert(d.msg);
                            }


                        }else{//用app打开+微信支付
                            if (d) {
                                var pay_param = d;
                                native_listen('wx_pay',{
                                    parameter : pay_param,
                                });
                            } else {
                                show_alert(d.msg);
                            }
                        }

                    }else if(pay_way == 'ali'){
                        if(d)
                        {
                            console.log(111);
                            var pay_param = d;
                            native_listen('ali_pay',{
                                parameter : pay_param,
                            });
                        }else{
                            show_alert("支付失败");
                        }
                        $(".pay_loading").hide();
                    }else if(pay_way=='wallet'){
                        if(d.code==1) {
                            show_alert(d.msg);
                            location.href = '/FrontOrder/pay_success/order_id/' + order_id;
                        }else{
                            show_alert(d.msg);
                        }
                        $(".pay_loading").hide();
                    }
                    $(".pay_loading").hide();
                },
                error: function (e) {
                    console.log(e);
                    $(".pay_loading").hide();
                    show_alert("error:" + e.msg);
                }
            });
        } else {
            show_alert('金额错误');
        }
    }
    function callpay() {
        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            } else if (document.attachEvent) {
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        } else {
            jsApiCall();
        }
    }


    function jsApiCall() {
        //alert(jsApiParameters);
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                jQuery.parseJSON(jsApiParameters),
                function (res) {
                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                        //后续操作
                        location.href = '/FrontOrder/pay_success/order_id/' + order_id;
                    }
                    else {
                    }
                }
        );
    }


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