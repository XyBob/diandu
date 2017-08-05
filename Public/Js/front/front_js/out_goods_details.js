//进入详情页,根据购物车的数量,判断底部样式
// totalNum:商品总数;totalPrice:总价,stockVal:库存;
var totalNum,totalPrice,dataFlag = item_id,dataFlag2="",goodsName,price,goodsNum;
totalNum = Number($(".total-num").html());
totalPrice = Number($(".goods-price .total-price-val").html());
stockVal = Number($(".stock-val").html());
goodsName = $(".goods-detail-name").html();
price = Number($(".details-bot .goods-price").children("span").html());
if(totalNum!=0){
	showFoot();
}else{
	hideFoot();
}
//stockVal = 4;
//listLen:购物车商品种类数;
var dataFlagArr = [],listLen;
var appendList2 = null,appendList=null;
var appendList1 = $(".shop-list[data-flag="+dataFlag+"]");
//点击加入购物车
$(".join-car").on("click",function(){
	//购物车
	listLen = $(".shop-list").length;
	goodsNum = 1;
	appendList1 = $(".shop-list[data-flag="+dataFlag+"]");
	//没有规格
	if(sku_num==0){
		if(stockVal==0){
			popUp("暂无此商品");
			return;
		}
		$(this).hide();
		$(".details-bot .right-btn").css("display","flex");
		var content = '<li class="shop-list clearfix" data-flag="'+dataFlag+'" data-sku_id="0" stock="'+stockVal+'">\
				<div class="goods-name fl">\
				<p>'+goodsName+'</p>\
				</div>\
				<p class="goods-price fl">¥<span class="price-val">'+price+'</span></p>\
				<ul class="right-btn fr">\
					<li class="reduce"></li>\
					<li class="goods-num">'+goodsNum+'</li>\
					<li class="add icon_market icon_add"></li>\
				</ul>\
			</li>';
		$.ajax({
			url: "/FrontMerchant/shopping_cart_add_and_subtract",
			dataType: "json",
			data:{
				"item_id": item_id,
				"operation": 1,
				"item_sku_price_id":item_sku_price_id,
				"business_id":business_id
			},
			type: "post",
			success: function (data) {
				
			}
		});
		totalNum ++;
		totalPrice += price;
		//购物车无此商品
		if(appendList1.length==0){
			$(".shop-car-cont").prepend(content);
			appendList1 = $(".shop-list[data-flag="+dataFlag+"]");
		}else{
			goodsNum = Number(appendList1.find(".goods-num").html())+1;
			appendList1.find(".goods-num").html(goodsNum);
		}
		$(".details-bot .goods-num").html(goodsNum);
		$(".total-num").html(totalNum);
		$(".total-price-val").html(totalPrice);
		showFoot();
	}else{
		if(checkType()){
			stockVal = Number($(".stock-val").html());
			if(stockVal==0){
				goodsNum = stockVal;
				popUp("暂无此商品");
				return ;
			}
			$(".join-car").hide();
			$(".details-bot .right-btn").css("display","flex");
			$(".details-bot .reduce").show();
			$(".details-bot .add").show();
			$.ajax({
				url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
				dataType: "json",
				data:{
					"item_id": item_id,
					"operation": 1,
					"item_sku_price_id":item_sku_price_id,
					"business_id":business_id
				},
				type: "post",
				success: function (data) {
					
				}
			});
			totalNum ++;
			totalPrice += price;
			dataFlag2=item_sku_price_id;
			if(dataFlag2){
				var typeName = getTypeName();
				appendList2 = $(".shop-list[data-sku_id="+dataFlag2+"]");
				appendList = $(".shop-list[data-flag="+dataFlag+"][data-sku_id="+dataFlag2+"]");
				var content = '<li class="shop-list clearfix" data-flag="'+dataFlag+'" data-sku_id="'+dataFlag2+'" stock="'+stockVal+'">\
							<div class="goods-name fl">\
							<p>'+goodsName+'</p>\
							<p class="small-word">'+typeName+'</p>\
							</div>\
							<p class="goods-price fl">¥<span class="price-val">'+price+'</span></p>\
							<ul class="right-btn fr">\
								<li class="reduce"></li>\
								<li class="goods-num">'+goodsNum+'</li>\
								<li class="add icon_market icon_add"></li>\
							</ul>\
						</li>';
				//购物车无此商品
				if(appendList.length==0){
					$(".shop-car-cont").prepend(content);
					appendList1 = $(".shop-list[data-flag="+dataFlag+"]");
					appendList2 = $(".shop-list[data-sku_id="+dataFlag2+"]");
				}else{
					goodsNum = Number(appendList.find(".goods-num").html())+1;
					appendList.find(".goods-num").html(goodsNum);
				}
				$(".details-bot .goods-num").html(goodsNum);
				$(".total-num").html(totalNum);
				$(".total-price-val").html(totalPrice);
				showFoot();
			}
		}
	}
});
//点击商品加号
$(".details-bot").on("click",".add",function(){
	rightBtnStyle();
	stockVal = Number($(".stock-val").html());
	goodsNum ++;
	if(goodsNum>stockVal){
		goodsNum = stockVal;
		popUp("最多可购买"+stockVal+"份");
		return ;
	}
	totalNum ++;
	price = Number($(".details-bot .goods-price").children("span").html());
	totalPrice += price;
	if(sku_num!=0){
		appendList.find(".goods-num").html(goodsNum);
	}else{
		appendList1.find(".goods-num").html(goodsNum);
	}
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": item_id, "operation": 1,"item_sku_price_id":item_sku_price_id,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);
		}
	});
	$(".details-bot .goods-num").html(goodsNum);
	$(".total-num").html(totalNum);
	$(".total-price-val").html(totalPrice);
});
//点击商品减号
$(".details-bot").on("click",".reduce",function(){
	goodsNum = Number($(this).siblings(".goods-num").html());
	goodsNum --;
	totalNum --;
	totalPrice -= price;
	//没有规格
	if(sku_num==0){
		if(goodsNum==0){
			$(".details-bot .right-btn").hide();
			$(".join-car").show();
			$(".shop-list[data-flag="+dataFlag+"]").remove();
		}
		appendList1.find(".goods-num").html(goodsNum);
		$(".details-bot .goods-num").html(goodsNum);
		$(".total-num").html(totalNum);
		$(".total-price-val").html(totalPrice);
	}else{
		if(goodsNum==0){
			$(".details-bot .right-btn").hide();
			$(".join-car").show();
			appendList.remove();
		}
		appendList.find(".goods-num").html(goodsNum);
		$(".details-bot .goods-num").html(goodsNum);
		$(".total-num").html(totalNum);
		$(".total-price-val").html(totalPrice);
	}
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": item_id, "operation": -1,"item_sku_price_id":item_sku_price_id,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);

		}
	});
	if(totalNum==0){
		hideFoot();
	}
});
//点击购物车加号
$(".shop-car-cont").on("click",".add",function(){
	totalNum = Number($(".total-num").html());
	totalPrice = Number($(".goods-price .total-price-val").html());
	var num = Number($(this).siblings(".goods-num").html());
	var price = Number($(this).parent().siblings(".goods-price").children(".price-val").html());
	num ++ ;
	stockVal = Number($(this).parents(".shop-list").attr("stock"));
	if(num>stockVal){
		num = stockVal;
		popUp("最多可购买"+num+"份");
		return ;
	}
	totalNum ++;
	totalPrice += price;
	$(this).siblings(".goods-num").html(num);
	$(".total-num").html(totalNum);
	$(".goods-price .total-price-val").html(totalPrice);
	var this_item_id = $(this).parents(".shop-list").attr("data-flag");
	var this_item_sku_price_id = $(this).parents(".shop-list").attr("data-sku_id");
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": this_item_id, "operation": 1,"item_sku_price_id":this_item_sku_price_id,"business_id":business_id},
		type: "post",
		success: function (data) {
			console.log(data);
		}
	});
	var thisParents = $(this).parents(".shop-list");
	if(thisParents.attr("data-flag")==item_id&&thisParents.attr("data-sku_id")==item_sku_price_id){
		$(".details-bot .goods-num").html(num);
	}
	if(sku_num==0){
		$(".details-bot .goods-num").html(num);
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
	$(this).siblings(".goods-num").html(num);
	$(".total-num").html(totalNum);
	$(".goods-price .total-price-val").html(totalPrice);
	var this_item_id = $(this).parents(".shop-list").attr("data-flag");
	var this_item_sku_price_id = $(this).parents(".shop-list").attr("data-sku_id");
	$.ajax({
		url: "/FrontMerchant/shopping_cart_add_and_subtract", //URL
		dataType: "json",
		data: {"item_id": this_item_id, "operation": -1,"item_sku_price_id":this_item_sku_price_id,"business_id":business_id},
		type: "post",
		success: function (data) {
			
		}
	});
	var thisParents = $(this).parents(".shop-list");
	if(thisParents.attr("data-flag")==item_id&&thisParents.attr("data-sku_id")==item_sku_price_id){
		$(".details-bot .goods-num").html(num);
		if(num==0){
			$(".details-bot .join-car").show();
			$(".details-bot .right-btn").hide();
		}
	}
	if(sku_num==0){
		$(".details-bot .goods-num").html(num);
		if(num==0){
			$(".details-bot .join-car").show();
			$(".details-bot .right-btn").hide();
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
	$(".goods-num").html("");
	$(".details-bot .right-btn").hide();
	$(".details-bot .join-car").show();
	$(".type-list").removeClass("none-type-list").removeClass("active-type-list");
});


//规格
var sku1='';
var sku2='';
var item_sku_price_id='';
if(sku_num){
	$(".sku1").on("click",function(){
		if(!$(this).hasClass("none-type-list")){
			$(this).addClass("active-type-list").siblings().removeClass("active-type-list");
			sku1 = $(this).data('property_id');
			if(sku_num=='1'||sku2!=''){//判断sku是否选满
				get_sku_stock(1,true);
				get_sku_stock(0,'sku1');
			}else{
				get_sku_stock(0,true);
			}
		}
	});
	$(".sku2").on("click",function(){
		if(!$(this).hasClass("none-type-list")){
			$(this).addClass("active-type-list").siblings().removeClass("active-type-list");
			sku2 = $(this).data('property_id');
			if(sku_num=='2'&&sku1!=''){//判断sku是否选满
				get_sku_stock(1,true);
				get_sku_stock(0,'sku2');
			}else{
				get_sku_stock(0,true);
			}
		}
	});
}
function get_sku_stock(flag,sku_number){
	if(sku_number=='sku1'){
		var this_sku1=sku1;
	}else if(sku_number=='sku2'){
		var this_sku2=sku2;
	}else{
		var this_sku1=sku1;
		var this_sku2=sku2;
	}
	$.ajax({
		url: "/FrontMerchant/get_sku_stock", //URL
		dataType: "json",
		data: {"sku1":this_sku1,"sku2":this_sku2,"item_id":item_id,"flag":flag},
		type: "post",
		success: function (data) {
			if(flag){
				if(data){
					item_sku_price_id = data.item_sku_price_id;
					rightBtnStyle();
					var stock=data.sku_stock;
					$('.stock-val').html(stock);
					$('.sku_price').html(data.sku_price);
				}else{
					$('.stock-val').html(0);
				}
			}else{
				var sku2Len = $(".type-cont .sku2").length;
				var sku1Len = $(".type-cont .sku1").length;
				if(this_sku1){
					if(data){
						for(var i=0;i<sku2Len;i++){
							var obj = $(".type-cont .sku2").eq(i);
							var r = contains(data,obj.attr("data-property_id"));
							if(!r){
								obj.addClass("none-type-list");
							}else{
								obj.removeClass("none-type-list");
							}
						}
					}else{//sku2相关的所有变不能选
						$(".type-cont .sku2").addClass("none-type-list");
					}
				}
				if(this_sku2){
					if(data){
						for(var i=0;i<sku1Len;i++){
							var obj = $(".type-cont .sku1").eq(i);
							var r = contains(data,obj.attr("data-property_id"));
							if(!r){
								obj.addClass("none-type-list");
							}else{
								obj.removeClass("none-type-list");
							}
						}
					}else{//sku2相关的所有变不能选
						$(".type-cont .sku1").addClass("none-type-list");
					}
				}
			}
		}
	});
}
function contains(arr, obj){
	var i = arr.length;
	while(i--){
		if(parseInt(arr[i]) === parseInt(obj)){
			return true;
		}
	}
	return false;
}

//右侧按钮的样式变化
function rightBtnStyle(){
	if(sku_num!=0){
		appendList = $(".shop-list[data-flag="+dataFlag+"][data-sku_id="+item_sku_price_id+"]");
		if(appendList.length==0){
			goodsNum = 1;
			$(".details-bot .join-car").show();
			$(".details-bot .right-btn").hide();
		}else{
			goodsNum = Number(appendList.find(".goods-num").html());
			$(".details-bot .join-car").hide();
			$(".details-bot .right-btn").css("display","flex");
		}
		$(".details-bot .right-btn").find(".goods-num").html(goodsNum);
		console.log("goodsNUm8989==="+goodsNum);
	}else{
		appendList1 = $(".shop-list[data-flag="+item_id+"]");
		if(appendList1.length==0){
			goodsNum = 1;
			$(".details-bot .join-car").show();
			$(".details-bot .right-btn").hide();
		}else{
			goodsNum = Number(appendList1.find(".goods-num").html());
			$(".details-bot .join-car").hide();
			$(".details-bot .right-btn").css("display","flex");
		}
		$(".details-bot .right-btn").find(".goods-num").html(goodsNum);
	}
}
//获取typeName
function getTypeName(){
	var str = "";
	for(var i=0;i<sku_num;i++){
		var typeName = $(".active-type-list").eq(i).html();
		str = str + typeName + "&nbsp;";
	}
	return str;
}

//检验规格是否都有选择
function checkType(){
	var timer = null,isSelect = true;
	for(var i=0;i<sku_num;i++){
		var obj = $(".type-area .type-cont").eq(i).find(".active-type-list");
		var objTotal = $(".type-area .type-cont").eq(i).find(".type-list");
		var objNone = $(".type-area .type-cont").eq(i).find(".none-type-list");
		if(objTotal.length!=objNone.length){
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
		}else{
			$(".pop-up").html("请选择"+html);
			$(".pop-up").fadeIn("slow");
			timer = setTimeout(function(){
				$(".pop-up").fadeOut("slow");
			},2000);
		}
		
	}
	if(isSelect){
		price = Number($(".details-bot .goods-price").children("span").html());
//		$(".join-car").hide();
//		$(".details-bot .right-btn").css("display","flex");
//		$(".details-bot .reduce").show();
//		$(".details-bot .add").show();
		return true;
	}else{
		return false;
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
//底部按钮样式的改变
function showFoot(){
	$(".out-foot").addClass("out-foot-bg33");
	$(".shop-car-icon").addClass("car-have-goods");
	$(".total-num").css({
		"display":"flex"
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
//点击购物车图标，展示购物车内容
$(".out-foot").on("click",".car-have-goods",function(){
	$(".shop-car-outer").toggleClass("hide");
});
$(".shop-car-shape").on("click",function(){
	$(".shop-car-outer").addClass("hide");
});