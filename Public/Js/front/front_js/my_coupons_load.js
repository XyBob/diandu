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
    var sourceNode = $(".modal_coupons_have").eq(0); // 获得被克隆的节点对象
    if(total > firstRow*num){
        console.log("firstRow:"+firstRow*num);
        console.log("total:"+total);
        $.ajax({
            url: "/FrontUserCenter/my_coupons", //URL
            dataType: "json",
            data: {"firstRow": firstRow*num},
            type: "post",
            success: function (data) {
                console.log(data);
                if (data!='null') {
                    var len = data.length;
                    var html = '';
                    for (var i = 0; i < len; i++) {
                        html+='<div class="coupons_show">'+
                                '<div class="red"></div>'+
                                '<div class="line_down clearfix coupon_detail" my_coupon_id="'+data[i].user_vouchers_id+'">'+
                                '<div class="fl money_number">'+
                                '<p class="coupons_name">'+data[i].business_name+'</p>'+
                                '<p class="coupons_valid_time">'+data[i].address+'</p>'+
                                '</div>'+
                                '<p class="amount">¥<span class="money_value">'+data[i].num+'</span></p>'+
                                '</div>'+
                                '<p class="position_down to_use" business_id="'+data[i].merchant_id+'">去使用</p>'+
                                '</div>';
                    }
                    sourceNode.append(html);
                    setTimeout(function () {
                        myScroll.refresh();
                        if(total<=(firstRow))
                        {
                            $(".pullUpIcon").hide();
                            $(".pullUpLabel").html("没有更多了");
                        }
                    }, 200);
                }
                num++;
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
            /*var src_top=myScroll.y
            if(src_top<-60){
                $(".scroll_head").hide();
                $(".fix_head").css("display","flex");
                $("#load_wrapper").css("top","2.2rem");
            }else{
                $(".fix_head").hide();
                $(".scroll_head").css("display","flex");
                $("#load_wrapper").css("top","0px");
            }*/
        },
        onScrollEnd: function () {
            if(pullUpEl.className.match('flip')) {
                pullUpEl.className = 'loading';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
                pullUpAction(); // ajax call?
            }
            //移动到一定位置固定头部导航
            var src_top=myScroll.y
            /*if(src_top<-60){
                $(".scroll_head").hide();
                $(".fix_head").css("display","flex");
                $("#load_wrapper").css("top","2.2rem");
            }else{
                $(".fix_head").hide();
                $(".scroll_head").css("display","flex");
                $("#load_wrapper").css("top","0px");
            }*/
        }
    });
    setTimeout(function () { document.getElementById('load_wrapper').style.left = '0'; }, 300);
}
//初始化控件
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
