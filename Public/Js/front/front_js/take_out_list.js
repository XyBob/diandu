/*
* @Author: zhangfengjie
* @Date:   2016-04-01 16:57:34
* @Last Modified by:   zhangfengjie
* @Last Modified time: 2017-03-04 14:35:29
*/
/*
 *myScroll 存储实例化的iScroll对象
 * */
var myScroll,pullDownEl, pullDownOffset,pullUpEl, pullUpOffset;
/*---当返回的后台数据全部加载，调用该方法---*/
$(function()
{
    if(total<=firstRow)
    {
        $(".pullUpIcon").hide();
        $(".pullUpLabel").html("没有更多了");
    }
});
var num = 1; //默认页面显示4条数据              num可变
function del_native(){
	native_listen('no_loading');
}

function pullUpAction (){
    var sourceNode = $(".take_out_wrap").eq(0); // 获得被克隆的节点对象
	console.log("firstRow:"+firstRow);
	console.log('num:'+num);
	console.log("total:"+total);
    if(total > num*firstRow){
        $.ajax({
            url: "/FrontMerchant/take_out_index", //URL
            dataType: "json",
            data: {"firstRow": num*firstRow,'local_latitude':local_latitude,'local_longitude':local_longitude},
            type: "post",
            success: function (data) {
                console.log(data);
                if (data !=0) {
                    var len = data.length;
                    var html = '';
                    for (var i = 0; i < len; i++) {
				 		var sign=(data[i].distance/1000)>100?'>':'<';
						var discount_html='';
						var voucher_html='';
						if(data[i].discount_minus_list){
							discount_html='<li><i class="icon_pic1 icon_pay3x"></i><p class="favor_words">';
							for(var l=0;l<data[i].discount_minus_list.length;l++){
								if(l>0){
									discount_html+=',';
							}
								discount_html+='满'+data[i].discount_minus_list[l].amount_limit+'减'+data[i].discount_minus_list[i].num+'元';

							}

						}
						discount_html+='</p></li>';
						if(data[i].voucher){
							voucher_html='<li><i class="icon_pic1 icon_ticket3x"></i><p class="favor_words">';
							voucher_html+='领券立减'+data[i].voucher.num+'元';
						}
						voucher_html+='</p></li>';
                        html +='<a href="/FrontMerchant/take_out_shop/business_id/'+data[i].business_id+'" class="take_out_list">'+
								'<div class="shop-info clearfix">'+
								'<img src="'+data[i].sign_pic+'" class="fl shop-img"/>'+
								'<div class="info fr">'+
								'<h6 class="shop-name">'+data[i].business_name+'</h6>'+
								'<div class="info-mid clearfix">'+
								'<ul class="star fl">';
						for(var j=0;j<data[i].star;j++)
						{
							html+='<li class="fl icon_pic1 icon_star_full3x"></li>'
						}
						for(var k=0;k<(5-data[i].star);k++){
							html+='<li class="fl icon_pic1 icon_star_blank3x"></li>'
						}
						html+='</ul>'+
								'<span class="delivery-time fr">约'+data[i].delivery_time+'分钟送达</span>'+
								'</div>'+
								'<div class="info-bot clearfix">'+
								'<div class="right fl">'+
								'<span class="send-price">起送 ¥'+data[i].start_delivery_fee+'&nbsp;|&nbsp;</span>'+
								'<span class="person-price">人均 ¥'+data[i].consumption+'</span>'+
								'</div>'+
								'<div class="left fr">'+
								'<span class="distance fr">'+sign+'&nbsp;'+(data[i].distance/1000).toFixed(1)+'Km</span>'+
								'<p class="address fr">'+data[i].address+'</p>'+
								'</div>'+
								'</div>'+
								'</div>'+
								'</div>'+
								'<div class="favor_wrap">'+
										'<ul class="favor">'+discount_html+voucher_html+
										'</ul>'+
										'</div>'+
										'</a>';
                    }
                    num++;
                    sourceNode.append(html);
                    $('img').attr('onerror', 'no_pic(this)');
                    setTimeout(function () {
                        myScroll.refresh();
                    }, 200);
                }
            }
        });
	}else{
		$('.pullUpIcon').hide();
		$('.pullUpLabel').html('没有更多了');
	}
}
function loaded() {
  	pullUpEl = document.getElementById('pullUp');
  	pullUpOffset = pullUpEl.offsetHeight;
  	myScroll = new iScroll('load_wrapper', {
  	useTransition: true,
    topOffset: pullDownOffset,
    onRefresh: function () {
    	if(pullUpEl.className.match('loading')) {
	        pullUpEl.className = '';
	        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
	   	}
    },
    onScrollMove: function () {
    	if(this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
	        pullUpEl.className = 'flip';
			if(total<=(firstRow))
			{
				pullUpEl.querySelector('.pullUpLabel').innerHTML = '没有更多了';
			}else{
				pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始加载...';
			}

	        this.maxScrollY = this.maxScrollY;
      	}else if(this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
	        pullUpEl.className = '';
	        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
	        this.maxScrollY = pullUpOffset;
      	}
      	//移动到一定位置固定头部导航
	    var src_top=myScroll.y
	    if(src_top<-60){
          	$(".scroll_head").hide();
          	$(".fix_head").css("display","flex");
          	$("#load_wrapper").css("top","2.2rem");
	      }else{
         	$(".fix_head").hide();
          	$(".scroll_head").css("display","flex");
         	$("#load_wrapper").css("top","0px");
   		}
    },
    onScrollEnd: function () {
    	if(pullUpEl.className.match('flip')) {
	        pullUpEl.className = 'loading';
	        pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
	        pullUpAction(); // ajax call?
     	}
    	//移动到一定位置固定头部导航
	    var src_top=myScroll.y
	    if(src_top<-60){
          	$(".scroll_head").hide();
          	$(".fix_head").css("display","flex");
          	$("#load_wrapper").css("top","2.2rem");
      	}else{
         	$(".fix_head").hide();
          	$(".scroll_head").css("display","flex");
         	$("#load_wrapper").css("top","0px");
   		}
    }
  });
  setTimeout(function () { document.getElementById('load_wrapper').style.left = '0'; }, 300);
}
//初始化控件
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
