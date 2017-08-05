/*
 * @Author: zhangfengjie
 * @Date:   2016-04-01 16:57:34
 * @Last Modified by:   zhangfengjie
 * @Last Modified time: 2017-03-04 14:35:29
 */
/*
 *myScroll 存储实例化的iScroll对象
 * */
var myScroll, pullDownEl, pullDownOffset, pullUpEl, pullUpOffset;
/*---当返回的后台数据全部加载，调用该方法---*/
$(function () {
    if (total <= firstRow) {
        $(".pullUpIcon").hide();
        $(".pullUpLabel").html("没有更多了");
    }
});
var num = 1; //默认页面显示4条数据              num可变
function del_native() {
    native_listen('no_loading');
}

function pullUpAction() {
    var sourceNode = $(".near_list_wrap").eq(0); // 获得被克隆的节点对象
    if (total > firstRow) {
        console.log("a:" + a);
        console.log("firstRow:" + firstRow);
        console.log("total:" + total);
        console.log("t:" + t);
        $.ajax({
            url: "/Index/get_near_more", //URL
            dataType: "json",
            data: {"firstRow": firstRow, "t": t},
            type: "post",
            success: function (data) {
                firstRow = data.firstRow;
                t = data.t;
                data = data.data;
                if (data != 0) {
                    var len = data.length;
                    var html = '';
                    for (var i = 0; i < len; i++) {
                        html += '<a href="/Index/shop_detail/business_id/' + data[i].business_id + '" class="near_list clearfix native_go">\
								<img src="' + data[i].sign_pic + '?imageView2/1/w/100/h/100/q/100/" class="pic fl"/>\
								<div class="near_info fr">\
									<div class="info_head">\
										<h6 class="near_name">' + data[i].business_name + '</h6>\
										<span class="near_distance">';
                        if (data[i].distance > 99.9) {
                            html += '>';
                        } else {
                            html += '<';
                        }
                        html += '&nbsp;' + data[i].distance + 'Km</span>\
										</div>\
										<p class="near_address">' + data[i].address + '</p>\
										<ul class="star fl">';
                        for (var j = 0; j < data[i].star; j++) {
                            html += '<li class="fl icon_pic1 icon_star_full3x"></li>'
                        }
                        for (var k = 0; k < (5 - data[i].star); k++) {
                            html += '<li class="fl icon_pic1 icon_star_blank3x"></li>'
                        }
                        html += '</ul>\
										<p class="people_count">\
											<span class="count_val">' + data[i].customer_num + '</span>\
											<span>人去过</span>\
										</p>\
									</div>\
								</a>';
                    }
                    sourceNode.append(html);
                    $('img').attr('onerror', 'no_pic(this)');
                    setTimeout(function () {
                        myScroll.refresh();
                        if (total <= (firstRow)) {
                            $(".pullUpIcon").hide();
                            $(".pullUpLabel").html("没有更多了");
                        }
                    }, 200);
                    num++;
                }
            }
        });
    } else {
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
            if (pullUpEl.className.match('loading')) {
                pullUpEl.className = '';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
            }
        },
        onScrollMove: function () {
            this.minScrollY = 0;
            if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
                pullUpEl.className = 'flip';
                if (total <= (firstRow)) {
                    pullUpEl.querySelector('.pullUpLabel').innerHTML = '没有更多了';
                } else {
                    pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始加载...';
                }
                this.maxScrollY = this.maxScrollY;
            } else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
                pullUpEl.className = '';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
                this.maxScrollY = pullUpOffset;
            }
            //移动到一定位置固定头部导航
            if(is_wechat()){
            	var src_top = myScroll.y
	            if (src_top < -10) {
	                $(".scroll_head").css("opacity", "0");
	                $(".fix_head").css("display", "flex");
	            } else {
	                $(".fix_head").hide();
	                $(".scroll_head").css("opacity", "1");
	            }
            }
            
        },
        onScrollEnd: function () {
            if (pullUpEl.className.match('flip')) {
                pullUpEl.className = 'loading';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
                pullUpAction(); // ajax call?
            }
            if(is_wechat()){
            	//移动到一定位置固定头部导航
	            var src_top = myScroll.y
	            if (src_top < -10) {
	                $(".scroll_head").css("opacity", "0");
	                $(".fix_head").css("display", "flex");
	            } else {
	                $(".fix_head").hide();
	                $(".scroll_head").css("opacity", "1");
	            }
            }
        }
    });
    setTimeout(function () {
        document.getElementById('load_wrapper').style.left = '0';
    }, 300);
}
//初始化控件
document.addEventListener('touchmove', function (e) {
    e.preventDefault();
}, false);
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(loaded, 200);
}, false);
