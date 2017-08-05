/**
 * Created by beyondin on 2017/6/3.
 */
/*todo 是否同意按钮的切换*/
$('.whether_default .icon_select_rect').on('click',function(){
    $(this).toggleClass('icon_selected_rect');
    if($(this).hasClass('icon_selected_rect')){
        $('#whether_selected').val(1);
    }
    else{
        $('#whether_selected').val('');
    }
})
$("#detail_address").keyup(function(){
    var length=$(this).val().length;
    if(length>60){
        show_alert('无法再输入')
    }
});
<!--todo 地址信息高度控制函数-->
$(document).on("input propertychange", "#detail_address", function (e) {
    var target = e.target;
    // 保存初始高度，之后需要重新设置一下初始高度，避免只能增高不能减低。
    var dh = $(target).attr('defaultHeight') || 0;
    if (!dh) {
        dh = target.clientHeight;
        $(target).attr('defaultHeight', dh);
    }
    target.style.height = dh +'px';
    var clientHeight = target.clientHeight;
    var scrollHeight = target.scrollHeight;
    if (clientHeight !== scrollHeight) { target.style.height = scrollHeight + 10 + "px";
    }
});
/*todo 当是修改收货地址页面*/
$(function(){
    var province_id = $('#province_id').html();
    var city_id = $('#city_id').html();
    var area_id = $('#area_id').html();
    if(province_id!=$('.province .title').html()){
        $('#province_id').addClass('active');
        var target=$('#province_id_control div.name[data-id=' + province_id + ']');
        target.parent().addClass('active');
        target.next('.icon_market').addClass('icon_selected_b');
        change_city(province_id, city_id);
    }
    if(city_id!=$('.city .title').html()){
        $('#city_id').addClass('active');
        change_area(city_id, area_id);
    }
    if(area_id!=$('.area .title').html()){
        $('#area_id').addClass('active');
    }
});
<!--todo 选择控制函数-->
$('#province_id').on('click',function(){
    $('.province.modal_choose').show().css('display','flex');
    $('body').css('overflow','hidden');
});
$('#city_id').on('click',function(){
    $('.city.modal_choose').show().css('display','flex');
    $('body').css('overflow','hidden');
});
$('#area_id').on('click',function(){
    $('.area.modal_choose').show().css('display','flex');
    $('body').css('overflow','hidden');
});
$('.modal_choose').on('click',function(){
    $(this).hide();
    $('body').css('overflow','scroll');
});
$('.modal_choose .content').on('click',function(){
    event.stopPropagation();/*todo 阻止冒泡*/
});
$('.scroll_answer_list .show_choose').on('click',function(){
    $(this).addClass('active').siblings().removeClass('active');
    $(this).find('.icon_market').addClass('icon_selected_b');
    $(this).siblings().find('.icon_market').removeClass('icon_selected_b');
});
/*todo 省市区选择*/
function change_city(province_id, city_id){
    /*$.post('', {
        "province_id": province_id
    }, function(data) {
        var result = eval(data);
         var length = result.length;
         for (var i = 0,str=''; i < length; i++) {
         str+='<li class="show_choose"><div class="name" data-id="' + result[i]['id'] + '">' + result[i]['Province_city'] + '</div><div class="icon_market icon_select_default"></div></li>';
         }
         $('#city_id_control').html(str);
    }, 'json');*/
    if(city_id){
        var target=$('#city_id_control div.name[data-id=' + city_id + ']');
        target.parent().addClass('active');
        target.next('.icon_market').addClass('icon_selected_b');
        target.parent().siblings().find('.icon_market').removeClass('icon_selected_b');
    }
};
$('.province .scroll_answer_list .show_choose').on('click',function(){
    $('#province_id').html($(this).find('.name').html()).addClass('active');
    var province_id=$(this).find('.name').data('id');
    change_city(province_id);
    $('.modal_choose.province').hide();
});
function change_area(city_id, area_id){
    /*$.post('', {
        "city_id": city_id
    }, function(data) {
        var result = eval(data);
        var length = result.length;
        for (var i = 0,str=''; i < length; i++) {
            str+='<li class="show_choose"><div class="name" data-id="' + result[i]['id'] + '">' + result[i]['Province_city'] + '</div><div class="icon_market icon_select_default"></div></li>';
        }
        $('#area_id_control').html(str);
    }, 'json');*/
    if(area_id){
        var target=$('#area_id_control div.name[data-id=' + area_id + ']');
        target.parent().addClass('active');
        target.next('.icon_market').addClass('icon_selected_b');
        target.parent().siblings().find('.icon_market').removeClass('icon_selected_b');
    }
}
$('.city .scroll_answer_list .show_choose').on('click',function(){
    $('#city_id').html($(this).find('.name').html()).addClass('active');
    var city_id=$(this).find('.name').data('id');
    change_area(city_id);
    $('.modal_choose.city').hide();
});
$('.area .scroll_answer_list .show_choose').on('click',function(){
    $('#area_id').html($(this).find('.name').html()).addClass('active');
    $('.modal_choose.area').hide();
});