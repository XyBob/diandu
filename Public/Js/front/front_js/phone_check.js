function getEle(obj){
	return document.getElementById(obj);
}
//var phoneReg = /^1((3[0-9]|4[57]|5[0-35-9]|7[0678]|8[0-9])\d{8}$)/;
//验证手机号
var phoneReg = /^1[3,4,5,7,8][0-9]\d{8}$/;
var passWordReg = /^[a-zA-Z0-9]{6,12}$/;
var phoneNum,passWord;
getEle("phone").addEventListener("input",function(e){
	$(this).attr("lock",1);
	phoneNum = Number(this.value);
	if(phoneReg.test(phoneNum)){
		$(this).attr("lock",0);
		$(".check_code_btn").addClass("get_code");
	}else{
		$(this).attr("lock",1);
		$(".check_code_btn").removeClass("get_code");
	}
	var lock = Number($(this).attr("lock"))||Number($("#phone").attr("lock"))||Number($("#set_password").attr("lock"))||Number($("#sure_password").attr("lock"));
	finished(lock);
});
//验证验证码
getEle("check_code").addEventListener("input",function(e){
	//根据收到的验证码做验证
	$(this).attr("lock",1);
	if(this.value!=""){
		$(this).attr("lock",0);
	}else{
		$(this).attr("lock",1);
	}
	var lock = Number($(this).attr("lock"))||Number($("#phone").attr("lock"))||Number($("#set_password").attr("lock"))||Number($("#sure_password").attr("lock"));
	finished(lock);
});
//点击获取验证码
var secondNum = 59;
$(".check_code_box").on("click",".get_code",function(){
	$(this).hide();
	$(".code_info").show();
	var phone = $('#phone').val();
	getCheckCode(phone);
	var timer = setInterval(function(){
		secondNum --;
		if(secondNum<=0){
			secondNum = 59;
			clearInterval(timer);
			$(".code_info").hide();
			$(".check_code_btn").show();
			if(phoneReg.test(phoneNum)){
				$(".check_code_btn").addClass("get_code");
			}else{
				$(".check_code_btn").removeClass("get_code");
			}
		}
		$(".second_num").html(secondNum);
	},1000);
});
//验证设置密码
getEle("set_password").addEventListener("input",function(e){
	passWord = this.value;
	$(this).attr("lock",1);
	if(passWordReg.test(passWord)){
		passWord = this.value;
		$(this).attr("lock",0);
	}else{
		passWord = "";
		$(this).attr("lock",1);
	}
	var lock = Number($(this).attr("lock"))||Number($("#phone").attr("lock"))||Number($("#check_code").attr("lock"))||Number($("#sure_password").attr("lock"));
	finished(lock);
});
//验证确认密码
getEle("sure_password").addEventListener("input",function(e){
	$(this).attr("lock",1);
	if(this.value == passWord){
		console.log(this.value);
		$(this).attr("lock",0);
	}else{
		console.log(passWord);
		$(this).attr("lock",1);
	}
	var lock = Number($(this).attr("lock"))||Number($("#phone").attr("lock"))||Number($("#check_code").attr("lock"))||Number($("#set_password").attr("lock"));
	finished(lock);
});
//判断完成按钮是否可点击
function finished(flag){
	if(flag==0){
		$(".unfinish_btn").css("display","none");
		$(".finish_btn").css("display","block");
	}else{
		$(".unfinish_btn").css("display","block");
		$(".finish_btn").css("display","none");
	}
}

function getCheckCode(phone){
	$.post("/FrontUser/send_vcode",{mobile:phone,type:1},function(data){
		if(data == 'success'){
			show_alert('发送成功');
		}
	});
}
//$(".check_ft_btn").on("click",function(){
//	bind_mobile();
//});
function bind_mobile(){
	var check_code = $('#check_code').val();
	var mobile = $('#phone').val();
	var password = $('#set_password').val();
	var re_password = $('#sure_password').val();
	if(password!=re_password){
		show_alert('两次密码不同，请重新输入');
		return;
	}
	$.post("/FrontUserCenter/bind_mobile",{
		"mobile":mobile,
		"vcode":check_code,
		"password":password
	},function(data){
		if(data=='success'){
			show_alert('绑定成功');
			//location.href="/Index/home_index";
			setTimeout(function(){
				//window.history.go(-1);
				location.href = redirect_url;
			},1000);
			//window.history.go(-1);
		}else{
			show_alert(data);
		}
	});
}


















