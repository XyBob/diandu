//规格
var typeLen = $(".type-area .type-cont").length;
$(".type-area").on("click",".type-list",function(){
	if(!$(this).hasClass("none-type-list")){
		$(this).addClass("active-type-list").siblings().removeClass("active-type-list");
	}
});








//  totalNum:商品总数;totalPrice:总价;
var totalNum,totalPrice,dataFlag="",dataFlag2="",goodsName,price;
totalNum = Number($(".total-num").html());
totalPrice = Number($(".goods-price .total-price-val").html());
goodsName = $(".goods-detail-name").html();
price = Number($(".details-bot .goods-price").children("span").html());
console.log("totalNum=="+totalNum);
if(totalNum!=0){
	showFoot();
}else{
	hideFoot();
}
//点击商品加号
$(".details-bot").on("click",".add",function(){
	var num = Number($(this).siblings(".goods-num").html());
	num++;
	$(this).siblings(".goods-num").html(num);
	getFlag();
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": item_id, "operation": 1,"item_sku_price_id":0,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});
	var obj = $(".shop-list[data-flag="+dataFlag+"][data-flag2="+dataFlag2+"]");
	if(obj.length){
		obj.find(".goods-num").html(num);
	}else{
		var content = '<li class="shop-list clearfix" data-flag="'+dataFlag+'" data-flag2="'+dataFlag2+'">\
					<p class="goods-name fl">'+goodsName+'</p>\
					<p class="goods-price fl">¥<span class="price-val">'+price+'</span></p>\
					<ul class="right-btn fr">\
						<li class="reduce"></li>\
						<li class="goods-num">'+num+'</li>\
						<li class="add icon_market icon_add"></li>\
					</ul>\
				</li>';
		$(".shop-car-cont").append(content);
	}
	
	totalNum++;
	$(".total-num").html(totalNum);
});
//点击商品减号
$(".details-bot").on("click",".reduce",function(){
	var num = Number($(this).siblings(".goods-num").html());
	num--;
	totalNum = Number($(".total-num").html());
	totalNum --;
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": item_id, "operation": -1,"item_sku_price_id":0,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});
	if(totalNum<=0){
		totalNum = 0;
		hideFoot();
	}
	if(num<=0){
		num=0;
		$(".details-bot .right-btn").hide();
		$(".join-car").show();
	}
	$(".total-num").html(totalNum);
	$(this).siblings(".goods-num").html(num);
});
//点击加入购物车
$(".join-car").on("click",function(){
	if(checkType()){
		getFlag();
		var num = Number($(this).siblings(".right-btn").find(".goods-num").html());
		num = 1;
		$(this).siblings(".right-btn").find(".goods-num").html(num);
		showFoot();
		$.ajax({
			url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
			dataType: "json",
			data: {"item_id": item_id, "operation": 1,"item_sku_price_id":item_sku_price_id,"business_id":business_id},
			type: "post",
			success: function (data) {
				console.log(data);

			}
		});
		var typeName = getTypeName();
		var content = '<li class="shop-list clearfix" data-flag="'+dataFlag+'" data-flag2="'+dataFlag2+'">\
					<div class="goods-name fl">\
					<p>'+goodsName+'</p>\
					<p class="small-word">'+typeName+'</p>\
					</div>\
					<p class="goods-price fl">¥<span class="price-val">'+price+'</span></p>\
					<ul class="right-btn fr">\
						<li class="reduce"></li>\
						<li class="goods-num">'+num+'</li>\
						<li class="add icon_market icon_add"></li>\
					</ul>\
				</li>';
		$(".shop-car-cont").append(content);
		totalNum++;
		totalPrice += price;
		$(".total-num").html(totalNum);
		$(".goods-price .total-price-val").html(totalPrice);
	}else{
		hideFoot();
	}
	
});
//获取dataFlag
function getFlag(){
	var attr1 = $(".type-area .type-cont").eq(0).find(".active-type-list").attr("data-flag");
	var attr2 = $(".type-area .type-cont").eq(1).find(".active-type-list").attr("data-flag2");
	if(attr1){
		dataFlag = attr1;
	}
	if(attr2){
		dataFlag2 = attr2; 
	}
}
//获取typeName
function getTypeName(){
	var str = "";
	for(var i=0;i<typeLen;i++){
		var typeName = $(".active-type-list").eq(i).html();
		str = str + typeName + "&nbsp;";
	}
	return str;
}

//点击底部购物车图标
$(".out-foot").on("click",".car-have-goods",function(){
	$(".shop-car-outer").toggleClass("hide");
});
$(".shop-car-shape").on("click",function(){
	$(".shop-car-outer").addClass("hide");
});
//检验规格是否都有选择
function checkType(){
	var timer = null,isSelect = true;
	for(var i=0;i<typeLen;i++){
		var obj = $(".type-area .type-cont").eq(i).find(".active-type-list");
		if(obj.length==0){
			isSelect = false;
			clearTimeout(timer);
			var html = $(".type-area .type-cont").eq(i).find(".type-name").children("span").html();
			$(".pop-up").html("请选择"+html);
			$(".pop-up").fadeIn("slow");
			timer = setTimeout(function(){
				$(".pop-up").fadeOut("slow");
			},2000);
			break;
		}
	}
	if(isSelect){
		$(".join-car").hide();
		$(".details-bot .right-btn").css("display","flex");
		$(".details-bot .reduce").show();
		$(".details-bot .add").show();
		return true;
	}else{
		return false;
	}
}
//点击购物车加号
$(".shop-car-cont").on("click",".add",function(){
	totalNum = Number($(".total-num").html());
	totalPrice = Number($(".goods-price .total-price-val").html());
	var num = Number($(this).siblings(".goods-num").html());
	var price = Number($(this).parent().siblings(".goods-price").children(".price-val").html());
	num++;
	totalNum ++;
	totalPrice += price;
	//底部信息showFootInfo
	showFootInfo();
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
	totalPrice -= price;
	//底部信息showFootInfo
	showFootInfo();
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

//底部按钮样式的改变
function showFoot(){
	$(".out-foot").addClass("out-foot-bg33");
	$(".shop-car-icon").addClass("car-have-goods");
	$(".total-num").css({
		"display":"flex",
		"display":"-webkit-flex"
	});
	$(".price-box .goods-price").show();
	$(".out-foot .go-count").show();
}
function hideFoot(){
	$(".out-foot").removeClass("out-foot-bg33");
	$(".shop-car-icon").removeClass("car-have-goods");
	$(".total-num").hide();
	$(".price-box .goods-price").hide();
	$(".out-foot .go-count").hide();
}