<?php /* Smarty version Smarty-3.1.6, created on 2017-07-25 10:50:29
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\delivery_address.html" */ ?>
<?php /*%%SmartyHeaderCode:231715976b1f585cb84-76909426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e897ef5e84b26f021400f6fc70be8e5e7343ffcf' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\delivery_address.html',
      1 => 1497703254,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231715976b1f585cb84-76909426',
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
  'unifunc' => 'content_5976b1f5dd0e1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5976b1f5dd0e1')) {function content_5976b1f5dd0e1($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/goods_address.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
	
<header>
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>收货地址</h1>
</header>
<div class="header_empty"></div>
<div class="no_address" style="display:none">
    <div class="blank_address"></div>
    <p class="address_tips">暂无收货地址</p>
    <p class="more_tips">您可以新增收货地址以便收货</p>
</div>
<ul class="have_address">
    <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
    <li class="address_list">
        <div class="header clearfix">
            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['realname'];?>
</span><span class="fr"><?php echo $_smarty_tpl->tpl_vars['this']->value['mobile'];?>
</span>
        </div>
        <div class="describe"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</div>
        <div class="edit_control set_default" data-address_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
            <div class="left_control">
               <!-- <span class="icon_market icon_select_default  <?php if ($_smarty_tpl->tpl_vars['this']->value['is_default']==1){?>icon_selected_b<?php }?>" ></span>
                <span>默认地址</span>-->
            </div>
            <div class="right_control">
                <div class="edit_switch" onclick="location.href='/FrontUserCenter/edit_goods_address/user_address_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
'">
                    <span class="icon_market icon_edit"></span>
                    <span>编辑</span>
                </div>
                <div class="del" data-address_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
                    <span class="icon_market icon_delete_1"></span>
                    <span>删除</span>
                </div>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>
<div class="fixed_footer" onclick="location.href='/FrontUserCenter/add_new_goods_address'">新建收货地址</div>
<!--todo 删除地址提示-->
<div class="modal_del">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">确定要删除该地址？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure_del">删除</div>
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
	
<script src="/Public/Js/front/front_js/goods_address_control.js"></script>

<!--todo 返回箭头的控制-->
<script>
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
/*    $('.set_default').on('click',function(){
        var address_id=$(this).data('address_id');
        console.log(address_id);
        $.ajax({
            url: "/FrontUserCenter/set_default_address", //URL
            dataType: "json",
            data: {"address_id":address_id},
            type: "post",
            success: function (data) {
                if(data.code==1){
                    $('.collect').children("i").toggleClass("active");
                }

            }
        });
    });*/

    $(function(){

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
	
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header1.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/goods_address.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>

</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<header>
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>收货地址</h1>
</header>
<div class="header_empty"></div>
<div class="no_address" style="display:none">
    <div class="blank_address"></div>
    <p class="address_tips">暂无收货地址</p>
    <p class="more_tips">您可以新增收货地址以便收货</p>
</div>
<ul class="have_address">
    <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_address_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
    <li class="address_list">
        <div class="header clearfix">
            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['realname'];?>
</span><span class="fr"><?php echo $_smarty_tpl->tpl_vars['this']->value['mobile'];?>
</span>
        </div>
        <div class="describe"><?php echo $_smarty_tpl->tpl_vars['this']->value['address'];?>
</div>
        <div class="edit_control set_default" data-address_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
            <div class="left_control">
               <!-- <span class="icon_market icon_select_default  <?php if ($_smarty_tpl->tpl_vars['this']->value['is_default']==1){?>icon_selected_b<?php }?>" ></span>
                <span>默认地址</span>-->
            </div>
            <div class="right_control">
                <div class="edit_switch" onclick="location.href='/FrontUserCenter/edit_goods_address/user_address_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
'">
                    <span class="icon_market icon_edit"></span>
                    <span>编辑</span>
                </div>
                <div class="del" data-address_id="<?php echo $_smarty_tpl->tpl_vars['this']->value['user_address_id'];?>
">
                    <span class="icon_market icon_delete_1"></span>
                    <span>删除</span>
                </div>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>
<div class="fixed_footer" onclick="location.href='/FrontUserCenter/add_new_goods_address'">新建收货地址</div>
<!--todo 删除地址提示-->
<div class="modal_del">
    <div class="modal_content">
        <div class="tips_icon icon_warning"></div>
        <p class="warning">确定要删除该地址？</p>
        <div class="operation">
            <div class="cancel">取消</div>
            <div class="sure_del">删除</div>
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
	
<script src="/Public/Js/front/front_js/goods_address_control.js"></script>

<!--todo 返回箭头的控制-->
<script>
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
/*    $('.set_default').on('click',function(){
        var address_id=$(this).data('address_id');
        console.log(address_id);
        $.ajax({
            url: "/FrontUserCenter/set_default_address", //URL
            dataType: "json",
            data: {"address_id":address_id},
            type: "post",
            success: function (data) {
                if(data.code==1){
                    $('.collect').children("i").toggleClass("active");
                }

            }
        });
    });*/

    $(function(){

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