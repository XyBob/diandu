<?php /* Smarty version Smarty-3.1.6, created on 2017-07-31 11:32:17
         compiled from "C:\wamp\www\diandu\Tpl\FrontUserCenter\personal_data.html" */ ?>
<?php /*%%SmartyHeaderCode:15520595c4220841c46-40543884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02dbe81218ca5ca170fea47da35867bfe168c5f1' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\FrontUserCenter\\personal_data.html',
      1 => 1500515764,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15520595c4220841c46-40543884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595c422111130',
  'variables' => 
  array (
    'pc_site' => 0,
    'version' => 0,
    'user_id' => 0,
    'wx_share_link' => 0,
    'share_info' => 0,
    'signPackage' => 0,
    'tpl_path' => 0,
    'has_deflt_addr' => 0,
    'default_addr_string' => 0,
    'first' => 0,
    'client_ip' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595c422111130')) {function content_595c422111130($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
<!-- CSS -->
<link rel="stylesheet" href="__PUBLIC__/Css/front/style.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/colors.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/skeleton.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/layout.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/ddsmoothmenu.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/elastislide.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/home_flexslider.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Css/front/light_box.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
<link rel="stylesheet" href="__PUBLIC__/Plugins/jPops/jquery.jpops.min-v3.css">

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/personal_data.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/DateSelector.css?rev=@@hash&version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>

</style>

<!-- 失败默认图片 -->
<script>
  function no_pic(obj) {
    obj.setAttribute("src", "/Public/Images/front/nopicture.png");
}
</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!-- <div class="container"> -->
	<?php if (@ACTION_NAME=='index'){?>
	<?php echo $_smarty_tpl->getSubTemplate ("top_ads.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
	<?php }?>
	<?php if (@ACTION_NAME!='login'){?>
	<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
	<?php }?>
	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>个人资料</h1>
</div>
<div class="header_empty"></div>
<input type="hidden" id="whether_save" value="0">
<div class="style_show"></div>
<!--todo 主要内容列表-->
<ul class="list_content">
    <form>
    <li class="show_list list_head">
        <div class="left_word">头像</div>
        <div class="ref_upload_photo">
            <a href="javascript:;" class="right_word" title="上传头像" id="add_upload">
                <div class="img-control">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive" id="img_choose">
                </div>
                <div class="icon_add_person icon_left_gray"></div>
            </a>
            <input id="dynamic_img_uploader" name="file" style="display:none" type="file" onchange="upload_image();"/>
			<input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['up_token']->value;?>
" />
        	<input type="hidden" name="image_domain" id="image_domain" value="<?php echo $_smarty_tpl->tpl_vars['image_domain']->value;?>
" />
            <input type="hidden" name="headimgurl" class="img_url" id="img_url" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
"/>
        </div>
    </li>
    <li class="show_list" id="nick_name">
        <div class="left_word">昵称</div>
        <div class="right_word control_range">
            <div id="nick_name_update" class="text_left"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</div>
            <div class="icon_add_person icon_left_gray"></div>
        </div>
        <input type="hidden" id="pre_nick" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
" >
    </li>
    <li class="show_list" id="real_name">
        <div class="left_word">姓名</div>
        <div class="right_word control_range">
            <div id="name_real" class="text_left"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
</div>
            <div class="icon_add_person icon_left_gray"></div>
        </div>
        <input type="hidden" id="pre_name" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
">
    </li>
 <!--   <li class="show_list birth_control">
        <div class="left_word">生日</div>
        <div class="right_word" id="birth_time"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['birthday'];?>
</div>
        <div class="icon_add_person icon_left_gray" id="birth_arrow"></div>
        <input type="hidden" id="birth"  name="birthday" value="<?php if ($_smarty_tpl->tpl_vars['user_info']->value['birthday']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['birthday'];?>
<?php }else{ ?>请选择<?php }?>">
    </li>-->
    <li class="show_list">
        <div class="left_word">手机号</div>
        <div class="right_word"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['username'];?>
</div>
    </li>
        <li class="show_list">
            <div class="left_word">用户ID</div>
            <div class="right_word"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
</div>
        </li>
        </form>
</ul>
<div class="save" id="save_btn">保存</div>
<!--todo 出生日期-->
<div id="targetContainer"></div>
<!--todo 姓名模态框-->
<div class="modal_name modal">
    <div class="header">
        <div class="left_header">
            <div class="icon_add_person icon_left_white"></div>
        </div>
        <h1>修改名字</h1>
    </div>
    <div class="header_empty"></div>
    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
" id="update_name" class="update_name" maxlength="10">
</div>
<div class="modal_nickname modal">
    <div class="header">
        <div class="left_header">
            <div class="icon_add_person icon_left_white"></div>
        </div>
        <h1>修改昵称</h1>
    </div>
    <div class="header_empty"></div>
    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
" id="update_nick_name" class="update_name" maxlength="10">
</div>

	<!-- </div> -->
	<?php if (@ACTION_NAME!='login'){?>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
	<?php echo $_smarty_tpl->getSubTemplate ("customer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	<script>
		var user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		//分享信息
		var link = '<?php echo $_smarty_tpl->tpl_vars['wx_share_link']->value;?>
';
		var img = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['pic'];?>
';
		var title = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['head_title'];?>
';
		var desc = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['desc'];?>
';
		var appId = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';
		var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
		var nonceStr = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';
		var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';
	</script>
	<!--JS-->
	<script src="__PUBLIC__/Js/front/jquery-1.8.2.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/common.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.easing.1.3.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/ddsmoothmenu.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.flexslider.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.elastislide.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.jcarousel.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/jquery.accordion.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/light_box.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Plugins/jPops/jquery.jpops.min-v3.js"></script>
	<script src="__PUBLIC__/Js/front/html5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>
	<!--end js-->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
<script src="/Public/Js/front/front_js/DateSelector.js"></script>
<script src="/Public/Js/front/front_js/upload_img.js" type="text/javascript"></script>
<!--<script src="/Public/Js/jquery/ajaxupload.3.5.js"></script>-->
<script>
    var birth_year=parseInt('<?php echo date('Y',strtotime($_smarty_tpl->tpl_vars['user_info']->value['birthday']));?>
');
    var birth_month=parseInt('<?php echo date('m',strtotime($_smarty_tpl->tpl_vars['user_info']->value['birthday']));?>
');
    var birth_day=parseInt('<?php echo date('d',strtotime($_smarty_tpl->tpl_vars['user_info']->value['birthday']));?>
');
</script>

<script type="text/javascript">
	if(!is_ios()){
		$("file").attr({
			'capture':'camera',
			'accept':'image/*'
		});
	}
    $(function(){
        // todo 上传个人头像
//      new AjaxUpload("#add_upload", {
//          action: "/Front/uploadHandler",
//          name: "upfile",
//          responseType: "json",
//          onSubmit: function(){
//              /*  alert('正在上传');*/
//          },
//          onChange: function(file, extension){
//              if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//                  return true;
//              }
//              else {
//                  show_alert('暂不支持该图片格式！');
//                  return false;
//              }
//          },
//          onComplete: function(file, response){
//              if (response.status === 0) {
//                  show_alert(response.msg);
//              }
//              else if (response.status === 1) {
//                  $('#img_choose').attr('src',response.img_url);
//                  $('#img_url').val(response.img_url);
//              }
//          }
//      });
		
		
		
		
		
		
        var old_name=$('#name_real').html();
//        var old_birth=$('#birth_time').html();
//        //---------------------函数调用开始---------------------
//        new DateSelector({
//            input : 'birth_time',//点击触发插件的input框的id
//            container : 'targetContainer',//插件插入的容器id
//            type : 0,
//            //0：不需要tab切换，自定义滑动内容，建议小于三个；
//            //1：需要tab切换，【年月日】【时分】完全展示，固定死，可设置开始年份和结束年份
//            param : [1,1,1,0,0],
//            //设置['year','month','day','hour','minute'],1为需要，0为不需要,需要连续的1
//            beginTime : [1970,1,1],//如空数组默认设置成1970年1月1日0时0分开始，如需要设置开始时间点，数组的值对应param参数的对应值。
//            endTime : [],//如空数组默认设置成次年12月31日23时59分结束，如需要设置结束时间点，数组的值对应param参数的对应值。
//            recentTime : [birth_year,birth_month,birth_day],//如不需要设置当前时间，被为空数组，如需要设置的开始的时间点，数组的值对应param参数的对应值。
//            success : function(arr){
//                /*todo 出生日期的显示*/
//                $('#birth_time').html(arr[0]+'-'+arr[1]+'-'+arr[2]);
//            }//回调
//        });
        /*todo 修改姓名*/
        $('#real_name .control_range').on('click',function(){
            $('.modal_name').show();
        });
        /*todo 昵称*/
        $('#nick_name .control_range').on('click',function(){
            $('.modal_nickname').show();
        });
        /*todo 姓名模态框的返回按钮*/
        $('.modal_name .icon_left_white').on('click',function(){
            $('.modal_name').hide();
            $('#name_real').html($('#update_name').val());
        });
        /*todo 昵称模态框的返回按钮*/
        $('.modal_nickname .icon_left_white').on('click',function(){
            $('.modal_nickname').hide();
            $('#nick_name_update').html($('#update_nick_name').val());
        });
        /*todo 当前页面的返回按钮*/
        $('#current_page_arrow').on('click',function(){
            var pre_nick=$('#pre_nick').val();
            var nick=$('#nick_name_update').html();
            var pre_name=$('#pre_name').val();
            var name=$('#name_real').html();
//            var pre_birth=$('#birth').val();
//            var birth=$('#birth_time').html();
            if((pre_nick==nick)&&(pre_name==name)){
                history.go(-1);
            }
            else{
                show_alert('请先保存');
            }
        });
        $('#save_btn').on('click',function(){
//           var birthday= $('#birth_time').html();
//            if(birthday=='请选择'){
//                birthday='1970-01-01';
//            }
            $.ajax({
                url:"/FrontUserCenter/personal_data",
                type:"POST",
                data:{
                    headimgurl:$('#img_url').val(),
                    nickname:$('#nick_name_update').html(),
                    realname: $('#name_real').html(),
//                    birthday:birthday
                },
                dataType:'json',
                timeout:10000,
                success:function(data){
                    if(data) {
                        if(data.code != -1)
                        {
                            show_alert(data.msg);
                           // $('#whether_save').val(1);
                            if(is_ios||is_android()){
                                native_back();
                            }else{
                                setTimeout(function(){
                                    window.location.href='/FrontUserCenter/person_center'
                                },1000);
                            }

                        }
                        else
                        {
                            show_alert(data.msg);
                        }
                    }
                }
            });
        });

    });
</script>


</body>
</html>
 
<?php }else{ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="format-detection" content="email=no" />
	<meta name="apple-mobile-web-app-title" content="盈软微分销" />
	<?php if (@ACTION_NAME=='cart'){?>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">  
	<?php }?>
	<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
	<link href="__PUBLIC__/Css/front/common.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<!--雪碧图-->
	<link href="__PUBLIC__/Css/front/front_css/sprites_img.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<link href="__PUBLIC__/Css/front/front_css/sprites_img_person.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">

	<link href="<?php echo $_smarty_tpl->tpl_vars['tpl_path']->value;?>
/css/header_footer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<link href="__PUBLIC__/Css/front/layer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<!--<script src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
	<script src="__JS__/front/jquery-1.12.1.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/header.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/personal_data.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/DateSelector.css?rev=@@hash&version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>

</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" id="current_page_arrow">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>个人资料</h1>
</div>
<div class="header_empty"></div>
<input type="hidden" id="whether_save" value="0">
<div class="style_show"></div>
<!--todo 主要内容列表-->
<ul class="list_content">
    <form>
    <li class="show_list list_head">
        <div class="left_word">头像</div>
        <div class="ref_upload_photo">
            <a href="javascript:;" class="right_word" title="上传头像" id="add_upload">
                <div class="img-control">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
" class="img-responsive" id="img_choose">
                </div>
                <div class="icon_add_person icon_left_gray"></div>
            </a>
            <input id="dynamic_img_uploader" name="file" style="display:none" type="file" onchange="upload_image();"/>
			<input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['up_token']->value;?>
" />
        	<input type="hidden" name="image_domain" id="image_domain" value="<?php echo $_smarty_tpl->tpl_vars['image_domain']->value;?>
" />
            <input type="hidden" name="headimgurl" class="img_url" id="img_url" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['headimgurl'];?>
"/>
        </div>
    </li>
    <li class="show_list" id="nick_name">
        <div class="left_word">昵称</div>
        <div class="right_word control_range">
            <div id="nick_name_update" class="text_left"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
</div>
            <div class="icon_add_person icon_left_gray"></div>
        </div>
        <input type="hidden" id="pre_nick" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
" >
    </li>
    <li class="show_list" id="real_name">
        <div class="left_word">姓名</div>
        <div class="right_word control_range">
            <div id="name_real" class="text_left"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
</div>
            <div class="icon_add_person icon_left_gray"></div>
        </div>
        <input type="hidden" id="pre_name" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
">
    </li>
 <!--   <li class="show_list birth_control">
        <div class="left_word">生日</div>
        <div class="right_word" id="birth_time"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['birthday'];?>
</div>
        <div class="icon_add_person icon_left_gray" id="birth_arrow"></div>
        <input type="hidden" id="birth"  name="birthday" value="<?php if ($_smarty_tpl->tpl_vars['user_info']->value['birthday']){?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['birthday'];?>
<?php }else{ ?>请选择<?php }?>">
    </li>-->
    <li class="show_list">
        <div class="left_word">手机号</div>
        <div class="right_word"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['username'];?>
</div>
    </li>
        <li class="show_list">
            <div class="left_word">用户ID</div>
            <div class="right_word"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
</div>
        </li>
        </form>
</ul>
<div class="save" id="save_btn">保存</div>
<!--todo 出生日期-->
<div id="targetContainer"></div>
<!--todo 姓名模态框-->
<div class="modal_name modal">
    <div class="header">
        <div class="left_header">
            <div class="icon_add_person icon_left_white"></div>
        </div>
        <h1>修改名字</h1>
    </div>
    <div class="header_empty"></div>
    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['realname'];?>
" id="update_name" class="update_name" maxlength="10">
</div>
<div class="modal_nickname modal">
    <div class="header">
        <div class="left_header">
            <div class="icon_add_person icon_left_white"></div>
        </div>
        <h1>修改昵称</h1>
    </div>
    <div class="header_empty"></div>
    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['nickname'];?>
" id="update_nick_name" class="update_name" maxlength="10">
</div>

	<?php if (@ACTION_NAME=='mall_home'||@ACTION_NAME=='all_order'||@ACTION_NAME=='pre_pay_order'||@ACTION_NAME=='pre_deliver_order'||@ACTION_NAME=='pre_confirm_order'||@ACTION_NAME=='wallet'||@ACTION_NAME=='personal_center'||@ACTION_NAME=='mall_list'||@ACTION_NAME=='item_list'){?>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['footer_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	<!--提示层-->
  <div id="tan_wrap"><div id="tan"></div></div>
	<!--todo 提示信息的弹框-->
	<div class="modal_alert">
		<div class="modal_content">
			<div class="icon_add_person icon_shanchutishi"></div>
			<p class="text"></p>
			<div class="tips_text">我知道了</div>
		</div>
	</div>
	<script>
		$('.modal_alert').on('click',function(){
			$(this).hide();
			$('body').css('overflow','scroll');
		});
		function show_alert(text){
			$('.modal_alert').show();
			$('.modal_alert .text').html(text);
			$('body').css('overflow','hidden');
		}
	var has_deflt_addr = "<?php echo $_smarty_tpl->tpl_vars['has_deflt_addr']->value;?>
";
	var default_addr = "<?php echo $_smarty_tpl->tpl_vars['default_addr_string']->value;?>
";
	var first = "<?php echo $_smarty_tpl->tpl_vars['first']->value;?>
";	
    function no_pic(obj) {
        obj.setAttribute("src", "/Public/Images/front/front_img/logo3x.png");
    }
    $('img').attr('onerror', 'no_pic(this)');
	</script>
	<script src="__JS__/front/custom.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/front/layer.m.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PLG__/native/native_event.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/clipboard.min.js"></script>
	<script>
	//获取后台数据
	ip = "<?php echo $_smarty_tpl->tpl_vars['client_ip']->value;?>
";
	az_id = 1;
	user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
	</script>
	<script>
		var user_id = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		//分享信息
		var link = '<?php echo $_smarty_tpl->tpl_vars['wx_share_link']->value;?>
';
		var img = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['pic'];?>
';
		var title = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['head_title'];?>
';
		var desc = '<?php echo $_smarty_tpl->tpl_vars['share_info']->value['desc'];?>
';
		var appId = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['appId'];?>
';
		var timestamp = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
';
		var nonceStr = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['nonceStr'];?>
';
		var signature = '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['signature'];?>
';
//alert('title = ' + title + ', desc = ' + desc + ', link = ' + link + ', img = ' + img);
		function no_pic(obj) {
        obj.setAttribute("src", "/Public/Images/front/front_img/logo3x.png");
    }
    $('img').attr('onerror', 'no_pic(this)');
	</script>
	<?php if (@ACTION_NAME!='mall_home'&&@ACTION_NAME!='item_list'&&@ACTION_NAME!='item_detail'){?>
	<script type="text/javascript">
		//用户是否登录
		$(function(){
			if(user_id == null || user_id == 0 || user_id == '' || user_id == '0'){
				//console.log('没登录');
				native_listen('no_login');
			}
		})
	</script>
	<script src="__PUBLIC__/Js/hybird.js"></script>
	<?php }?>
	<!--JS-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="__PUBLIC__/Js/front/wxapi.js"></script>

    <!-- <script src="/stat.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script> -->
	
<script src="/Public/Js/front/front_js/DateSelector.js"></script>
<script src="/Public/Js/front/front_js/upload_img.js" type="text/javascript"></script>
<!--<script src="/Public/Js/jquery/ajaxupload.3.5.js"></script>-->
<script>
    var birth_year=parseInt('<?php echo date('Y',strtotime($_smarty_tpl->tpl_vars['user_info']->value['birthday']));?>
');
    var birth_month=parseInt('<?php echo date('m',strtotime($_smarty_tpl->tpl_vars['user_info']->value['birthday']));?>
');
    var birth_day=parseInt('<?php echo date('d',strtotime($_smarty_tpl->tpl_vars['user_info']->value['birthday']));?>
');
</script>

<script type="text/javascript">
	if(!is_ios()){
		$("file").attr({
			'capture':'camera',
			'accept':'image/*'
		});
	}
    $(function(){
        // todo 上传个人头像
//      new AjaxUpload("#add_upload", {
//          action: "/Front/uploadHandler",
//          name: "upfile",
//          responseType: "json",
//          onSubmit: function(){
//              /*  alert('正在上传');*/
//          },
//          onChange: function(file, extension){
//              if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//                  return true;
//              }
//              else {
//                  show_alert('暂不支持该图片格式！');
//                  return false;
//              }
//          },
//          onComplete: function(file, response){
//              if (response.status === 0) {
//                  show_alert(response.msg);
//              }
//              else if (response.status === 1) {
//                  $('#img_choose').attr('src',response.img_url);
//                  $('#img_url').val(response.img_url);
//              }
//          }
//      });
		
		
		
		
		
		
        var old_name=$('#name_real').html();
//        var old_birth=$('#birth_time').html();
//        //---------------------函数调用开始---------------------
//        new DateSelector({
//            input : 'birth_time',//点击触发插件的input框的id
//            container : 'targetContainer',//插件插入的容器id
//            type : 0,
//            //0：不需要tab切换，自定义滑动内容，建议小于三个；
//            //1：需要tab切换，【年月日】【时分】完全展示，固定死，可设置开始年份和结束年份
//            param : [1,1,1,0,0],
//            //设置['year','month','day','hour','minute'],1为需要，0为不需要,需要连续的1
//            beginTime : [1970,1,1],//如空数组默认设置成1970年1月1日0时0分开始，如需要设置开始时间点，数组的值对应param参数的对应值。
//            endTime : [],//如空数组默认设置成次年12月31日23时59分结束，如需要设置结束时间点，数组的值对应param参数的对应值。
//            recentTime : [birth_year,birth_month,birth_day],//如不需要设置当前时间，被为空数组，如需要设置的开始的时间点，数组的值对应param参数的对应值。
//            success : function(arr){
//                /*todo 出生日期的显示*/
//                $('#birth_time').html(arr[0]+'-'+arr[1]+'-'+arr[2]);
//            }//回调
//        });
        /*todo 修改姓名*/
        $('#real_name .control_range').on('click',function(){
            $('.modal_name').show();
        });
        /*todo 昵称*/
        $('#nick_name .control_range').on('click',function(){
            $('.modal_nickname').show();
        });
        /*todo 姓名模态框的返回按钮*/
        $('.modal_name .icon_left_white').on('click',function(){
            $('.modal_name').hide();
            $('#name_real').html($('#update_name').val());
        });
        /*todo 昵称模态框的返回按钮*/
        $('.modal_nickname .icon_left_white').on('click',function(){
            $('.modal_nickname').hide();
            $('#nick_name_update').html($('#update_nick_name').val());
        });
        /*todo 当前页面的返回按钮*/
        $('#current_page_arrow').on('click',function(){
            var pre_nick=$('#pre_nick').val();
            var nick=$('#nick_name_update').html();
            var pre_name=$('#pre_name').val();
            var name=$('#name_real').html();
//            var pre_birth=$('#birth').val();
//            var birth=$('#birth_time').html();
            if((pre_nick==nick)&&(pre_name==name)){
                history.go(-1);
            }
            else{
                show_alert('请先保存');
            }
        });
        $('#save_btn').on('click',function(){
//           var birthday= $('#birth_time').html();
//            if(birthday=='请选择'){
//                birthday='1970-01-01';
//            }
            $.ajax({
                url:"/FrontUserCenter/personal_data",
                type:"POST",
                data:{
                    headimgurl:$('#img_url').val(),
                    nickname:$('#nick_name_update').html(),
                    realname: $('#name_real').html(),
//                    birthday:birthday
                },
                dataType:'json',
                timeout:10000,
                success:function(data){
                    if(data) {
                        if(data.code != -1)
                        {
                            show_alert(data.msg);
                           // $('#whether_save').val(1);
                            if(is_ios||is_android()){
                                native_back();
                            }else{
                                setTimeout(function(){
                                    window.location.href='/FrontUserCenter/person_center'
                                },1000);
                            }

                        }
                        else
                        {
                            show_alert(data.msg);
                        }
                    }
                }
            });
        });

    });
</script>


	<?php if (@ACTION_NAME=='mall_home'){?>
		<script type="text/javascript">
		     $('#slider_cont').flexslider({
		          animation: "fade",
		          direction: "horizontal",
		          easing: "swing",
		      });
		</script>
	<?php }?>
</body>
</html>
<?php }?>
<?php }} ?>