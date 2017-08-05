<?php /* Smarty version Smarty-3.1.6, created on 2017-07-14 16:09:18
         compiled from "C:\wamp\www\diandu\Tpl\FrontOrder\submit_order.html" */ ?>
<?php /*%%SmartyHeaderCode:2992359672b33b10e00-58016198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52a3c325a3e7dbbcaf8bfe700ac94525e5a2e6ab' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontOrder\\submit_order.html',
      1 => 1499950359,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2992359672b33b10e00-58016198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59672b348f3ea',
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
<?php if ($_valid && !is_callable('content_59672b348f3ea')) {function content_59672b348f3ea($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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


<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/submit_order.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/submit_order_address.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/new_goods_address.css?version={$version}"/>
<style type="text/css">
	.base_data{
		margin-bottom:0;
		background:#fff;
	}
	.detail_address{
		padding-bottom:0.5rem;
		line-height:1.1rem;
	}
	.text_matter{
		display:block;
		min-height:30px;
		border-bottom: 1px solid #EFEFF4;
	}
	.edit-text{
		display:block;
	    resize: none;
	    width: calc(100% - 4.3rem);
	    padding-left:4.3rem;
	    color: #333;
	    font-size: 0.9rem;
	    min-height:50px;
	}
	.input_matter{
		color:#323232;
	}
	.detail_address .left_control{
		height:1.1rem;
		line-height:1.1rem;
	}
	.goods-label-li{
		height:auto;
		padding:0.5rem 0.75rem 0.5rem 0;
	}
	.goods-label{
		max-width:60%;
		display:flex;
		display:-webkit-flex;
		flex-direction:column;
		-webkit-flex-direction:column;
		justify-content:center;
		-webkit-justify-content:center;
	}
	.goods-label .label-type{
		font-size:0.7rem;
		color:#666;
	}
	.modal_choose .scroll_answer_list{
		overflow:hidden;
	}
	.new-address-inner{
		background:#fff;
	}
	.new-address-outer{
		padding-top:0;
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
	
<!--todo 头部-->
<form action="/FrontOrder/create_order_and_pay/" id="myform" method="post">
    <input type="hidden" name="business_id" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">
    <input type="hidden" name="pay_amount" value="<?php echo $_smarty_tpl->tpl_vars['sum_price']->value;?>
">
    <input type="hidden" name="total_amount" value="<?php echo $_smarty_tpl->tpl_vars['total_amount']->value;?>
">
    <input type="hidden" name="shop_discount_id" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop_discount_id'];?>
">
    <input type="hidden" name="shop_discount_num" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop'];?>
">
    <input type="hidden" name="coupon_id" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon_id'];?>
">
    <input type="hidden" name="coupon_num" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon'];?>
">
    <input type="hidden" name="platform_discount_id" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform_discount_id'];?>
">
    <input type="hidden" name="platform_discount_num" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform'];?>
">

    <div class="header">
	    <div class="left_header native_back" onclick="history.go(-1)">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
	    <h1>提交订单</h1>
	</div>
<div class="main_content">

    <a href="javascript:;" class="address_link" <?php if ($_smarty_tpl->tpl_vars['user_check_address_info']->value){?>style="display:none;"<?php }?>>
        <div class="address_left">
            <span class="img_new_add_small icon_dingwei"></span>
            <span class="text">请填写您的收货地址</span>
        </div>
        <div class="icon_add_person icon_left_gray"></div>
    </a>
    
    <a class="address_link_modify" <?php if (!$_smarty_tpl->tpl_vars['user_check_address_info']->value){?>style="display:none;"<?php }?>>
        <div class="address_detail_left" data-address-id="$user_check_address_info.user_address_id">
            <input type="hidden" name="user_address_id" value="<?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['user_address_id'];?>
">
            <div class="top"><span class="name">收货人：<?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['realname'];?>
</span><span class="tel"><?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['mobile'];?>
</span></div>
            <div class="down"><?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['address'];?>
</div>
        </div>
        <div class="icon_add_person icon_left_gray"></div>
    </a>
</div>
<div class="line"></div>
<div class="send_time" id="choose_send_time">
    <div class="label">选择送达时间</div>
    <div class="choose_time_link" data-year="" data-time="">
    	<span class="blue" id="time_text">立即送出</span>
    	<span class="icon_add_person icon_left_gray"></span>
    </div>
</div>
<div class="list_content">
    <div class="name_content">
        <span class="tips_icon icon_store"></span>
        <span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</span>
    </div>
    <ul class="order_list">
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shop_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        <li class="order_list_detail goods-label-li">
            <div class="label goods-label">
            	<span class="label-name">
            		<?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>

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
            	<span class="label">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['sum'];?>
</span>
            </div>
        </li>
        <?php } ?>
        <!--<li class="order_list_detail">-->
            <!--<div class="label">蜜汁猪扒饭</div>-->
            <!--<div class=""><span class="grey_number">X5</span><span class="label">¥110</span></div>-->
        <!--</li>-->
        <li class="order_list_detail">
            <div class="label_grey">餐盒费</div>
            <div class=""><span class="label">¥<?php echo $_smarty_tpl->tpl_vars['box_fee']->value;?>
</span></div>
        </li>
        <li class="order_list_detail">
            <div class="label_grey">配送费</div>
            <div class=""><span class="label">¥<?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee'];?>
</span></div>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['breakes']->value['shop']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>商家满减优惠</span></div>
            <div class="money label">- ¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['breakes']->value['platform']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>平台满减优惠</span></div>
            <div class="money label">- ¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['breakes']->value['coupon']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_ticket3x"></i><span>优惠券优惠</span></div>
            <div class="money label">- ¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon'];?>
</div>
        </li>
        <?php }?>
    </ul>
</div>
<textarea name="note" id="note" placeholder="备注"></textarea>
<div class="footer_fixed">
    <div class="privilege_info">¥<?php echo $_smarty_tpl->tpl_vars['sum_price']->value;?>
<span class="grey">（已优惠¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['sum'];?>
）</span></div>
    <div class="submit_order">提交订单</div>
</div>
<!--todo 选择送货的时间-->
<div class="modal_choose">
    <div class="content">
        <div class="title">选择送达时间</div>
        <div class="scroll_answer_list" id="scroll_answer_list">
            <ul class="answer_choose_list" id="answer_choose_list">
                <li class="show_choose active" data-flag="0">
                    <input type="hidden" name="arrive_time" value="0">
                    <div class="name" data-id="" data-answ="">立即送出</div>
                    <div class="icon_market icon_select_default icon_selected_b"></div>
                </li>
                <!--
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">12:30</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                -->
            </ul>
        </div>
    </div>
</div>
</form>
<!--收货地址列表-->
<div class="choose-address-outer">
	<ul class="address-scroll">
		<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
		<li class="address-list" data-address-id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
			<div class="list-head">
            	<span class="name"><?php echo $_smarty_tpl->tpl_vars['this']->value['realname'];?>
</span>
            	<span class="tel"><?php echo $_smarty_tpl->tpl_vars['this']->value['mobile'];?>
</span>
        	</div>
        	<div class="list-bot">
				<span class="address-cont"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</span>
        	</div>
		</li>
		<?php } ?>
		<!--<li class="address-list">-->
			<!--<div class="list-head">-->
            	<!--<span class="name">总经理</span>-->
            	<!--<span class="tel">787878999</span>-->
        	<!--</div>-->
        	<!--<div class="list-bot">-->
        		<!--<span class="address-cont">浙江省杭州市江干区民心路</span>-->
        	<!--</div>-->
		<!--</li>-->
	</ul>
	<span class="new-address-btn">新建收货地址</span>
</div>
<!--新增收货地址-->
<div class="new-address-outer">
	<div class="new-address-inner">
	<!--todo 列表显示-->
	<h6 class="new-address-title">
		新建收货地址
		<span class="address-close"></span>
	</h6>
	<form action="" class="base_data">
	    <div class="form_group">
	        <label for="person_name" class="label_style">姓名</label>
	        <input type="text" id="person_name" placeholder="请填写" class="input_matter" name='realname' value="<?php echo $_smarty_tpl->tpl_vars['user_address_info']->value['realname'];?>
">
	    </div>
	    <div class="form_group">
	        <label for="phone" class="label_style">手机号</label>
	        <input type="number" id="phone" placeholder="请填写" class="input_matter" name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
">
	    </div>
	    <!--
	    <div class="base_data_list">
	        <label class="label_style">所在省</label>
	        <select class="select_matter" id="province_id" name="province_id">
	            <option value="0">请选择省份</option>
	            <?php  $_smarty_tpl->tpl_vars['province'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['province']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['province']->key => $_smarty_tpl->tpl_vars['province']->value){
$_smarty_tpl->tpl_vars['province']->_loop = true;
?>
	            <option value="<?php echo $_smarty_tpl->tpl_vars['province']->value['province_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['user_address_info']->value['province_id']==$_smarty_tpl->tpl_vars['province']->value['province_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['province']->value['province_name'];?>
</option>
	            <?php } ?>
	        </select>
	        <div class="right_choose">
	            <div class="icon_add_person icon_left_gray"></div>
	        </div>
	    </div>
	    -->
	    <div class="detail_address">
	        <div class="left_control">
	            <label class="label_style">收货地址</label>
	        </div>
	        <textarea placeholder="省、市、区" class="text_matter" id="detail_address" maxlength="60" data-longitude="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['x'];?>
"  data-latitude="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['y'];?>
" name="address" readonly><?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['name'];?>
</textarea>
	        <input type="hidden" name="longitude" id="longitude" value="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['x'];?>
">
	        <input type="hidden" name="latitude" id="latitude" value="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['y'];?>
">
	    </div>
	    <textarea class="edit-text" placeholder="详细地址" maxlength="30"></textarea>
	    <div style="padding-right:0.75rem;" class="map-wrapper">
	        <div id="allmap"  style="height:300px;width: 100%;" ></div>
	    </div>
	   <!-- <div class="whether_default">
	        <span class="icon_market icon_select_rect <?php if ($_smarty_tpl->tpl_vars['user_address_info']->value['is_default']){?>icon_selected_rect<?php }?> default_check"></span>
	        <input type="hidden" name="is_default" id="is_default" value="<?php echo $_smarty_tpl->tpl_vars['user_address_info']->value['is_default'];?>
">
	        <span>设为默认地址</span>
	    </div>-->
	    <input type="hidden" id="whether_selected" value="1">
	</form>
	<div class="save" id="submit">保存</div>
	<!--todo 添加成功-->
	<div class="modal modal_success">
	    <div class="modal_content">
	        <div class="tips_icon icon_success_b"></div>
	        <p class="text">添加成功</p>
	    </div>
	</div>
	<!--todo 添加失败-->
	<div class="modal modal_fail">
	    <div class="modal_content">
	        <div class="tips_icon icon_fail"></div>
	        <p class="text">添加失败</p>
	        <p class="tips">请确认地址后重新保存</p>
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
	
<script type="text/javascript">
        var delivery_fee='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee'];?>
';//配送费
        var business_id=<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
;
        var pay_amount=<?php echo $_smarty_tpl->tpl_vars['sum_price']->value;?>
;
        var total_amount=<?php echo $_smarty_tpl->tpl_vars['total_amount']->value;?>
;
        var shop_discount_id=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop_discount_id'];?>
;
        var shop_discount_num=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop'];?>
;
        var coupon_id=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon_id'];?>
;
        var coupon_num=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon'];?>
;
        var platform_discount_id=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform_discount_id'];?>
;
        var platform_discount_num=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform'];?>
;
        var user_address_id='<?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['user_address_id'];?>
';
        var box_fee='<?php echo $_smarty_tpl->tpl_vars['box_fee']->value;?>
';
</script>

<script>
    var box_count=<?php echo $_smarty_tpl->tpl_vars['box_count']->value;?>
;
    var timeType = <?php echo $_smarty_tpl->tpl_vars['business_type']->value;?>
;//1:外卖;2:菜市场;
    var range = '<?php echo $_smarty_tpl->tpl_vars['business_info']->value['range'];?>
';
    var delivery_fee_free = '<?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee_free'];?>
';//满免运费
    var start_delivery_fee ='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['start_delivery_fee'];?>
';//起送

	console.log(timeType);
</script>


<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BQLHGlffjbXC30bFDcpIQkHIkaxKBBe6&services=true"></script>
<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>

<script type="text/javascript">
	var timeScroll = new iScroll("scroll_answer_list");
	setTimeout(function(){
		timeScroll.refresh();
	},200);

</script>

<script type="text/javascript">
	//deliverTime:配送时间;initTime:最早配送时间;endTime:最晚配送时间;sendInit:配送起始时间;
	//var timeType = 1;//1:外卖;2:菜市场;
	var deliverTime = 1;
	var interval = 0.5;
	var initTime,endTime,sendInit;
	if(timeType==1){
		initTime = 9.5;
		endTime = 23.5;
		sendInit = initTime;
	}else{
		initTime = 8;
		endTime = 18;
		sendInit = initTime;
	}
	//送达时间
	var sendEnd = sendInit + deliverTime;
</script>

<script src="/Public/Js/front/front_js/choose_time.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Js/front/front_js/submit_order.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	var arrive_time=0;
    var user_remark='';
    var is_submit=0;
    $(".submit_order").on("click",function () {
        if(box_count==0){
            show_alert('订单列表暂无商品，请添加！');
            setTimeout(function(){
                $(".modal_alert").hide();
            },1500);
            return;
        }
        if(is_submit==1){
            show_alert('订单已提交，请返回订单列表查看！');
            setTimeout(function(){
                $(".modal_alert").hide();
            },1500);
            return;
        }
        user_remark=$('#note').val();
    	var addressShow = $(".address_link_modify").css("display");
    	var nowHour = new Date().getHours();
	    var nowMin = new Date().getMinutes()/60;
	    var nowTime = nowHour + nowMin;
		var getYearVal = $(".choose_time_link").attr("data-year");
		var getTimeVal = $(".choose_time_link").attr("data-time");
		if(getYearVal==''){
			show_alert('请选择配送时间！');
    		setTimeout(function(){
    			$(".modal_alert").hide();
    		},1500);
    		return;
		}
        arrive_time=getYearVal+' '+getTimeVal;
		getTimeVal = getTimeVal.split(":");
    	if(addressShow!="none"){
    		if(timeType==1){
    			if(nowTime>endTime){
	    			show_alert('抱歉，不在配送时间！');
		    		setTimeout(function(){
		    			$(".modal_alert").hide();
		    		},1500);
		    		return;
	    		}
    			if(nowHour>Number(getTimeVal[0])){
    				show_alert('请选择正确配送时间！');
		    		setTimeout(function(){
		    			$(".modal_alert").hide();
		    		},1500);
		    		return;
    			}else if(nowHour==Number(getTimeVal[0])){
    				if(nowMin>Number(getTimeVal[1])){
    					show_alert('抱歉，不在配送时间！');
			    		setTimeout(function(){
			    			$(".modal_alert").hide();
			    		},1500);
			    		return;
    				}
    			}
    		}
    		if(pay_amount<start_delivery_fee){
                show_alert('低于起送价格！');
                setTimeout(function(){
                    $(".modal_alert").hide();
                },1500);
                return;
            }
            is_submit=1;
    		$.ajax({
	            url:"/FrontOrder/create_order",
	            type:"POST",
	            dataType:"json",
	            data:{
                    delivery_fee:delivery_fee,
                    box_fee:box_fee,
	                business_id:business_id,
	                pay_amount:pay_amount,
	                total_amount:total_amount,
	                shop_discount_id:shop_discount_id,
	                shop_discount_num:shop_discount_num,
	                coupon_id:coupon_id,
	                coupon_num:coupon_num,
	                platform_discount_id:platform_discount_id,
	                platform_discount_num:platform_discount_num,
	                user_address_id:user_address_id,
	                arrive_time:arrive_time,
                    user_remark:user_remark

	            },
	            success:function(d){
	                console.log(d);
	                if(d.status=="success")
	                {	
	                	var url = "/FrontOrder/create_order_and_pay/order_id/"+d.order_id;
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
	                		location.href=url;
						}

	                }
	                else if(d.status=="stock")
	                {
                        is_submit=0;
	                    show_alert(d.detail);
	                }else if(d.status=="distance"){
                        is_submit=0;
	                    show_alert("大于商家配送距离")
                    }
	                else{
	                    show_alert("提交订单失败");
	                }
	
	            },
	            error:function(e){
	                console.log(e);
	            }
	        });
    	}else{
    		show_alert('请填写收货地址！');
    		setTimeout(function(){
    			$(".modal_alert").hide();
    		},1500);
    	}
    	
        
        
    });
	
	/*---todo 地图控制函数---*/
	//function getAddr() {
//    var myCity = new BMap.LocalCity();
//    myCity.get(myFun);
    // }

    function initMap(position) {
        var map = new BMap.Map("allmap");    // 创建Map实例
       // var point = new BMap.Point(116.331398,39.897445);
        var icon = new BMap.Icon('/Public/Images/point.png', new BMap.Size(40, 40), {
            anchor: new BMap.Size(20, 40)});

        var latitude = $("#detail_address").attr("data-latitude");
        var longitude = $('#detail_address').attr("data-longitude");
        var address =  $('#detail_address').val();
        if(latitude!=""&&longitude!=""){
			console.log(longitude);
			console.log(latitude);
            var point = new BMap.Point(longitude,latitude);
            var marker = new BMap.Marker(point,{icon:icon});
            //加上label提示
//            var label = new window.BMap.Label(address, { offset: new window.BMap.Size(20, -10) });
//            marker.setLabel(label);
            map.addOverlay(marker);
            map.centerAndZoom(point, 15);
        }else{
            var marker = new BMap.Marker(position,{icon:icon});
            map.addOverlay(marker);
            map.centerAndZoom(position, 15);
        }

        map.addControl(new BMap.NavigationControl());   //添加地图类型控件
//        map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
//        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        map.disableDoubleClickZoom()

        var geoc = new BMap.Geocoder();
        var p_x;
        var p_y;

        //记录第一次点击的坐标
        map.addEventListener("touchstart",function(e){
            p_x = e.jb.x;
            p_y = e.jb.y;

            //console.log(e.offsetY);
        });
//        map.addEventListener("touchend",function(e){
//            console.log(e.jb.x);
//            console.log(e.jb.x);
//            //console.log(e);
//            //console.log(e.offsetY);
//        });
        map.addEventListener("touchend", function (e) {
            //手指进行拖动了就不设置标注
            if(Math.abs(p_x - e.jb.x)>5||Math.abs(p_y - e.jb.y)>5){
                return;
            }

            var pt = e.point;
            map.clearOverlays();
            var marker = new BMap.Marker(pt, {icon: icon});
            var marker = new BMap.Marker(pt, {icon: icon});
            map.addOverlay(marker);
            geoc.getLocation(pt, function (rs) {
                var addComp = rs.addressComponents;
                console.log(addComp);
                console.log(e.point.lng + "," + e.point.lat);

                $('#longitude').val(e.point.lng);
                $('#latitude').val(e.point.lat);
                $('#detail_address').attr("data-longitude",e.point.lng);
                $('#detail_address').attr("data-latitude",e.point.lat);
                $('#detail_address').val('');
                //$('#map_address').html(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                $('#detail_address').val(addComp.province + addComp.city  + addComp.district + addComp.street + addComp.streetNumber);

            });
        });
    }

    function myFun(result){
        var cityName = result.name;
        var geolocation = new BMap.Geolocation();
        var gc = new BMap.Geocoder();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                //alert('您的位置：'+r.point.lng+','+r.point.lat);
                var pt = r.point;
                initMap(pt);
//                gc.getLocation(pt, function (rs) {
//                    var addComp = rs.addressComponents;
//
//                    var province = addComp.province;
//                    var city = addComp.city;
//                    var area = addComp.district;
//
//                    if (province != "" && city != "" && area != "") {
//                        // alert(province);
//                        alert("当前定位城市:"+province+city+area);
//                        window.location.href="/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng;
//
//                    }
//                    //alert("当前定位城市:"+cityName);
//                    //
//                });
            }
            else {
                alert('failed'+this.getStatus());
            }
        },{enableHighAccuracy: true})

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
	

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/submit_order.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/submit_order_address.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version={$version}"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/new_goods_address.css?version={$version}"/>
<style type="text/css">
	.base_data{
		margin-bottom:0;
		background:#fff;
	}
	.detail_address{
		padding-bottom:0.5rem;
		line-height:1.1rem;
	}
	.text_matter{
		display:block;
		min-height:30px;
		border-bottom: 1px solid #EFEFF4;
	}
	.edit-text{
		display:block;
	    resize: none;
	    width: calc(100% - 4.3rem);
	    padding-left:4.3rem;
	    color: #333;
	    font-size: 0.9rem;
	    min-height:50px;
	}
	.input_matter{
		color:#323232;
	}
	.detail_address .left_control{
		height:1.1rem;
		line-height:1.1rem;
	}
	.goods-label-li{
		height:auto;
		padding:0.5rem 0.75rem 0.5rem 0;
	}
	.goods-label{
		max-width:60%;
		display:flex;
		display:-webkit-flex;
		flex-direction:column;
		-webkit-flex-direction:column;
		justify-content:center;
		-webkit-justify-content:center;
	}
	.goods-label .label-type{
		font-size:0.7rem;
		color:#666;
	}
	.modal_choose .scroll_answer_list{
		overflow:hidden;
	}
	.new-address-inner{
		background:#fff;
	}
	.new-address-outer{
		padding-top:0;
	}
</style>


</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<form action="/FrontOrder/create_order_and_pay/" id="myform" method="post">
    <input type="hidden" name="business_id" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">
    <input type="hidden" name="pay_amount" value="<?php echo $_smarty_tpl->tpl_vars['sum_price']->value;?>
">
    <input type="hidden" name="total_amount" value="<?php echo $_smarty_tpl->tpl_vars['total_amount']->value;?>
">
    <input type="hidden" name="shop_discount_id" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop_discount_id'];?>
">
    <input type="hidden" name="shop_discount_num" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop'];?>
">
    <input type="hidden" name="coupon_id" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon_id'];?>
">
    <input type="hidden" name="coupon_num" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon'];?>
">
    <input type="hidden" name="platform_discount_id" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform_discount_id'];?>
">
    <input type="hidden" name="platform_discount_num" value="<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform'];?>
">

    <div class="header">
	    <div class="left_header native_back" onclick="history.go(-1)">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
	    <h1>提交订单</h1>
	</div>
<div class="main_content">

    <a href="javascript:;" class="address_link" <?php if ($_smarty_tpl->tpl_vars['user_check_address_info']->value){?>style="display:none;"<?php }?>>
        <div class="address_left">
            <span class="img_new_add_small icon_dingwei"></span>
            <span class="text">请填写您的收货地址</span>
        </div>
        <div class="icon_add_person icon_left_gray"></div>
    </a>
    
    <a class="address_link_modify" <?php if (!$_smarty_tpl->tpl_vars['user_check_address_info']->value){?>style="display:none;"<?php }?>>
        <div class="address_detail_left" data-address-id="$user_check_address_info.user_address_id">
            <input type="hidden" name="user_address_id" value="<?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['user_address_id'];?>
">
            <div class="top"><span class="name">收货人：<?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['realname'];?>
</span><span class="tel"><?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['mobile'];?>
</span></div>
            <div class="down"><?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['address'];?>
</div>
        </div>
        <div class="icon_add_person icon_left_gray"></div>
    </a>
</div>
<div class="line"></div>
<div class="send_time" id="choose_send_time">
    <div class="label">选择送达时间</div>
    <div class="choose_time_link" data-year="" data-time="">
    	<span class="blue" id="time_text">立即送出</span>
    	<span class="icon_add_person icon_left_gray"></span>
    </div>
</div>
<div class="list_content">
    <div class="name_content">
        <span class="tips_icon icon_store"></span>
        <span><?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
</span>
    </div>
    <ul class="order_list">
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shop_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        <li class="order_list_detail goods-label-li">
            <div class="label goods-label">
            	<span class="label-name">
            		<?php echo $_smarty_tpl->tpl_vars['this']->value['item_name'];?>

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
            	<span class="label">¥<?php echo $_smarty_tpl->tpl_vars['this']->value['sum'];?>
</span>
            </div>
        </li>
        <?php } ?>
        <!--<li class="order_list_detail">-->
            <!--<div class="label">蜜汁猪扒饭</div>-->
            <!--<div class=""><span class="grey_number">X5</span><span class="label">¥110</span></div>-->
        <!--</li>-->
        <li class="order_list_detail">
            <div class="label_grey">餐盒费</div>
            <div class=""><span class="label">¥<?php echo $_smarty_tpl->tpl_vars['box_fee']->value;?>
</span></div>
        </li>
        <li class="order_list_detail">
            <div class="label_grey">配送费</div>
            <div class=""><span class="label">¥<?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee'];?>
</span></div>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['breakes']->value['shop']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>商家满减优惠</span></div>
            <div class="money label">- ¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['breakes']->value['platform']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_pay3x"></i><span>平台满减优惠</span></div>
            <div class="money label">- ¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform'];?>
</div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['breakes']->value['coupon']!=0){?>
        <li class="privilege">
            <div class="left_control"><i class="icon_pic1 icon_ticket3x"></i><span>优惠券优惠</span></div>
            <div class="money label">- ¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon'];?>
</div>
        </li>
        <?php }?>
    </ul>
</div>
<textarea name="note" id="note" placeholder="备注"></textarea>
<div class="footer_fixed">
    <div class="privilege_info">¥<?php echo $_smarty_tpl->tpl_vars['sum_price']->value;?>
<span class="grey">（已优惠¥<?php echo $_smarty_tpl->tpl_vars['breakes']->value['sum'];?>
）</span></div>
    <div class="submit_order">提交订单</div>
</div>
<!--todo 选择送货的时间-->
<div class="modal_choose">
    <div class="content">
        <div class="title">选择送达时间</div>
        <div class="scroll_answer_list" id="scroll_answer_list">
            <ul class="answer_choose_list" id="answer_choose_list">
                <li class="show_choose active" data-flag="0">
                    <input type="hidden" name="arrive_time" value="0">
                    <div class="name" data-id="" data-answ="">立即送出</div>
                    <div class="icon_market icon_select_default icon_selected_b"></div>
                </li>
                <!--
                <li class="show_choose">
                    <div class="name" data-id="" data-answ="">12:30</div>
                    <div class="icon_market icon_select_default"></div>
                </li>
                -->
            </ul>
        </div>
    </div>
</div>
</form>
<!--收货地址列表-->
<div class="choose-address-outer">
	<ul class="address-scroll">
		<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
		<li class="address-list" data-address-id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
			<div class="list-head">
            	<span class="name"><?php echo $_smarty_tpl->tpl_vars['this']->value['realname'];?>
</span>
            	<span class="tel"><?php echo $_smarty_tpl->tpl_vars['this']->value['mobile'];?>
</span>
        	</div>
        	<div class="list-bot">
				<span class="address-cont"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</span>
        	</div>
		</li>
		<?php } ?>
		<!--<li class="address-list">-->
			<!--<div class="list-head">-->
            	<!--<span class="name">总经理</span>-->
            	<!--<span class="tel">787878999</span>-->
        	<!--</div>-->
        	<!--<div class="list-bot">-->
        		<!--<span class="address-cont">浙江省杭州市江干区民心路</span>-->
        	<!--</div>-->
		<!--</li>-->
	</ul>
	<span class="new-address-btn">新建收货地址</span>
</div>
<!--新增收货地址-->
<div class="new-address-outer">
	<div class="new-address-inner">
	<!--todo 列表显示-->
	<h6 class="new-address-title">
		新建收货地址
		<span class="address-close"></span>
	</h6>
	<form action="" class="base_data">
	    <div class="form_group">
	        <label for="person_name" class="label_style">姓名</label>
	        <input type="text" id="person_name" placeholder="请填写" class="input_matter" name='realname' value="<?php echo $_smarty_tpl->tpl_vars['user_address_info']->value['realname'];?>
">
	    </div>
	    <div class="form_group">
	        <label for="phone" class="label_style">手机号</label>
	        <input type="number" id="phone" placeholder="请填写" class="input_matter" name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
">
	    </div>
	    <!--
	    <div class="base_data_list">
	        <label class="label_style">所在省</label>
	        <select class="select_matter" id="province_id" name="province_id">
	            <option value="0">请选择省份</option>
	            <?php  $_smarty_tpl->tpl_vars['province'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['province']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['province']->key => $_smarty_tpl->tpl_vars['province']->value){
$_smarty_tpl->tpl_vars['province']->_loop = true;
?>
	            <option value="<?php echo $_smarty_tpl->tpl_vars['province']->value['province_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['user_address_info']->value['province_id']==$_smarty_tpl->tpl_vars['province']->value['province_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['province']->value['province_name'];?>
</option>
	            <?php } ?>
	        </select>
	        <div class="right_choose">
	            <div class="icon_add_person icon_left_gray"></div>
	        </div>
	    </div>
	    -->
	    <div class="detail_address">
	        <div class="left_control">
	            <label class="label_style">收货地址</label>
	        </div>
	        <textarea placeholder="省、市、区" class="text_matter" id="detail_address" maxlength="60" data-longitude="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['x'];?>
"  data-latitude="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['y'];?>
" name="address" readonly><?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['name'];?>
</textarea>
	        <input type="hidden" name="longitude" id="longitude" value="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['x'];?>
">
	        <input type="hidden" name="latitude" id="latitude" value="<?php echo $_smarty_tpl->tpl_vars['near_address_arr']->value['point']['y'];?>
">
	    </div>
	    <textarea class="edit-text" placeholder="详细地址" maxlength="30"></textarea>
	    <div style="padding-right:0.75rem;" class="map-wrapper">
	        <div id="allmap"  style="height:300px;width: 100%;" ></div>
	    </div>
	   <!-- <div class="whether_default">
	        <span class="icon_market icon_select_rect <?php if ($_smarty_tpl->tpl_vars['user_address_info']->value['is_default']){?>icon_selected_rect<?php }?> default_check"></span>
	        <input type="hidden" name="is_default" id="is_default" value="<?php echo $_smarty_tpl->tpl_vars['user_address_info']->value['is_default'];?>
">
	        <span>设为默认地址</span>
	    </div>-->
	    <input type="hidden" id="whether_selected" value="1">
	</form>
	<div class="save" id="submit">保存</div>
	<!--todo 添加成功-->
	<div class="modal modal_success">
	    <div class="modal_content">
	        <div class="tips_icon icon_success_b"></div>
	        <p class="text">添加成功</p>
	    </div>
	</div>
	<!--todo 添加失败-->
	<div class="modal modal_fail">
	    <div class="modal_content">
	        <div class="tips_icon icon_fail"></div>
	        <p class="text">添加失败</p>
	        <p class="tips">请确认地址后重新保存</p>
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
	
<script type="text/javascript">
        var delivery_fee='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee'];?>
';//配送费
        var business_id=<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
;
        var pay_amount=<?php echo $_smarty_tpl->tpl_vars['sum_price']->value;?>
;
        var total_amount=<?php echo $_smarty_tpl->tpl_vars['total_amount']->value;?>
;
        var shop_discount_id=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop_discount_id'];?>
;
        var shop_discount_num=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['shop'];?>
;
        var coupon_id=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon_id'];?>
;
        var coupon_num=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['coupon'];?>
;
        var platform_discount_id=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform_discount_id'];?>
;
        var platform_discount_num=<?php echo $_smarty_tpl->tpl_vars['breakes']->value['platform'];?>
;
        var user_address_id='<?php echo $_smarty_tpl->tpl_vars['user_check_address_info']->value['user_address_id'];?>
';
        var box_fee='<?php echo $_smarty_tpl->tpl_vars['box_fee']->value;?>
';
</script>

<script>
    var box_count=<?php echo $_smarty_tpl->tpl_vars['box_count']->value;?>
;
    var timeType = <?php echo $_smarty_tpl->tpl_vars['business_type']->value;?>
;//1:外卖;2:菜市场;
    var range = '<?php echo $_smarty_tpl->tpl_vars['business_info']->value['range'];?>
';
    var delivery_fee_free = '<?php echo $_smarty_tpl->tpl_vars['business_info']->value['delivery_fee_free'];?>
';//满免运费
    var start_delivery_fee ='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['start_delivery_fee'];?>
';//起送

	console.log(timeType);
</script>


<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BQLHGlffjbXC30bFDcpIQkHIkaxKBBe6&services=true"></script>
<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js"></script>

<script type="text/javascript">
	var timeScroll = new iScroll("scroll_answer_list");
	setTimeout(function(){
		timeScroll.refresh();
	},200);

</script>

<script type="text/javascript">
	//deliverTime:配送时间;initTime:最早配送时间;endTime:最晚配送时间;sendInit:配送起始时间;
	//var timeType = 1;//1:外卖;2:菜市场;
	var deliverTime = 1;
	var interval = 0.5;
	var initTime,endTime,sendInit;
	if(timeType==1){
		initTime = 9.5;
		endTime = 23.5;
		sendInit = initTime;
	}else{
		initTime = 8;
		endTime = 18;
		sendInit = initTime;
	}
	//送达时间
	var sendEnd = sendInit + deliverTime;
</script>

<script src="/Public/Js/front/front_js/choose_time.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Js/front/front_js/submit_order.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	var arrive_time=0;
    var user_remark='';
    var is_submit=0;
    $(".submit_order").on("click",function () {
        if(box_count==0){
            show_alert('订单列表暂无商品，请添加！');
            setTimeout(function(){
                $(".modal_alert").hide();
            },1500);
            return;
        }
        if(is_submit==1){
            show_alert('订单已提交，请返回订单列表查看！');
            setTimeout(function(){
                $(".modal_alert").hide();
            },1500);
            return;
        }
        user_remark=$('#note').val();
    	var addressShow = $(".address_link_modify").css("display");
    	var nowHour = new Date().getHours();
	    var nowMin = new Date().getMinutes()/60;
	    var nowTime = nowHour + nowMin;
		var getYearVal = $(".choose_time_link").attr("data-year");
		var getTimeVal = $(".choose_time_link").attr("data-time");
		if(getYearVal==''){
			show_alert('请选择配送时间！');
    		setTimeout(function(){
    			$(".modal_alert").hide();
    		},1500);
    		return;
		}
        arrive_time=getYearVal+' '+getTimeVal;
		getTimeVal = getTimeVal.split(":");
    	if(addressShow!="none"){
    		if(timeType==1){
    			if(nowTime>endTime){
	    			show_alert('抱歉，不在配送时间！');
		    		setTimeout(function(){
		    			$(".modal_alert").hide();
		    		},1500);
		    		return;
	    		}
    			if(nowHour>Number(getTimeVal[0])){
    				show_alert('请选择正确配送时间！');
		    		setTimeout(function(){
		    			$(".modal_alert").hide();
		    		},1500);
		    		return;
    			}else if(nowHour==Number(getTimeVal[0])){
    				if(nowMin>Number(getTimeVal[1])){
    					show_alert('抱歉，不在配送时间！');
			    		setTimeout(function(){
			    			$(".modal_alert").hide();
			    		},1500);
			    		return;
    				}
    			}
    		}
    		if(pay_amount<start_delivery_fee){
                show_alert('低于起送价格！');
                setTimeout(function(){
                    $(".modal_alert").hide();
                },1500);
                return;
            }
            is_submit=1;
    		$.ajax({
	            url:"/FrontOrder/create_order",
	            type:"POST",
	            dataType:"json",
	            data:{
                    delivery_fee:delivery_fee,
                    box_fee:box_fee,
	                business_id:business_id,
	                pay_amount:pay_amount,
	                total_amount:total_amount,
	                shop_discount_id:shop_discount_id,
	                shop_discount_num:shop_discount_num,
	                coupon_id:coupon_id,
	                coupon_num:coupon_num,
	                platform_discount_id:platform_discount_id,
	                platform_discount_num:platform_discount_num,
	                user_address_id:user_address_id,
	                arrive_time:arrive_time,
                    user_remark:user_remark

	            },
	            success:function(d){
	                console.log(d);
	                if(d.status=="success")
	                {	
	                	var url = "/FrontOrder/create_order_and_pay/order_id/"+d.order_id;
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
	                		location.href=url;
						}

	                }
	                else if(d.status=="stock")
	                {
                        is_submit=0;
	                    show_alert(d.detail);
	                }else if(d.status=="distance"){
                        is_submit=0;
	                    show_alert("大于商家配送距离")
                    }
	                else{
	                    show_alert("提交订单失败");
	                }
	
	            },
	            error:function(e){
	                console.log(e);
	            }
	        });
    	}else{
    		show_alert('请填写收货地址！');
    		setTimeout(function(){
    			$(".modal_alert").hide();
    		},1500);
    	}
    	
        
        
    });
	
	/*---todo 地图控制函数---*/
	//function getAddr() {
//    var myCity = new BMap.LocalCity();
//    myCity.get(myFun);
    // }

    function initMap(position) {
        var map = new BMap.Map("allmap");    // 创建Map实例
       // var point = new BMap.Point(116.331398,39.897445);
        var icon = new BMap.Icon('/Public/Images/point.png', new BMap.Size(40, 40), {
            anchor: new BMap.Size(20, 40)});

        var latitude = $("#detail_address").attr("data-latitude");
        var longitude = $('#detail_address').attr("data-longitude");
        var address =  $('#detail_address').val();
        if(latitude!=""&&longitude!=""){
			console.log(longitude);
			console.log(latitude);
            var point = new BMap.Point(longitude,latitude);
            var marker = new BMap.Marker(point,{icon:icon});
            //加上label提示
//            var label = new window.BMap.Label(address, { offset: new window.BMap.Size(20, -10) });
//            marker.setLabel(label);
            map.addOverlay(marker);
            map.centerAndZoom(point, 15);
        }else{
            var marker = new BMap.Marker(position,{icon:icon});
            map.addOverlay(marker);
            map.centerAndZoom(position, 15);
        }

        map.addControl(new BMap.NavigationControl());   //添加地图类型控件
//        map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
//        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        map.disableDoubleClickZoom()

        var geoc = new BMap.Geocoder();
        var p_x;
        var p_y;

        //记录第一次点击的坐标
        map.addEventListener("touchstart",function(e){
            p_x = e.jb.x;
            p_y = e.jb.y;

            //console.log(e.offsetY);
        });
//        map.addEventListener("touchend",function(e){
//            console.log(e.jb.x);
//            console.log(e.jb.x);
//            //console.log(e);
//            //console.log(e.offsetY);
//        });
        map.addEventListener("touchend", function (e) {
            //手指进行拖动了就不设置标注
            if(Math.abs(p_x - e.jb.x)>5||Math.abs(p_y - e.jb.y)>5){
                return;
            }

            var pt = e.point;
            map.clearOverlays();
            var marker = new BMap.Marker(pt, {icon: icon});
            var marker = new BMap.Marker(pt, {icon: icon});
            map.addOverlay(marker);
            geoc.getLocation(pt, function (rs) {
                var addComp = rs.addressComponents;
                console.log(addComp);
                console.log(e.point.lng + "," + e.point.lat);

                $('#longitude').val(e.point.lng);
                $('#latitude').val(e.point.lat);
                $('#detail_address').attr("data-longitude",e.point.lng);
                $('#detail_address').attr("data-latitude",e.point.lat);
                $('#detail_address').val('');
                //$('#map_address').html(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                $('#detail_address').val(addComp.province + addComp.city  + addComp.district + addComp.street + addComp.streetNumber);

            });
        });
    }

    function myFun(result){
        var cityName = result.name;
        var geolocation = new BMap.Geolocation();
        var gc = new BMap.Geocoder();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                //alert('您的位置：'+r.point.lng+','+r.point.lat);
                var pt = r.point;
                initMap(pt);
//                gc.getLocation(pt, function (rs) {
//                    var addComp = rs.addressComponents;
//
//                    var province = addComp.province;
//                    var city = addComp.city;
//                    var area = addComp.district;
//
//                    if (province != "" && city != "" && area != "") {
//                        // alert(province);
//                        alert("当前定位城市:"+province+city+area);
//                        window.location.href="/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng;
//
//                    }
//                    //alert("当前定位城市:"+cityName);
//                    //
//                });
            }
            else {
                alert('failed'+this.getStatus());
            }
        },{enableHighAccuracy: true})

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