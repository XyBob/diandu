<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 13:52:17
         compiled from "C:\wamp\www\diandu\Tpl\Index\apply_for_businesses.html" */ ?>
<?php /*%%SmartyHeaderCode:2182359758b110dc1e7-32893475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '793006d8e62602d77c509374668c174812a935c1' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\Index\\apply_for_businesses.html',
      1 => 1498537005,
      2 => 'file',
    ),
    'e92d53d17355de72bef53109c2ea0749df0a5171' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\home.html',
      1 => 1499940592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2182359758b110dc1e7-32893475',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59758b12bd967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59758b12bd967')) {function content_59758b12bd967($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pc_site']->value==1){?>
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

<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/apply_for_businesses.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
    <div class="left_header native_back" onclick="history.go(-1)">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>商家入驻申请</h1>
    <div class="header_right" onclick="location.href='/Index/help_detail'"><div class="text">帮助</div></div>
</div>
<div class="header_empty"></div>
<!--todo 联系相关-->
<form action="">
    <h1 class="title_name">联系人信息</h1>
    <div class="contact_relevant">
        <div class="contact_name base_data_list">
            <label class="label_style">联系人</label>
            <input placeholder="请输入姓名" class="input_matter" id="person_name" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['contacts'];?>
"/>
        </div>
        <div class="contact_tel base_data_list">
            <label class="label_style">联系电话</label>
            <input placeholder="请输入手机号" class="input_matter" id="shop_tel" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['contact_number'];?>
"/>
        </div>
    </div>
    <h1 class="title_name">店铺基本资料</h1>
    <ul class="base_data">
        <li class="base_data_list">
            <label class="label_style">店铺全称</label>
            <input placeholder="请输入店铺全称(须与营业执照一致)" class="input_matter" id="full_name" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['full_name'];?>
"/>
        </li>
        <li class="base_data_list">
            <label class="label_style">店铺简称</label>
            <input placeholder="请输入店铺名称" class="input_matter" id="shop_name" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['business_name'];?>
"/>
        </li>
       <!-- <li class="base_data_list">
            <label class="label_style">选择行业</label>
            <select class="select_matter" id="industry_choose">
                <option value="0">点击选择行业</option>
                <?php  $_smarty_tpl->tpl_vars['industry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['industry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_industry_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['industry']->key => $_smarty_tpl->tpl_vars['industry']->value){
$_smarty_tpl->tpl_vars['industry']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['industry']->value['industry_id'];?>
" min_rate="<?php echo $_smarty_tpl->tpl_vars['industry']->value['rate']*100;?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['industry_id']==$_smarty_tpl->tpl_vars['industry']->value['industry_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry']->value['industry_name'];?>
</option>
                <?php } ?>
            </select>

            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>-->
        <li class="base_data_list">
            <label class="label_style">店铺类型</label>
            <select class="select_matter" id="shop_type">
                <option value="0">点击选择店铺类型</option>
                <?php  $_smarty_tpl->tpl_vars['classify'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['classify']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_classify_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['classify']->key => $_smarty_tpl->tpl_vars['classify']->value){
$_smarty_tpl->tpl_vars['classify']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['classify']->value['business_classify_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_classify_id']==$_smarty_tpl->tpl_vars['classify']->value['business_classify_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['classify']->value['business_classify_name'];?>
</option>
                <?php } ?>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list">
            <label class="label_style">营业类型</label>
            <select class="select_matter" id="category_id">
                <option value="0">点击选择店铺类型</option>
                <option value="2016062900190371" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190371'){?>selected<?php }?>>政府/社会组织</option>
                <option value="2016062900190337" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190337'){?>selected<?php }?>>专业销售/批发</option>
                <option value="2016062900190296" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190296'){?>selected<?php }?>>医疗健康</option>
                <option value="2016062900190124" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190124'){?>selected<?php }?>>爱车</option>
                <option value="2016042200000148" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016042200000148'){?>selected<?php }?>>教育培训</option>
                <option value="2015091000052157" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015091000052157'){?>selected<?php }?>>超市便利店</option>
                <option value="2015080600000001" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015080600000001'){?>selected<?php }?>>航旅</option>
                <option value="2015063000020189" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015063000020189'){?>selected<?php }?>>生活服务</option>
                <option value="2015062600004525" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015062600004525'){?>selected<?php }?>>休闲娱乐</option>
                <option value="2015062600002758" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015062600002758'){?>selected<?php }?>>购物</option>
                <option value="2015050700000000" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015050700000000'){?>selected<?php }?>>美食</option>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <!--<li class="benefit_percent_list">-->
            <!--<div class="benefit_header benefit_input_left">-->
                <!--<label class="label_style">让利比例</label>-->
                <!--<input placeholder="请填写让利比例" class="input_matter" onkeyup="value=value.replace(/[^\d.]/g,'')" id="benefit_percent" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['rate']*100;?>
"/>-->
                <!--<span class="red" id="benefit_red" style="display: none">%</span>-->
            <!--</div>-->
            <!--<div class="blue_tips"><span>注意：让利比例越高，店铺排名越靠前</span></div>-->
        <!--</li>-->
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">人均消费</label>
            <input placeholder="请输入人均消费金额" class="input_matter" id="per_consume" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['consumption'];?>
"/>
            <span class="red" id="capita_red" style="display: none">元</span>
        </li>
        <li class="base_data_list">
            <label class="label_style">所在省</label>
            <select class="select_matter" id="province_id">
                <option value="0">选择省份</option>
                <?php  $_smarty_tpl->tpl_vars['province'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['province']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['province']->key => $_smarty_tpl->tpl_vars['province']->value){
$_smarty_tpl->tpl_vars['province']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['province']->value['province_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['province_id']==$_smarty_tpl->tpl_vars['province']->value['province_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['province']->value['province_name'];?>
</option>
                <?php } ?>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list">
            <label class="label_style">所在市</label>
            <select class="select_matter" id="city_id">
                <option value="0">选择城市</option>
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['city_id']==$_smarty_tpl->tpl_vars['city']->value['city_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['city_name'];?>
</option>
                <?php } ?>
                <!--<option value="1" selected>商丘市</option>-->
                <!--<option value="2">郑州市</option>-->
            </select>
            <div class="right_choose">
                <div class="icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list">
            <label class="label_style">所在区</label>
            <select class="select_matter" id="area_id">
                <option value="0">选择区/县</option>
                <?php  $_smarty_tpl->tpl_vars['area'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['area']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['area_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['area']->key => $_smarty_tpl->tpl_vars['area']->value){
$_smarty_tpl->tpl_vars['area']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['area']->value['area_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['area_id']==$_smarty_tpl->tpl_vars['area']->value['area_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['area']->value['area_name'];?>
</option>
                <?php } ?>
                <!--<option value="1" selected>高新区</option>-->
                <!--<option value="2">金水区</option>-->
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">邮箱</label>
            <input placeholder="请输入联系人邮箱" class="input_matter" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['mail'];?>
"/>
        </li>
<!--
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">经营执照</label>
            <input placeholder="请输入经营执照编号" class="input_matter" id="business_license" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['business_license'];?>
"/>
        </li>

        <li class="base_data_list">
            <label class="label_style">执照类型</label>
            <select class="select_matter" id="business_license_type" name="business_license_type">
                <option value="">点击选择店铺类型</option>
                <option value="NATIONAL_LEGAL_MERGE" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='NATIONAL_LEGAL_MERGE'){?>selected<?php }?>>营业执照（多证合一）</option>
                <option value="NATIONAL_LEGAL" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='NATIONAL_LEGAL'){?>selected<?php }?>>营业执照</option>
                <option value="INST_RGST_CTF" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='INST_RGST_CTF'){?>selected<?php }?>>事业单位法人证书</option>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>-->


        <li class="base_data_list detail_address">
            <label class="label_style">地址</label>
            <textarea placeholder="请输入地址" class="input_matter_min" id="detail_address" data-longitude="<?php echo $_smarty_tpl->tpl_vars['business']->value['longitude'];?>
"  data-latitude="<?php echo $_smarty_tpl->tpl_vars['business']->value['latitude'];?>
"><?php echo $_smarty_tpl->tpl_vars['business']->value['address1'];?>
</textarea>
            <a class="right_choose" id="map_position">
                <div class=" icon_add_person icon_map_blue"></div>
            </a>
        </li>
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">详细地址</label>
            <input placeholder="请输入详细地址" class="input_matter" id="address1" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['address2'];?>
"/>
        </li>
        <li style="padding-right:0.75rem;">
            <div id="allmap"  style="height:  300px;width: 100%;" ></div>
        </li>

    </ul>
    <h1 class="title_name">店铺介绍</h1>
    <textarea class="shop_introduce" placeholder="具体介绍一下店铺的情况" id="shop_introduce" ><?php echo $_smarty_tpl->tpl_vars['business']->value['desc'];?>
</textarea>
    <h1 class="title_name">上传店招图片</h1>
    <div class="ref_upload_photo clearfix dz_img_wrap">
        <!--z-index 设置是为了响应点击事件，防止del事件不触发-->
        <?php if ($_smarty_tpl->tpl_vars['business']->value['sign_pic']!=''){?>
        <div class="add_img fl" style="z-index: 9999">
            <img src="<?php echo $_smarty_tpl->tpl_vars['business']->value['sign_pic'];?>
" class="img-responsive">
            <div class="del_img" onclick="del_img(this)">
                <a class="icon_add_person icon_shanchu_red" href="javascript:;"></a>
            </div>
        </div>
        <?php }?>
        <a href="javascript:;" <?php if ($_smarty_tpl->tpl_vars['business']->value['sign_pic']!=''){?>style="display:none;"<?php }?> class="add fl add_img_control" title="上传店招图片" id="add_upload">
            <div class="icon_add_person icon_tianjia_pic"></div>
        </a>
        <input id="img_uploader_dz" name="file" style="display:none" type="file" onchange="upload_image(this);" data-max="1"/>
		<input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['up_token']->value;?>
" />
    	<input type="hidden" name="image_domain" id="image_domain" value="<?php echo $_smarty_tpl->tpl_vars['image_domain']->value;?>
" />
        <input type="hidden" class="img_url" id="img_url" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['sign_pic'];?>
" />
    </div>
    
    <h1 class="title_name">上传环境图片</h1>
    <div class="ref_upload_photo clearfix ref_upload_photo_down">
        <?php  $_smarty_tpl->tpl_vars['evn_pic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['evn_pic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['evn_pics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['evn_pic']->key => $_smarty_tpl->tpl_vars['evn_pic']->value){
$_smarty_tpl->tpl_vars['evn_pic']->_loop = true;
?>
        <div class="add_img fl" style="z-index: 9999">
            <img src="<?php echo $_smarty_tpl->tpl_vars['evn_pic']->value;?>
" class="img-responsive">
            <div class="del_img" onclick="del_img(this)">
                <a class="icon_add_person icon_shanchu_red" href="javascript:;"></a>
            </div>
        </div>
        <?php } ?>
        <a href="javascript:;" class="add fl out_border" <?php if (count($_smarty_tpl->tpl_vars['evn_pics']->value)==5){?>style="display:none;"<?php }?> title="上传环境图片" id="add_upload2">
            <div class="icon_add_person icon_tianjia_pic"></div>
        </a>
        <input id="img_uploader_hj" name="file" style="display:none" type="file" onchange="upload_image(this);" data-max="5"/>
        <input type="hidden" name="img_url " class="img_url" id="img_url2" value="<?php echo $_smarty_tpl->tpl_vars['evn_pic']->value;?>
" />
    </div>
    <h1 class="title_name">添加营业执照</h1>
    <div class="ref_upload_photo clearfix">
        <?php if ($_smarty_tpl->tpl_vars['business']->value['license_pic']!=''){?>
        <div class="add_img fl" style="z-index: 9999">
            <img src="<?php echo $_smarty_tpl->tpl_vars['business']->value['license_pic'];?>
" class="img-responsive">
            <div class="del_img" onclick="del(this)">
                <a class="icon_add_person icon_shanchu_red" href="javascript:;"></a>
            </div>
        </div>
        <?php }?>
        <a href="javascript:;" class="add fl add_img_control" <?php if ($_smarty_tpl->tpl_vars['business']->value['license_pic']!=''){?>style="display:none;"<?php }?> title="添加营业执照" id="add_upload3">
            <div class="switch_on icon_add_person icon_tianjia_pic"></div>
        </a>
        <input id="img_uploader_yz" name="file" style="display:none" type="file" onchange="upload_image(this);" data-max="1"/>
        <input type="hidden" name="img_url " class="img_url" id="img_url3" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['license_pic'];?>
" />
    </div>
    <!--todo 固定在底部的提交-->
    <!--<div class="footer_empty"></div>-->
    <div class="footer_fixed">
        <p class="whether_agree">
            <span class="icon_control_small icon_market icon_select_rect icon_selected_rect"></span>
            <span>已阅读并同意</span><span class="blue" onclick="location.href='/Index/help_detail'">《店都商铺入驻协议》</span>
        </p>
        <div class="submit" id="submit">确认提交</div>
        <input type="hidden" id="whether_selected" value="1">
    </div>
</form>
<!--todo 模态框提示-->
<div class="modal_tips">
    <div class="modal_content">
        <div class="icon_add_person icon_shanchutishi"></div>
        <p class="text">让利比设置不得低于<span id="m_rate"></span>%<br/>请重新设置</p>
        <div class="tips_text">我知道了</div>
    </div>
</div>
<!--todo  地图弹框-->
<div class="modal_map">
    <div class="map_content">
        <div id="allmap2" style="height:  500px;width: 100%"></div>
        <p id="map_address" style="font-size: 18px;"></p>
    </div>
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
	
<!--<script src="/Public/Js/jquery/ajaxupload.3.5.js"></script>-->
<script src="/Public/Js/front/front_js/upload_fuwu_img.js" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BQLHGlffjbXC30bFDcpIQkHIkaxKBBe6&services=true"></script>

<script>
    $('.whether_agree .icon_select_rect').on('click',function(){
        $(this).toggleClass('icon_selected_rect');
        if($(this).hasClass('icon_selected_rect')){
            $('#whether_selected').val(1);
        }
        else{
            $('#whether_selected').val('');
        }
    })
</script>
<script type="text/javascript">
	if(!is_ios()){
		$("input[name=file]").attr({
			'capture':'camera',
			'accept':'image/*'
		});
	}
    $(function(){
        $('.select_matter').each(function(index,element){
            if($(this).val()=='0'){
                $(this).removeClass('active');
            }
            else{
                $(this).addClass('active');
            }
        })
    });

    if($("#area_id").val()!='0'){
        $(this).addClass('active');
    }
    /*todo 地图控制*/
//    $('#map_position').on('click',function(){
//        $('.modal_map').show().css('display','flex');
//        //getAddr();
//        document.body.classList.add('bodyhide');
//    });
//    $('.modal_map').on('click',function(){
//        $(this).hide();
//        document.body.classList.remove('bodyhide');
//    });
//    $('.modal_map .map_content').on('click',function(){
//        event.stopPropagation();/*todo 阻止冒泡*/
//    });
    /*todo 比例input获取焦点*/
    $('#benefit_percent,#per_consume').on('focus',function(){
        $(this).addClass('active');
        $(this).next().show();
        $('#per_consume')[0].setAttribute("placeholder","");
    });
    $('#benefit_percent,#per_consume').on('keyup',function(){
        var length=$(this).val().length;
        if(length==0){
            $(this).removeClass('active');
            $(this).next().hide();
            $('#per_consume')[0].setAttribute("placeholder","请输入人均消费金额");
        }
        else{
            $(this).addClass('active');
            $(this).next().show();
        }
    });
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
    $('.select_matter').change(function(){
        var val=Number($(this).val());
        if(val>0){
            $(this).addClass('active');
        }
        else{
            $(this).removeClass('active');
        }
    });
    var img_url_total=[];
    function del(obj){
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
    // todo 上传店招图片
//  new AjaxUpload("#add_upload", {
//      action: "/Global/upload_image",
//      name: "imgFile",
//      responseType: "json",
//      onSubmit: function(){
//          /*  show_alert('正在上传');*/
//      },
//      onChange: function(file, extension){
//          if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//              return true;
//          }
//          else {
//              show_alert('暂不支持该图片格式！');
//              return false;
//          }
//      },
//      onComplete: function(file, response){
//          if (response.status === 0) {
//              show_alert(response.msg);
//          }
//          else if (response.status === 1) {
//                  var html;
//              html='<div class="add_img fl"><img src="'+response.img_url+'" class="img-responsive"><div class="del_img" onclick="del(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a> </div></div>';
//                  $('#add_upload').before(html);
//                  $('#add_upload').hide();
//                  $('#add_upload').siblings('input[type="file"]').hide();
//                  $('#img_url').val(response.img_url);
//          }
//      }
//  });
//  //todo 上传环境图片
//  new AjaxUpload("#add_upload2", {
//      action: "/Global/upload_image",
//      name: "imgFile",
//      responseType: "json",
//      onSubmit: function(){
//      },
//      onChange: function(file, extension){
//          if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//              return true;
//          }
//          else {
//              show_alert('暂不支持该图片格式！');
//              return false;
//          }
//      },
//      onComplete: function(file, response){
//          if (response.status === 0) {
//              show_alert(response.msg);
//          }
//          else if (response.status === 1) {
//              var html;
//              html='<div class="add_img fl"><img src="'+response.img_url+'" class="img-responsive"><div class="del_img" onclick="del(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a> </div></div>';
//              $('#add_upload2').before(html);
//              img_url_total.push(response.img_url);
//              console.log(img_url_total);
//              var length=$('#add_upload2').parent().find('.add_img').length;
//              if(length==5){
//                  $('#add_upload2').hide();
//              }
//          }
//      }
//  });
    // todo 添加营业执照
//  new AjaxUpload("#add_upload3", {
//      action: "/Global/upload_image",
//      name: "imgFile",
//      responseType: "json",
//      onSubmit: function(){
//          /*  show_alert('正在上传');*/
//      },
//      onChange: function(file, extension){
//          if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//              return true;
//          }
//          else {
//              show_alert('暂不支持该图片格式！');
//              return false;
//          }
//      },
//      onComplete: function(file, response){
//
//          console.log(response);
//          if (response.status === 0) {
//              show_alert(response.msg);
//          }
//          else if (response.status === 1) {
//              /*if($('.switch_on').is(":hidden")){
//                  $('#add_upload3 img').attr('src',response.img_url);
//              }
//              else{
//                  $('.switch_on').hide();
//                  var html;
//                  html='<img src="'+response.img_url+'" class="img-responsive">';
//                  $('#add_upload3').append(html);
//              }*/
//              var html;
//              html='<div class="add_img fl"><img src="'+response.img_url+'" class="img-responsive"><div class="del_img" onclick="del(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a> </div></div>';
//              $('#add_upload3').before(html);
//              $('#add_upload3').hide();
//              $('#add_upload3').siblings('input[type="file"]').hide();
//              $('#img_url3').val(response.img_url);
//          }
//      }
//  });
    
    $('.modal_tips').on('click',function(){
        $(this).hide();
        document.body.classList.remove('bodyhide');
    });
    $('#submit').on('click',function(){
        var whether_selected=Number($('#whether_selected').val());
        var person_name=$('#person_name').val();
        var shop_tel=$('#shop_tel').val();
        var shop_name=$('#shop_name').val();
        var industry_choose=Number($('#industry_choose').val());
        var shop_type=Number($('#shop_type').val());
//        var benefit_percent=$('#benefit_percent').val();
        var per_consume=$('#per_consume').val();
        var province_id = Number($('#province_id').val());
        var city_id = Number($('#city_id').val());
        var area_id = Number($('#area_id').val());
        var detail_address = $('#detail_address').val()+'-'+$('#address1').val();
        //var address=$('#address1').val();
        //alert(detail_address);
      //  var address=$('#address').val();
        var shop_introduce=$('#shop_introduce').val();
        var sign_pic=$('#add_upload').parent().find('img').eq(0).attr('src');/*todo 上传店招图片*/
        var evn_pics=$('#add_upload2').parent().find('img');/*todo  上传环境图片*/
        var license_pic=$('#add_upload3').parent().find('img').eq(0).attr('src');/*todo 上传营业执照图片*/
        var latitude = $("#detail_address").attr("data-latitude");
        var longitude = $('#detail_address').attr("data-longitude");
        var mail = $('#mail').val();
        var mail_reg = /\w@\w*\.\w/;
  /*      var business_license= $('#business_license').val();
        var business_license_type= $('#business_license_type').val();*/
        var full_name=$('#full_name').val();
        var category_id=$('#category_id').val();
        var evn_pic = "";
        for(var i=0;i<evn_pics.length;i++){
            if(i!=0){
                evn_pic+="," + evn_pics.eq(i).attr("src");
            }else{
                evn_pic+=evn_pics.eq(i).attr("src");
            }
        }

        var tel_reg = /^1[34578]\d{9}$/gi;

        if (!person_name){
            show_alert('对不起，请填写姓名！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#person_name').focus();
            },1000)
            return false;
        }
        if(!shop_tel){
            show_alert('对不起，请填写手机号码！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_tel').focus();
            },1000)
            return false;
        }
        if (!tel_reg.test(shop_tel))
        {
            show_alert('对不起，请填写正确的手机号码！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_tel').focus();
            },1000)
            return false;
        }
        if(!shop_name){
            show_alert('对不起，请填写店铺名称！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_name').focus();
            },1000)
            return false;
        }
        if(!full_name){
            show_alert('对不起，请填写店铺全称！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_name').focus();
            },1000)
            return false;
        }
      /*  if(!industry_choose){
            show_alert('对不起，请填写店铺所在行业！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#industry_choose').focus();
            },1000)
            return false;
        }*/
        if(!shop_type){
            show_alert('对不起，请填写店铺类型！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        if(!category_id){
            show_alert('对不起，请选择营业类型！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        if(!mail_reg.test(mail)){
            show_alert('对不起，请填写正确的邮箱！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        /*if(!business_license){
            show_alert('对不起，请填写营业执照号！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        if(!business_license_type){
            show_alert('对不起，请填选择营业执照类型！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }*/
//        if(!benefit_percent){
//            show_alert('对不起，请填写让利比！');
//            setTimeout(function(){
//                $('.modal_alert').hide();
//                $('#benefit_percent').focus();
//            },1000)
//            return false;
//        }
//        if(benefit_percent){
//            if(benefit_percent<0.6){
//                 $('.modal_tips').show();
//                 document.body.classList.add('bodyhide');
//                return false;
//            }
//        }
        var min_rate = $("#industry_choose").find("option:selected").attr("min_rate");
//        if(benefit_percent*1.0<min_rate){
//            $('#m_rate').html(min_rate);
//            $('.modal_tips').show();
//            document.body.classList.add('bodyhide');
//            return false;
//        }
        if(!per_consume){
            show_alert('对不起，请填写人均消费！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#per_consume').focus();
            },1000)
            return false;
        }
        if (!province_id)
        {
            show_alert('对不起，请选择省份！');
            return false;
        }
        if (!city_id)
        {
            show_alert('对不起，请选择城市！');
            return false;
        }
        if (!area_id)
        {
            show_alert('对不起，请选择区/县！');
            return false;
        }
        if (!detail_address)
        {
            show_alert('对不起，请填写详细地址！');
            $('#detail_address').focus();
            return false;
        }

        if(latitude==""||longitude==""){
            show_alert('请在地图上选择地址');
            $('#detail_address').focus();
            return false;
        }
        if(!shop_introduce){
            show_alert('对不起，请填写店铺介绍信息！');
            $('#shop_introduce').focus();
            return false;
        }

        if(sign_pic==undefined||sign_pic=="") {
            show_alert("请上传店招");
            return;
        }
        if(evn_pic=="") {
            show_alert("请上传环境图片");
            return;
        }
        if(license_pic==undefined||license_pic=="") {
            show_alert("请上传营业执照");
            return;
        }
        if(!whether_selected){
            show_alert('请阅读并同意协议');
            return false;
        }
        $.ajax({
                    url:"",
                    type:"POST",
                    data:{
                        contacts: person_name,
                        contact_number: shop_tel,
                        business_name: shop_name,
                       /* industry_id:industry_choose,*/
                        business_classify_id:shop_type,
//                        rate:benefit_percent,
                        consumption:per_consume,
                        province_id: province_id,
                        city_id: city_id,
                        area_id: area_id,
                        address: detail_address,
                        desc:shop_introduce,
                        sign_pic:sign_pic,
                        evn_pic:evn_pic,
                        license_pic:license_pic,
                        latitude : latitude,
                        longitude : longitude,
                        mail:mail,
                  /*      business_license:business_license,
                        business_license_type:business_license_type,*/
                        full_name:full_name,
                        category_id:category_id
                    },
                    timeout:10000,
                    success:function(d){
                        //console.log(d);
                        if(d == 'success')
                        {
                            console.log('success');
                            location.href="/index/background_password/"
                        }
                        else
                        {
                            //console.log(d);
                            show_alert(d);
                        }
                    }
                });
    });
    /*todo textarea的高度自动控制*/
    $("#detail_address").each(function(){
        this.style.height = this.scrollHeight + "px";
    });
    $("#detail_address").on({
        input:function(){
            var _this = this;
            this.style.height = this.scrollHeight + "px";
            $(".detail_address_wrap").css({
                "height":_this.style.height
            });
        },
        propertychange:function(){
            this.style.height = this.scrollHeight + "px";
            $(".detail_address_wrap").css({
                "height":_this.style.height
            });
        }
    });
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

</script>

<!--百度地图-->
<!--<script type="text/javascript" src="http://developer.baidu.com/map/jsdemo/demo/convertor.js"></script>-->
<script type="text/javascript">

    //function getAddr() {
        var myCity = new BMap.LocalCity();
        myCity.get(myFun);
   // }


    function initMap(position) {
        var map = new BMap.Map("allmap");    // 创建Map实例
        //var point = new BMap.Point(116.331398,39.897445);
        var icon = new BMap.Icon('/Public/Images/point.png', new BMap.Size(40, 40), {
            anchor: new BMap.Size(20, 40)});
        
        var latitude = $("#detail_address").attr("data-latitude");
        var longitude = $('#detail_address').attr("data-longitude");
        var address =  $('#detail_address').val();
        if(latitude!=""&&longitude!=""){
            var point = new BMap.Point(longitude,latitude);
            var marker = new BMap.Marker(point,{icon:icon});
            //加上label提示
//            var label = new window.BMap.Label(address, { offset: new window.BMap.Size(20, -10) });
//            marker.setLabel(label);
            map.addOverlay(marker);
            map.centerAndZoom(point, 15);
        }else{
            var marker = new BMap.Marker(position,{icon:icon});
            map.addOverlay(marker);
            map.centerAndZoom(position, 15);
        }

        map.addControl(new BMap.NavigationControl());   //添加地图类型控件
//        map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
//        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        map.disableDoubleClickZoom()

        var geoc = new BMap.Geocoder();
        var p_x;
        var p_y;

        //记录第一次点击的坐标
        map.addEventListener("touchstart",function(e){
            p_x = e.jb.x;
            p_y = e.jb.y;

            //console.log(e.offsetY);
        });
//        map.addEventListener("touchend",function(e){
//            console.log(e.jb.x);
//            console.log(e.jb.x);
//            //console.log(e);
//            //console.log(e.offsetY);
//        });
        map.addEventListener("touchend", function (e) {
            //手指进行拖动了就不设置标注
            if(Math.abs(p_x - e.jb.x)>5||Math.abs(p_y - e.jb.y)>5){
                return;
            }

            var pt = e.point;
            map.clearOverlays();
            var marker = new BMap.Marker(pt, {icon: icon});
            var marker = new BMap.Marker(pt, {icon: icon});
            map.addOverlay(marker);
            geoc.getLocation(pt, function (rs) {
                var addComp = rs.addressComponents;
                console.log(addComp);
                console.log(e.point.lng + "," + e.point.lat);

                $('#detail_address').attr("data-longitude",e.point.lng);
                $('#detail_address').attr("data-latitude",e.point.lat);
                $('#detail_address').val('');
                //$('#map_address').html(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                $('#detail_address').val(addComp.province + addComp.city  + addComp.district + addComp.street + addComp.streetNumber);

            });
        });
    }

    function myFun(result){
        var cityName = result.name;
        var geolocation = new BMap.Geolocation();
        var gc = new BMap.Geocoder();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                //alert('您的位置：'+r.point.lng+','+r.point.lat);
                var pt = r.point;
                initMap(pt);
//                gc.getLocation(pt, function (rs) {
//                    var addComp = rs.addressComponents;
//
//                    var province = addComp.province;
//                    var city = addComp.city;
//                    var area = addComp.district;
//
//                    if (province != "" && city != "" && area != "") {
//                        // alert(province);
//                        alert("当前定位城市:"+province+city+area);
//                        window.location.href="/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng;
//
//                    }
//                    //alert("当前定位城市:"+cityName);
//                    //
//                });
            }
            else {
                alert('failed'+this.getStatus());
            }
        },{enableHighAccuracy: true})

    }



</script>

<script src="__JS__/front/bbc.districtdata.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

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
	
<link rel="stylesheet" type="text/css" href="/Public/Css/front/front_css/apply_for_businesses.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>
<style>

</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("common_sprite.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<!--todo 头部-->
<div class="header">
    <div class="left_header native_back" onclick="history.go(-1)">
        <div class="icon_add_person icon_left_white"></div>
    </div>
    <h1>商家入驻申请</h1>
    <div class="header_right" onclick="location.href='/Index/help_detail'"><div class="text">帮助</div></div>
</div>
<div class="header_empty"></div>
<!--todo 联系相关-->
<form action="">
    <h1 class="title_name">联系人信息</h1>
    <div class="contact_relevant">
        <div class="contact_name base_data_list">
            <label class="label_style">联系人</label>
            <input placeholder="请输入姓名" class="input_matter" id="person_name" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['contacts'];?>
"/>
        </div>
        <div class="contact_tel base_data_list">
            <label class="label_style">联系电话</label>
            <input placeholder="请输入手机号" class="input_matter" id="shop_tel" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['contact_number'];?>
"/>
        </div>
    </div>
    <h1 class="title_name">店铺基本资料</h1>
    <ul class="base_data">
        <li class="base_data_list">
            <label class="label_style">店铺全称</label>
            <input placeholder="请输入店铺全称(须与营业执照一致)" class="input_matter" id="full_name" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['full_name'];?>
"/>
        </li>
        <li class="base_data_list">
            <label class="label_style">店铺简称</label>
            <input placeholder="请输入店铺名称" class="input_matter" id="shop_name" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['business_name'];?>
"/>
        </li>
       <!-- <li class="base_data_list">
            <label class="label_style">选择行业</label>
            <select class="select_matter" id="industry_choose">
                <option value="0">点击选择行业</option>
                <?php  $_smarty_tpl->tpl_vars['industry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['industry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_industry_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['industry']->key => $_smarty_tpl->tpl_vars['industry']->value){
$_smarty_tpl->tpl_vars['industry']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['industry']->value['industry_id'];?>
" min_rate="<?php echo $_smarty_tpl->tpl_vars['industry']->value['rate']*100;?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['industry_id']==$_smarty_tpl->tpl_vars['industry']->value['industry_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry']->value['industry_name'];?>
</option>
                <?php } ?>
            </select>

            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>-->
        <li class="base_data_list">
            <label class="label_style">店铺类型</label>
            <select class="select_matter" id="shop_type">
                <option value="0">点击选择店铺类型</option>
                <?php  $_smarty_tpl->tpl_vars['classify'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['classify']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_classify_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['classify']->key => $_smarty_tpl->tpl_vars['classify']->value){
$_smarty_tpl->tpl_vars['classify']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['classify']->value['business_classify_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_classify_id']==$_smarty_tpl->tpl_vars['classify']->value['business_classify_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['classify']->value['business_classify_name'];?>
</option>
                <?php } ?>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list">
            <label class="label_style">营业类型</label>
            <select class="select_matter" id="category_id">
                <option value="0">点击选择店铺类型</option>
                <option value="2016062900190371" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190371'){?>selected<?php }?>>政府/社会组织</option>
                <option value="2016062900190337" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190337'){?>selected<?php }?>>专业销售/批发</option>
                <option value="2016062900190296" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190296'){?>selected<?php }?>>医疗健康</option>
                <option value="2016062900190124" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016062900190124'){?>selected<?php }?>>爱车</option>
                <option value="2016042200000148" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2016042200000148'){?>selected<?php }?>>教育培训</option>
                <option value="2015091000052157" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015091000052157'){?>selected<?php }?>>超市便利店</option>
                <option value="2015080600000001" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015080600000001'){?>selected<?php }?>>航旅</option>
                <option value="2015063000020189" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015063000020189'){?>selected<?php }?>>生活服务</option>
                <option value="2015062600004525" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015062600004525'){?>selected<?php }?>>休闲娱乐</option>
                <option value="2015062600002758" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015062600002758'){?>selected<?php }?>>购物</option>
                <option value="2015050700000000" <?php if ($_smarty_tpl->tpl_vars['business']->value['category_id']=='2015050700000000'){?>selected<?php }?>>美食</option>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <!--<li class="benefit_percent_list">-->
            <!--<div class="benefit_header benefit_input_left">-->
                <!--<label class="label_style">让利比例</label>-->
                <!--<input placeholder="请填写让利比例" class="input_matter" onkeyup="value=value.replace(/[^\d.]/g,'')" id="benefit_percent" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['rate']*100;?>
"/>-->
                <!--<span class="red" id="benefit_red" style="display: none">%</span>-->
            <!--</div>-->
            <!--<div class="blue_tips"><span>注意：让利比例越高，店铺排名越靠前</span></div>-->
        <!--</li>-->
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">人均消费</label>
            <input placeholder="请输入人均消费金额" class="input_matter" id="per_consume" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['consumption'];?>
"/>
            <span class="red" id="capita_red" style="display: none">元</span>
        </li>
        <li class="base_data_list">
            <label class="label_style">所在省</label>
            <select class="select_matter" id="province_id">
                <option value="0">选择省份</option>
                <?php  $_smarty_tpl->tpl_vars['province'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['province']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['province']->key => $_smarty_tpl->tpl_vars['province']->value){
$_smarty_tpl->tpl_vars['province']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['province']->value['province_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['province_id']==$_smarty_tpl->tpl_vars['province']->value['province_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['province']->value['province_name'];?>
</option>
                <?php } ?>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list">
            <label class="label_style">所在市</label>
            <select class="select_matter" id="city_id">
                <option value="0">选择城市</option>
                <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['city_id']==$_smarty_tpl->tpl_vars['city']->value['city_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['city_name'];?>
</option>
                <?php } ?>
                <!--<option value="1" selected>商丘市</option>-->
                <!--<option value="2">郑州市</option>-->
            </select>
            <div class="right_choose">
                <div class="icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list">
            <label class="label_style">所在区</label>
            <select class="select_matter" id="area_id">
                <option value="0">选择区/县</option>
                <?php  $_smarty_tpl->tpl_vars['area'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['area']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['area_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['area']->key => $_smarty_tpl->tpl_vars['area']->value){
$_smarty_tpl->tpl_vars['area']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['area']->value['area_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business']->value['area_id']==$_smarty_tpl->tpl_vars['area']->value['area_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['area']->value['area_name'];?>
</option>
                <?php } ?>
                <!--<option value="1" selected>高新区</option>-->
                <!--<option value="2">金水区</option>-->
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">邮箱</label>
            <input placeholder="请输入联系人邮箱" class="input_matter" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['mail'];?>
"/>
        </li>
<!--
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">经营执照</label>
            <input placeholder="请输入经营执照编号" class="input_matter" id="business_license" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['business_license'];?>
"/>
        </li>

        <li class="base_data_list">
            <label class="label_style">执照类型</label>
            <select class="select_matter" id="business_license_type" name="business_license_type">
                <option value="">点击选择店铺类型</option>
                <option value="NATIONAL_LEGAL_MERGE" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='NATIONAL_LEGAL_MERGE'){?>selected<?php }?>>营业执照（多证合一）</option>
                <option value="NATIONAL_LEGAL" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='NATIONAL_LEGAL'){?>selected<?php }?>>营业执照</option>
                <option value="INST_RGST_CTF" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='INST_RGST_CTF'){?>selected<?php }?>>事业单位法人证书</option>
            </select>
            <div class="right_choose">
                <div class=" icon_add_person icon_left_gray"></div>
            </div>
        </li>-->


        <li class="base_data_list detail_address">
            <label class="label_style">地址</label>
            <textarea placeholder="请输入地址" class="input_matter_min" id="detail_address" data-longitude="<?php echo $_smarty_tpl->tpl_vars['business']->value['longitude'];?>
"  data-latitude="<?php echo $_smarty_tpl->tpl_vars['business']->value['latitude'];?>
"><?php echo $_smarty_tpl->tpl_vars['business']->value['address1'];?>
</textarea>
            <a class="right_choose" id="map_position">
                <div class=" icon_add_person icon_map_blue"></div>
            </a>
        </li>
        <li class="base_data_list benefit_input_left person_unit">
            <label class="label_style">详细地址</label>
            <input placeholder="请输入详细地址" class="input_matter" id="address1" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['address2'];?>
"/>
        </li>
        <li style="padding-right:0.75rem;">
            <div id="allmap"  style="height:  300px;width: 100%;" ></div>
        </li>

    </ul>
    <h1 class="title_name">店铺介绍</h1>
    <textarea class="shop_introduce" placeholder="具体介绍一下店铺的情况" id="shop_introduce" ><?php echo $_smarty_tpl->tpl_vars['business']->value['desc'];?>
</textarea>
    <h1 class="title_name">上传店招图片</h1>
    <div class="ref_upload_photo clearfix dz_img_wrap">
        <!--z-index 设置是为了响应点击事件，防止del事件不触发-->
        <?php if ($_smarty_tpl->tpl_vars['business']->value['sign_pic']!=''){?>
        <div class="add_img fl" style="z-index: 9999">
            <img src="<?php echo $_smarty_tpl->tpl_vars['business']->value['sign_pic'];?>
" class="img-responsive">
            <div class="del_img" onclick="del_img(this)">
                <a class="icon_add_person icon_shanchu_red" href="javascript:;"></a>
            </div>
        </div>
        <?php }?>
        <a href="javascript:;" <?php if ($_smarty_tpl->tpl_vars['business']->value['sign_pic']!=''){?>style="display:none;"<?php }?> class="add fl add_img_control" title="上传店招图片" id="add_upload">
            <div class="icon_add_person icon_tianjia_pic"></div>
        </a>
        <input id="img_uploader_dz" name="file" style="display:none" type="file" onchange="upload_image(this);" data-max="1"/>
		<input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['up_token']->value;?>
" />
    	<input type="hidden" name="image_domain" id="image_domain" value="<?php echo $_smarty_tpl->tpl_vars['image_domain']->value;?>
" />
        <input type="hidden" class="img_url" id="img_url" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['sign_pic'];?>
" />
    </div>
    
    <h1 class="title_name">上传环境图片</h1>
    <div class="ref_upload_photo clearfix ref_upload_photo_down">
        <?php  $_smarty_tpl->tpl_vars['evn_pic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['evn_pic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['evn_pics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['evn_pic']->key => $_smarty_tpl->tpl_vars['evn_pic']->value){
$_smarty_tpl->tpl_vars['evn_pic']->_loop = true;
?>
        <div class="add_img fl" style="z-index: 9999">
            <img src="<?php echo $_smarty_tpl->tpl_vars['evn_pic']->value;?>
" class="img-responsive">
            <div class="del_img" onclick="del_img(this)">
                <a class="icon_add_person icon_shanchu_red" href="javascript:;"></a>
            </div>
        </div>
        <?php } ?>
        <a href="javascript:;" class="add fl out_border" <?php if (count($_smarty_tpl->tpl_vars['evn_pics']->value)==5){?>style="display:none;"<?php }?> title="上传环境图片" id="add_upload2">
            <div class="icon_add_person icon_tianjia_pic"></div>
        </a>
        <input id="img_uploader_hj" name="file" style="display:none" type="file" onchange="upload_image(this);" data-max="5"/>
        <input type="hidden" name="img_url " class="img_url" id="img_url2" value="<?php echo $_smarty_tpl->tpl_vars['evn_pic']->value;?>
" />
    </div>
    <h1 class="title_name">添加营业执照</h1>
    <div class="ref_upload_photo clearfix">
        <?php if ($_smarty_tpl->tpl_vars['business']->value['license_pic']!=''){?>
        <div class="add_img fl" style="z-index: 9999">
            <img src="<?php echo $_smarty_tpl->tpl_vars['business']->value['license_pic'];?>
" class="img-responsive">
            <div class="del_img" onclick="del(this)">
                <a class="icon_add_person icon_shanchu_red" href="javascript:;"></a>
            </div>
        </div>
        <?php }?>
        <a href="javascript:;" class="add fl add_img_control" <?php if ($_smarty_tpl->tpl_vars['business']->value['license_pic']!=''){?>style="display:none;"<?php }?> title="添加营业执照" id="add_upload3">
            <div class="switch_on icon_add_person icon_tianjia_pic"></div>
        </a>
        <input id="img_uploader_yz" name="file" style="display:none" type="file" onchange="upload_image(this);" data-max="1"/>
        <input type="hidden" name="img_url " class="img_url" id="img_url3" value="<?php echo $_smarty_tpl->tpl_vars['business']->value['license_pic'];?>
" />
    </div>
    <!--todo 固定在底部的提交-->
    <!--<div class="footer_empty"></div>-->
    <div class="footer_fixed">
        <p class="whether_agree">
            <span class="icon_control_small icon_market icon_select_rect icon_selected_rect"></span>
            <span>已阅读并同意</span><span class="blue" onclick="location.href='/Index/help_detail'">《店都商铺入驻协议》</span>
        </p>
        <div class="submit" id="submit">确认提交</div>
        <input type="hidden" id="whether_selected" value="1">
    </div>
</form>
<!--todo 模态框提示-->
<div class="modal_tips">
    <div class="modal_content">
        <div class="icon_add_person icon_shanchutishi"></div>
        <p class="text">让利比设置不得低于<span id="m_rate"></span>%<br/>请重新设置</p>
        <div class="tips_text">我知道了</div>
    </div>
</div>
<!--todo  地图弹框-->
<div class="modal_map">
    <div class="map_content">
        <div id="allmap2" style="height:  500px;width: 100%"></div>
        <p id="map_address" style="font-size: 18px;"></p>
    </div>
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
	
<!--<script src="/Public/Js/jquery/ajaxupload.3.5.js"></script>-->
<script src="/Public/Js/front/front_js/upload_fuwu_img.js" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BQLHGlffjbXC30bFDcpIQkHIkaxKBBe6&services=true"></script>

<script>
    $('.whether_agree .icon_select_rect').on('click',function(){
        $(this).toggleClass('icon_selected_rect');
        if($(this).hasClass('icon_selected_rect')){
            $('#whether_selected').val(1);
        }
        else{
            $('#whether_selected').val('');
        }
    })
</script>
<script type="text/javascript">
	if(!is_ios()){
		$("input[name=file]").attr({
			'capture':'camera',
			'accept':'image/*'
		});
	}
    $(function(){
        $('.select_matter').each(function(index,element){
            if($(this).val()=='0'){
                $(this).removeClass('active');
            }
            else{
                $(this).addClass('active');
            }
        })
    });

    if($("#area_id").val()!='0'){
        $(this).addClass('active');
    }
    /*todo 地图控制*/
//    $('#map_position').on('click',function(){
//        $('.modal_map').show().css('display','flex');
//        //getAddr();
//        document.body.classList.add('bodyhide');
//    });
//    $('.modal_map').on('click',function(){
//        $(this).hide();
//        document.body.classList.remove('bodyhide');
//    });
//    $('.modal_map .map_content').on('click',function(){
//        event.stopPropagation();/*todo 阻止冒泡*/
//    });
    /*todo 比例input获取焦点*/
    $('#benefit_percent,#per_consume').on('focus',function(){
        $(this).addClass('active');
        $(this).next().show();
        $('#per_consume')[0].setAttribute("placeholder","");
    });
    $('#benefit_percent,#per_consume').on('keyup',function(){
        var length=$(this).val().length;
        if(length==0){
            $(this).removeClass('active');
            $(this).next().hide();
            $('#per_consume')[0].setAttribute("placeholder","请输入人均消费金额");
        }
        else{
            $(this).addClass('active');
            $(this).next().show();
        }
    });
    /*todo 当前页面的返回按钮*/
    $('#current_page_arrow').on('click',function(){
        history.go(-1);
    });
    $('.select_matter').change(function(){
        var val=Number($(this).val());
        if(val>0){
            $(this).addClass('active');
        }
        else{
            $(this).removeClass('active');
        }
    });
    var img_url_total=[];
    function del(obj){
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
    // todo 上传店招图片
//  new AjaxUpload("#add_upload", {
//      action: "/Global/upload_image",
//      name: "imgFile",
//      responseType: "json",
//      onSubmit: function(){
//          /*  show_alert('正在上传');*/
//      },
//      onChange: function(file, extension){
//          if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//              return true;
//          }
//          else {
//              show_alert('暂不支持该图片格式！');
//              return false;
//          }
//      },
//      onComplete: function(file, response){
//          if (response.status === 0) {
//              show_alert(response.msg);
//          }
//          else if (response.status === 1) {
//                  var html;
//              html='<div class="add_img fl"><img src="'+response.img_url+'" class="img-responsive"><div class="del_img" onclick="del(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a> </div></div>';
//                  $('#add_upload').before(html);
//                  $('#add_upload').hide();
//                  $('#add_upload').siblings('input[type="file"]').hide();
//                  $('#img_url').val(response.img_url);
//          }
//      }
//  });
//  //todo 上传环境图片
//  new AjaxUpload("#add_upload2", {
//      action: "/Global/upload_image",
//      name: "imgFile",
//      responseType: "json",
//      onSubmit: function(){
//      },
//      onChange: function(file, extension){
//          if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//              return true;
//          }
//          else {
//              show_alert('暂不支持该图片格式！');
//              return false;
//          }
//      },
//      onComplete: function(file, response){
//          if (response.status === 0) {
//              show_alert(response.msg);
//          }
//          else if (response.status === 1) {
//              var html;
//              html='<div class="add_img fl"><img src="'+response.img_url+'" class="img-responsive"><div class="del_img" onclick="del(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a> </div></div>';
//              $('#add_upload2').before(html);
//              img_url_total.push(response.img_url);
//              console.log(img_url_total);
//              var length=$('#add_upload2').parent().find('.add_img').length;
//              if(length==5){
//                  $('#add_upload2').hide();
//              }
//          }
//      }
//  });
    // todo 添加营业执照
//  new AjaxUpload("#add_upload3", {
//      action: "/Global/upload_image",
//      name: "imgFile",
//      responseType: "json",
//      onSubmit: function(){
//          /*  show_alert('正在上传');*/
//      },
//      onChange: function(file, extension){
//          if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
//              return true;
//          }
//          else {
//              show_alert('暂不支持该图片格式！');
//              return false;
//          }
//      },
//      onComplete: function(file, response){
//
//          console.log(response);
//          if (response.status === 0) {
//              show_alert(response.msg);
//          }
//          else if (response.status === 1) {
//              /*if($('.switch_on').is(":hidden")){
//                  $('#add_upload3 img').attr('src',response.img_url);
//              }
//              else{
//                  $('.switch_on').hide();
//                  var html;
//                  html='<img src="'+response.img_url+'" class="img-responsive">';
//                  $('#add_upload3').append(html);
//              }*/
//              var html;
//              html='<div class="add_img fl"><img src="'+response.img_url+'" class="img-responsive"><div class="del_img" onclick="del(this)"><a class="icon_add_person icon_shanchu_red" href="javascript:;"></a> </div></div>';
//              $('#add_upload3').before(html);
//              $('#add_upload3').hide();
//              $('#add_upload3').siblings('input[type="file"]').hide();
//              $('#img_url3').val(response.img_url);
//          }
//      }
//  });
    
    $('.modal_tips').on('click',function(){
        $(this).hide();
        document.body.classList.remove('bodyhide');
    });
    $('#submit').on('click',function(){
        var whether_selected=Number($('#whether_selected').val());
        var person_name=$('#person_name').val();
        var shop_tel=$('#shop_tel').val();
        var shop_name=$('#shop_name').val();
        var industry_choose=Number($('#industry_choose').val());
        var shop_type=Number($('#shop_type').val());
//        var benefit_percent=$('#benefit_percent').val();
        var per_consume=$('#per_consume').val();
        var province_id = Number($('#province_id').val());
        var city_id = Number($('#city_id').val());
        var area_id = Number($('#area_id').val());
        var detail_address = $('#detail_address').val()+'-'+$('#address1').val();
        //var address=$('#address1').val();
        //alert(detail_address);
      //  var address=$('#address').val();
        var shop_introduce=$('#shop_introduce').val();
        var sign_pic=$('#add_upload').parent().find('img').eq(0).attr('src');/*todo 上传店招图片*/
        var evn_pics=$('#add_upload2').parent().find('img');/*todo  上传环境图片*/
        var license_pic=$('#add_upload3').parent().find('img').eq(0).attr('src');/*todo 上传营业执照图片*/
        var latitude = $("#detail_address").attr("data-latitude");
        var longitude = $('#detail_address').attr("data-longitude");
        var mail = $('#mail').val();
        var mail_reg = /\w@\w*\.\w/;
  /*      var business_license= $('#business_license').val();
        var business_license_type= $('#business_license_type').val();*/
        var full_name=$('#full_name').val();
        var category_id=$('#category_id').val();
        var evn_pic = "";
        for(var i=0;i<evn_pics.length;i++){
            if(i!=0){
                evn_pic+="," + evn_pics.eq(i).attr("src");
            }else{
                evn_pic+=evn_pics.eq(i).attr("src");
            }
        }

        var tel_reg = /^1[34578]\d{9}$/gi;

        if (!person_name){
            show_alert('对不起，请填写姓名！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#person_name').focus();
            },1000)
            return false;
        }
        if(!shop_tel){
            show_alert('对不起，请填写手机号码！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_tel').focus();
            },1000)
            return false;
        }
        if (!tel_reg.test(shop_tel))
        {
            show_alert('对不起，请填写正确的手机号码！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_tel').focus();
            },1000)
            return false;
        }
        if(!shop_name){
            show_alert('对不起，请填写店铺名称！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_name').focus();
            },1000)
            return false;
        }
        if(!full_name){
            show_alert('对不起，请填写店铺全称！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_name').focus();
            },1000)
            return false;
        }
      /*  if(!industry_choose){
            show_alert('对不起，请填写店铺所在行业！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#industry_choose').focus();
            },1000)
            return false;
        }*/
        if(!shop_type){
            show_alert('对不起，请填写店铺类型！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        if(!category_id){
            show_alert('对不起，请选择营业类型！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        if(!mail_reg.test(mail)){
            show_alert('对不起，请填写正确的邮箱！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        /*if(!business_license){
            show_alert('对不起，请填写营业执照号！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }
        if(!business_license_type){
            show_alert('对不起，请填选择营业执照类型！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#shop_type').focus();
            },1000)
            return false;
        }*/
//        if(!benefit_percent){
//            show_alert('对不起，请填写让利比！');
//            setTimeout(function(){
//                $('.modal_alert').hide();
//                $('#benefit_percent').focus();
//            },1000)
//            return false;
//        }
//        if(benefit_percent){
//            if(benefit_percent<0.6){
//                 $('.modal_tips').show();
//                 document.body.classList.add('bodyhide');
//                return false;
//            }
//        }
        var min_rate = $("#industry_choose").find("option:selected").attr("min_rate");
//        if(benefit_percent*1.0<min_rate){
//            $('#m_rate').html(min_rate);
//            $('.modal_tips').show();
//            document.body.classList.add('bodyhide');
//            return false;
//        }
        if(!per_consume){
            show_alert('对不起，请填写人均消费！');
            setTimeout(function(){
                $('.modal_alert').hide();
                $('#per_consume').focus();
            },1000)
            return false;
        }
        if (!province_id)
        {
            show_alert('对不起，请选择省份！');
            return false;
        }
        if (!city_id)
        {
            show_alert('对不起，请选择城市！');
            return false;
        }
        if (!area_id)
        {
            show_alert('对不起，请选择区/县！');
            return false;
        }
        if (!detail_address)
        {
            show_alert('对不起，请填写详细地址！');
            $('#detail_address').focus();
            return false;
        }

        if(latitude==""||longitude==""){
            show_alert('请在地图上选择地址');
            $('#detail_address').focus();
            return false;
        }
        if(!shop_introduce){
            show_alert('对不起，请填写店铺介绍信息！');
            $('#shop_introduce').focus();
            return false;
        }

        if(sign_pic==undefined||sign_pic=="") {
            show_alert("请上传店招");
            return;
        }
        if(evn_pic=="") {
            show_alert("请上传环境图片");
            return;
        }
        if(license_pic==undefined||license_pic=="") {
            show_alert("请上传营业执照");
            return;
        }
        if(!whether_selected){
            show_alert('请阅读并同意协议');
            return false;
        }
        $.ajax({
                    url:"",
                    type:"POST",
                    data:{
                        contacts: person_name,
                        contact_number: shop_tel,
                        business_name: shop_name,
                       /* industry_id:industry_choose,*/
                        business_classify_id:shop_type,
//                        rate:benefit_percent,
                        consumption:per_consume,
                        province_id: province_id,
                        city_id: city_id,
                        area_id: area_id,
                        address: detail_address,
                        desc:shop_introduce,
                        sign_pic:sign_pic,
                        evn_pic:evn_pic,
                        license_pic:license_pic,
                        latitude : latitude,
                        longitude : longitude,
                        mail:mail,
                  /*      business_license:business_license,
                        business_license_type:business_license_type,*/
                        full_name:full_name,
                        category_id:category_id
                    },
                    timeout:10000,
                    success:function(d){
                        //console.log(d);
                        if(d == 'success')
                        {
                            console.log('success');
                            location.href="/index/background_password/"
                        }
                        else
                        {
                            //console.log(d);
                            show_alert(d);
                        }
                    }
                });
    });
    /*todo textarea的高度自动控制*/
    $("#detail_address").each(function(){
        this.style.height = this.scrollHeight + "px";
    });
    $("#detail_address").on({
        input:function(){
            var _this = this;
            this.style.height = this.scrollHeight + "px";
            $(".detail_address_wrap").css({
                "height":_this.style.height
            });
        },
        propertychange:function(){
            this.style.height = this.scrollHeight + "px";
            $(".detail_address_wrap").css({
                "height":_this.style.height
            });
        }
    });
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

</script>

<!--百度地图-->
<!--<script type="text/javascript" src="http://developer.baidu.com/map/jsdemo/demo/convertor.js"></script>-->
<script type="text/javascript">

    //function getAddr() {
        var myCity = new BMap.LocalCity();
        myCity.get(myFun);
   // }


    function initMap(position) {
        var map = new BMap.Map("allmap");    // 创建Map实例
        //var point = new BMap.Point(116.331398,39.897445);
        var icon = new BMap.Icon('/Public/Images/point.png', new BMap.Size(40, 40), {
            anchor: new BMap.Size(20, 40)});
        
        var latitude = $("#detail_address").attr("data-latitude");
        var longitude = $('#detail_address').attr("data-longitude");
        var address =  $('#detail_address').val();
        if(latitude!=""&&longitude!=""){
            var point = new BMap.Point(longitude,latitude);
            var marker = new BMap.Marker(point,{icon:icon});
            //加上label提示
//            var label = new window.BMap.Label(address, { offset: new window.BMap.Size(20, -10) });
//            marker.setLabel(label);
            map.addOverlay(marker);
            map.centerAndZoom(point, 15);
        }else{
            var marker = new BMap.Marker(position,{icon:icon});
            map.addOverlay(marker);
            map.centerAndZoom(position, 15);
        }

        map.addControl(new BMap.NavigationControl());   //添加地图类型控件
//        map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
//        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        map.disableDoubleClickZoom()

        var geoc = new BMap.Geocoder();
        var p_x;
        var p_y;

        //记录第一次点击的坐标
        map.addEventListener("touchstart",function(e){
            p_x = e.jb.x;
            p_y = e.jb.y;

            //console.log(e.offsetY);
        });
//        map.addEventListener("touchend",function(e){
//            console.log(e.jb.x);
//            console.log(e.jb.x);
//            //console.log(e);
//            //console.log(e.offsetY);
//        });
        map.addEventListener("touchend", function (e) {
            //手指进行拖动了就不设置标注
            if(Math.abs(p_x - e.jb.x)>5||Math.abs(p_y - e.jb.y)>5){
                return;
            }

            var pt = e.point;
            map.clearOverlays();
            var marker = new BMap.Marker(pt, {icon: icon});
            var marker = new BMap.Marker(pt, {icon: icon});
            map.addOverlay(marker);
            geoc.getLocation(pt, function (rs) {
                var addComp = rs.addressComponents;
                console.log(addComp);
                console.log(e.point.lng + "," + e.point.lat);

                $('#detail_address').attr("data-longitude",e.point.lng);
                $('#detail_address').attr("data-latitude",e.point.lat);
                $('#detail_address').val('');
                //$('#map_address').html(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                $('#detail_address').val(addComp.province + addComp.city  + addComp.district + addComp.street + addComp.streetNumber);

            });
        });
    }

    function myFun(result){
        var cityName = result.name;
        var geolocation = new BMap.Geolocation();
        var gc = new BMap.Geocoder();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                //alert('您的位置：'+r.point.lng+','+r.point.lat);
                var pt = r.point;
                initMap(pt);
//                gc.getLocation(pt, function (rs) {
//                    var addComp = rs.addressComponents;
//
//                    var province = addComp.province;
//                    var city = addComp.city;
//                    var area = addComp.district;
//
//                    if (province != "" && city != "" && area != "") {
//                        // alert(province);
//                        alert("当前定位城市:"+province+city+area);
//                        window.location.href="/Index/home_index/area/"+area+"/lat/"+r.point.lat+"/lng/"+r.point.lng;
//
//                    }
//                    //alert("当前定位城市:"+cityName);
//                    //
//                });
            }
            else {
                alert('failed'+this.getStatus());
            }
        },{enableHighAccuracy: true})

    }



</script>

<script src="__JS__/front/bbc.districtdata.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

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