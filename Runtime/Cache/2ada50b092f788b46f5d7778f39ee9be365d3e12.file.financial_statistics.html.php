<?php /* Smarty version Smarty-3.1.6, created on 2017-07-04 17:30:27
         compiled from "C:\wamp\www\diandu\Tpl\FrontMerchant\financial_statistics.html" */ ?>
<?php /*%%SmartyHeaderCode:30222595b603394bca4-50241769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ada50b092f788b46f5d7778f39ee9be365d3e12' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontMerchant\\financial_statistics.html',
      1 => 1494221962,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1497504379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30222595b603394bca4-50241769',
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
  'unifunc' => 'content_595b60340e68e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595b60340e68e')) {function content_595b60340e68e($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/statistics.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>
    .img-control{
        width:100%;
        height:auto;
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
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>月数据统计</h1>
</div>
<div class="header_empty"></div>
<div id="income_container"></div>
<div style="height: 20px;background: #e0e0e0"></div>
<div id="income_num_container"></div>
<div style="height: 20px;background: #e0e0e0"></div>
<div id="income_extend_container"></div>
<div style="height: 20px;background: #e0e0e0"></div>
<div id="container"></div>
<div id="container_none">暂时没有推荐数据</div>
<!--<img src="/Public/Images/front/front_img/financial.png" class="img-control">-->

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
	
<script src="/Public/Js/highcharts.js"></script>

<script type="text/javascript">
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
</script>

<script type="text/javascript">
    var d = '<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
';
    var day_list = '<?php echo $_smarty_tpl->tpl_vars['day_num']->value;?>
';
    var income_datas = [];
    <?php  $_smarty_tpl->tpl_vars['income'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['income']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recharge_amount_stat_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['income']->key => $_smarty_tpl->tpl_vars['income']->value){
$_smarty_tpl->tpl_vars['income']->_loop = true;
?>
    income_datas.push(<?php echo $_smarty_tpl->tpl_vars['income']->value;?>
);
    <?php } ?>

    var extra_income_datas = [];
    <?php  $_smarty_tpl->tpl_vars['income'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['income']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recharge_amount_extra_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['income']->key => $_smarty_tpl->tpl_vars['income']->value){
$_smarty_tpl->tpl_vars['income']->_loop = true;
?>
    extra_income_datas.push(<?php echo $_smarty_tpl->tpl_vars['income']->value;?>
);
    <?php } ?>

    var income_num_datas = [];
    <?php  $_smarty_tpl->tpl_vars['income'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['income']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_order_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['income']->key => $_smarty_tpl->tpl_vars['income']->value){
$_smarty_tpl->tpl_vars['income']->_loop = true;
?>
    income_num_datas.push(<?php echo $_smarty_tpl->tpl_vars['income']->value;?>
);
    <?php } ?>

    var merchant_num = <?php echo $_smarty_tpl->tpl_vars['merchant_num']->value;?>
;
    var person_num = <?php echo $_smarty_tpl->tpl_vars['person_num']->value;?>
;
    var business_title = '商户 '+merchant_num+" 家";
    var person_title = '个人 '+person_num+" 人";

    //解决数据都为0时不显示的情况
    if(merchant_num==0&&person_num==0){
        merchant_num = 1;
        person_num = 1;
        business_title = '商户 0 家';
        person_title = '用户 0 人';
    }


    $('#income_container').highcharts({
        chart:{
            type:'line',
            color:"#eeffaa"
        },
        title: {
            text: d +  ' 订单实际收入汇总'
        },
        xAxis: {
            categories: eval(day_list)
        },
        yAxis: {
            title: {
                text: 'RMB(元)'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                color:"#f93b23"
            }
        },
        series: [{
            name: '消费收入',
            data: income_datas
        }]
    });

    $('#income_num_container').highcharts({
        chart:{
            type:'line',
            color:"#eeffaa"
        },
        title: {
            text: d +  ' 订单量汇总'
        },
        xAxis: {
            categories: eval(day_list)
        },
        yAxis: {
            title: {
                text: '次'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                color:"#f93b23"
            }
        },
        series: [{
            name: '订单量',
            data: income_num_datas,
//            color:"#aacc32"
        }]
    });
    $('#income_extend_container').highcharts({
        chart:{
            type:'line',
            color:"#eeffaa"
        },
        title: {
            text: d +  ' 推广收入汇总'
        },
        xAxis: {
            categories: eval(day_list)
        },
        yAxis: {
            title: {
                text: 'RMB(元)'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                color:"#f93b23"
            }
        },
        series: [{
            name: '推广收入',
            data: extra_income_datas,
//            color:"#aacc32"
        }]
    });

    
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        colors:[
            '#F93B23',//第一个颜色，欢迎加入Highcharts学习交流群294191384
            '#ffc073',
        ],
        title: {
            text:d +  ' 推广数汇总',
            align: 'center',
            verticalAlign: 'middle',
            y: -150
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            percentageDecimals: 2 //百分比保留小数
        },
        plotOptions: {
            pie: {
                dataLabels: {
//                    enabled: true,
                    distance: -30,
                    style: {
//                        fontWeight: 'bold',
                        color: 'white',
//                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: 0,
                endAngle: 360,
                center: ['50%', '50%']
            }
        },
        series: [{
            type: 'pie',
            name: '占比',
            size: '60%',
            innerSize: '35%',
            data: [
                [business_title, merchant_num],
                [person_title, person_num],
//                ['Chrome', 12.8],
//                ['Safari',    8.5],
//                ['Opera',     6.2],
//                {
//                    name: '其他',
//                    y: 0.7,
//                    dataLabels: {
//                        // 数据比较少，没有空间显示数据标签，所以将其关闭
//                        enabled: false
//                    }
//                }
            ]
        }]
    });
    
</script>
<style>
    /*a*/
</style>


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
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/statistics.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>
    .img-control{
        width:100%;
        height:auto;
    }
</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>月数据统计</h1>
</div>
<div class="header_empty"></div>
<div id="income_container"></div>
<div style="height: 20px;background: #e0e0e0"></div>
<div id="income_num_container"></div>
<div style="height: 20px;background: #e0e0e0"></div>
<div id="income_extend_container"></div>
<div style="height: 20px;background: #e0e0e0"></div>
<div id="container"></div>
<div id="container_none">暂时没有推荐数据</div>
<!--<img src="/Public/Images/front/front_img/financial.png" class="img-control">-->

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
	
<script src="/Public/Js/highcharts.js"></script>

<script type="text/javascript">
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
</script>

<script type="text/javascript">
    var d = '<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
';
    var day_list = '<?php echo $_smarty_tpl->tpl_vars['day_num']->value;?>
';
    var income_datas = [];
    <?php  $_smarty_tpl->tpl_vars['income'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['income']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recharge_amount_stat_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['income']->key => $_smarty_tpl->tpl_vars['income']->value){
$_smarty_tpl->tpl_vars['income']->_loop = true;
?>
    income_datas.push(<?php echo $_smarty_tpl->tpl_vars['income']->value;?>
);
    <?php } ?>

    var extra_income_datas = [];
    <?php  $_smarty_tpl->tpl_vars['income'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['income']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recharge_amount_extra_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['income']->key => $_smarty_tpl->tpl_vars['income']->value){
$_smarty_tpl->tpl_vars['income']->_loop = true;
?>
    extra_income_datas.push(<?php echo $_smarty_tpl->tpl_vars['income']->value;?>
);
    <?php } ?>

    var income_num_datas = [];
    <?php  $_smarty_tpl->tpl_vars['income'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['income']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_order_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['income']->key => $_smarty_tpl->tpl_vars['income']->value){
$_smarty_tpl->tpl_vars['income']->_loop = true;
?>
    income_num_datas.push(<?php echo $_smarty_tpl->tpl_vars['income']->value;?>
);
    <?php } ?>

    var merchant_num = <?php echo $_smarty_tpl->tpl_vars['merchant_num']->value;?>
;
    var person_num = <?php echo $_smarty_tpl->tpl_vars['person_num']->value;?>
;
    var business_title = '商户 '+merchant_num+" 家";
    var person_title = '个人 '+person_num+" 人";

    //解决数据都为0时不显示的情况
    if(merchant_num==0&&person_num==0){
        merchant_num = 1;
        person_num = 1;
        business_title = '商户 0 家';
        person_title = '用户 0 人';
    }


    $('#income_container').highcharts({
        chart:{
            type:'line',
            color:"#eeffaa"
        },
        title: {
            text: d +  ' 订单实际收入汇总'
        },
        xAxis: {
            categories: eval(day_list)
        },
        yAxis: {
            title: {
                text: 'RMB(元)'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                color:"#f93b23"
            }
        },
        series: [{
            name: '消费收入',
            data: income_datas
        }]
    });

    $('#income_num_container').highcharts({
        chart:{
            type:'line',
            color:"#eeffaa"
        },
        title: {
            text: d +  ' 订单量汇总'
        },
        xAxis: {
            categories: eval(day_list)
        },
        yAxis: {
            title: {
                text: '次'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                color:"#f93b23"
            }
        },
        series: [{
            name: '订单量',
            data: income_num_datas,
//            color:"#aacc32"
        }]
    });
    $('#income_extend_container').highcharts({
        chart:{
            type:'line',
            color:"#eeffaa"
        },
        title: {
            text: d +  ' 推广收入汇总'
        },
        xAxis: {
            categories: eval(day_list)
        },
        yAxis: {
            title: {
                text: 'RMB(元)'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                color:"#f93b23"
            }
        },
        series: [{
            name: '推广收入',
            data: extra_income_datas,
//            color:"#aacc32"
        }]
    });

    
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        colors:[
            '#F93B23',//第一个颜色，欢迎加入Highcharts学习交流群294191384
            '#ffc073',
        ],
        title: {
            text:d +  ' 推广数汇总',
            align: 'center',
            verticalAlign: 'middle',
            y: -150
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            percentageDecimals: 2 //百分比保留小数
        },
        plotOptions: {
            pie: {
                dataLabels: {
//                    enabled: true,
                    distance: -30,
                    style: {
//                        fontWeight: 'bold',
                        color: 'white',
//                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: 0,
                endAngle: 360,
                center: ['50%', '50%']
            }
        },
        series: [{
            type: 'pie',
            name: '占比',
            size: '60%',
            innerSize: '35%',
            data: [
                [business_title, merchant_num],
                [person_title, person_num],
//                ['Chrome', 12.8],
//                ['Safari',    8.5],
//                ['Opera',     6.2],
//                {
//                    name: '其他',
//                    y: 0.7,
//                    dataLabels: {
//                        // 数据比较少，没有空间显示数据标签，所以将其关闭
//                        enabled: false
//                    }
//                }
            ]
        }]
    });
    
</script>
<style>
    /*a*/
</style>


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