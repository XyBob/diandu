//生成送达时间
$('#choose_send_time').on('click',function(e){
	addPrevent();
	var fullTime = getFullTime();
    var nowHour = new Date().getHours();
    var nowMin = new Date().getMinutes()/60;
    var nowTime = nowHour + nowMin;
    nowTime = parseFloat(nowTime);
    if(timeType==1){
    	if(nowTime>endTime){
	    	show_alert("抱歉，不在配送时间！");
	    	setTimeout(function(){
	    		$(".modal_alert").hide();
	    	},1500);
	    	return;
	    }
	    var timeList = '';
	    if(nowTime<=initTime){
	    	sendInit = initTime+deliverTime;
	    	var hm = hmMethod(sendInit);
	    	$(".show_choose").eq(0).attr("data-time",hm);
	    	timeList = outTime(fullTime);
	    }else{
	    	sendInit = nowTime+deliverTime;
	    	var hm = hmMethod(sendInit);
	    	$(".show_choose").eq(0).attr("data-time",hm);
	    	timeList = outTime(fullTime);
	    }
    }else{
    	//菜市场
    	if(nowTime<=18){
    		if(nowTime<=initTime){
    			sendInit = initTime+deliverTime;
    			var hm = hmMethod(sendInit);
	    		$(".show_choose").eq(0).attr("data-time",hm);
    		}else{
    			sendInit = nowTime+deliverTime;
    			var hm = hmMethod(sendInit);
	    		$(".show_choose").eq(0).attr("data-time",hm);
    		}
	    	timeList = outTime(fullTime);
    	}else{
    		$(".answer_choose_list").find(".show_choose").remove();
    	}
    }
    $(".answer_choose_list").find(".show_choose:gt(0)").remove();
	$(".answer_choose_list").append(timeList);
	$(".answer_choose_list").find(".show_choose:gt(7)").remove();
	//下午3点后,菜市场可预订明天时间
	if(timeType!=1){
		if(nowTime>=15){
			sendInit = 8;
			fullTime = tomorrow();
	    	timeList = marketTime(fullTime);
	    	var len = $(".show_choose").length;
	    	if(nowTime>=18){
	    		$(".answer_choose_list").find(".show_choose").eq(0).remove();
	    	}
	    	$(".answer_choose_list").find(".show_choose:gt(7)").remove();
			$(".answer_choose_list").append(timeList);
			var hm = hmMethod(8+deliverTime);
			$(".show_choose[data-flag=tomorrow]").attr("data-time",hm)
		}
	}
	setTimeout(function(){
		timeScroll.refresh();
	},200);
    $("body,html").addClass("body-overflow");
    $('.modal_choose').css('display','flex');
    
});
//外卖送达时间获取
function outTime(fullTime){
	var timeList = "";
	sendInit = sendInit-interval;
	while(sendInit<endTime){
		sendEnd = sendInit + deliverTime;
		sendInit = sendInit + interval;
		var h = parseInt(sendEnd);
		var m = parseInt((sendEnd - h)*60);
		if(h<10){
			h = "0"+h;
		}
		if(m<10){
			m = "0"+m;
		}
		var hm = h+":"+m;
		timeList += '<li class="show_choose" data-year="'+fullTime+'" data-time="'+hm+'">\
                    <div class="name" data-id="" data-answ="">'+hm+'</div>\
                    <div class="icon_market icon_select_default"></div>\
                </li>';
	}
	return timeList;
}
//菜市场预订时间获取
function marketTime(fullTime){
	var timeList = '<li class="show_choose" data-flag="tomorrow">\
	                <div class="name" data-id="" data-answ="">明日时间</div>\
	                <div class="icon_market icon_select_default"></div>\
	            </li>';
	while(sendInit<endTime){
		sendInit = sendInit + interval;
		sendEnd = sendInit + deliverTime;
		var h = parseInt(sendEnd);
		var m = parseInt((sendEnd - h)*60);
		if(h<10){
			h = "0"+h;
		}
		if(m<10){
			m = "0"+m;
		}
		if(m==60){
			m="00";
			h++;
		}
		if(h>=24){
			h = "0" + (h-24);
		}
		var hm = h+":"+m;
		timeList += '<li class="show_choose" data-year="'+fullTime+'" data-time="'+hm+'">\
                    <div class="name" data-id="" data-answ="">'+hm+'</div>\
                    <div class="icon_market icon_select_default"></div>\
                </li>';
        
	}
	return timeList;
}
function getFullTime(){
	var nowYear = new Date().getFullYear();
	var nowMonth = new Date().getMonth()+1;
	var nowDate = new Date().getDate();
	var fullTime = nowYear+"-"+nowMonth+"-"+nowDate;
	return fullTime;
}
function tomorrow(){
	var todayTime = new Date().getTime();
	todayTime = todayTime + (24*60*60*1000);
	var nowYear = new Date(todayTime).getFullYear();
	var nowMonth = new Date(todayTime).getMonth()+1;
	var nowDate = new Date(todayTime).getDate();
	var fullTime = nowYear+"-"+nowMonth+"-"+nowDate;
	return fullTime;
}
function hmMethod(timeVal){
	var h = parseInt(timeVal);
	var m = parseInt((timeVal - h)*60);
	if(h<10){
		h = "0"+h;
	}
	if(m<10){
		m = "0"+m;
	}
	var hm = h+":"+m;
	return hm;
}
//分钟取整点
function timeRound(n){
	if(n<=10){
		n = 10;
	}else if(n<=20){
		n = 20;
	}else if(n<=30){
		n = 30;
	}else if(n<=40){
		n = 40;
	}else if(n<=50){
		n = 50;
	}else{
		n = 60;
	}
	return  n;
}
