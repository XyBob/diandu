//上传店招图
//var max_photos = 1;//最多显示几张照片 
//var result = wx_image_uploader.images_info;
var max_photos_dz = wx_image_uploader.upload_limit;
wx_image_uploader.success_callback = upload_ok;
function upload_ok(){
	var content = wx_image_uploader.images_info.html;
	var serverIDs = wx_image_uploader.images_info.serverId;
	for (x in content){
        $("#add_upload").before('<div class="add_img fl dz_img" style="z-index: 9999"><img src="'+content[x]+'" class="img-responsive"><input type="hidden" name="pic[]" value="' +serverIDs[x]+ '"><div class="del_img" onclick="wx_upload_delImage(this);"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a></div></div>');
    }
	if($('.dz_img').length >= max_photos_dz){
        $('#add_upload').hide();
   	}
    wx_image_uploader.upload_limit = parseInt(max_photos_dz - $('.dz_img').length);
    wx_image_uploader.images_info.html =[];
    wx_image_uploader.images_info.serverId = [];
}
function wx_upload_delImage(obj){
    var preview = $(obj);
    preview.parent().find('input[name="pic[]"]').val(null);
    preview.parent().remove();
    if($(".dz_img").length < max_photos_dz){
       $("#add_upload").show();
    }
    wx_image_uploader.upload_limit = parseInt(max_photos_dz - $(".dz_img").length);
    wx_image_uploader.images_info.html =[];
    wx_image_uploader.images_info.serverId = [];
}

//上传环境图
var max_photos_hj = 5;
wx_image_uploader_hj.upload_limit = max_photos_hj;
wx_image_uploader_hj.success_callback = upload_ok_hj;
function upload_ok_hj(){
	var content = wx_image_uploader_hj.images_info.html;
	var serverIDs = wx_image_uploader_hj.images_info.serverId;
	for (x in content){
        $("#add_upload2").before('<div class="add_img fl hj_img" style="z-index: 9999"><img src="'+content[x]+'" class="img-responsive"><input type="hidden" name="pic[]" value="' +serverIDs[x]+ '"><div class="del_img" onclick="wx_upload_delImage_hj(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a></div></div>');
    }
	if($('.hj_img').length >= max_photos_hj){
        $('#add_upload2').hide();
   	}
    wx_image_uploader_hj.upload_limit = parseInt(max_photos_hj - $('.hj_img').length);
    wx_image_uploader_hj.images_info.html =[];
    wx_image_uploader_hj.images_info.serverId = [];
}
function wx_upload_delImage_hj(obj){
    var preview = $(obj);
    preview.parent().find('input[name="pic[]"]').val(null);
    preview.parent().remove();
    if($(".hj_img").length < max_photos_hj){
       $("#add_upload2").show();
    }
    wx_image_uploader_hj.upload_limit = parseInt(max_photos_hj - $(".hj_img").length);
    wx_image_uploader_hj.images_info.html =[];
    wx_image_uploader_hj.images_info.serverId = [];
}
//上传营业执照
var max_photos_yz = 1;
wx_image_uploader_yz.upload_limit = max_photos_yz;
wx_image_uploader_yz.success_callback = upload_ok_yz;
function upload_ok_yz(){
	var content = wx_image_uploader_yz.images_info.html;
	var serverIDs = wx_image_uploader_yz.images_info.serverId;
	for (x in content){
        $("#add_upload3").before('<div class="add_img fl yz_img" style="z-index: 9999"><img src="'+content[x]+'" class="img-responsive"><input type="hidden" name="pic[]" value="' +serverIDs[x]+ '"><div class="del_img" onclick="wx_upload_delImage_yz(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a></div></div>');
    }
	if($('.yz_img').length >= max_photos_yz){
        $('#add_upload3').hide();
   	}
    wx_image_uploader_yz.upload_limit = parseInt(max_photos_yz - $('.yz_img').length);
    wx_image_uploader_yz.images_info.html =[];
    wx_image_uploader_yz.images_info.serverId = [];
}
function wx_upload_delImage_yz(obj){
    var preview = $(obj);
    preview.parent().find('input[name="pic[]"]').val(null);
    preview.parent().remove();
    if($(".yz_img").length < max_photos_yz){
       $("#add_upload3").show();
    }
    wx_image_uploader_yz.upload_limit = parseInt(max_photos_yz - $(".yz_img").length);
    wx_image_uploader_yz.images_info.html =[];
    wx_image_uploader_yz.images_info.serverId = [];
}