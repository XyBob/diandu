			/*上传头像*/
				$("#add_upload").on("click", function(){
					native_listen('up_head','');
       				return $("#dynamic_img_uploader").click();
    		});
			
				//上传头像
				function upload_image(){
				    var Qiniu_UploadUrl = "http://up.qiniu.com";
				    var token = $("#uptoken").val();
				    var image_domain = $("#image_domain").val();
					console.log(image_domain);
				    //普通上传
				    var Qiniu_upload = function(f, token, key) {
				        var xhr = new XMLHttpRequest();
				        xhr.open('POST', Qiniu_UploadUrl, true);
				        var formData, startDate;
				        formData = new FormData();
				        if (key !== null && key !== undefined) formData.append('key', key);
				        formData.append('token', token);
				        formData.append('file', f);
				        var taking;
				        //$('#'+div).find('.preview').removeClass('hide');
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
				                var html = '<img src="'+img_url+'" class="img-responsive" id="img_choose">';
								
				                $('.img-control').html(html);
				                $('#img_url').val(img_url);
//				                $("#add_upload").hide();
				
				            }
				            else if (xhr.status != 200 && xhr.responseText)
				            {
				            	console.log(xhr.responseText);
				            }
				
				        };
				        startDate = new Date().getTime();
				        xhr.send(formData);
				    };
				    if ($("#dynamic_img_uploader")[0].files.length > 0 && token != "") {
				        Qiniu_upload($("#dynamic_img_uploader")[0].files[0], token, $("#key").val());
				    } else {
				        alert('请选择图片');
				    }
				}
