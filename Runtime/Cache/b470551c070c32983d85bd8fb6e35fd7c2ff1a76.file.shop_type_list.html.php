<?php /* Smarty version Smarty-3.1.6, created on 2017-07-15 17:50:14
         compiled from "C:\wamp\www\diandu\Tpl\Index\shop_type_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2001059672bac524685-73287644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b470551c070c32983d85bd8fb6e35fd7c2ff1a76' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\Index\\shop_type_list.html',
      1 => 1497851129,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2001059672bac524685-73287644',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59672bacde208',
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
<?php if ($_valid && !is_callable('content_59672bacde208')) {function content_59672bacde208($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/shop_type_list.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<style type="text/css">
		body{
			background:#fff;
		}
		#load_wrapper{
			top:2.2rem;
			height:calc(100% - 2.2rem);
			height:-webkit-calc(100% - 2.2rem);
			height:-moz-calc(100% - 2.2rem);
		}
		#scroller{
			box-sizing:border-box;
			padding-left:4.35rem;
		}
		#pullUp{
			margin-top:0.5rem;
		}
		.pullUpLabel{
			font-size: 0.5rem;
			color: #CCCCCC;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:2rem;
			height:100%;
			position:absolute;
			left:0;
			top:0;
			display:flex;
			display:-webkit-flex;
			align-items:center;
			-webkit-align-items:center;
			justify-content:center;
			-webkit-justify-content:center;
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
	
	<!--头部-->
	<div class="index_header">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<a href="" class="native_go head_left">
			<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<a href="/Index/search_shop" class="native_go head_mid">
			<span class="search_words">黄焖鸡米饭</span>
			<i class="icon_pic1 icon_search3x"></i>
		</a>
	</div>
	<!--左侧分类-->
	<div class="left_type_wrap" id="left_type_wrap">
		<ul class="left_type">
			<li class="type_name <?php if (!$_smarty_tpl->tpl_vars['id']->value){?>click_type_name<?php }?>">
				<span class="">
				全部</span>
			</li>
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<li class="type_name <?php if ($_smarty_tpl->tpl_vars['id']->value==$_smarty_tpl->tpl_vars['one']->value['business_classify_id']){?>click_type_name<?php }?>"  data-business_classify_id="<?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_id'];?>
">
				<span <?php if ($_smarty_tpl->tpl_vars['id']->value==$_smarty_tpl->tpl_vars['one']->value['business_classify_id']){?>class="click_span"<?php }?>>
				<?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>

				</span>
			</li>
			<?php } ?>
		</ul>
	</div>
	<!--右侧商家列表-->
	<div id="load_wrapper">
		<div id="scroller">
			<div class="shop_type_cont">
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
				<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="shop_list native_go">
					<div class="shop_info clearfix">
						<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
?imageView2/1/w/150/h/150/q/100/" class="pic fl"/>
						<div class="info fr">
							<h6 class="shop_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>
							<div class="info_mid clearfix">
								<ul class="star fl">
									<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
									<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<?php }?>
									<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
									<li class="fl icon_pic1 icon_star_blank3x"></li>
									<?php }?>
								<!--	<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>-->
								</ul>
							</div>
							<div class="info_bot">
								<p class="addres_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['address'];?>
</p>
								<span class="distance"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</span>
							</div>
						</div>
					</div>
					<p class="people_count">
						<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>
						<span>人去过</span>
					</p>
				</a>
				<?php }
if (!$_smarty_tpl->tpl_vars['one']->_loop) {
?>
				<div class='shop_info clearfix' style='width:100%;line-height:3rem;font-size:0.8rem;text-align:center;'>暂时无此分类店铺</div>
				<?php } ?>
			</div>
			<div id="pullUp" style="<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
			    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
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
    var firstRow='<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
';
    var total='<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
';
    var key_words='<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
';
    var business_classify_id='';
    var $id = '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
</script>
<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/shop_type_list.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

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
		//左侧菜单
		var leftTypeSCroll = new iScroll("left_type_wrap");
		//解决刚进入店铺分类页的显示问题
		var typeLen = $(".type_name").length;
		if($id){
			for(var i=1;i<typeLen;i++){
				var dataId = Number($(".type_name").eq(i).attr('data-business_classify_id'));
				if(dataId==$id){
					$(".type_name").eq(i).prev().find("span").addClass("click_span");
				}
			}
		}
		//获取url中的参数值
        function GetQueryString()
        {
//            var reg = new RegExp("(^|&)"+ name +"/([^&]*)(&|$)");
//            console.log(reg);
            var r = window.location.search.substr(4);
            console.log(r);
            if(r!=null)return  decodeURI(r); return null;

        }

		window.onload=function(){
            var business_classify_id =GetQueryString("id");
            if ( business_classify_id != null){
                console.log("1");
                $("#"+business_classify_id).trigger("click");
                console.log("2");
            }
		}




		//点击左侧切换店铺类型
		$(".left_type").on("click",".type_name",function(event){
			event.preventDefault();
            business_classify_id=$(this).data('business_classify_id');
			$(this).addClass("click_type_name").find("span").addClass("click_span");
			$(this).siblings().removeClass("click_type_name")
			.find("span").removeClass("click_span");
			$(this).prev().find("span").addClass("click_span");
			var searech=$('.search_words').eq(0);
			searech.val('');
			$(".pullUpLabel").show();
			$("#pullUp").show();
			select_type(business_classify_id);
			//pullUpAction ();
		});
		function select_type(business_classify_id) {
            var sourceNode = $(".shop_type_cont").eq(0); // 获得被克隆的节点对象
            $.ajax({
                url: "/Index/shop_type_list", //URL
                dataType: "json",
                data: {"id":business_classify_id},
                type: "post",
                success:function(res) {
					total=parseInt(res.total);
					firstRow=parseInt(res.firstRow);
             /*       if (res.code == '1') {*/
                    	$("#pullUp").show();
                        total=res.total;
					console.log('total:'+total+'firstRow'+firstRow);
                        if(total<=firstRow)
					    {
					        $(".pullUpIcon").hide();
					        $(".pullUpLabel").html("没有更多了");
					    }else{
					    	$(".pullUpLabel").html("上拉加载更多...");
					    }
						num=1;
                        var len = res.len;
                        if(len!='0') {
							var html = '';
							for (var i = 0; i < len; i++) {
								html += '<a href="/Index/shop_detail/business_id/' + res[i].business_id + '" class="shop_list native_go">' +
										'<div class="shop_info clearfix">' +
										'<img src="' + res[i].sign_pic + '?imageView2/1/w/150/h/150/q/100/" class="pic fl"/>' +
										'<div class="info fr">' +
										'<h6 class="shop_name">' + res[i].business_name + '</h6>' +
										'<div class="info_mid clearfix">' +
										'<ul class="star fl">' ;
								for (var j = 0; j < res[i].star; j++) {
									html += '<li class="fl icon_pic1 icon_star_full3x"></li>'
								}
								for (var k = 0; k < (5 - res[i].star); k++) {
									html += '<li class="fl icon_pic1 icon_star_blank3x"></li>'
								}
										html+='</ul>' +
										'</div>' +
										'<div class="info_bot">' +
										'<p class="addres_name">' + res[i].address + '</p>' +
										'<span class="distance">';
								if (res[i].distance > 99.9) {
									html += '>';
								} else {
									html += '<';
								}
								html += '&nbsp;' + res[i].distance + 'Km</span>' +
										'</div>' +
										'</div>' +
										'</div>' +
										'<p class="people_count">' +
										'<span class="count_val">' + res[i].customer_num + '</span>' +
										'<span>人去过</span>' +
										'</p>' +
										'</a>';
							}
							sourceNode.html('');
							sourceNode.html(html);
							$('img').attr('onerror', 'no_pic(this)');
							/*          } else {*/
							// sourceNode.html('');
							// sourceNode.append("<div class='shop_info clearfix' style='width:100%;line-height:3rem;font-size:0.8rem;text-align:center;'>暂时无此分类店铺</div>");
							// $("#pullUp").hide();

							/* }*/
							setTimeout(function () {
								myScroll.refresh();
								if (total <= firstRow) {
									$(".pullUpIcon").hide();
									$(".pullUpLabel").html("没有更多了");
								}
							}, 0);
						}else{
							sourceNode.html('');
							sourceNode.append("<div class='shop_info clearfix' style='width:100%;line-height:3rem;font-size:0.8rem;text-align:center;'>暂时无此分类店铺</div>");
							$(".pullUpIcon").hide();
							$(".pullUpLabel").hide();
						}
                },
				error:function( data ){
                },
                complete:function( data ){
                }
            });
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
	
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/shop_type_list.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/front/front_css/refresh_load.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
	<style type="text/css">
		body{
			background:#fff;
		}
		#load_wrapper{
			top:2.2rem;
			height:calc(100% - 2.2rem);
			height:-webkit-calc(100% - 2.2rem);
			height:-moz-calc(100% - 2.2rem);
		}
		#scroller{
			box-sizing:border-box;
			padding-left:4.35rem;
		}
		#pullUp{
			margin-top:0.5rem;
		}
		.pullUpLabel{
			font-size: 0.5rem;
			color: #CCCCCC;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:2rem;
			height:100%;
			position:absolute;
			left:0;
			top:0;
			display:flex;
			display:-webkit-flex;
			align-items:center;
			-webkit-align-items:center;
			justify-content:center;
			-webkit-justify-content:center;
		}
	</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<!--头部-->
	<div class="index_header">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<a href="" class="native_go head_left">
			<span class="locate_name"><?php echo $_smarty_tpl->tpl_vars['area_name']->value;?>
</span>
			<i class="icon_pic1 icon_locate3x"></i>
		</a>
		<a href="/Index/search_shop" class="native_go head_mid">
			<span class="search_words">黄焖鸡米饭</span>
			<i class="icon_pic1 icon_search3x"></i>
		</a>
	</div>
	<!--左侧分类-->
	<div class="left_type_wrap" id="left_type_wrap">
		<ul class="left_type">
			<li class="type_name <?php if (!$_smarty_tpl->tpl_vars['id']->value){?>click_type_name<?php }?>">
				<span class="">
				全部</span>
			</li>
			<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
			<li class="type_name <?php if ($_smarty_tpl->tpl_vars['id']->value==$_smarty_tpl->tpl_vars['one']->value['business_classify_id']){?>click_type_name<?php }?>"  data-business_classify_id="<?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_id'];?>
">
				<span <?php if ($_smarty_tpl->tpl_vars['id']->value==$_smarty_tpl->tpl_vars['one']->value['business_classify_id']){?>class="click_span"<?php }?>>
				<?php echo $_smarty_tpl->tpl_vars['one']->value['business_classify_name'];?>

				</span>
			</li>
			<?php } ?>
		</ul>
	</div>
	<!--右侧商家列表-->
	<div id="load_wrapper">
		<div id="scroller">
			<div class="shop_type_cont">
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
				<a href="/Index/shop_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['one']->value['business_id'];?>
" class="shop_list native_go">
					<div class="shop_info clearfix">
						<img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['sign_pic'];?>
?imageView2/1/w/150/h/150/q/100/" class="pic fl"/>
						<div class="info fr">
							<h6 class="shop_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['business_name'];?>
</h6>
							<div class="info_mid clearfix">
								<ul class="star fl">
									<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(5-$_smarty_tpl->tpl_vars['one']->value['star'], null, 0);?>
									<?php while ($_smarty_tpl->tpl_vars['one']->value['star']-->0){?>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<?php }?>
									<?php while ($_smarty_tpl->tpl_vars['a']->value-->0){?>
									<li class="fl icon_pic1 icon_star_blank3x"></li>
									<?php }?>
								<!--	<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>
									<li class="fl icon_pic1 icon_star_full3x"></li>-->
								</ul>
							</div>
							<div class="info_bot">
								<p class="addres_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['address'];?>
</p>
								<span class="distance"><?php if ($_smarty_tpl->tpl_vars['one']->value['distance']>99.9){?>><?php }else{ ?><<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['one']->value['distance'];?>
Km</span>
							</div>
						</div>
					</div>
					<p class="people_count">
						<span class="count_val"><?php echo $_smarty_tpl->tpl_vars['one']->value['customer_num'];?>
</span>
						<span>人去过</span>
					</p>
				</a>
				<?php }
if (!$_smarty_tpl->tpl_vars['one']->_loop) {
?>
				<div class='shop_info clearfix' style='width:100%;line-height:3rem;font-size:0.8rem;text-align:center;'>暂时无此分类店铺</div>
				<?php } ?>
			</div>
			<div id="pullUp" style="<?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>display:block;<?php }else{ ?>display:none;<?php }?>">
			    <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
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
    var firstRow='<?php echo $_smarty_tpl->tpl_vars['firstRow']->value;?>
';
    var total='<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
';
    var key_words='<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
';
    var business_classify_id='';
    var $id = '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
</script>
<script type="text/javascript" src="__PUBLIC__/Js/front/iscroll.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="__PUBLIC__/Js/front/front_js/shop_type_list.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

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
		//左侧菜单
		var leftTypeSCroll = new iScroll("left_type_wrap");
		//解决刚进入店铺分类页的显示问题
		var typeLen = $(".type_name").length;
		if($id){
			for(var i=1;i<typeLen;i++){
				var dataId = Number($(".type_name").eq(i).attr('data-business_classify_id'));
				if(dataId==$id){
					$(".type_name").eq(i).prev().find("span").addClass("click_span");
				}
			}
		}
		//获取url中的参数值
        function GetQueryString()
        {
//            var reg = new RegExp("(^|&)"+ name +"/([^&]*)(&|$)");
//            console.log(reg);
            var r = window.location.search.substr(4);
            console.log(r);
            if(r!=null)return  decodeURI(r); return null;

        }

		window.onload=function(){
            var business_classify_id =GetQueryString("id");
            if ( business_classify_id != null){
                console.log("1");
                $("#"+business_classify_id).trigger("click");
                console.log("2");
            }
		}




		//点击左侧切换店铺类型
		$(".left_type").on("click",".type_name",function(event){
			event.preventDefault();
            business_classify_id=$(this).data('business_classify_id');
			$(this).addClass("click_type_name").find("span").addClass("click_span");
			$(this).siblings().removeClass("click_type_name")
			.find("span").removeClass("click_span");
			$(this).prev().find("span").addClass("click_span");
			var searech=$('.search_words').eq(0);
			searech.val('');
			$(".pullUpLabel").show();
			$("#pullUp").show();
			select_type(business_classify_id);
			//pullUpAction ();
		});
		function select_type(business_classify_id) {
            var sourceNode = $(".shop_type_cont").eq(0); // 获得被克隆的节点对象
            $.ajax({
                url: "/Index/shop_type_list", //URL
                dataType: "json",
                data: {"id":business_classify_id},
                type: "post",
                success:function(res) {
					total=parseInt(res.total);
					firstRow=parseInt(res.firstRow);
             /*       if (res.code == '1') {*/
                    	$("#pullUp").show();
                        total=res.total;
					console.log('total:'+total+'firstRow'+firstRow);
                        if(total<=firstRow)
					    {
					        $(".pullUpIcon").hide();
					        $(".pullUpLabel").html("没有更多了");
					    }else{
					    	$(".pullUpLabel").html("上拉加载更多...");
					    }
						num=1;
                        var len = res.len;
                        if(len!='0') {
							var html = '';
							for (var i = 0; i < len; i++) {
								html += '<a href="/Index/shop_detail/business_id/' + res[i].business_id + '" class="shop_list native_go">' +
										'<div class="shop_info clearfix">' +
										'<img src="' + res[i].sign_pic + '?imageView2/1/w/150/h/150/q/100/" class="pic fl"/>' +
										'<div class="info fr">' +
										'<h6 class="shop_name">' + res[i].business_name + '</h6>' +
										'<div class="info_mid clearfix">' +
										'<ul class="star fl">' ;
								for (var j = 0; j < res[i].star; j++) {
									html += '<li class="fl icon_pic1 icon_star_full3x"></li>'
								}
								for (var k = 0; k < (5 - res[i].star); k++) {
									html += '<li class="fl icon_pic1 icon_star_blank3x"></li>'
								}
										html+='</ul>' +
										'</div>' +
										'<div class="info_bot">' +
										'<p class="addres_name">' + res[i].address + '</p>' +
										'<span class="distance">';
								if (res[i].distance > 99.9) {
									html += '>';
								} else {
									html += '<';
								}
								html += '&nbsp;' + res[i].distance + 'Km</span>' +
										'</div>' +
										'</div>' +
										'</div>' +
										'<p class="people_count">' +
										'<span class="count_val">' + res[i].customer_num + '</span>' +
										'<span>人去过</span>' +
										'</p>' +
										'</a>';
							}
							sourceNode.html('');
							sourceNode.html(html);
							$('img').attr('onerror', 'no_pic(this)');
							/*          } else {*/
							// sourceNode.html('');
							// sourceNode.append("<div class='shop_info clearfix' style='width:100%;line-height:3rem;font-size:0.8rem;text-align:center;'>暂时无此分类店铺</div>");
							// $("#pullUp").hide();

							/* }*/
							setTimeout(function () {
								myScroll.refresh();
								if (total <= firstRow) {
									$(".pullUpIcon").hide();
									$(".pullUpLabel").html("没有更多了");
								}
							}, 0);
						}else{
							sourceNode.html('');
							sourceNode.append("<div class='shop_info clearfix' style='width:100%;line-height:3rem;font-size:0.8rem;text-align:center;'>暂时无此分类店铺</div>");
							$(".pullUpIcon").hide();
							$(".pullUpLabel").hide();
						}
                },
				error:function( data ){
                },
                complete:function( data ){
                }
            });
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