/**
 * Created by beyondin on 2017/6/17.
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
    if(Number(TakeOutOrderTotal)<=Number(TakeOutNum*TakeOutFirstRow))
    {
        $(".pullUpIcon").hide();
        $(".pullUpLabel").html("没有更多了");
    }

    /*if(Number(InStoreOrderTotal)<=Number(InStoreNum*InStoreFirstRow))
    {
        console.log('进来了');
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
        var sourceNode = $("#take_out ul").eq(0); // 获得被克隆的节点对象
        if(TakeOutOrderTotal > TakeOutNum*TakeOutFirstRow){
            console.log('TakeOutOrderTotal'+'----'+TakeOutOrderTotal);
            console.log('TakeOutFirstRow'+'----'+TakeOutFirstRow);
            $.post('/FrontMerchant/merchant_order', {"FirstRow":TakeOutNum*TakeOutFirstRow,"type":'take_out'}, function(data, textStatus)
            {
                if (data != 'failure')
                {
                    var len=data.length
                    var html = '';
                    for (i = 0; i < len; i++)
                    {
                        html+='<a href="/FrontOrder/my_order_detail/order_id/'+data[i].order_id+'">\
                         <li class="list">\
                                <div class="list_top">\
                                <div class="img_info">\
                                <div class="img_left"><img src="'+data[i].headimgurl+'" class="img-responsive"></div>\
                                <div class="img_middle">\
                                <div class="the_top">\
                                <div class="top_state">\
                                <p class="name">'+data[i].nickname+'</p>\
                                <div class="img_right grey">'+data[i].status_str+'</div>\
                                </div>\
                                <p class="time">'+data[i].addtime+'</p>\
                                </div>\
                                </div>\
                                </div>\
                                </div>';
                        if(data[i].item_num!=0) {
                            html += '<div class="describe"><span class="describe_name">' + data[i].shop_name + '</span><span>等' + data[i].order_item_num + '件商品</span></div>';
                        }
                        html+= '<div class="money">¥'+data[i].pay_amount+'</div>\
                                 </li>';;
                    }
                    console.log(html);
                    sourceNode.append(html);
                    //console.log(11);
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
        var sourceNode = $("#shop_consume ul").eq(0); // 获得被克隆的节点对象
        if(InStoreOrderTotal > InStoreFirstRow*InStoreNum){
            console.log('InStoreOrderTotal'+'----'+InStoreOrderTotal);
            console.log('InStoreFirstRow'+'----'+InStoreFirstRow);
            $.post('/FrontMerchant/merchant_order', {"FirstRow":InStoreFirstRow*InStoreNum,"type":'in_store'}, function(data, textStatus)
            {
                if (data != 'failure')
                {

                    var len = data.length;
                    var html = '';
                    for (i = 0; i < len; i++)
                    {
                        html+='<li class="list_shop">\
                            <div class="list_left">\
                        <div class="img_left_shop"><img src="'+data[i].headimgurl+'" class="img-responsive"></div>\
                        <div class="img_right_shop">\
                        <span class="name">'+data[i].nickname+'</span>\
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
