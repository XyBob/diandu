var oBody = document.getElementsByTagName("body")[0];
function addPrevent(){
	$("body").bind("touchmove",function(event){
		event.preventDefault();
	});
	$("body,html,window").addClass("body-overflow");
}
function delPrevent(){
	$("body").unbind("touchmove");
	$("body,html").removeClass("body-overflow");
}
$('.modal_choose').on('click',function(e){
    $(this).hide();
    delPrevent();
});
//选择送达时间
$('.scroll_answer_list').on('click',".show_choose",function(e){
	delPrevent();
	e.stopPropagation();
    $(this).addClass('active').siblings().removeClass('active');
    $('#time_text').html($(this).find('.name').html());
    $(this).find(".icon_select_default").addClass("icon_selected_b");
    $(this).siblings().find(".icon_select_default").removeClass("icon_selected_b");
    $(".modal_choose").fadeOut("400");
    var dataTime = $(this).attr("data-time");
    var dataYear = "";
    $(".choose_time_link").attr("data-time",dataTime);
    if($(this).attr("data-year")){
    	dataYear = $(this).attr("data-year");
    	$(".choose_time_link").attr("data-year",dataYear);
    }else{
    	if($(this).attr("data-flag")=="0"){
    		var nowYear = new Date().getFullYear();
			var nowMonth = new Date().getMonth()+1;
			var nowDate = new Date().getDate();
			var fullTime = nowYear+"-"+nowMonth+"-"+nowDate;
			$(".choose_time_link").attr("data-year",fullTime);
    	}else{
    		var todayTime = new Date().getTime();
			todayTime = todayTime + (24*60*60*1000);
			var nowYear = new Date(todayTime).getFullYear();
			var nowMonth = new Date(todayTime).getMonth()+1;
			var nowDate = new Date(todayTime).getDate();
			var fullTime = nowYear+"-"+nowMonth+"-"+nowDate;
			$(".choose_time_link").attr("data-year",fullTime);
    	}
    }
});
//点击顶部地址
$(".address_link_modify").on("click",function(){
	addPrevent();
	$(".choose-address-outer").show();
});
//无默认地址
$(".address_link").on("click",function(){
	addPrevent();
	$(".choose-address-outer").show();
});
$(".choose-address-outer").on("click",function(e){
	delPrevent();
	$(this).hide();
	e.stopPropagation();
});
//选择地址
$(".address-scroll").on("click",".address-list",function(){
	delPrevent();
    user_address_id=$(this).attr("data-address-id");
    //console.log(user_address_id);
	var userInfo = {
		"name":"",
		"tel":"",
		"address":""
	};
	userInfo.name = $(this).find(".name").html();
	userInfo.tel = $(this).find(".tel").html();
	userInfo.address = $(this).find(".address-cont").html();
	$(".address_link_modify").find(".name").html("收货人："+userInfo.name);
	$(".address_link_modify").find(".tel").html(userInfo.tel);
	$(".address_link_modify").find(".down").html(userInfo.address);
	$(".address_link_modify").show();
	$(".address_link").hide();
	$(".choose-address-outer").hide();
});
//点击新增收货地址
$(".new-address-btn").on("click",function(){
	$(".choose-address-outer").hide();
	$(".new-address-outer").show();
	addPrevent();
    var myCity = new BMap.LocalCity();
    myCity.get(myFun);
});
//点击关闭
$(".address-close").on("click",function(){
	delPrevent();
	$(".new-address-outer").hide();
});
/*todo 是否同意按钮的切换*/
$('.whether_default .icon_select_rect').on('click',function(){
    $(this).toggleClass('icon_selected_rect');
    if($(this).hasClass('icon_selected_rect')){
        $('#whether_selected').val(1);
    }
    else{
        $('#whether_selected').val('');
    }
});
//保存
$(".save").on("click",function(){
	var whether_selected = Number($('#whether_selected').val());
	//console.log($('#longitude').val());
	var addressInfo = {
		"person_name":$('#person_name').val(),
		"shop_tel":$('#phone').val(),
		"detail_address":$('#detail_address').val(),
		"edit_text":$(".edit-text").val()
	};
	var tel_reg = /^1[34578]\d{9}$/gi;
	if (!addressInfo.person_name){
        show_alert('对不起，请填写姓名！');
        setTimeout(function(){
            $('.modal_alert').hide();
            $('#person_name').focus();
        },1000)
        return false;
    }
    if(!addressInfo.shop_tel){
        show_alert('对不起，请填写手机号码！');
        setTimeout(function(){
            $('.modal_alert').hide();
            $('#phone').focus();
        },1000)
        return false;
    }
    if (!tel_reg.test(addressInfo.shop_tel)) {
        show_alert('对不起，请填写正确的手机号码！');
        setTimeout(function(){
            $('.modal_alert').hide();
            $('#phone').focus();
        },1000)
        return false;
    }
    if (!addressInfo.detail_address||!addressInfo.edit_text){
        show_alert('对不起，请填写地址！');
        $('#detail_address').focus();
        return false;
    }
    $.ajax({
    	url:"/FrontUserCenter/add_address",
        type:"POST",
        dataType:"json",
        data:{
    		realname:addressInfo.person_name,
			mobile:addressInfo.shop_tel,
			address:addressInfo.detail_address,
			address_detail:addressInfo.edit_text,
			is_default:whether_selected,
            latitude:$('#latitude').val(),
            longitude:$('#longitude').val(),


		},
		success:function (d) {
            user_address_id= d.user_address_id;
    		console.log(d.user_address_id);
            var html = '<li class="address-list" data-address-id="'+d.user_address_id+'">\
					<div class="list-head">\
		            	<span class="name">'+addressInfo.person_name+'</span>\
		            	<span class="tel">'+addressInfo.shop_tel+'</span>\
		        	</div>\
		        	<div class="list-bot">';
            console.log(whether_selected);
            if(whether_selected==1){
                $(".address-scroll").find(".default-word").html("");
                html += '<span class="default-word">[&nbsp;默认地址&nbsp;]</span>';
            }else{
                html += '<span class="default-word"></span>';
            }
            html += '<span class="address-cont">'+addressInfo.detail_address+addressInfo.edit_text+'</span></div></li>';
            $(".address-scroll").prepend(html);
            $(".address_link_modify").find(".name").html("收货人："+addressInfo.person_name);
            $(".address_link_modify").find(".tel").html(addressInfo.shop_tel);
            $(".address_link_modify").find(".down").html(addressInfo.detail_address+addressInfo.edit_text);
            $(".new-address-outer").hide();
            $(".address_link").hide();
            $(".address_link_modify").show();
            //清空输入框内容
            clearCont();
            delPrevent();
        }
	});

});
//解决弹起键盘时的展示问题
var height = $(window).height();
$(window).resize(function (){
    var new_height = $(window).height();
    if (new_height < height) {
        $('#submit').hide();
    } else {
        $('#submit').show();
    }
});
//清空输入框内容
function clearCont(){
	$('#person_name').val(""),
	$('#phone').val(""),
	$('#detail_address').val(""),
	$(".edit-text").val("")
}
