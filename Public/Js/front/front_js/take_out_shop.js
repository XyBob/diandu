//优惠信息的滚动
$(document).ready(function(){
	$('.flexslider').flexslider({
		animation:"slide",
		direction:"vertical",
		slideshow: true,
		slideshowSpeed:2000,
		animationLoop:true
	});
});
//点击收藏
$(".out-shop-head .collect").on("click",function(){
	$.ajax({
		url: "/FrontMerchant/collect", //URL
		dataType: "json",
		data: {"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data.code);
			if(data.code==1){
				$('.collect').children("i").toggleClass("active");
			}
		}
	});

});
//点击商品列表加号  totalNum:商品总数;totalPrice:总价;
var totalNum,totalPrice;
totalNum = Number($(".total-num").html());
totalPrice = Number($(".goods-price .total-price-val").html());
$(".out-shop-main").on("click",".add",function(){
	var num = Number($(this).siblings(".goods-num").html());
	var goodsStock = Number($(this).parents(".goods-info").attr("stock"));
	num ++;
	if(num>goodsStock){
		num = goodsStock;
		if(goodsStock<=0){
			popUp("暂无此商品");
		}else{
			popUp("最多可购买"+num+"份");
		}
		
		return;
	}
	showFoot();
	var itemId=$(this).data('item_id');
	$(this).siblings().show();
	$(this).siblings(".goods-num").html(num);
	totalNum = Number($(".total-num").html());
	totalNum ++;
	$(".total-num").html(totalNum);
	//计算价格
	totalPrice = Number($(".goods-price .total-price-val").html());
	var price = parseFloat($(this).parent().siblings(".goods-link").find(".price").children("span").html());
	totalPrice = (totalPrice + price).toFixed(2);
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": itemId, "operation": 1,"item_sku_price_id":0,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});


	$(".goods-price .total-price-val").html(totalPrice);
	var goodsName = $(this).parent().siblings(".goods-link").find(".goods-name").html();
	var dataFlag = $(this).parents(".goods-info").attr("data-flag");
	//添加到购物车的商品信息
//	var typeName = "类型";<p class="small-word">'+typeName+'</p>\
	var content = '<li class="shop-list clearfix" data-flag="'+dataFlag+'" stock="'+goodsStock+'">\
					<div class="goods-name fl">\
						<p>'+goodsName+'</p>\
					</div>\
					<p class="goods-price fl">¥<span class="price-val">'+price+'</span></p>\
					<ul class="right-btn fr">\
						<li class="reduce"></li>\
						<li class="goods-num">'+num+'</li>\
						<li class="add icon_market icon_add"></li>\
					</ul>\
				</li>';
	var shopListLen = $(".shop-car-cont .shop-list").length;
	if(shopListLen==0){
		$(".shop-car-cont").append(content);
	}else{
		//去重
		var isRepeat = false;
		for(var i=0;i<shopListLen;i++){
			var listDataFlag = $(".shop-car-cont .shop-list").eq(i).attr("data-flag");
			if(dataFlag==listDataFlag){
				isRepeat = true;
				$(".shop-car-cont .shop-list").eq(i).find(".goods-num").html(num);
				break;
			}else{
				isRepeat = false;
			}
		}
		if(!isRepeat){
			$(".shop-car-cont").append(content);
		}
	}
	
});
//点击商品列表减号
$(".right-goods-wrap").on("click",".reduce",function(){
	$(this).siblings().show();
	var num = Number($(this).siblings(".goods-num").html());
	num --;
	totalNum = Number($(".total-num").html());
	totalNum --;
	if(totalNum<=0){
		totalNum = 0;
		hideFoot();
	}
	if(num<=0){
		num=0;
		$(this).parent().find(".add").siblings().hide();
	}
	$(".total-num").html(totalNum);
	$(this).siblings(".goods-num").html(num);
	//计算价格
	totalPrice = Number($(".goods-price .total-price-val").html());
	var price = Number($(this).parent().siblings(".goods-link").find(".price").children("span").html());
	totalPrice = (totalPrice - price).toFixed(2);
	$(".goods-price .total-price-val").html(totalPrice);
	var goodsName = $(this).parent().siblings(".goods-link").find(".goods-name").html();
	var dataFlag = $(this).parents(".goods-info").attr("data-flag");
	console.log(dataFlag);
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": dataFlag, "operation": -1,"item_sku_price_id":0,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});

	//减少购物车信息
	var shopListLen = $(".shop-car-cont .shop-list").length;
	for(var i=0;i<shopListLen;i++){
		var listDataFlag = $(".shop-car-cont .shop-list").eq(i).attr("data-flag");
		if(dataFlag==listDataFlag){
			$(".shop-car-cont .shop-list").eq(i).find(".goods-num").html(num);
			if(num==0){
				$(".shop-car-cont .shop-list").eq(i).remove();
			}
			break;
		}
	}
});
//点击购物车加号
$(".shop-car-cont").on("click",".add",function(){
	totalNum = Number($(".total-num").html());
	totalPrice = Number($(".goods-price .total-price-val").html());
	var num = Number($(this).siblings(".goods-num").html());
	var price = Number($(this).parent().siblings(".goods-price").children(".price-val").html());
	var goodsStock = Number($(this).parents(".shop-list").attr("stock"));
	num ++;
	if(num>goodsStock){
		num = goodsStock;
		popUp("最多可购买"+num+"份");
		return;
	}
	totalNum ++;
	totalPrice = (totalPrice + price).toFixed(2);
	$(this).siblings(".goods-num").html(num);
	$(".total-num").html(totalNum);
	$(".goods-price .total-price-val").html(totalPrice);

	var goodsInfoLen = $(".right-goods-wrap .goods-info").length;
	var listDataFlag = $(this).parents(".shop-list").attr("data-flag");
		//这里的listDataFlag其实就是itemid
	var sku_id=$(this).parents(".shop-list").data("sku_id");
	if(!sku_id){
		sku_id=0;
	}
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": listDataFlag, "operation": 1,"item_sku_price_id":sku_id,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});

	for(var i=0;i<goodsInfoLen;i++){
		var dataFlag = $(".right-goods-wrap .goods-info").eq(i).attr("data-flag");
		if(listDataFlag == dataFlag){
			$(".right-goods-wrap .goods-info").eq(i).find(".goods-num").html(num);
			break;
		}
	}
});
//点击购物车减号
$(".shop-car-cont").on("click",".reduce",function(){
	totalNum = Number($(".total-num").html());
	totalPrice = Number($(".goods-price .total-price-val").html());
	var num = Number($(this).siblings(".goods-num").html());
	var price = Number($(this).parent().siblings(".goods-price").children(".price-val").html());
	num--;
	totalNum --;
	if(totalNum<=0){
		totalNum = 0;
		$(".shop-car-outer").addClass("hide");
		hideFoot();
	}
	if(num<=0){
		num=0;
		$(this).parents(".shop-list").remove();
	}
	totalPrice = (totalPrice - price).toFixed(2);
	$(this).siblings(".goods-num").html(num);
	$(".total-num").html(totalNum);
	$(".goods-price .total-price-val").html(totalPrice);

	var goodsInfoLen = $(".right-goods-wrap .goods-info").length;
	var listDataFlag = $(this).parents(".shop-list").attr("data-flag");
	var sku_id=$(this).parents(".shop-list").data("sku_id");
	if(!sku_id){
		sku_id=0;
	}
	//这里的listDataFlag其实就是itemid
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": listDataFlag, "operation": -1,"item_sku_price_id":sku_id,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});
	for(var i=0;i<goodsInfoLen;i++){
		var dataFlag = $(".right-goods-wrap .goods-info").eq(i).attr("data-flag");
		if(listDataFlag == dataFlag){
			if(num==0){
				$(".right-goods-wrap .goods-info").eq(i).find(".reduce").hide();
				$(".right-goods-wrap .goods-info").eq(i).find(".goods-num").hide();
			}
			$(".right-goods-wrap .goods-info").eq(i).find(".goods-num").html(num);
			break;
		}
	}
});

$("body").on("click",".clear",function(){
	$.ajax({
		url: "/FrontMerchant/clear_shopping_cart", //URL
		dataType: "json",
		data: {"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);
		}
	});
});
//点击清空购物车
$(".shop-car-outer").on("click",".del-car",function(){
	$(".modal_del").show();
	$(".shop-car-shape").hide();
	$("body").css("overflow","hidden");
});
$(".modal_del").on("click",".cancel",function(){
	$(".modal_del").hide();
	$(".shop-car-shape").show();
	$("body").css("overflow","scroll");
});
$(".modal_del").on("click",".sure",function(){
	$(".modal_del").hide();
	$(".shop-car-shape").show();
	$("body").css("overflow","scroll");
	totalNum = 0;
	totalPrice = 0;
	$(".total-num").html(totalNum);
	$(".goods-price .total-price-val").html(totalPrice);
	hideFoot();
	$(".shop-car-cont").html("");
	$(".shop-car-outer").addClass("hide");
	$(".goods-info").find(".reduce").hide();
	$(".goods-info").find(".goods-num").html("");
	$(".goods-info").find(".goods-num").hide();
});



//底部按钮样式的改变
function showFoot(){
	$(".out-foot").addClass("out-foot-bg33");
	$(".shop-car-icon").addClass("car-have-goods");
	$(".total-num").css({
		"display":"flex",
		"display":"-webkit-flex"
	});
	$(".goods-price").show();
	$(".go-count").show();
}
function hideFoot(){
	$(".out-foot").removeClass("out-foot-bg33");
	$(".shop-car-icon").removeClass("car-have-goods");
	$(".total-num").hide();
	$(".goods-price").hide();
	$(".go-count").hide();
}
//菜单与右侧商品的对应位置
//右侧菜单的选择
var index = 0,scrollArr = [];
var rightGoods = document.getElementsByClassName("right-goods");
var goodsLen = $(".left-menu .menu-name").length;
for(var i=0;i<goodsLen;i++){
	var scrollTop = rightGoods[i].offsetTop;
	scrollArr.push(scrollTop);
}
$(".left-menu").on("click",".menu-name",function(){
	$(".menu-name span").css("borderBottom","0.5px solid #d2d2d2");
	$(this).find("span").css("borderBottom",0);
	$(this).addClass("click-menu-name").siblings().removeClass("click-menu-name");
	$(this).prev().find("span").css("borderBottom",0);
	index = $(this).index();
	$(".right-goods-wrap").scrollTop(scrollArr[index]);
});
$(".right-goods-wrap").on("scroll",function(){
	var scrollTop = $(this).scrollTop();
	for(var i=0;i<goodsLen;i++){
		var diffVal = Math.abs(scrollTop-scrollArr[i]);
		if(diffVal<=10){
			$(".menu-name span").css("borderBottom","0.5px solid #d2d2d2");
			$(".left-menu .menu-name").eq(i).find("span").css("borderBottom",0);
			$(".left-menu .menu-name").eq(i).addClass("click-menu-name")
			.siblings().removeClass("click-menu-name");
			$(".left-menu .menu-name").eq(i).prev().find("span").css("borderBottom",0);
		}
	}
});
//点击底部购物车图标
$(".out-foot").on("click",".car-have-goods",function(){
	$(".shop-car-outer").toggleClass("hide");
});
$(".shop-car-shape").on("click",function(){
	$(".shop-car-outer").addClass("hide");
});
//底部优惠信息
function showFootInfo(){
//	var sendOutPrice = Number($(".send-out-price span").html());
	var metVal = Number($(".foot-info .met-val").html());
	if(totalPrice>=metVal){
		//$(".foot-info").show();
		//$(".foot-info").html("已满80元可减30元");
	}else{
		$(".foot-info").hide();
	}
}
//弹窗
function popUp(info){
	var timer = null;
	clearTimeout(timer);
	$(".pop-up").html(info);
	$(".pop-up").fadeIn("slow");
	timer = setTimeout(function(){
		$(".pop-up").fadeOut("slow");
	},2000);
}
