<?php /* Smarty version Smarty-3.1.6, created on 2017-07-20 13:15:28
         compiled from "C:\wamp\www\diandu\Tpl\FrontMerchant\my_store.html" */ ?>
<?php /*%%SmartyHeaderCode:28777595a035be44b03-16092370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4be4b7d5e798bc97555b401d7c2d7421ab8f42f2' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontMerchant\\my_store.html',
      1 => 1499160570,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28777595a035be44b03-16092370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595a035c73aec',
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
<?php if ($_valid && !is_callable('content_595a035c73aec')) {function content_595a035c73aec($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/my_store.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style></style>

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
	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>我的店铺</h1>
</div>
<div class="header_empty"></div>
<!--todo 店铺资料-->
<div class="person_information">
    <div class="person_data">
        <div class="dianpu">
            <img src="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/">
        </div>
        <div class="two">
            <p class="title"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</p>
            <p class="start_number">
                <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['business_info']->value['star'], null, 0);?>
                <?php while ($_smarty_tpl->tpl_vars['business_info']->value['star']-->0){?>
                <span class="icon_pic1 icon_star_blank3x icon_star_full3x"></span>
                <?php }?>
                <?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
                <span class="icon_pic1 icon_star_blank3x"></span>
                <?php }?>

            </p>
        </div>
    </div>
    <div class="money_detail">
        <div class="one fl">
            <span>¥<?php if ($_smarty_tpl->tpl_vars['total_profit']->value){?><?php echo $_smarty_tpl->tpl_vars['total_profit']->value;?>
<?php }else{ ?>0.00<?php }?></span>
            <span>总收益</span>
        </div>
        <div class="two fl">
            <span>¥<?php if ($_smarty_tpl->tpl_vars['today_profit']->value){?><?php echo $_smarty_tpl->tpl_vars['today_profit']->value;?>
<?php }else{ ?>0.00<?php }?></span>
            <span>今日收益</span>
        </div>
    </div>
    <!--todo 商铺是否工作展示区域-->
    <?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_out']==1){?>
    <div class="rest_wrapper"  <?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_open']==1){?>style="display:none"<?php }?>>
        <div class="rest_icon"></div>
        <div class="right_bottom rest">
            <div class="top_empty"></div>
            <div class="text-center">休息中</div>
        </div>
    </div>
    <div class="work_wrapper"  <?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_open']==0){?>style="display:none"<?php }?>>
        <div class="work_icon"></div>
        <div class="right_bottom work">
            <div class="top_empty"></div>
            <div class="text-center">营业中</div>
        </div>
    </div>
    <?php }?>
</div>
<!--todo 列表展示-->
<div class="store_related one">
    <a class="native_go" href="/FrontMerchant/store_data/is_edit/1">
        <div class="relate_list">
            <span class="icon_add_person icon_shopping_edit"></span>
            <span>店铺资料</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/gathering_qr_code">
        <div class="relate_list">
            <span class="icon_add_person icon_shoukuan_orange"></span>
            <span>收款二维码</span>
        </div>
    </a>
    <a class="native_go" href="/FrontUserCenter/my_bank_card">
        <div class="relate_list">
            <span class="icon_add_person icon_bank_red"></span>
            <span>银行账户</span>
        </div>
    </a>
    <?php if ($_smarty_tpl->tpl_vars['business_info']->value['out_status']==0){?>
    <a class="native_go" href="/Index/apply_takeout_store">
        <div class="relate_list">
            <span class="person_page_img icon_waimai_11"></span>
            <span>开通外卖</span>
        </div>
    </a>
    <?php }elseif($_smarty_tpl->tpl_vars['business_info']->value['out_status']==2){?>
    <a class="native_go" href="#">
        <div class="relate_list">
            <span class="person_page_img icon_waimai_11"></span>
            <span>外卖审核中</span>
        </div>
    </a>
    <?php }elseif($_smarty_tpl->tpl_vars['business_info']->value['out_status']==3){?>
    <a class="native_go" href="/Index/apply_takeout_store">
        <div class="relate_list">
            <span class="person_page_img icon_waimai_11"></span>
            <span>外卖未通过</span>
        </div>
    </a>
    <?php }?>
    <a class="native_go" href="/FrontMerchant/merchant_order">
        <div class="relate_list">
            <span class="person_page_img icon_roder_11"></span>
            <span>我的订单</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/my_customer">
        <div class="relate_list">
            <span class="person_page_img icon_user"></span>
            <span>我的客户</span>
        </div>
    </a>
    <a class="native_go" href="/FrontUserCenter/my_account">
        <div class="relate_list">
            <span class="icon_add_person icon_zhanghu_green"></span>
            <span>账户管理</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/data_statistics">
        <div class="relate_list">
            <span class="icon_add_person icon_shuju_blue"></span>
            <span>数据日统计</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/financial_statistics">
        <div class="relate_list">
            <span class="icon_add_person icon_caiwu_green"></span>
            <span>数据月统计</span>
        </div>
    </a>
    <a class="native_go" href="/FrontHelp/help_detail/id/26">
        <div class="relate_list">
            <span class="store_icon icon_fabuyhquan"></span>
            <span>发布优惠券</span>
        </div>
    </a>
    <a class="native_go" href="/FrontHelp/help_detail/id/26">
        <div class="relate_list">
            <span class="store_icon icon_addgoods"></span>
            <span>发布商品</span>
        </div>
    </a>
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
	

<script type="text/javascript">
    var rest=1;
    var work=0;
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
    /*todo 是否营业和休息*/
    $('.rest_wrapper').on('click',function(){
        $.ajax({
            url:"/FrontMerchant/change_open",
            type:"post",
            data:{is_open:rest},
            success:function (data) {
            if(data==1){
                $('.rest_wrapper').hide();
                $('.work_wrapper').show();
            }else{
                alert('您的店铺没有商品,不能开店')
            }

            }
        })

    });
    $('.work_wrapper').on('click',function(){
        $.ajax({
            url:"/FrontMerchant/change_open",
            type:"post",
            data:{
                is_open:work
            },
            success:function (data) {
            if(data==1){
                $('.work_wrapper').hide();
                $('.rest_wrapper').show();
            }
            }
        })

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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/my_store.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style></style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>我的店铺</h1>
</div>
<div class="header_empty"></div>
<!--todo 店铺资料-->
<div class="person_information">
    <div class="person_data">
        <div class="dianpu">
            <img src="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/">
        </div>
        <div class="two">
            <p class="title"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</p>
            <p class="start_number">
                <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['business_info']->value['star'], null, 0);?>
                <?php while ($_smarty_tpl->tpl_vars['business_info']->value['star']-->0){?>
                <span class="icon_pic1 icon_star_blank3x icon_star_full3x"></span>
                <?php }?>
                <?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
                <span class="icon_pic1 icon_star_blank3x"></span>
                <?php }?>

            </p>
        </div>
    </div>
    <div class="money_detail">
        <div class="one fl">
            <span>¥<?php if ($_smarty_tpl->tpl_vars['total_profit']->value){?><?php echo $_smarty_tpl->tpl_vars['total_profit']->value;?>
<?php }else{ ?>0.00<?php }?></span>
            <span>总收益</span>
        </div>
        <div class="two fl">
            <span>¥<?php if ($_smarty_tpl->tpl_vars['today_profit']->value){?><?php echo $_smarty_tpl->tpl_vars['today_profit']->value;?>
<?php }else{ ?>0.00<?php }?></span>
            <span>今日收益</span>
        </div>
    </div>
    <!--todo 商铺是否工作展示区域-->
    <?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_out']==1){?>
    <div class="rest_wrapper"  <?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_open']==1){?>style="display:none"<?php }?>>
        <div class="rest_icon"></div>
        <div class="right_bottom rest">
            <div class="top_empty"></div>
            <div class="text-center">休息中</div>
        </div>
    </div>
    <div class="work_wrapper"  <?php if ($_smarty_tpl->tpl_vars['business_info']->value['is_open']==0){?>style="display:none"<?php }?>>
        <div class="work_icon"></div>
        <div class="right_bottom work">
            <div class="top_empty"></div>
            <div class="text-center">营业中</div>
        </div>
    </div>
    <?php }?>
</div>
<!--todo 列表展示-->
<div class="store_related one">
    <a class="native_go" href="/FrontMerchant/store_data/is_edit/1">
        <div class="relate_list">
            <span class="icon_add_person icon_shopping_edit"></span>
            <span>店铺资料</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/gathering_qr_code">
        <div class="relate_list">
            <span class="icon_add_person icon_shoukuan_orange"></span>
            <span>收款二维码</span>
        </div>
    </a>
    <a class="native_go" href="/FrontUserCenter/my_bank_card">
        <div class="relate_list">
            <span class="icon_add_person icon_bank_red"></span>
            <span>银行账户</span>
        </div>
    </a>
    <?php if ($_smarty_tpl->tpl_vars['business_info']->value['out_status']==0){?>
    <a class="native_go" href="/Index/apply_takeout_store">
        <div class="relate_list">
            <span class="person_page_img icon_waimai_11"></span>
            <span>开通外卖</span>
        </div>
    </a>
    <?php }elseif($_smarty_tpl->tpl_vars['business_info']->value['out_status']==2){?>
    <a class="native_go" href="#">
        <div class="relate_list">
            <span class="person_page_img icon_waimai_11"></span>
            <span>外卖审核中</span>
        </div>
    </a>
    <?php }elseif($_smarty_tpl->tpl_vars['business_info']->value['out_status']==3){?>
    <a class="native_go" href="/Index/apply_takeout_store">
        <div class="relate_list">
            <span class="person_page_img icon_waimai_11"></span>
            <span>外卖未通过</span>
        </div>
    </a>
    <?php }?>
    <a class="native_go" href="/FrontMerchant/merchant_order">
        <div class="relate_list">
            <span class="person_page_img icon_roder_11"></span>
            <span>我的订单</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/my_customer">
        <div class="relate_list">
            <span class="person_page_img icon_user"></span>
            <span>我的客户</span>
        </div>
    </a>
    <a class="native_go" href="/FrontUserCenter/my_account">
        <div class="relate_list">
            <span class="icon_add_person icon_zhanghu_green"></span>
            <span>账户管理</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/data_statistics">
        <div class="relate_list">
            <span class="icon_add_person icon_shuju_blue"></span>
            <span>数据日统计</span>
        </div>
    </a>
    <a class="native_go" href="/FrontMerchant/financial_statistics">
        <div class="relate_list">
            <span class="icon_add_person icon_caiwu_green"></span>
            <span>数据月统计</span>
        </div>
    </a>
    <a class="native_go" href="/FrontHelp/help_detail/id/26">
        <div class="relate_list">
            <span class="store_icon icon_fabuyhquan"></span>
            <span>发布优惠券</span>
        </div>
    </a>
    <a class="native_go" href="/FrontHelp/help_detail/id/26">
        <div class="relate_list">
            <span class="store_icon icon_addgoods"></span>
            <span>发布商品</span>
        </div>
    </a>
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
	

<script type="text/javascript">
    var rest=1;
    var work=0;
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
    /*todo 是否营业和休息*/
    $('.rest_wrapper').on('click',function(){
        $.ajax({
            url:"/FrontMerchant/change_open",
            type:"post",
            data:{is_open:rest},
            success:function (data) {
            if(data==1){
                $('.rest_wrapper').hide();
                $('.work_wrapper').show();
            }else{
                alert('您的店铺没有商品,不能开店')
            }

            }
        })

    });
    $('.work_wrapper').on('click',function(){
        $.ajax({
            url:"/FrontMerchant/change_open",
            type:"post",
            data:{
                is_open:work
            },
            success:function (data) {
            if(data==1){
                $('.work_wrapper').hide();
                $('.rest_wrapper').show();
            }
            }
        })

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