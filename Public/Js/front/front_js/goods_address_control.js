/**
 * Created by beyondin on 2017/6/3.
 */
/*todo 控制是否是默认地址*/
$('.address_list .edit_control .left_control').on('click',function(){
    $(this).addClass('active');
    $(this).parent().parent().siblings('.address_list').find('.edit_control .left_control').removeClass('active');
    $(this).find('.icon_market').addClass('icon_selected_b');
    $(this).parent().parent().siblings('.address_list').find('.left_control .icon_market').removeClass('icon_selected_b');
});
/*todo 删除弹框*/
$('.address_list .edit_control .right_control .del').on('click',function(){
    var user_address_id=$(this).data('address_id');
    $(this).addClass('active');
    $(this).parent().parent().parent().siblings('.address_list').find('.edit_control .right_control .del.active').removeClass('active');
    $('.sure_del').attr('user_address_id',user_address_id);
    $('.modal_del').show();
    $('body').css('overflow','hidden');
});
$('.sure_del').on('click',function(){
    var user_address_id=$(this).attr('user_address_id');
    $.ajax({
        url: "/FrontUserCenter/del_address", //URL
        dataType: "json",
        data: {"user_address_id":user_address_id},
        type: "post",
        success: function (data) {
            if(data.code==1){
                $(this).hide();
            }

        }
    });
});
/*todo 删除弹框的控制*/
$('.modal_del').on('click',function(){
    $(this).hide();
    $('body').css('overflow','scroll');
});
/*todo 删除弹框的控制*/
$('.modal_del .modal_content').on('click',function(){
    event.stopPropagation();/*todo 阻止冒泡*/
});
/*todo 删除弹框的控制-》删除按钮*/
$('.modal_del .modal_content .operation .sure_del').on('click',function(){
    $('.edit_control .right_control .del.active').parent().parent().parent().remove();
    /*todo 如果剩余信息大于1条，默认第一条信息是默认地址*/
    var length=$('.have_address .address_list').length;
    if(length>0){
        $('.have_address .address_list:eq(0)').find('.left_control').addClass('active');
        $('.have_address .address_list:eq(0)').find('.left_control .icon_market').addClass('icon_selected_b');
    }
    $('.modal_del').hide();
});
/*todo 删除弹框的控制-》取消按钮*/
$('.modal_del .modal_content .operation .cancel').on('click',function(){
    $('.modal_del').hide();
    $('body').css('overflow','scroll');
});