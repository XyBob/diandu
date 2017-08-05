//原生转场动画  to_jump 、 back
$("body").on("click",".native_go",function(){
	if(!is_wechat()){
		var dataUrl = '';
		var temp_url = $(this).attr("data-url");
		if(temp_url!=undefined&&temp_url!=''){

		}else{
			var href = $(this).attr("href");
			$(this).attr("href","javascript:;");
			$(this).attr("data-url",href);

		}
		dataUrl = $(this).attr("data-url");
		var _json = JSON.stringify({
            event: "to_jump",
            params: {"url":dataUrl}
        });


        if(is_ios()){
			window.webkit.messageHandlers.webviewEvent.postMessage(_json);
		}else{
			//alert(dataUrl);
			window.ResultAndroid.webviewEvent(_json);
		}
	}
});
$("body").on("click",".native_back",function(){
	if(!is_wechat()){
		var _json = JSON.stringify({
            event: "back",
            params: ""
        });
        if(is_ios()){
			window.webkit.messageHandlers.webviewEvent.postMessage(_json);
		}else{
			window.ResultAndroid.webviewEvent(_json);
		}
	}else{
		history.go(-1);
	}
});
