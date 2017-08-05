//上传店招图片
$("#add_upload").on("click", function(){
	return $("#img_uploader_dz").click();
});
$("#add_upload2").on("click", function(){
	return $("#img_uploader_hj").click();
});$("#add_upload3").on("click", function(){
	return $("#img_uploader_yz").click();
});
function upload_image(obj){
	var Qiniu_UploadUrl = "http://up.qiniu.com";
	var token = $("#uptoken").val();
	var image_domain = $("#image_domain").val();
	var Qiniu_upload = function(f, token, key) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', Qiniu_UploadUrl, true);
        var formData, startDate;
        formData = new FormData();
        if (key !== null && key !== undefined) formData.append('key', key);
        formData.append('token', token);
        formData.append('file', f);
        var taking;
        xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
                var nowDate = new Date().getTime();
                taking = nowDate - startDate;
                var x = (evt.loaded) / 1024;
                var y = taking / 1000;
                var uploadSpeed = (x / y);
                var formatSpeed;
                if (uploadSpeed > 1024) {
                    formatSpeed = (uploadSpeed / 1024).toFixed(2) + "Mb\/s";
                } else {
                    formatSpeed = uploadSpeed.toFixed(2) + "Kb\/s";
                }
                var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                console && console.log(percentComplete, ",", formatSpeed);
            }
        }, false);

        xhr.onreadystatechange = function(response) {
            if (xhr.readyState == 4 && xhr.status == 200 && xhr.responseText != "") {
                var blkRet = JSON.parse(xhr.responseText);
                console && console.log(blkRet);
                var img_url = image_domain + blkRet.key;
                var html = '<div class="add_img fl" style="z-index: 9999"><img src="'+img_url+'" class="img-responsive"><div class="del_img" onclick="del_img(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a></div></div>';
                $(obj).parent('.ref_upload_photo').prepend(html);
                $(obj).siblings('.img_url').val(img_url);
                var imgLen = $(obj).siblings('.add_img').length;
                var addId = Number($(obj).attr("data-max"));
                if(addId<=imgLen){
                	$(obj).siblings('.add').hide();
                }
                

            }
            else if (xhr.status != 200 && xhr.responseText)
            {
            	console.log(xhr.responseText);
            }
        };
        startDate = new Date().getTime();
        xhr.send(formData);
    };
    if ($(obj)[0].files.length > 0 && token != "") {
        Qiniu_upload($(obj)[0].files[0], token, $("#key").val());
    } else {
        show_alert('请选择图片');
    }
}
function del_img(obj){
	var obj_init = $(obj);
    obj_init.parent().remove();
    var length=$('#add_upload').parent().find('.add_img').length;
    var length2=$('#add_upload2').parent().find('.add_img').length;
    var length3=$('#add_upload3').parent().find('.add_img').length;
    if(length<1){
        $('#add_upload').show();
    }
    if(length2<5){
        $('#add_upload2').show();
    }
    if(length3<1){
        $('#add_upload3').show();
    }
}
