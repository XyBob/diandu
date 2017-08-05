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
function pullDownAction(){
	setTimeout(function(){
		window.location.reload();
	},300);
	window.onload = function(){
		myScroll.refresh();
	}
}
function pullUpAction (){
    var sourceNode = $(".recom_cont").eq(0); // 获得被克隆的节点对象
    if(total > num*firstRow){
        $.post('/Index/get_search_list', {"firstRow":num*firstRow,"key_words":key_words}, function(res, textStatus) {
            if (res != 'failure') {
            	var data=eval(res)
                console.log(data);
                var len = data.length;
                console.log(len);
                var html = '';
                for (var i = 0; i < len; i++) {
                    html += '<a href="/Index/shop_detail/business_id/' + data[i].business_id + '" class="recom_list native_go">'+
                    	'<div class="store_info clearfix">'+
                    		'<img src="' + data[i].sign_pic + '" class="pic fl"/>'+
                    		'<div class="info fr">'+
                    			'<h6 class="store_name">' + data[i].business_name + '</h6>'+
                    			'<div class="info_mid clearfix">'+
                    				'<ul class="star fl">';
					for (var j = 0; j < data[i].star; j++) {
						html += '<li class="fl icon_pic1 icon_star_full3x"></li>'
					}
					for (var k = 0; k < (5 - data[i].star); k++) {
						html += '<li class="fl icon_pic1 icon_star_blank3x"></li>'
					}
                    				html+='</ul>'+
                    				'<p class="distance fr"><&nbsp;' + data[i].distance + 'Km</p>'+
                    			'</div>'+
                    			'<ul class="tag">'+
                    				'<li>' + data[i].business_classify_name + '</li>'+
                    			'</ul>'+
                    		'</div>'+
                    	'</div>'+
                    	// <div class="favor_wrap">
                    	// 	<ul class="favor">
                    	// 		<li>
                    	// 			<i class="icon_pic1 icon_pay3x"></i>\
                    	// 			<p class="favor_words">买单立享85折</p>\
                    	// 		</li>\
                    	// 		<li>\
                    	// 			<i class="icon_pic1 icon_ticket3x"></i>\
                    	// 			<p class="favor_words">领券立减8元</p>\
                    	// 		</li>\
                    	// 	</ul>\
                    	// </div>\
                    '</a>';
                	}
                num++;
                sourceNode.append(html);
                $('img').attr('onerror', 'no_pic(this)');
                setTimeout(function(){
                	myScroll.refresh();
                },200);
            }else{
				$('.pullUpIcon').hide();
				$('.pullUpLabel').html('没有更多了');
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
	        pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始加载...';
	        this.maxScrollY = this.maxScrollY;
      	}else if(this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
	        pullUpEl.className = '';
	        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
	        this.maxScrollY = pullUpOffset;
      	}
    },
    onScrollEnd: function () {
    	if(pullUpEl.className.match('flip')) {
	        pullUpEl.className = 'loading';
	        pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
	        pullUpAction(); // ajax call?
     	}
    }
  });
  setTimeout(function () { document.getElementById('load_wrapper').style.left = '0'; }, 300);
}
//初始化控件
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
