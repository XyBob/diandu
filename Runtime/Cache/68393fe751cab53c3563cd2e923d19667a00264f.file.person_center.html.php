<?php /* Smarty version Smarty-3.1.6, created on 2017-07-25 10:21:23
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\person_center.html" */ ?>
<?php /*%%SmartyHeaderCode:4895595a0354acee25-89897233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68393fe751cab53c3563cd2e923d19667a00264f' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\person_center.html',
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
  'nocache_hash' => '4895595a0354acee25-89897233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595a03555b355',
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
<?php if ($_valid && !is_callable('content_595a03555b355')) {function content_595a03555b355($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/person_center.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>

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
	
<!--todo 顶部-->
<div class="header_separate">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>我的</h1>
    <div class="header_right"><span class="one"></span><a class="icon_add_person icon_set_white native_go" href="/Index/set"></a></div>
</div>
<!--<div class="header_empty"></div>-->
<!--todo 个人资料-->
<div class="person_information">
    <a class="person_data native_go" href="/FrontUserCenter/personal_data">
        <div class="date_exhibition">
            <div class="head_portrait"><img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive"></div>
            <div class="signature"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</div>
        </div>
        <div class="icon_add_person icon_whiteright"></div>
    </a>
    <div class="money_detail">
        <div class="one fl">
            <span>¥<?php echo $_smarty_tpl->tpl_vars['user_info']->value['left_money'];?>
</span>
            <span>余额</span>
        </div>
        <div class="two fl" onclick="location.href='/FrontUserCenter/my_coupons'">
            <!--<span>¥<?php if ($_smarty_tpl->tpl_vars['user_info']->value['total_money']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['total_money'];?>
<?php }else{ ?>0.00<?php }?></span>
            <span>消费金额</span>-->
            <!--todo 二期修改-->
            <span><?php echo $_smarty_tpl->tpl_vars['voucher_num']->value;?>
张</span>
            <span>我的优惠券</span>
        </div>
    </div>
</div>
<!--todo 资料列表-->
<div class="data_list">
    <!--todo 二期-->
    <a class="consumer_list common native_go" href="/FrontUserCenter/my_info">
        <div class="list_img">
            <div class="img_new_add_small icon_tongzhi"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的信息</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="consumer_list common native_go" href="/FrontUserCenter/consum_order_list">
        <div class="list_img">
            <div class="icon_add_person icon_orderform"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">消费清单</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="common native_go" href="/FrontUserCenter/my_account">
        <div class="list_img">
            <div class="icon_add_person icon_me_money"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的账户</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="my_account common native_go" href="/FrontUserCenter/user_withdrawal">
        <div class="list_img">
            <div class="icon_add_person icon_tixian18x18"></div>
        </div>
            <div class="list_show_content">
                <div class="list_show">
                    <span class="list_name">提现</span>
                    <span class="icon_add_person icon_left_gray"></span>
                </div>
            </div>
    </a>

    <a class="my_account common native_go" href="/FrontUserCenter/delivery_address">
        <div class="list_img">
            <div class="img_new_add_small icon_dingwei"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的收货地址</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="recommend_store common native_go" href="/FrontUserCenter/my_recom_shop">
        <div class="list_img">
            <div class="icon_add_person icon_me_shop"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我推荐的店铺</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="recommend_person common native_go" href="/FrontUserCenter/my_recom_person">
        <div class="list_img">
            <div class="icon_add_person icon_me_person"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我推荐的个人</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="my_qr_code common native_go" href="/FrontUserCenter/my_qr_code/user_id/<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
">
        <div class="list_img">
            <div class="icon_add_person icon_qrcode"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的二维码</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="invite_friend common" id="invite_friend">
        <div class="list_img">
            <div class="icon_add_person icon_fenxiang_orange"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">邀请朋友、分享</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <?php if ($_smarty_tpl->tpl_vars['user_info']->value['is_merchant']==1&&$_smarty_tpl->tpl_vars['user_info']->value['business_status']==1){?>
    <a class="my_shop common native_go" id="my_shop" href="/FrontMerchant/my_store">
        <div class="list_img">
            <div class="icon_add_person icon_me_shop_blue"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的店铺</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <?php }?>
</div>
<!--status 0没店铺，1申请通过，即有店铺，2申请未通过，3冻结，4审核中，5未付款-->
<?php if ($_smarty_tpl->tpl_vars['user_info']->value['business_status']==0||$_smarty_tpl->tpl_vars['user_info']->value['business_status']==5){?>
<!--todo 申请成为商家-->
<div class="apply_in_merchants apply" >
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">申请成为商家</span>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['user_info']->value['business_status']==4){?>
<div class="apply_in_merchants">
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">审核中</span>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['user_info']->value['business_status']==3){?>
<div class="apply_in_merchants">
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">被冻结，请联系客服</span>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['user_info']->value['business_status']==2){?>
<div class="apply_in_merchants apply">
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">审核未通过</span>
</div>
<?php }?>
<!--底部导航栏-->
<div class="footer_empty"></div>
<ul class="foot_nav">
	<li>
		<a href="/Index/home_index" class="native_go">
			<i class="icon_pic1 icon_home3x icon_home_s3x"></i>
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
	<li class="active">
		<a href="/FrontUserCenter/person_center" class="native_go">
			<i class="icon_pic1 icon_mine3x icon_mine_s3x active"></i>
			<span class="nav_name">我的</span>
		</a>
	</li>
</ul>
<!--todo 邀请朋友分享的模态框-->
<div class="modal" id="share">
    <div class="content">
        <div class="tips_btn">点击更多，分享赠送给好友哦</div>
        <div class="tips_arrrow icon_add_person icon_jiantou_white"></div>
        <div class="modal_content content_control">
            <div class="del"></div>
            <div class="img-control">
                <img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive">
            </div>
            <p class="name text-center"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</p>
            <div class="qr" >
                <img id="share_qr" src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['qr_code'];?>
" class="img-responsive">
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
    var is_bind_card='<?php echo $_smarty_tpl->tpl_vars['is_bind_card']->value;?>
';
    var is_mobile='<?php echo $_smarty_tpl->tpl_vars['is_mobile']->value;?>
'
</script>

<script type="text/javascript">
    if(!is_wechat()){
        $('#current_page_arrow').hide();
    }
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
	//底部导航栏
	$(".foot_nav li").on("click",function(){
		$(this).siblings().removeClass("active").find("i").removeClass("active");
		$(this).addClass("active").find("i").addClass("active");
        if($(this).attr('id')=='take_out'){
            $(this).find('i').addClass('icon_waimai_s');
        }
	});
    /*todo 分享的模态框控制函数*/
    $('#invite_friend').on('click',function(){
        if(is_wechat()){
            $('#share').show();
            document.body.classList.add('bodyhide');
        }else{
            var qr_url = $('#share_qr').attr('src');
            native_listen('share_qr',{
                qr_url : qr_url
            })
        }
    });
    /*todo 点击蒙版关闭模态框*/
    $('#share').on('click',function(){
        $(this).hide();
        document.body.classList.remove('bodyhide');
    });
    /*todo 关闭模态框按钮*/
    $('.modal_content .del').on('click',function(){
        $('#share').hide();
        document.body.classList.remove('bodyhide');
    });
    $('#share .content').on('click',function(){
        event.stopPropagation();/*todo 阻止冒泡*/
    });
    function parseJson(param) {
        var obj = {};
        var keyvalue = [];
        var key = "", value = "";
        var paraString = param.split("&");
        for (var i in paraString) {
            keyvalue = paraString[i].split("=");
            key = keyvalue[0];
            value = keyvalue[1];
            obj[key] = value;
        }
        return obj;
    }
    function pageConfig() {
        if (location.href.split('?')[1] != null) {
            return parseJson(decodeURIComponent(location.href.split('?')[1]));
        }
        else {
            return false;
        }
    }
    $('.apply').on('click',function(){
        if(is_mobile=='0'){
            show_alert('请先绑定手机');
            setTimeout(function(){location.href='/index/phone_check'},1000);
            return false;
        }
        else if(is_bind_card=='0'){
            show_alert('请先绑定银行卡');
            setTimeout(function(){location.href='/FrontUserCenter/add_card/origin/apply_for_businesses'},1000);
            return false;
        }else{
            if(!is_wechat()){
                native_jump('apply','/Index/apply_for_businesses.html');
            }else{
                location.href='/Index/apply_for_businesses.html';
            }

        }
    })

    function go_personal_data(){
        //alert("/Index/set");
        if(!is_ios()&&!is_android()){
           // alert("/Index/set");
            location.href = "/FrontUserCenter/personal_data";
        }else{
            //alert("to_jump");
            native_jump("set","/FrontUserCenter/personal_data");
        }
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
	
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/person_center.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>

</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 顶部-->
<div class="header_separate">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>我的</h1>
    <div class="header_right"><span class="one"></span><a class="icon_add_person icon_set_white native_go" href="/Index/set"></a></div>
</div>
<!--<div class="header_empty"></div>-->
<!--todo 个人资料-->
<div class="person_information">
    <a class="person_data native_go" href="/FrontUserCenter/personal_data">
        <div class="date_exhibition">
            <div class="head_portrait"><img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive"></div>
            <div class="signature"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</div>
        </div>
        <div class="icon_add_person icon_whiteright"></div>
    </a>
    <div class="money_detail">
        <div class="one fl">
            <span>¥<?php echo $_smarty_tpl->tpl_vars['user_info']->value['left_money'];?>
</span>
            <span>余额</span>
        </div>
        <div class="two fl" onclick="location.href='/FrontUserCenter/my_coupons'">
            <!--<span>¥<?php if ($_smarty_tpl->tpl_vars['user_info']->value['total_money']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['total_money'];?>
<?php }else{ ?>0.00<?php }?></span>
            <span>消费金额</span>-->
            <!--todo 二期修改-->
            <span><?php echo $_smarty_tpl->tpl_vars['voucher_num']->value;?>
张</span>
            <span>我的优惠券</span>
        </div>
    </div>
</div>
<!--todo 资料列表-->
<div class="data_list">
    <!--todo 二期-->
    <a class="consumer_list common native_go" href="/FrontUserCenter/my_info">
        <div class="list_img">
            <div class="img_new_add_small icon_tongzhi"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的信息</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="consumer_list common native_go" href="/FrontUserCenter/consum_order_list">
        <div class="list_img">
            <div class="icon_add_person icon_orderform"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">消费清单</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="common native_go" href="/FrontUserCenter/my_account">
        <div class="list_img">
            <div class="icon_add_person icon_me_money"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的账户</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="my_account common native_go" href="/FrontUserCenter/user_withdrawal">
        <div class="list_img">
            <div class="icon_add_person icon_tixian18x18"></div>
        </div>
            <div class="list_show_content">
                <div class="list_show">
                    <span class="list_name">提现</span>
                    <span class="icon_add_person icon_left_gray"></span>
                </div>
            </div>
    </a>

    <a class="my_account common native_go" href="/FrontUserCenter/delivery_address">
        <div class="list_img">
            <div class="img_new_add_small icon_dingwei"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的收货地址</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="recommend_store common native_go" href="/FrontUserCenter/my_recom_shop">
        <div class="list_img">
            <div class="icon_add_person icon_me_shop"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我推荐的店铺</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="recommend_person common native_go" href="/FrontUserCenter/my_recom_person">
        <div class="list_img">
            <div class="icon_add_person icon_me_person"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我推荐的个人</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="my_qr_code common native_go" href="/FrontUserCenter/my_qr_code/user_id/<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
">
        <div class="list_img">
            <div class="icon_add_person icon_qrcode"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的二维码</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <a class="invite_friend common" id="invite_friend">
        <div class="list_img">
            <div class="icon_add_person icon_fenxiang_orange"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">邀请朋友、分享</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <?php if ($_smarty_tpl->tpl_vars['user_info']->value['is_merchant']==1&&$_smarty_tpl->tpl_vars['user_info']->value['business_status']==1){?>
    <a class="my_shop common native_go" id="my_shop" href="/FrontMerchant/my_store">
        <div class="list_img">
            <div class="icon_add_person icon_me_shop_blue"></div>
        </div>
        <div class="list_show_content">
            <div class="list_show">
                <span class="list_name">我的店铺</span>
                <span class="icon_add_person icon_left_gray"></span>
            </div>
        </div>
    </a>
    <?php }?>
</div>
<!--status 0没店铺，1申请通过，即有店铺，2申请未通过，3冻结，4审核中，5未付款-->
<?php if ($_smarty_tpl->tpl_vars['user_info']->value['business_status']==0||$_smarty_tpl->tpl_vars['user_info']->value['business_status']==5){?>
<!--todo 申请成为商家-->
<div class="apply_in_merchants apply" >
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">申请成为商家</span>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['user_info']->value['business_status']==4){?>
<div class="apply_in_merchants">
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">审核中</span>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['user_info']->value['business_status']==3){?>
<div class="apply_in_merchants">
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">被冻结，请联系客服</span>
</div>
<?php }elseif($_smarty_tpl->tpl_vars['user_info']->value['business_status']==2){?>
<div class="apply_in_merchants apply">
    <span class="icon_add_person icon_me_shop_blue"></span>
    <span class="blue_text">审核未通过</span>
</div>
<?php }?>
<!--底部导航栏-->
<div class="footer_empty"></div>
<ul class="foot_nav">
	<li>
		<a href="/Index/home_index" class="native_go">
			<i class="icon_pic1 icon_home3x icon_home_s3x"></i>
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
	<li class="active">
		<a href="/FrontUserCenter/person_center" class="native_go">
			<i class="icon_pic1 icon_mine3x icon_mine_s3x active"></i>
			<span class="nav_name">我的</span>
		</a>
	</li>
</ul>
<!--todo 邀请朋友分享的模态框-->
<div class="modal" id="share">
    <div class="content">
        <div class="tips_btn">点击更多，分享赠送给好友哦</div>
        <div class="tips_arrrow icon_add_person icon_jiantou_white"></div>
        <div class="modal_content content_control">
            <div class="del"></div>
            <div class="img-control">
                <img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive">
            </div>
            <p class="name text-center"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</p>
            <div class="qr" >
                <img id="share_qr" src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['qr_code'];?>
" class="img-responsive">
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
    var is_bind_card='<?php echo $_smarty_tpl->tpl_vars['is_bind_card']->value;?>
';
    var is_mobile='<?php echo $_smarty_tpl->tpl_vars['is_mobile']->value;?>
'
</script>

<script type="text/javascript">
    if(!is_wechat()){
        $('#current_page_arrow').hide();
    }
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
	//底部导航栏
	$(".foot_nav li").on("click",function(){
		$(this).siblings().removeClass("active").find("i").removeClass("active");
		$(this).addClass("active").find("i").addClass("active");
        if($(this).attr('id')=='take_out'){
            $(this).find('i').addClass('icon_waimai_s');
        }
	});
    /*todo 分享的模态框控制函数*/
    $('#invite_friend').on('click',function(){
        if(is_wechat()){
            $('#share').show();
            document.body.classList.add('bodyhide');
        }else{
            var qr_url = $('#share_qr').attr('src');
            native_listen('share_qr',{
                qr_url : qr_url
            })
        }
    });
    /*todo 点击蒙版关闭模态框*/
    $('#share').on('click',function(){
        $(this).hide();
        document.body.classList.remove('bodyhide');
    });
    /*todo 关闭模态框按钮*/
    $('.modal_content .del').on('click',function(){
        $('#share').hide();
        document.body.classList.remove('bodyhide');
    });
    $('#share .content').on('click',function(){
        event.stopPropagation();/*todo 阻止冒泡*/
    });
    function parseJson(param) {
        var obj = {};
        var keyvalue = [];
        var key = "", value = "";
        var paraString = param.split("&");
        for (var i in paraString) {
            keyvalue = paraString[i].split("=");
            key = keyvalue[0];
            value = keyvalue[1];
            obj[key] = value;
        }
        return obj;
    }
    function pageConfig() {
        if (location.href.split('?')[1] != null) {
            return parseJson(decodeURIComponent(location.href.split('?')[1]));
        }
        else {
            return false;
        }
    }
    $('.apply').on('click',function(){
        if(is_mobile=='0'){
            show_alert('请先绑定手机');
            setTimeout(function(){location.href='/index/phone_check'},1000);
            return false;
        }
        else if(is_bind_card=='0'){
            show_alert('请先绑定银行卡');
            setTimeout(function(){location.href='/FrontUserCenter/add_card/origin/apply_for_businesses'},1000);
            return false;
        }else{
            if(!is_wechat()){
                native_jump('apply','/Index/apply_for_businesses.html');
            }else{
                location.href='/Index/apply_for_businesses.html';
            }

        }
    })

    function go_personal_data(){
        //alert("/Index/set");
        if(!is_ios()&&!is_android()){
           // alert("/Index/set");
            location.href = "/FrontUserCenter/personal_data";
        }else{
            //alert("to_jump");
            native_jump("set","/FrontUserCenter/personal_data");
        }
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