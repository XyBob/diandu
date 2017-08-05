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
    var sourceNode = $(".near_list_wrap").eq(0); // 获得被克隆的节点对象
	if(total > num*firstRow){
		$.post('/FrontUserCenter/load_my_recom_shop', {"firstRow":num*firstRow}, function(data, textStatus)
		{
			console.log(data);
			if (data != 'failure')
			{
				var len = data.length;
				var html = '';
				for (i = 0; i < len; i++)
				{

					html+='<a class="near_list clearfix native_go">'+
								'<img src="'+data[i].sign_pic+'" class="pic fl"/>'+
								'<div class="near_info fr">'+
								'<div class="info_head">'+
								'<h6 class="near_name">'+data[i].business_name+'</h6>'+
								'</div>'+
								'<p class="near_address">'+data[i].address+'</p>'+
								'<ul class="star fl">'+
								'<li class="fl icon_pic1 icon_star_full3x"></li>'+
								'<li class="fl icon_pic1 icon_star_full3x"></li>'+
								'<li class="fl icon_pic1 icon_star_full3x"></li>'+
								'<li class="fl icon_pic1 icon_star_blank3x"></li>'+
								'</ul>'+
								'<p class="turnover">营业额：'+data[i].turnover+'元</p>'+
								'</div>'+
							'</a>';
				}
				num ++;
				sourceNode.append(html);
				setTimeout(function(){
					myScroll.refresh();
					if(total<=(num*firstRow)){
						$('.pullUpLabel').html('没有更多了');
					}
				},500);
				
			}
		}, 'json');
	}
	else
	{
		$('.pullUpIcon').hide();
		$('.pullUpLabel').html('没有更多了');
	}
}
function loaded() {
  	pullUpEl = document.getElementById('pullUp');
  	pullUpOffset = pullUpEl.offsetHeight;
  	if(!is_wechat()){
  		pullDownEl = document.getElementById('pullDown');
		pullDownOffset = pullDownEl.offsetHeight;
  	}
  myScroll = new iScroll('load_wrapper', {
  	useTransition: true,
    topOffset: pullDownOffset,
    onRefresh: function () {
		if(is_wechat()){
			if(pullUpEl.className.match('loading')) {
		        pullUpEl.className = '';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
		   	}
		}else{
			if(pullDownEl.className.match('loading')) {
				pullDownEl.className = '';
			}else if(pullUpEl.className.match('loading')) {
		        pullUpEl.className = '';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
		   	}
		}
    },
    onScrollMove: function () {
    	if(is_wechat()){
    		if(this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
		        pullUpEl.className = 'flip';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始加载...';
		        this.maxScrollY = this.maxScrollY;
	      	}else if(this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
		        pullUpEl.className = '';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
		        this.maxScrollY = pullUpOffset;
	      	}
    	}else{
    		if(this.y >5  && !pullDownEl.className.match('flip')) {
		    pullDownEl.className = 'flip';
			    this.minScrollY = 0;
		   	}else if(this.y < 5 && pullDownEl.className.match('flip')) {
			    pullDownEl.className = '';
			    this.minScrollY = -pullDownOffset;
		   	}else if(this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
		        pullUpEl.className = 'flip';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始加载...';
		        this.maxScrollY = this.maxScrollY;
	      	}else if(this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
		        pullUpEl.className = '';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
		        this.maxScrollY = pullUpOffset;
	      	}
    	}
    },
    onScrollEnd: function () {
    	if(is_wechat()){
    		if(pullUpEl.className.match('flip')) {
		        pullUpEl.className = 'loading';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
		        pullUpAction(); // ajax call?
	     	}
    	}else{
    		if(pullDownEl.className.match('flip')) {
				pullDownEl.className = 'loading';
				pullDownAction();
			}else if(pullUpEl.className.match('flip')) {
		        pullUpEl.className = 'loading';
		        pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
		        pullUpAction(); // ajax call?
	     	}
    	}
    }
  });
  setTimeout(function () { document.getElementById('load_wrapper').style.left = '0'; }, 300);
}
//初始化控件
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
