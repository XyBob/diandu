<?php /* Smarty version Smarty-3.1.6, created on 2017-07-04 17:39:12
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\account_list.html" */ ?>
<?php /*%%SmartyHeaderCode:6346595b6240f25f95-80397811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '901c89effee5d62e8141a79f62575117e9a7435a' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\account_list.html',
      1 => 1497594960,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1497504379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6346595b6240f25f95-80397811',
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
  'unifunc' => 'content_595b6241626a7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595b6241626a7')) {function content_595b6241626a7($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/loading.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/list_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<style>
  #load_wrapper{
    top:2.2rem;
  }
  .total_none{
		width:100%;
		font-size:0.8rem;
		line-height:3rem;
		color:#999;
		text-align:center;
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
<header>
  <div class="left_header native_back" id="current_page_arrow">
    <div class="icon_add_person icon_left_white"></div>
  </div>
  <h1>账户明细</h1>
</header>
<div id="load_wrapper">
  <div id="scroller" style="padding-bottom: 2.4rem;<?php if ($_smarty_tpl->tpl_vars['account_list']->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
    <ul class="main" id="new_list">
      <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['account_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
      <li>
        <div class="header clearfix">
          <p class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['addtime'];?>
</p>
          <span class="fr"><?php echo $_smarty_tpl->tpl_vars['this']->value['change_type'];?>
</span>
        </div>
        <div class="cont">
          <h1>￥<?php echo $_smarty_tpl->tpl_vars['this']->value['change_money'];?>
</h1>
          <div class="cont_top clearfix">
            <p class="fl">变动前金额:</p>
            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['amount_before_pay'];?>
</span>
          </div>
          <div class="cont_top clearfix">
            <p class="fl">变动后金额:</p>
            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['amount_after_pay'];?>
</span>
          </div>
        </div>
        <div class="footer">
          <div class="footer_cont">
            <p>备注:</p>
            <span><?php echo $_smarty_tpl->tpl_vars['this']->value['remark'];?>
</span>
          </div>
        </div>
      </li>
      <?php } ?>
      <!--<li class="new_content">
        <div class="time">5月13日</div>
        <ul class="content">
          <li class="each">
            <div class="img_related">
              <div class="img_left">
                <img src="/Public/Images/front/data/item.jpg" class="img-responsive">
              </div>
              <div class="img_right">
                <span class="detailed_info">黄焖鸡米饭（仓前店）</span>
                <span class="detailed_time">2017-05-17 13:40</span>
              </div>
            </div>
            <div class="right_content">-¥220.00</div>
          </li>
          <li class="each">
            <div class="img_related">
              <div class="img_left">
                <img src="/Public/Images/front/data/item.jpg" class="img-responsive">
              </div>
              <div class="img_right">
                <span class="detailed_info">黄焖鸡米饭（仓前店）</span>
                <span class="detailed_time">2017-05-17 13:40</span>
              </div>
            </div>
            <div class="right_content">-¥220.00</div>
          </li>
          <li class="each">
            <div class="img_related">
              <div class="img_left">
                <img src="/Public/Images/front/data/item.jpg" class="img-responsive">
              </div>
              <div class="img_right">
                <span class="detailed_info">黄焖鸡米饭（仓前店）</span>
                <span class="detailed_time">2017-05-17 13:40</span>
              </div>
            </div>
            <div class="right_content">-¥220.00</div>
          </li>
        </ul>
      </li>-->
    </ul>
    <div id="pullUp">
        <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
    </div>
  </div>
  <p class="total_none" style="<?php if ($_smarty_tpl->tpl_vars['account_list']->value){?>display:none;<?php }else{ ?>display:block;<?php }?>">暂无账户明细</p>
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
	
<script type="text/javascript" src="/Public/Js/front/iscroll.js"></script>
<script type="text/javascript" src="/Public/Js/front/front_js/item_list.js"></script>
<script>
  var firstRow='<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
';
	firstRow = Number(firstRow);
	var total='<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
';
	total = Number(total);
</script>

<script>
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/loading.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/list_style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<style>
  #load_wrapper{
    top:2.2rem;
  }
  .total_none{
		width:100%;
		font-size:0.8rem;
		line-height:3rem;
		color:#999;
		text-align:center;
	}
</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<header>
  <div class="left_header native_back" id="current_page_arrow">
    <div class="icon_add_person icon_left_white"></div>
  </div>
  <h1>账户明细</h1>
</header>
<div id="load_wrapper">
  <div id="scroller" style="padding-bottom: 2.4rem;<?php if ($_smarty_tpl->tpl_vars['account_list']->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
    <ul class="main" id="new_list">
      <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['account_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
      <li>
        <div class="header clearfix">
          <p class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['addtime'];?>
</p>
          <span class="fr"><?php echo $_smarty_tpl->tpl_vars['this']->value['change_type'];?>
</span>
        </div>
        <div class="cont">
          <h1>￥<?php echo $_smarty_tpl->tpl_vars['this']->value['change_money'];?>
</h1>
          <div class="cont_top clearfix">
            <p class="fl">变动前金额:</p>
            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['amount_before_pay'];?>
</span>
          </div>
          <div class="cont_top clearfix">
            <p class="fl">变动后金额:</p>
            <span class="fl"><?php echo $_smarty_tpl->tpl_vars['this']->value['amount_after_pay'];?>
</span>
          </div>
        </div>
        <div class="footer">
          <div class="footer_cont">
            <p>备注:</p>
            <span><?php echo $_smarty_tpl->tpl_vars['this']->value['remark'];?>
</span>
          </div>
        </div>
      </li>
      <?php } ?>
      <!--<li class="new_content">
        <div class="time">5月13日</div>
        <ul class="content">
          <li class="each">
            <div class="img_related">
              <div class="img_left">
                <img src="/Public/Images/front/data/item.jpg" class="img-responsive">
              </div>
              <div class="img_right">
                <span class="detailed_info">黄焖鸡米饭（仓前店）</span>
                <span class="detailed_time">2017-05-17 13:40</span>
              </div>
            </div>
            <div class="right_content">-¥220.00</div>
          </li>
          <li class="each">
            <div class="img_related">
              <div class="img_left">
                <img src="/Public/Images/front/data/item.jpg" class="img-responsive">
              </div>
              <div class="img_right">
                <span class="detailed_info">黄焖鸡米饭（仓前店）</span>
                <span class="detailed_time">2017-05-17 13:40</span>
              </div>
            </div>
            <div class="right_content">-¥220.00</div>
          </li>
          <li class="each">
            <div class="img_related">
              <div class="img_left">
                <img src="/Public/Images/front/data/item.jpg" class="img-responsive">
              </div>
              <div class="img_right">
                <span class="detailed_info">黄焖鸡米饭（仓前店）</span>
                <span class="detailed_time">2017-05-17 13:40</span>
              </div>
            </div>
            <div class="right_content">-¥220.00</div>
          </li>
        </ul>
      </li>-->
    </ul>
    <div id="pullUp">
        <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
    </div>
  </div>
  <p class="total_none" style="<?php if ($_smarty_tpl->tpl_vars['account_list']->value){?>display:none;<?php }else{ ?>display:block;<?php }?>">暂无账户明细</p>
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
	<?php }?>
	<!--JS-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>

    <!-- <script src="/stat.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script> -->
	
<script type="text/javascript" src="/Public/Js/front/iscroll.js"></script>
<script type="text/javascript" src="/Public/Js/front/front_js/item_list.js"></script>
<script>
  var firstRow='<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
';
	firstRow = Number(firstRow);
	var total='<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
';
	total = Number(total);
</script>

<script>
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
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