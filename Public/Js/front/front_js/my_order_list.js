/**
 * Created by beyondin on 2017/6/6.
 */
/*
 * @Author: zhangfengjie
 * @Date:   2016-04-01 16:57:34
 * @Last Modified by:   Administrator
 * @Last Modified time: 2016-04-26 16:38:34
 */

var myScroll,
    pullDownEl, pullDownOffset,
    pullUpEl, pullUpOffset= 0;
/*---当返回的后台数据全部加载，调用该方法---*/

$(function()
{
    if($('#take_out .list_content:hidden')[0]){
        $('.no_content.no_take_out').show();
    }
    if(TakeOutOrderTotal<=TakeOutNum*TakeOutFirstRow)
    {
        $(".pullUpIcon").hide();
        $(".pullUpLabel").html("没有更多了");
    }
    
    /*if(InStoreOrderTotal<=InStoreNum*InStoreFirstRow)
    {
        $(".pullUpIcon").hide();
        $(".pullUpLabel").html("没有更多了");
    }*/
});


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
    if($('#take_out').hasClass('active')){
        var sourceNode = $("#take_out .list_content").eq(0); // 获得被克隆的节点对象
       // var html = '<li class="list"><div class="list_top"> <div class="img_info"><div class="img_left"><img src="/Public/Images/front/data/item4.jpg" class="img-responsive"></div><div class="img_middle"> <div class="the_top"> <div class="top_state"> <p class="name">谢天真</p><div class="img_right grey">已取消</div> </div> <p class="time">2017-05-17 13:40</p> </div> </div> </div> </div> <div class="describe"><span class="describe_name">黯然销魂饭</span><span>等10件商品</span></div><div class="money">¥220.00</div></li>';
       // sourceNode.append(html);
//      setTimeout(function(){
//          myScroll.refresh();
//      },500);
        if(TakeOutOrderTotal > TakeOutNum*TakeOutFirstRow){
            console.log('first---'+TakeOutNum*TakeOutFirstRow);
            $.post('/FrontUserCenter/my_order', {"TakeOutFirstRow":TakeOutNum*TakeOutFirstRow,"type":'take_out'}, function(data, textStatus)
            {
                if (data != 'failure')
                {

                    var len=data.length
                    console.log(data);
                    var html = '';
                    for (i = 0; i < len; i++)
                    {
                        html+='<a href="/FrontUserCenter/consumer_order_detail/order_id/'+data[i].order_id+'">\
                         <li class="list">\
                                <div class="list_top">\
                                <div class="img_info">\
                                <div class="img_left"><img src="'+data[i].business_img+'" class="img-responsive"></div>\
                                <div class="img_middle">\
                                <div class="the_top">\
                                <div class="top_state">\
                                <p class="name">'+data[i].business_name+'</p>\
                                <div class="img_right grey">'+data[i].order_status_name+'</div>\
                                </div>\
                                <p class="time">'+data[i].addtime+'</p>\
                                </div>\
                                </div>\
                                </div>\
                                </div>';
                            if(data[i].item_num!=0) {
                                html += '<div class="describe"><span class="describe_name">' + data[i].key_words + '</span><span>等' + data[i].item_num + '件商品</span></div>';
                            }
                                html+= '<div class="money">¥'+data[i].pay_amount+'</div>\
                                 </li>';
                    }
                    sourceNode.append(html);
                    setTimeout(function(){
                        myScroll.refresh();
	                    if(TakeOutOrderTotal<=(TakeOutNum*TakeOutFirstRow)){
	                        $('.pullUpLabel').html('没有更多了');
	                    }
                    },500);
                    TakeOutNum ++;
                    if(TakeOutOrderTotal<=(TakeOutNum*TakeOutFirstRow)){
                        $('.pullUpLabel').html('没有更多了');
                    }
                    
                }
            }, 'json');
        }
        else
        {
            $('.pullUpIcon').hide();
            $('.pullUpLabel').html('没有更多了');
        }
    }
    else{
        var sourceNode = $("#shop_consume .list_content").eq(0); // 获得被克隆的节点对象
       // var html = '<li class="list_shop"> <div class="list_left"><div class="img_left_shop"><img src="/Public/Images/front/data/item4.jpg" class="img-responsive"></div> <div class="img_right_shop"> <span class="name">谢天真</span> <span class="time">2017-05-17 13:40</span> </div> </div> <div class="list_right blue">¥220.00</div></li>';
        //sourceNode.append(html);
//      setTimeout(function(){
//          myScroll.refresh();
//      },500);
        if(InStoreOrderTotal > InStoreFirstRow*InStoreNum){
            $.post('/FrontUserCenter/my_order', {"InStoreFirstRow":InStoreFirstRow*InStoreNum,"type":'in_store'}, function(data, textStatus)
            {
                if (data != 'failure')
                {

                    var len = data.length;
                    var html = '';
                    for (i = 0; i < len; i++)
                    {
                        html+='<li class="list_shop">\
                            <div class="list_left">\
                        <div class="img_left_shop"><img src="'+data[i].business_img+'" class="img-responsive"></div>\
                        <div class="img_right_shop">\
                        <span class="name">'+data[i].business_name+'</span>\
                        <span class="time">'+data[i].addtime+'</span>\
                        </div>\
                        </div>\
                        <div class="list_right blue">¥'+data[i].pay_amount+'</div>\
                        </li>';
                    }
                    sourceNode.append(html);
                    setTimeout(function(){
                        myScroll.refresh();
                        if(InStoreOrderTotal<=(InStoreFirstRow*InStoreNum)){
	                        $('.pullUpLabel').html('没有更多了');
	                    }
                    },500);
                    InStoreNum ++;
                    if(InStoreOrderTotal<=(InStoreFirstRow*InStoreNum)){
                        $('.pullUpLabel').html('没有更多了');
                    }
                    
                    
                }
            }, 'json');
        }
        else
        {
            $('.pullUpIcon').hide();
            $('.pullUpLabel').html('没有更多了');
        }
    }
}
function loaded() {
    pullUpEl = document.getElementById('pullUp');
    pullUpOffset = pullUpEl.offsetHeight;
    myScroll = new iScroll('load_wrapper', {
        // useTransition: true,
        topOffset: pullDownOffset,
        onRefresh: function () {
            if (pullUpEl.className.match('loading')) {
                pullUpEl.className = '';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
            }
        },
        onScrollMove: function () {
            if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
                pullUpEl.className = 'flip';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始刷新...';
                this.maxScrollY = this.maxScrollY;
            } else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
                pullUpEl.className = '';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
                this.maxScrollY = pullUpOffset;
            }
        },
        onScrollEnd: function () {
            if (pullUpEl.className.match('flip')) {
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
