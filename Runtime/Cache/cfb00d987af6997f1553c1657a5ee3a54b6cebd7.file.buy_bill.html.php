<?php /* Smarty version Smarty-3.1.6, created on 2017-07-14 15:50:26
         compiled from "C:\wamp\www\diandu\Tpl\FrontMerchantOrder\buy_bill.html" */ ?>
<?php /*%%SmartyHeaderCode:25276595a159364cc49-25995817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfb00d987af6997f1553c1657a5ee3a54b6cebd7' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontMerchantOrder\\buy_bill.html',
      1 => 1500017196,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25276595a159364cc49-25995817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595a1594244d8',
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
<?php if ($_valid && !is_callable('content_595a1594244d8')) {function content_595a1594244d8($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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
		body{
			background:#fff;
		}
		.layermcont{
			text-align:center;
			color:#323232;
		}
		.layermchild  .layermbtn span{
			color:#323232;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:1.5rem;
			height:1.5rem;
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
	
	<!--顶部大图-->
	<div class="buy_bill_head">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<img src="<?php echo $_smarty_tpl->tpl_vars['business']->value['sign_pic'];?>
" class="shop_pic"/>
		<span class="shop_name_shade"></span>
		<p class="shop_name"><?php echo $_smarty_tpl->tpl_vars['business']->value['business_name'];?>
</p>
	</div>
	<!--消费-->
	<div class="total_expense_wrap">
		<div class="total_expense">
			<span class="label">消费总额：</span>
			<div class="inp_wrap">
				<span class="money_unit">¥</span>
				<input  id="amount" type="number" class="inp" <?php if (!$_smarty_tpl->tpl_vars['is_check']->value){?>disabled<?php }?>/>
				<span class="inp_info">请询问服务员后输入</span>
			</div>
		</div>
	</div>
<!--todo 买单立享85折-->
<div class="discount" id="vouchers" style="display: none">
	<span class="label">商家优惠券<span id="discount_number"></span>减免</span>
	<span class="privilege_money">-<span id="discount_money"></span>元</span>
</div>
<!--todo 满减-->
<div class="full_reduction" id="shop_discount" style="display: none">
	<span class="label">商家满减优惠<span id="full"></span><span id="minus"></span></span>
	<span class="privilege_money">-<span id="shop_full_minus_money"></span>元</span>
</div>
<!--todo 平台满减-->
<div class="full_reduction" id="platform_discount" style="display: none">
	<span class="label">店都满减优惠<span id="full"></span><span id="minus"></span></span>
	<span class="privilege_money">-<span id="full_minus_money"></span>元</span>
</div>
<!--todo 实付金额-->
<div class="actual_expense">
	<span class="label">实付金额</span>
	<span class="actual_money"><span id="actual_money"></span>元</span>
</div>
<!--todo 付款方式-->
<div class="pay_style">
	<div class="label">付款方式：</div>
	<div class="style_choose">
		<?php if ($_smarty_tpl->tpl_vars['ua']->value=='Wx'){?>
		<span class="name" val="1">微信支付</span>
		<?php }elseif($_smarty_tpl->tpl_vars['ua']->value=='Ali'){?>
		<span class="name" val="2">支付宝支付</span>
		<?php }else{ ?>
		<span class="name" val="1">微信支付</span>
		<?php }?>
		<span class="icon_add_person icon_left_gray"></span>
	</div>
</div>
	<!--确认买单-->
	<div class="sure_buy_wrap">
		<a href="javascript:;" class="sure_buy_none sure_btn">确认买单</a>
		<a onclick="confirm_to_pay();" class="native_go sure_buy sure_btn">确认买单</a>
		<?php if ($_smarty_tpl->tpl_vars['is_check']->value){?>
		<p class="sure_info">买单仅限于到店支付，请确认金额后提交</p>
		<?php }else{ ?>
		<p class="sure_info" style="color: red">该商户暂未开通支付宝服务</p>
		<?php }?>
	</div>
<div class="pay_loading">
	<i></i>
	<span>正在加载...</span>
</div>
<!--todo 选择支付方式-->
<div class="modal_choose" style="display: none">
	<div class="content">
		<div class="title">请选择付款方式</div>
		<div class="scroll_answer_list">
			<ul class="answer_choose_list">
				<?php if ($_smarty_tpl->tpl_vars['ua']->value=='Wx'){?>
				<li class="show_choose active wx">
					<div class="name" data-id="1">微信支付</div>
					<div class="icon_market icon_select_default icon_selected_b"></div>
				<!--<li class="show_choose wallet">
					<div class="name" data-id="3">余额支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>-->
				</li>
				<?php }elseif($_smarty_tpl->tpl_vars['ua']->value=='Ali'){?>
				<li class="show_choose ali">
					<div class="name" data-id="2">支付宝支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>
				<?php }else{ ?>
				<li class="show_choose active wx">
					<div class="name" data-id="1">微信支付</div>
					<div class="icon_market icon_select_default icon_selected_b"></div>
				<!--<li class="show_choose wallet">
					<div class="name" data-id="3">余额支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>-->
				<li class="show_choose ali">
					<div class="name" data-id="2">支付宝支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
<!--<div style="display: none">-->
	<!--<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>-->
		<!--<div id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">-->
			<!--<?php  $_smarty_tpl->tpl_vars['this1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['this']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this1']->key => $_smarty_tpl->tpl_vars['this1']->value){
$_smarty_tpl->tpl_vars['this1']->_loop = true;
?>-->
			<!--<label>-->
				<!--<span><?php echo $_smarty_tpl->tpl_vars['this1']->value['num'];?>
</span>-->
				<!--<span><?php echo $_smarty_tpl->tpl_vars['this1']->value['amount_limit'];?>
</span>-->
			<!--</label>-->
			<!--<?php } ?>-->
		<!--</div>-->
	<!--<?php } ?>-->
<!--</div>-->

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
	var ua='<?php echo $_smarty_tpl->tpl_vars['ua']->value;?>
';
	//var ua='Wx';
	var ali_user_id='<?php echo $_smarty_tpl->tpl_vars['ali_user_id']->value;?>
';
	//var ali_user_id='2088702413039694';
	var business_user_id = '<?php echo $_smarty_tpl->tpl_vars['business']->value['user_id'];?>
';
	var business_id = '<?php echo $_smarty_tpl->tpl_vars['business']->value['business_id'];?>
';
	var arr_break=<?php if ($_smarty_tpl->tpl_vars['data']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>;
	console.log(arr_break);

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
    var reg = /^([1-9][\d]{0,9}|0)(\.[0-9][\d]{0,1})?$/;
    var integerReg = /^([1-9][\d]{0,3}$)/;
    var totalVal;
    //满减id
    var shop_discount_id='';
    var shop_discount_num='';
    var coupons_id='';
    var coupon_num='';
    var platform_discount_id='';
    var platform_discount_num='';
    var order_id='';
    //获取优惠信息
	//console.log(business_id+user_id);

   // console.log(arr_break);

    //console.log(arr_break);
    // console.log(data.platform[0].amount_limit);
    changeBtn();
    document.getElementsByClassName("inp")[0].addEventListener("input",function(e){
        e.preventDefault();
        totalVal = Number($(".inp").val());
        if(reg.test(totalVal)&&$(".inp").val()!=""){
            $(".sure_buy_none").css("display","none");
            $(".sure_buy").css("display","block");
            //首先减去商家满减
            var shop_dis=0;
            if(arr_break.shop!=null){
                for(var i in arr_break.shop)
                {
                    arr_break.shop[i].amount_limit
                    if(totalVal>=arr_break.shop[i].amount_limit){
                        shop_dis=arr_break.shop[i].num;
                        shop_discount_id=arr_break.shop[i].discount_minus_id;
                        shop_discount_num=arr_break.shop[i].num;
                    }

                    else{
                        break;
                    }
                }
			}

            //减去优惠券减免
            var voucher=0;
            if(arr_break.voucher!=null){
                for(var i in arr_break.voucher)
                {
                    arr_break.voucher[i].amount_limit
                    if(totalVal>=arr_break.voucher[i].amount_limit){
                        voucher=arr_break.voucher[i].num;
                        coupons_id=arr_break.voucher[i].vouchers_id;
                        coupon_num=arr_break.voucher[i].num;
                    }
                    else{
                        break;
                    }
                }
			}

            //减去店都减免
            var platform_dis=0;
            if(arr_break.platform!=null){
                for(var i in arr_break.platform)
                {
                    arr_break.platform[i].amount_limit
                    if(totalVal>=arr_break.platform[i].amount_limit){
                        platform_dis=arr_break.platform[i].num;
                        platform_discount_id=arr_break.platform[i].discount_minus_id;
                        platform_discount_num=arr_break.platform[i].num;
                    }
                    else{
                        break;
                    }
                }
			}

            if(shop_dis==0){
				$('#shop_discount').hide();
			}else{
                $('#shop_discount').show();
			}
			if(voucher==0){
                $('#vouchers').hide();
			}else{
			    $('#vouchers').show();
			}
            if(platform_dis==0){
                $('#platform_discount').hide();
            }else{
                $('#platform_discount').show();
            }

            //var discount=100-Number($('#discount_number').text());
            $('#discount_money').html(voucher);
            //var full_discount=parseInt(totalVal/Number($('#full').text()));
            $('#shop_full_minus_money').html(shop_dis);
            $('#full_minus_money').html(platform_dis);
            var total_discount=totalVal-voucher-shop_dis-platform_dis;
            $('#actual_money').html(total_discount);
        }else{
            $(".sure_buy_none").css("display","block");
            $(".sure_buy").css("display","none");
        }
        if($(".inp").val()==""){
            $(".inp_info").show();
            $(".money_unit").hide();
            $('.privilege_money').hide();
            $('.actual_expense .actual_money').hide();
        }else{
            $(".inp_info").hide();
            $(".money_unit").show();
            $('.privilege_money').show();
            $('.actual_expense .actual_money').show();
        }
    });

	 	$(".wallet").on("click",function(){
			ua='Wallet';
			console.log(ua);
		});

		$(".ali").on("click",function(){
			ua='Ali';
			console.log(ua);
		});
		$(".wx").on("click",function(){
			ua='Wx';
			console.log(ua);
		});


		$(".inp").on("focus",function(){
			$(".money_unit").show();
			$(".inp_info").hide();
		});
		$(".inp").on("keyup",function(){
			if(!reg.test(totalVal)){
				totalVal = "";
				$(".inp").val(totalVal);
				show_alert("请输入正确金额");
			}
		});
		function changeBtn(){
			totalVal = Number($(".inp").val());
			if(totalVal==0){
				$(".inp_info").show();
				$(".money_unit").hide();
				$(".sure_buy_none").css("display","block");
				$(".sure_buy").css("display","none");
			}else{
				$(".inp_info").hide();
				$(".money_unit").show();
				$(".sure_buy_none").css("display","none");
				$(".sure_buy").css("display","block");
			}
		}

		function confirm_to_pay(){
		    var svvv=$('#actual_money').text();
		    console.log(svvv);
			//var pay_bill_url = "/FrontMerchantOrder/pay_bill";
			$(".pay_loading").show();
			var amount = $('#actual_money').text();
			var total_amount = $('#amount').val();
			console.log(amount+total_amount);
			$.post("/FrontMerchantOrder/createOrder",{
				business_id:business_id,
                pay_amount:amount,
                total_amount:total_amount,
				pay_way:ua,
                shop_discount_id:shop_discount_id,
                shop_discount_num:shop_discount_num,
                coupon_id:coupons_id,
                coupon_num:coupon_num,
                platform_discount_id:platform_discount_id,
                platform_discount_num:platform_discount_num,
			},function(data){
				var data = $.parseJSON(data);
				if(data.code == 0){
				    order_id=data.order_id;
					//location.href = pay_bill_url + '/order_id/' + data.order_id;
					if(ua=='Wx'&&is_wechat()){
							recharge(amount,data.order_id);
					}else if(ua=='Ali'&&is_alipay()){
							getAliparam(amount,data.order_id);
					}else if(ua=='Wallet'&&is_wechat()||ua=='Wallet'&&is_alipay() ){
						    wallet_pay(amount,data.order_id);
					}else{
						//手机app支付
						var payway = $('.pay_style .style_choose .name').attr("val");

						if(payway == 1){
							//alert('mobile');
							mobile_wx_pay(amount,data.order_id);
						}else if(payway == 2){
							mobile_ali_pay(amount,data.order_id)
						}else{
							wallet_pay(amount,data.order_id);
						}

					}
				}else{
					show_alert(data.msg);
				}
			})
		}
	//钱包付款
	function wallet_pay(coin_num,order_id){
		$.ajax({
			url:"/FrontMerchantOrder/wallet_pay",
			type:"POST",
			dataType:"json",
			data:{
				coin_num:coin_num,
//					business_user_id:business_user_id
				order_id:order_id,
				business_id:business_id,
				type:'in_store'
			},
			timeout:10000,
			success:function(d){
				if(d.code==1)
				{
					show_alert(d.msg);
                    setTimeout(function(){location.href='/FrontOrder/pay_success/order_id/'+order_id;},1000);
				}else{
					show_alert(d.msg);
				}
				$(".pay_loading").hide();
			},
			error:function(e){
				console.log(e);
				$(".pay_loading").hide();
				show_alert("error:"+e.msg);
			}
		});
	}


		var jsApiParameters;
		function recharge(coin_num,order_id)//获取微信付款参数
		{
			//提交
			$.ajax({
				url:"/FrontMerchantOrder/get_wx_param",
				type:"POST",
				dataType:"json",
				data:{
					coin_num:coin_num,
//					business_user_id:business_user_id
					order_id:order_id,
					business_id:business_id,
				},
				timeout:10000,
				success:function(d){
					if(d.code==0)
					{
						//微信支付
						jsApiParameters = d.msg;
						callpay();
					}else{
						show_alert("msg:"+d.msg);
					}
					$(".pay_loading").hide();
				},
				error:function(e){
					console.log(e);
					$(".pay_loading").hide();
					show_alert("error:"+e.msg);
				}
			});
		}
		var tradeNO='';
		function getAliparam(coin_num,order_id){//获取支付宝付款参数
			$.ajax({
				url:"/FrontMerchantOrder/get_ali_param",
				type:"POST",
				dataType:"json",
				data:{
					coin_num:coin_num,
//					business_user_id:business_user_id
					order_id:order_id,
					ali_user_id:ali_user_id,
					business_id:business_id,
				},
				timeout:10000,
				success:function(d){
					if(d.status==0){
						$(".pay_loading").hide();
						tradeNO=d.data.pay_info.tradeNO;
						console.log(d.data.pay_info.tradeNO);
						ali_callback();
					}else{
						show_alert("支付参数错误");
					}

				},
				error:function(e){
					console.log(e);
					$(".pay_loading").hide();
					show_alert("error:"+e.msg);
				}
			});
		}

	function ali_callback(){
		if(typeof AlipayJSBridge == 'undefined') {
			// tradeNO参数为接口中返回的data.pay_info.tradeNO
			if( document.addEventListener ){
				document.addEventListener('AlipayJSBridgeReady', aliJsApiCall, false);
			}else if (document.attachEvent){
				document.attachEvent('AlipayJSBridgeReady', aliJsApiCall);
//				document.attachEvent('onAlipayJSBridgeReady', aliJsApiCall);
			}

		}else{
			aliJsApiCall();
		}
	}

	function aliJsApiCall(){
		AlipayJSBridge.call('tradePay',  {'tradeNO': tradeNO }, function (result) {
			if(result.resultCode == '9000') {
				// 支付成功！
                setTimeout(function(){location.href='/FrontOrder/pay_success/order_id/'+order_id;},1000);
			} else if(result.resultCode == '6001') {
				// 取消支付！
			}
		});
	}

		function jsApiCall()
		{
			//alert(jsApiParameters);
			WeixinJSBridge.invoke(
					'getBrandWCPayRequest',
					jQuery.parseJSON(jsApiParameters),
					function(res)
					{
						if(res.err_msg == "get_brand_wcpay_request:ok" )
						{
							//后续操作
                            setTimeout(function(){location.href='/FrontOrder/pay_success/order_id/'+order_id;},1000);
						}
						else
						{
							//WeixinJSBridge.log(res.err_msg);
							//show_alert(res.err_code);
							//show_alert(res.err_desc);
							//show_alert(res.err_msg);
						}
					}
			);
		}

		function callpay()
		{
			if (typeof WeixinJSBridge == "undefined"){
				if( document.addEventListener ){
					document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
				}else if (document.attachEvent){
					document.attachEvent('WeixinJSBridgeReady', jsApiCall);
					document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
				}
			}else{
				jsApiCall();
			}
		}

	function mobile_wx_pay(coin_num,order_id){
		$.post('/FrontMerchantOrder/get_mobile_wxpay_param',{
			coin_num:coin_num,
			order_id:order_id,
			business_id:business_id,
		},function(d){
			if(d)
			{
				//微信支付
				var pay_param = d;
				native_listen('wx_pay',{
					parameter : pay_param,
				});
			}else{
				show_alert("支付失败");
			}
			$(".pay_loading").hide();
		});

	}

	function mobile_ali_pay(coin_num,order_id){

		$.post('/FrontMerchantOrder/get_mobile_alipay_param',{
			coin_num:coin_num,
			order_id:order_id,
			business_id:business_id,
		},function(d){
			if(d)
			{
				//微信支付
				var pay_param = d;
				native_listen('ali_pay',{
					parameter : pay_param,
				});
			}else{
				show_alert("支付失败");
			}
			$(".pay_loading").hide();
		});
	}
	</script>
<script>
	$('.pay_style').on('click',function(){
		$('.modal_choose').show().css('display','flex');
		$('body').css('overflow','hidden');
	});
	$('.modal_choose').on('click',function(){
		$(this).hide();
		$('body').css('overflow','scroll');
	});
	$('.modal_choose .content').on('click',function(){
		event.stopPropagation();/*todo 阻止冒泡*/
	});
	$('.scroll_answer_list .show_choose').on('click',function(){
		$(this).addClass('active').siblings().removeClass('active');
		$(this).find('.icon_market').addClass('icon_selected_b');
		$(this).siblings().find('.icon_market').removeClass('icon_selected_b');
		$('.pay_style .style_choose .name').html($(this).find('.name').text());
		$('.pay_style .style_choose .name').attr("val",$(this).find('.name').attr("data-id"));
		$('.modal_choose').hide();
		$('body').css('overflow','scroll');
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
	
	<link rel="stylesheet" style="text/css" href="__PUBLIC__/Css/front/front_css/buy_bill.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<style type="text/css">
		body{
			background:#fff;
		}
		.layermcont{
			text-align:center;
			color:#323232;
		}
		.layermchild  .layermbtn span{
			color:#323232;
		}
		/*--顶部返回按钮--*/
		#current_page_arrow{
			width:1.5rem;
			height:1.5rem;
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

	
	<!--顶部大图-->
	<div class="buy_bill_head">
		<div class="left_header native_back" id="current_page_arrow">
	        <div class="icon_add_person icon_left_white"></div>
	    </div>
		<img src="<?php echo $_smarty_tpl->tpl_vars['business']->value['sign_pic'];?>
" class="shop_pic"/>
		<span class="shop_name_shade"></span>
		<p class="shop_name"><?php echo $_smarty_tpl->tpl_vars['business']->value['business_name'];?>
</p>
	</div>
	<!--消费-->
	<div class="total_expense_wrap">
		<div class="total_expense">
			<span class="label">消费总额：</span>
			<div class="inp_wrap">
				<span class="money_unit">¥</span>
				<input  id="amount" type="number" class="inp" <?php if (!$_smarty_tpl->tpl_vars['is_check']->value){?>disabled<?php }?>/>
				<span class="inp_info">请询问服务员后输入</span>
			</div>
		</div>
	</div>
<!--todo 买单立享85折-->
<div class="discount" id="vouchers" style="display: none">
	<span class="label">商家优惠券<span id="discount_number"></span>减免</span>
	<span class="privilege_money">-<span id="discount_money"></span>元</span>
</div>
<!--todo 满减-->
<div class="full_reduction" id="shop_discount" style="display: none">
	<span class="label">商家满减优惠<span id="full"></span><span id="minus"></span></span>
	<span class="privilege_money">-<span id="shop_full_minus_money"></span>元</span>
</div>
<!--todo 平台满减-->
<div class="full_reduction" id="platform_discount" style="display: none">
	<span class="label">店都满减优惠<span id="full"></span><span id="minus"></span></span>
	<span class="privilege_money">-<span id="full_minus_money"></span>元</span>
</div>
<!--todo 实付金额-->
<div class="actual_expense">
	<span class="label">实付金额</span>
	<span class="actual_money"><span id="actual_money"></span>元</span>
</div>
<!--todo 付款方式-->
<div class="pay_style">
	<div class="label">付款方式：</div>
	<div class="style_choose">
		<?php if ($_smarty_tpl->tpl_vars['ua']->value=='Wx'){?>
		<span class="name" val="1">微信支付</span>
		<?php }elseif($_smarty_tpl->tpl_vars['ua']->value=='Ali'){?>
		<span class="name" val="2">支付宝支付</span>
		<?php }else{ ?>
		<span class="name" val="1">微信支付</span>
		<?php }?>
		<span class="icon_add_person icon_left_gray"></span>
	</div>
</div>
	<!--确认买单-->
	<div class="sure_buy_wrap">
		<a href="javascript:;" class="sure_buy_none sure_btn">确认买单</a>
		<a onclick="confirm_to_pay();" class="native_go sure_buy sure_btn">确认买单</a>
		<?php if ($_smarty_tpl->tpl_vars['is_check']->value){?>
		<p class="sure_info">买单仅限于到店支付，请确认金额后提交</p>
		<?php }else{ ?>
		<p class="sure_info" style="color: red">该商户暂未开通支付宝服务</p>
		<?php }?>
	</div>
<div class="pay_loading">
	<i></i>
	<span>正在加载...</span>
</div>
<!--todo 选择支付方式-->
<div class="modal_choose" style="display: none">
	<div class="content">
		<div class="title">请选择付款方式</div>
		<div class="scroll_answer_list">
			<ul class="answer_choose_list">
				<?php if ($_smarty_tpl->tpl_vars['ua']->value=='Wx'){?>
				<li class="show_choose active wx">
					<div class="name" data-id="1">微信支付</div>
					<div class="icon_market icon_select_default icon_selected_b"></div>
				<!--<li class="show_choose wallet">
					<div class="name" data-id="3">余额支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>-->
				</li>
				<?php }elseif($_smarty_tpl->tpl_vars['ua']->value=='Ali'){?>
				<li class="show_choose ali">
					<div class="name" data-id="2">支付宝支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>
				<?php }else{ ?>
				<li class="show_choose active wx">
					<div class="name" data-id="1">微信支付</div>
					<div class="icon_market icon_select_default icon_selected_b"></div>
				<!--<li class="show_choose wallet">
					<div class="name" data-id="3">余额支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>-->
				<li class="show_choose ali">
					<div class="name" data-id="2">支付宝支付</div>
					<div class="icon_market icon_select_default"></div>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
<!--<div style="display: none">-->
	<!--<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['this']->key;
?>-->
		<!--<div id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">-->
			<!--<?php  $_smarty_tpl->tpl_vars['this1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['this']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this1']->key => $_smarty_tpl->tpl_vars['this1']->value){
$_smarty_tpl->tpl_vars['this1']->_loop = true;
?>-->
			<!--<label>-->
				<!--<span><?php echo $_smarty_tpl->tpl_vars['this1']->value['num'];?>
</span>-->
				<!--<span><?php echo $_smarty_tpl->tpl_vars['this1']->value['amount_limit'];?>
</span>-->
			<!--</label>-->
			<!--<?php } ?>-->
		<!--</div>-->
	<!--<?php } ?>-->
<!--</div>-->

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
	var ua='<?php echo $_smarty_tpl->tpl_vars['ua']->value;?>
';
	//var ua='Wx';
	var ali_user_id='<?php echo $_smarty_tpl->tpl_vars['ali_user_id']->value;?>
';
	//var ali_user_id='2088702413039694';
	var business_user_id = '<?php echo $_smarty_tpl->tpl_vars['business']->value['user_id'];?>
';
	var business_id = '<?php echo $_smarty_tpl->tpl_vars['business']->value['business_id'];?>
';
	var arr_break=<?php if ($_smarty_tpl->tpl_vars['data']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>;
	console.log(arr_break);

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
    var reg = /^([1-9][\d]{0,9}|0)(\.[0-9][\d]{0,1})?$/;
    var integerReg = /^([1-9][\d]{0,3}$)/;
    var totalVal;
    //满减id
    var shop_discount_id='';
    var shop_discount_num='';
    var coupons_id='';
    var coupon_num='';
    var platform_discount_id='';
    var platform_discount_num='';
    var order_id='';
    //获取优惠信息
	//console.log(business_id+user_id);

   // console.log(arr_break);

    //console.log(arr_break);
    // console.log(data.platform[0].amount_limit);
    changeBtn();
    document.getElementsByClassName("inp")[0].addEventListener("input",function(e){
        e.preventDefault();
        totalVal = Number($(".inp").val());
        if(reg.test(totalVal)&&$(".inp").val()!=""){
            $(".sure_buy_none").css("display","none");
            $(".sure_buy").css("display","block");
            //首先减去商家满减
            var shop_dis=0;
            if(arr_break.shop!=null){
                for(var i in arr_break.shop)
                {
                    arr_break.shop[i].amount_limit
                    if(totalVal>=arr_break.shop[i].amount_limit){
                        shop_dis=arr_break.shop[i].num;
                        shop_discount_id=arr_break.shop[i].discount_minus_id;
                        shop_discount_num=arr_break.shop[i].num;
                    }

                    else{
                        break;
                    }
                }
			}

            //减去优惠券减免
            var voucher=0;
            if(arr_break.voucher!=null){
                for(var i in arr_break.voucher)
                {
                    arr_break.voucher[i].amount_limit
                    if(totalVal>=arr_break.voucher[i].amount_limit){
                        voucher=arr_break.voucher[i].num;
                        coupons_id=arr_break.voucher[i].vouchers_id;
                        coupon_num=arr_break.voucher[i].num;
                    }
                    else{
                        break;
                    }
                }
			}

            //减去店都减免
            var platform_dis=0;
            if(arr_break.platform!=null){
                for(var i in arr_break.platform)
                {
                    arr_break.platform[i].amount_limit
                    if(totalVal>=arr_break.platform[i].amount_limit){
                        platform_dis=arr_break.platform[i].num;
                        platform_discount_id=arr_break.platform[i].discount_minus_id;
                        platform_discount_num=arr_break.platform[i].num;
                    }
                    else{
                        break;
                    }
                }
			}

            if(shop_dis==0){
				$('#shop_discount').hide();
			}else{
                $('#shop_discount').show();
			}
			if(voucher==0){
                $('#vouchers').hide();
			}else{
			    $('#vouchers').show();
			}
            if(platform_dis==0){
                $('#platform_discount').hide();
            }else{
                $('#platform_discount').show();
            }

            //var discount=100-Number($('#discount_number').text());
            $('#discount_money').html(voucher);
            //var full_discount=parseInt(totalVal/Number($('#full').text()));
            $('#shop_full_minus_money').html(shop_dis);
            $('#full_minus_money').html(platform_dis);
            var total_discount=totalVal-voucher-shop_dis-platform_dis;
            $('#actual_money').html(total_discount);
        }else{
            $(".sure_buy_none").css("display","block");
            $(".sure_buy").css("display","none");
        }
        if($(".inp").val()==""){
            $(".inp_info").show();
            $(".money_unit").hide();
            $('.privilege_money').hide();
            $('.actual_expense .actual_money').hide();
        }else{
            $(".inp_info").hide();
            $(".money_unit").show();
            $('.privilege_money').show();
            $('.actual_expense .actual_money').show();
        }
    });

	 	$(".wallet").on("click",function(){
			ua='Wallet';
			console.log(ua);
		});

		$(".ali").on("click",function(){
			ua='Ali';
			console.log(ua);
		});
		$(".wx").on("click",function(){
			ua='Wx';
			console.log(ua);
		});


		$(".inp").on("focus",function(){
			$(".money_unit").show();
			$(".inp_info").hide();
		});
		$(".inp").on("keyup",function(){
			if(!reg.test(totalVal)){
				totalVal = "";
				$(".inp").val(totalVal);
				show_alert("请输入正确金额");
			}
		});
		function changeBtn(){
			totalVal = Number($(".inp").val());
			if(totalVal==0){
				$(".inp_info").show();
				$(".money_unit").hide();
				$(".sure_buy_none").css("display","block");
				$(".sure_buy").css("display","none");
			}else{
				$(".inp_info").hide();
				$(".money_unit").show();
				$(".sure_buy_none").css("display","none");
				$(".sure_buy").css("display","block");
			}
		}

		function confirm_to_pay(){
		    var svvv=$('#actual_money').text();
		    console.log(svvv);
			//var pay_bill_url = "/FrontMerchantOrder/pay_bill";
			$(".pay_loading").show();
			var amount = $('#actual_money').text();
			var total_amount = $('#amount').val();
			console.log(amount+total_amount);
			$.post("/FrontMerchantOrder/createOrder",{
				business_id:business_id,
                pay_amount:amount,
                total_amount:total_amount,
				pay_way:ua,
                shop_discount_id:shop_discount_id,
                shop_discount_num:shop_discount_num,
                coupon_id:coupons_id,
                coupon_num:coupon_num,
                platform_discount_id:platform_discount_id,
                platform_discount_num:platform_discount_num,
			},function(data){
				var data = $.parseJSON(data);
				if(data.code == 0){
				    order_id=data.order_id;
					//location.href = pay_bill_url + '/order_id/' + data.order_id;
					if(ua=='Wx'&&is_wechat()){
							recharge(amount,data.order_id);
					}else if(ua=='Ali'&&is_alipay()){
							getAliparam(amount,data.order_id);
					}else if(ua=='Wallet'&&is_wechat()||ua=='Wallet'&&is_alipay() ){
						    wallet_pay(amount,data.order_id);
					}else{
						//手机app支付
						var payway = $('.pay_style .style_choose .name').attr("val");

						if(payway == 1){
							//alert('mobile');
							mobile_wx_pay(amount,data.order_id);
						}else if(payway == 2){
							mobile_ali_pay(amount,data.order_id)
						}else{
							wallet_pay(amount,data.order_id);
						}

					}
				}else{
					show_alert(data.msg);
				}
			})
		}
	//钱包付款
	function wallet_pay(coin_num,order_id){
		$.ajax({
			url:"/FrontMerchantOrder/wallet_pay",
			type:"POST",
			dataType:"json",
			data:{
				coin_num:coin_num,
//					business_user_id:business_user_id
				order_id:order_id,
				business_id:business_id,
				type:'in_store'
			},
			timeout:10000,
			success:function(d){
				if(d.code==1)
				{
					show_alert(d.msg);
                    setTimeout(function(){location.href='/FrontOrder/pay_success/order_id/'+order_id;},1000);
				}else{
					show_alert(d.msg);
				}
				$(".pay_loading").hide();
			},
			error:function(e){
				console.log(e);
				$(".pay_loading").hide();
				show_alert("error:"+e.msg);
			}
		});
	}


		var jsApiParameters;
		function recharge(coin_num,order_id)//获取微信付款参数
		{
			//提交
			$.ajax({
				url:"/FrontMerchantOrder/get_wx_param",
				type:"POST",
				dataType:"json",
				data:{
					coin_num:coin_num,
//					business_user_id:business_user_id
					order_id:order_id,
					business_id:business_id,
				},
				timeout:10000,
				success:function(d){
					if(d.code==0)
					{
						//微信支付
						jsApiParameters = d.msg;
						callpay();
					}else{
						show_alert("msg:"+d.msg);
					}
					$(".pay_loading").hide();
				},
				error:function(e){
					console.log(e);
					$(".pay_loading").hide();
					show_alert("error:"+e.msg);
				}
			});
		}
		var tradeNO='';
		function getAliparam(coin_num,order_id){//获取支付宝付款参数
			$.ajax({
				url:"/FrontMerchantOrder/get_ali_param",
				type:"POST",
				dataType:"json",
				data:{
					coin_num:coin_num,
//					business_user_id:business_user_id
					order_id:order_id,
					ali_user_id:ali_user_id,
					business_id:business_id,
				},
				timeout:10000,
				success:function(d){
					if(d.status==0){
						$(".pay_loading").hide();
						tradeNO=d.data.pay_info.tradeNO;
						console.log(d.data.pay_info.tradeNO);
						ali_callback();
					}else{
						show_alert("支付参数错误");
					}

				},
				error:function(e){
					console.log(e);
					$(".pay_loading").hide();
					show_alert("error:"+e.msg);
				}
			});
		}

	function ali_callback(){
		if(typeof AlipayJSBridge == 'undefined') {
			// tradeNO参数为接口中返回的data.pay_info.tradeNO
			if( document.addEventListener ){
				document.addEventListener('AlipayJSBridgeReady', aliJsApiCall, false);
			}else if (document.attachEvent){
				document.attachEvent('AlipayJSBridgeReady', aliJsApiCall);
//				document.attachEvent('onAlipayJSBridgeReady', aliJsApiCall);
			}

		}else{
			aliJsApiCall();
		}
	}

	function aliJsApiCall(){
		AlipayJSBridge.call('tradePay',  {'tradeNO': tradeNO }, function (result) {
			if(result.resultCode == '9000') {
				// 支付成功！
                setTimeout(function(){location.href='/FrontOrder/pay_success/order_id/'+order_id;},1000);
			} else if(result.resultCode == '6001') {
				// 取消支付！
			}
		});
	}

		function jsApiCall()
		{
			//alert(jsApiParameters);
			WeixinJSBridge.invoke(
					'getBrandWCPayRequest',
					jQuery.parseJSON(jsApiParameters),
					function(res)
					{
						if(res.err_msg == "get_brand_wcpay_request:ok" )
						{
							//后续操作
                            setTimeout(function(){location.href='/FrontOrder/pay_success/order_id/'+order_id;},1000);
						}
						else
						{
							//WeixinJSBridge.log(res.err_msg);
							//show_alert(res.err_code);
							//show_alert(res.err_desc);
							//show_alert(res.err_msg);
						}
					}
			);
		}

		function callpay()
		{
			if (typeof WeixinJSBridge == "undefined"){
				if( document.addEventListener ){
					document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
				}else if (document.attachEvent){
					document.attachEvent('WeixinJSBridgeReady', jsApiCall);
					document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
				}
			}else{
				jsApiCall();
			}
		}

	function mobile_wx_pay(coin_num,order_id){
		$.post('/FrontMerchantOrder/get_mobile_wxpay_param',{
			coin_num:coin_num,
			order_id:order_id,
			business_id:business_id,
		},function(d){
			if(d)
			{
				//微信支付
				var pay_param = d;
				native_listen('wx_pay',{
					parameter : pay_param,
				});
			}else{
				show_alert("支付失败");
			}
			$(".pay_loading").hide();
		});

	}

	function mobile_ali_pay(coin_num,order_id){

		$.post('/FrontMerchantOrder/get_mobile_alipay_param',{
			coin_num:coin_num,
			order_id:order_id,
			business_id:business_id,
		},function(d){
			if(d)
			{
				//微信支付
				var pay_param = d;
				native_listen('ali_pay',{
					parameter : pay_param,
				});
			}else{
				show_alert("支付失败");
			}
			$(".pay_loading").hide();
		});
	}
	</script>
<script>
	$('.pay_style').on('click',function(){
		$('.modal_choose').show().css('display','flex');
		$('body').css('overflow','hidden');
	});
	$('.modal_choose').on('click',function(){
		$(this).hide();
		$('body').css('overflow','scroll');
	});
	$('.modal_choose .content').on('click',function(){
		event.stopPropagation();/*todo 阻止冒泡*/
	});
	$('.scroll_answer_list .show_choose').on('click',function(){
		$(this).addClass('active').siblings().removeClass('active');
		$(this).find('.icon_market').addClass('icon_selected_b');
		$(this).siblings().find('.icon_market').removeClass('icon_selected_b');
		$('.pay_style .style_choose .name').html($(this).find('.name').text());
		$('.pay_style .style_choose .name').attr("val",$(this).find('.name').attr("data-id"));
		$('.modal_choose').hide();
		$('body').css('overflow','scroll');
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