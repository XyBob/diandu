<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 13:48:40
         compiled from "C:\wamp\www\diandu\Tpl\AcpBusiness\add_business.html" */ ?>
<?php /*%%SmartyHeaderCode:1240959758a383f2d58-25047739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19f474c9d3ce83c6c784037258142b86ea6fff90' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpBusiness\\add_business.html',
      1 => 1498540869,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1240959758a383f2d58-25047739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'system_config' => 0,
    'version' => 0,
    'ui_navPosMod' => 0,
    'ui_layoutMod' => 0,
    'my_menu_file' => 0,
    'mod_id' => 0,
    'key' => 0,
    'menu' => 0,
    'first_level' => 0,
    'menu_list' => 0,
    'link' => 0,
    'unread_message_num' => 0,
    'action_title' => 0,
    'action_src' => 0,
    'head_title' => 0,
    'my_menu_list' => 0,
    'menu_no' => 0,
    'limit_endtime' => 0,
    'limit_open' => 0,
    'limit_desc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59758a38dc496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59758a38dc496')) {function content_59758a38dc496($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
 - 管理中心 - <?php echo $_smarty_tpl->tpl_vars['system_config']->value['SHOP_TITLE'];?>
</title>
	<link rel="stylesheet" href="__ACPJS__/acpcomm.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">
	<link rel="stylesheet" href="__ACPCSS__/acpcomm-min.css">
	<link type="text/css" rel="stylesheet" href="__CSS__/acp/zoom.css" />
	<link rel="stylesheet" href="__PLG__/jPops/jquery.jpops.min-v3.css">
	<link type="text/css" rel="stylesheet" href="__ACPCSS__/tip.css" />
	<link href="__PUBLIC__/Css/front/layer.css?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" type="text/css" rel="stylesheet">
	<style>
	
	.time_string {
	    position: fixed;
	    top: 100px;
	    right: 0;
	    width: 160px;
	    color: #fff;
	    display: none;
	    background-color: #f8a31f;
	    padding: 10px;
	    font-size: 15px;
	    display: none;
	    text-align: center;
	    line-height: 26px;
	}
	

	</style>
	
<link rel="stylesheet" href="__KD__/themes/default/default.css"/>
<link rel="stylesheet" href="/Public/Css/acp/AcpNotice/add_notice.css" type="text/css"/>

</head>
<body id="body">
	<div id="div1" style="display:none;"></div>
	<div class="header <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='fixed'){?>fixed<?php }?>" id="j-nav">
		<div class="layout blue clearfix <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fixed'){?>fixed<?php }?>">
			<div class="brandWrap fl">
				<h1 class="logo">
					<a href="/"><img src="__PUBLIC__/Images/acp/logo.png"></a>
				</h1>
				<a href="javascript:;" class="brandTgl j-togggle-sidebar"><i class="ic16 ic-menu"></i></a>
			</div>
			<!-- end brandWrap -->
			<ul class="nav fl clearfix">
			<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['my_menu_file']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>
				<li class="nav-list">
					<a href="javascript:;" class="nav-list-main j-navsub-toggle <?php if ($_smarty_tpl->tpl_vars['mod_id']->value==$_smarty_tpl->tpl_vars['key']->value){?>active<?php }?>">
						<span><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>

							<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['num'])&&$_smarty_tpl->tpl_vars['menu']->value['num']>0){?>
								(<b><?php echo $_smarty_tpl->tpl_vars['menu']->value['num'];?>
</b>)
							<?php }?>
						</span>
						<i class="navArrow ic8 ic-navarrow-down"></i>
					</a>
					<dl class="nav-list-sub">
					<?php  $_smarty_tpl->tpl_vars['menu_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_list']->_loop = false;
 $_smarty_tpl->tpl_vars['first_level'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_list']->key => $_smarty_tpl->tpl_vars['menu_list']->value){
$_smarty_tpl->tpl_vars['menu_list']->_loop = true;
 $_smarty_tpl->tpl_vars['first_level']->value = $_smarty_tpl->tpl_vars['menu_list']->key;
?>
						<dt><?php echo $_smarty_tpl->tpl_vars['first_level']->value;?>
</dt>
						<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['link']->value['in_menu']==''&&!isset($_smarty_tpl->tpl_vars['link']->value['in_top'])){?>
							<dd>
								<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['mod_do_url'];?>
/mod_id/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>

									<?php if (isset($_smarty_tpl->tpl_vars['link']->value['num'])&&$_smarty_tpl->tpl_vars['link']->value['num']>0){?>
										(<b class="colorRed"><?php echo $_smarty_tpl->tpl_vars['link']->value['num'];?>
</b>)
									<?php }?>
								</a>
							</dd>
						<?php }?>
						<?php } ?>
					<?php } ?>
						</dl>
					<!-- end nav-list-sub -->
				</li>
			<?php } ?>
			</ul>
			<!-- end nav -->
			<ul class="nav fr mgr10 clearfix">
				<!-- 站内信先注释，加入站内信功能时去除注释 -->
                <!--<li class="nav-list">
                	<?php if ($_smarty_tpl->tpl_vars['unread_message_num']->value){?>
                    <a href="/AcpMessage/waiting_reply_message/mod_id/2" class="nav-list-main onlyicon">
                        <i class="navArrow ic16 ic-envelope"></i>
                    </a>
                    <span class="nav-mailcount">
                    	<?php echo $_smarty_tpl->tpl_vars['unread_message_num']->value;?>

                    </span>
                    <?php }else{ ?>
                    <a href="/AcpMessage/list_message/mod_id/2" class="nav-list-main onlyicon">
                        <i class="navArrow ic16 ic-envelope"></i>
                    </a>
                    <span class="nav-mailcount"></span>
                    <?php }?>
				</li>-->
				<li id="div2" class="nav-list">
                <li class="nav-list">
                    <a href="javascript:;" class="nav-list-main onlyicon j-navsub-toggle">
                        <i class="navArrow ic16 ic-cog"></i>
                    </a>
                    <dl class="nav-list-sub layoutCtrl algRight">
                        <dt>布局方式</dt>
                        <dd>
                            <a href="javascript:;" class="j-layoutCtrl" data-type="fluid"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fixed'){?>white<?php }?>"></i>流式布局</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" class="j-layoutCtrl" data-type="fixed"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fluid'||$_smarty_tpl->tpl_vars['ui_layoutMod']->value==''){?>white<?php }?>"></i>固定宽度</a>
                        </dd>
                        <dt class="ie6hide">导航栏固定方式</dt>
                        <dd class="ie6hide">
                            <a href="javascript:;" class="j-navCtrl" data-type="default"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='fixed'){?>white<?php }?>"></i>默认</a>
                        </dd>
                        <dd class="ie6hide">
                            <a href="javascript:;" class="j-navCtrl" data-type="fixed"><i class="gicon-ok-sign <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='default'||$_smarty_tpl->tpl_vars['ui_navPosMod']->value==''){?>white<?php }?>"></i>固定</a>
                        </dd>
                    </dl>
                </li>
                <li class="nav-list">
                    <a href="javascript:;" class="nav-list-main onlyicon j-navsub-toggle">
                        <i class="navArrow ic16 ic-user"></i>
                    </a>
                    <dl class="nav-list-sub algRight">
                        <dd><a href="javascript:;"><?php echo smarty_modifier_truncate($_SESSION['user_info']['username'],15,"...",true);?>
</a></dd>
                        <dd><a href="/" target="_blank">首页</a></dd>
                        <dd><a href="/logout">退出</a></dd>
                    </dl>
                </li>
            </ul>
            <!-- end nav -->
		</div>
	</div>
	<!-- end header -->

	<div class="layout <?php if ($_smarty_tpl->tpl_vars['ui_navPosMod']->value=='fixed'){?>pdt40<?php }?> <?php if ($_smarty_tpl->tpl_vars['ui_layoutMod']->value=='fixed'){?>fixed<?php }?>" id="j-cont-ly">
		<div class="container clearfix">
			<div class="content fr">
				<div id="main">
					<div class="breadcrumbs">
						<a href="/acp">首页</a>
                        <?php if ($_smarty_tpl->tpl_vars['action_title']->value){?>
                        <span class="ic8 ic-menuarrow-right"></span>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['action_src']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['action_title']->value;?>
</a>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['head_title']->value){?>
                        <span class="ic8 ic-menuarrow-right"></span>
                        <a href="javascript:;" class="colorBlack"><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</a>
                        <?php }?>
						<a href="javascript:;" class="closebrdc j-closebrdc"><i class="gicon-remove"></i></a>
					</div>
					<!-- end breadcrumbs -->
					<div class="main-content">
					
<!--<script src="/Public/Plugins/native/native_event.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
<form id="J_FormNotice" action="" method="post">
    <div class="formitems inline">
        <div class="form-controls">
            <span >用户信息部分</span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>用户名：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="username" id="username" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>密码：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <div class="form-controls">
            <span >下面是店铺信息部分</span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>商店全名：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="full_name" id="full_name" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['full_name'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div><div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>商店简称：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="business_name" id="business_name" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_name'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>联系人：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="contacts" id="contacts" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contacts'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>联系电话：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="contact_number" id="contact_number" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>店铺分类：</label>
        <div class="form-controls">
            <!--<input type="text" placeholder="" class="xlarge" readonly  value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_classify'];?>
">-->
            <!--<span class="fi-help-text hide"></span>-->
            <select class="select_matter" id="business_classify_id" name="business_classify_id">
                <option value="0">点击选择店铺类型</option>
                <?php  $_smarty_tpl->tpl_vars['classify'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['classify']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_classify_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['classify']->key => $_smarty_tpl->tpl_vars['classify']->value){
$_smarty_tpl->tpl_vars['classify']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['classify']->value['business_classify_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['business_classify_id']==$_smarty_tpl->tpl_vars['classify']->value['business_classify_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['classify']->value['business_classify_name'];?>
</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>营业类型：</label>
        <div class="form-controls">
            <!--<input type="text" placeholder="" class="xlarge" readonly  value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_classify'];?>
">-->
            <!--<span class="fi-help-text hide"></span>-->
            <select class="select_matter" id="category_id" name="category_id">
                <option value="0">点击营业类型</option>
                <option value="2016062900190371" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2016062900190371'){?>selected<?php }?>>政府/社会组织</option>
                <option value="2016062900190337" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2016062900190337'){?>selected<?php }?>>专业销售/批发</option>
                <option value="2016062900190296" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2016062900190296'){?>selected<?php }?>>医疗健康</option>
                <option value="2016062900190124" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2016062900190124'){?>selected<?php }?>>爱车</option>
                <option value="2016042200000148" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2016042200000148'){?>selected<?php }?>>教育培训</option>
                <option value="2015091000052157" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2015091000052157'){?>selected<?php }?>>超市便利店</option>
                <option value="2015080600000001" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2015080600000001'){?>selected<?php }?>>航旅</option>
                <option value="2015063000020189" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2015063000020189'){?>selected<?php }?>>生活服务</option>
                <option value="2015062600004525" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2015062600004525'){?>selected<?php }?>>休闲娱乐</option>
                <option value="2015062600002758" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2015062600002758'){?>selected<?php }?>>购物</option>
                <option value="2015050700000000" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['category_id']=='2015050700000000'){?>selected<?php }?>>美食</option>
            </select>
        </div>
    </div>
    <!--<div class="formitems inline">-->
        <!--<label class="fi-name"><span class="colorRed">*</span>行业：</label>-->
        <!--<div class="form-controls">-->
            <!--&lt;!&ndash;<input type="text" placeholder="" class="xlarge"  readonly value="<?php if ($_smarty_tpl->tpl_vars['business_info']->value['industry_id']==1){?>普通店铺<?php }else{ ?>菜市场<?php }?>">&ndash;&gt;-->
            <!--&lt;!&ndash;<span class="fi-help-text hide"></span>&ndash;&gt;-->
            <!--<select class="select_matter" id="industry_id" name="industry_id">-->
                <!--<option value="0">点击选择行业</option>-->
                <!--<?php  $_smarty_tpl->tpl_vars['industry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['industry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_industry_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['industry']->key => $_smarty_tpl->tpl_vars['industry']->value){
$_smarty_tpl->tpl_vars['industry']->_loop = true;
?>-->
                <!--<option value="<?php echo $_smarty_tpl->tpl_vars['industry']->value['industry_id'];?>
" min_rate="<?php echo $_smarty_tpl->tpl_vars['industry']->value['rate']*100;?>
" <?php if ($_smarty_tpl->tpl_vars['business_info']->value['industry_id']==$_smarty_tpl->tpl_vars['industry']->value['industry_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry']->value['industry_name'];?>
</option>-->
                <!--<?php } ?>-->
            <!--</select>-->
        <!--</div>-->
    <!--</div>-->
 <!--   <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>执照类型：</label>
        <div class="form-controls">
            &lt;!&ndash;<input type="text" placeholder="" class="xlarge"  readonly value="<?php if ($_smarty_tpl->tpl_vars['business_info']->value['industry_id']==1){?>普通店铺<?php }else{ ?>菜市场<?php }?>">&ndash;&gt;
            &lt;!&ndash;<span class="fi-help-text hide"></span>&ndash;&gt;
            <select class="select_matter" id="business_license_type" name="business_license_type">
                <option value="">点击选择店铺类型</option>
                <option value="NATIONAL_LEGAL_MERGE" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='NATIONAL_LEGAL_MERGE'){?>selected<?php }?>>营业执照（多证合一）</option>
                <option value="NATIONAL_LEGAL" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='NATIONAL_LEGAL'){?>selected<?php }?>>营业执照</option>
                <option value="INST_RGST_CTF" <?php if ($_smarty_tpl->tpl_vars['business']->value['business_license_type']=='INST_RGST_CTF'){?>selected<?php }?>>事业单位法人证书</option>
            </select>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>经营执照：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="business_license" id="business_license" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['contact_number'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div> <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>邮箱：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="mail" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['mail'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>-->

    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>让利比例：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="small" name="rate" id="rate" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['rate']*100;?>
" id="rate">%
            <span class="fi-help-text hide"></span>
        </div>

        <input type="hidden" name="old_rate" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['rate'];?>
">

    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>人均消费：</label>
        <div class="form-controls">
            <input type="number" placeholder="" class="small" name="consumption" id="consumption" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
">元
            <span class="fi-help-text hide"></span>
        </div>
    </div>


    <!-- <div class="formitems inline">
         <label class="fi-name"><span class="colorRed">*</span>省：</label>
         <div class="form-controls">
             <input type="text" placeholder="" class="xlarge"  value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['province'];?>
" >
             <span class="fi-help-text hide"></span>
         </div>
         <label class="fi-name"><span class="colorRed">*</span>市：</label>
         <div class="form-controls">
             <input type="text" placeholder="" class="xlarge"  value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['city'];?>
">
             <span class="fi-help-text hide"></span>
         </div>
         <label class="fi-name"><span class="colorRed">*</span>区：</label>
         <div class="form-controls">
             <input type="text" placeholder="" class="xlarge"  value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['area'];?>
">
             <span class="fi-help-text hide"></span>
         </div>
     </div>-->
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>请选择省市区：</label>

        <div class="form-controls">
            省：<select name="province_id" id="province_id" style="width: 120px">
            <option value="0">-请选择-</option>
            <?php  $_smarty_tpl->tpl_vars['province'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['province']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['province']->key => $_smarty_tpl->tpl_vars['province']->value){
$_smarty_tpl->tpl_vars['province']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['province']->value['province_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['province']->value['province_name'];?>
</option>
            <?php } ?>
        </select>
            市：<select name="city_id" id="city_id" style="width: 120px">
            <option value="0">-请先选择省-</option>
             <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
             <option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['city_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['city']->value['city_name'];?>
</option>
             <?php } ?>
        </select>
            区:&nbsp;<select name="area_id" id="area_id" style="width: 120px">
            <option value="0">-请先选择市-</option>
             <?php  $_smarty_tpl->tpl_vars['area'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['area']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['area_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['area']->key => $_smarty_tpl->tpl_vars['area']->value){
$_smarty_tpl->tpl_vars['area']->_loop = true;
?>
             <option value="<?php echo $_smarty_tpl->tpl_vars['area']->value['area_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['area']->value['area_name'];?>
</option>
             <?php } ?>
        </select>
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <!-----地图部分------>
    <div class="map_container" id="map_container" style="width:800px;height:500px;margin-left: 180px"></div><br>
    <div class="formitems inline">
        <label class="fi-name">搜索：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="suggestId" id="suggestId" value="">
            <div id="searchResultPanel" class="xlarge" style="border:1px solid #C0C0C0;height:auto; display:none;"></div>
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>店铺地址：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="address" id="address" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['address'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
        <label class="fi-name"><span class="colorRed">*</span>详细地址：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" name="address_detail" id="address_detail" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['address2'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
        <label class="fi-name"><span class="colorRed"></span>经度：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge" readonly="readonly" name="longitude" id="longitude" value="">
        </div>
        <label class="fi-name"><span class="colorRed"></span>纬度：</label>
        <div class="form-controls">
            <input type="text" placeholder="" class="xlarge"  readonly="readonly" name="latitude" id="latitude" value="">
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>店铺介绍：</label>
        <div class="form-controls">
            <textarea name="desc"><?php echo $_smarty_tpl->tpl_vars['business_info']->value['desc'];?>
</textarea>
            <span class="fi-help-text hide"></span>
        </div>
    </div>

    <?php echo upload_image_widget($_smarty_tpl->tpl_vars['sign_pic']->value);?>

    <?php echo upload_image_widget($_smarty_tpl->tpl_vars['evn_pic']->value);?>

    <?php echo upload_image_widget($_smarty_tpl->tpl_vars['license_pic']->value);?>


    <div class="formitems inline">
        <div class="form-controls" >
            <span>下面是店铺绑定银行卡信息部分</span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>银行卡持卡人：</label>
        <div class="form-controls">
            <input  placeholder="" class="small" name="realname" id="realname" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>

    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>银行：</label>
        <div class="form-controls">
            <select name="bank_id" id="bank_id"  style="width: 120px">
                <option value="0" selected>请选择银行</option>
                <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bank_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['this']->value['bank_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['this']->value['bank_name'];?>
</option>
                <?php } ?>
            </select>
        </div>
    </div>


    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>开户行：</label>
        <div class="form-controls">
            <input  placeholder="" class="small" name="bank_branch" id="bank_branch" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>

    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>卡号：</label>
        <div class="form-controls">
            <input type="number" placeholder="" class="small" name="card_number" id="card_number" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>身份证号：</label>
        <div class="form-controls">
            <input type="number" placeholder="" class="small" name="id_card" id="id_card" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['consumption'];?>
">
            <span class="fi-help-text hide"></span>
        </div>
    </div>


    <div class="formitems inline">
        <label class="fi-name"></label>
        <div class="form-controls">
            <!--<input type="hidden" name="business_id" value="<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
">-->
            <button type="submit" class="btn btn-blue"><i class="gicon-check white"></i>添加</button>
            <!--<a  href="javascript:Select()" class="btn btn-blue" onclick="examine(<?php echo $_smarty_tpl->tpl_vars['business_info']->value['business_id'];?>
,false)">冻结商家</a>-->
        </div>

    </div>
</form>

					</div>
					<!-- end main-content -->
				</div>
				<!-- end main -->
			</div>
			<!-- end content -->
			<div id="sidebar" class="fl">
				
					<?php  $_smarty_tpl->tpl_vars['menu_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_list']->_loop = false;
 $_smarty_tpl->tpl_vars['first_level'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['my_menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_list']->key => $_smarty_tpl->tpl_vars['menu_list']->value){
$_smarty_tpl->tpl_vars['menu_list']->_loop = true;
 $_smarty_tpl->tpl_vars['first_level']->value = $_smarty_tpl->tpl_vars['menu_list']->key;
?>
					<dl class="menulist">
						<dt>
							<a href="" class="j-togglemenu">
								<i class="meunarrow ic8 ic-menuarrow-down"></i>
								<?php echo $_smarty_tpl->tpl_vars['first_level']->value;?>

							</a>
						</dt>
						<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['link']->value['in_menu']==''){?>
								<dd>
									<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['mod_do_url'];?>
/mod_id/<?php echo $_smarty_tpl->tpl_vars['mod_id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['id']==$_smarty_tpl->tpl_vars['menu_no']->value){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>

										<?php if (isset($_smarty_tpl->tpl_vars['link']->value['num'])&&$_smarty_tpl->tpl_vars['link']->value['num']>0){?>
											(<b><?php echo $_smarty_tpl->tpl_vars['link']->value['num'];?>
</b>)
										<?php }?>
									</a>
								</dd>
							<?php }?>
						<?php } ?>
					</dl>
					<?php } ?>
				
			</div>
			<!-- end sidebar -->
		</div>
		<!-- end container -->
	</div>
	<!-- 倒计时 -->
	<div class="time_string">
			<div>试用倒计时</div>
			<span id="t_d">00天</span>
		    <span id="t_h">00时</span>
		    <span id="t_m">00分</span>
		    <span id="t_s">00秒</span>
	</div>
	<!-- 提示层 by zhengzhen -->
	<p id="J_TipLayer" class="popTip" style="top: 110px; display: none;">
		<i></i>
		<span>正在加载，请稍后...</span>
	</p>
	<div id="J_TransMaskLayer" class="transMask" style="display: none;"></div>
	<script src="__JS__/jquery/jquery-1.8.3.min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__ACPJS__/acpcomm-min.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__PLG__/jPops/jquery.jpops.min-v3.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script type="text/javascript" src="__ACPJS__/tip.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="/Public/Plugins/native/native_event.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="__JS__/clipboard.min.js"></script>
	<script src="__JS__/jquery/zoom.min.js"></script>
<?php if (@UPLOAD_IMAGE_SCRIPT===true){?>
<script src="__JS__/jquery/ajaxupload.3.5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/common/upload_image.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php }?>
	<script src="__JS__/front/layer.m.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

	<!--<script type="text/javascript" src="__ACPJS__/new_order.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
	<script>
		var music = '/Public/msg.mp3';


    $('body').on('click','img',function(){
        var src = this.src;
        if (src) {
            window.open(src);
        }
    });
    //倒计时方法
    function GetRTime(){
    	var EndTime = '<?php echo $_smarty_tpl->tpl_vars['limit_endtime']->value;?>
';

	    var NowTime = Math.round(new Date().getTime()/1000);
	    var t =EndTime - NowTime;
	    // console.log(t);

	    var d=0;
	    var h=0;
	    var m=0;
	    var s=0;
	    if(t>=0){
	      d=Math.floor(t/60/60/24);
	      h=Math.floor(t/60/60%24);
	      m=Math.floor(t/60%60);
	      s=Math.floor(t%60);
	    }
	 
	 
	    document.getElementById("t_d").innerHTML = d + "天";
	    document.getElementById("t_h").innerHTML = h + "时";
	    document.getElementById("t_m").innerHTML = m + "分";
	    document.getElementById("t_s").innerHTML = s + "秒";
	  }
	  //当打开时调用倒计时
	  var limit_open = parseInt('<?php echo $_smarty_tpl->tpl_vars['limit_open']->value;?>
');
	  if(limit_open)
	  {
	  	window.setInterval(GetRTime,1000);
	  	setTimeout("$('.time_string').show()",1000);

	  }
	  
	  //倒计时描述
	  var time_desc = '<?php echo $_smarty_tpl->tpl_vars['limit_desc']->value;?>
';
	  	$('.time_string').on('hover', function() {
	  		layer.open({
		    content: time_desc,
		 	skin: 'msg',
		    time: 5 //5秒后自动关闭
		  });
	  	});

	  


	</script>
	
<!-- 编辑器 -->
<!--<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
<script type="text/javascript" src="__JS__/jquery/ajaxupload.3.5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<!--<script type="text/javascript" src="__ACPJS__/AcpNotice/notice_save.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
<script>
    var old_rate='<?php echo $_smarty_tpl->tpl_vars['business_info']->value['rate'];?>
';
</script>
<!--<script type="text/javascript" src="__JS__/jquery/jquery.min.js"></script>-->

<script >
    $('#province').change(function () {
        var province_id = $("#province").find('option:selected').val();
        // console.log(province_id);
        $.ajax({
            type: 'post',
            url: '/AcpBusiness/get_city',
            data: {province_id: province_id},
            dataType: 'json',
            success: function (data) {
                var len = data.length;
                var i = 0;
                var html = ' <option value="">-请选择-</option>';
                for (i = 0; i < len; i++) {
                    html += ' <option value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                }
                $("#city").html(html);
                $("#area").html('<option value="">-请选择-</option>');
            }
        });
    });

    $('#city').change(function () {
        var city_id = $("#city").find('option:selected').val();
        $.ajax({
            type: 'post',
            url: '/AcpBusiness/get_area',
            data: {city_id: city_id},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var len = data.length;
                var i = 1;
                var html = ' <option value="">-请选择-</option>';
                for (i = 1; i < len; i++) {

                    html += ' <option value="' + data[i].area_id + '">' + data[i].area_name + '</option>';
                }
                $("#area").html(html);
            }
        });
    });

</script>
<script>
    function examine(business_id,flag){
        $.jPops.confirm(
            {
                title: "提示",
                content: "您确定这么做？",
                okBtnTxt: "确定",
                cancelBtnTxt: "取消",
                callback: function (r) {
                    if (r) {
                        $.post('/AcpBusiness/freeze_business', {"business_id": business_id,flag:flag}, function (data, textStatus) {
                            console.log(data);
                            if (data.code == 1) {
                                alert(data.msg);
                                location.href='/AcpBusiness/get_business_list'
                            }
                            else {
                                alert(data.msg);
                            }
                        },'json');
                    }
                    return true;
                }
            });
    }
</script>

<!--<script type="text/javascript" src="__JS__/jquery/jquery.min.js"></script>-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BQLHGlffjbXC30bFDcpIQkHIkaxKBBe6"></script>
<script>
    var lat = '<?php echo $_smarty_tpl->tpl_vars['school_info']->value['center_lat'];?>
' || '28.1255940';
    var lng = '<?php echo $_smarty_tpl->tpl_vars['school_info']->value['center_lng'];?>
' || '120.9820840';
    
    var map;
    map = new BMap.Map("map_container");
    map.addControl(new BMap.NavigationControl()); //初始化地图控件
    map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.OverviewMapControl());
    //MapTypeControl：地图类型控件，默认位于地图右上方。
    map.addControl(new BMap.MapTypeControl());

    map.setDefaultCursor("url('bird.cur')");  //设置地图默认的鼠标指针样式
    map.enableScrollWheelZoom();        //启用滚轮放大缩小，默认禁用。

    //console.log("lng:"+lng+",lat:"+lat);
    var point = new BMap.Point(lng, lat);
    map.centerAndZoom(point,14);         //初始化地图中心点

    var marker = new BMap.Marker(point); //初始化地图标记
    var gc = new BMap.Geocoder();//地址解析类
    marker.enableDragging();             //标记开启拖拽
    map.addOverlay(marker);              //将标记添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE);
    marker.addEventListener("dragend",dragend);
    //添加标记拖拽监听
    /*marker.addEventListener("dragend", function(e){
     //获取地址信息
     //经度
     window.parent.document.getElementById("center_lng").value=e.point.lng;
     //维度
     window.parent.document.getElementById("center_lat").value=e.point.lat;
     gc.getLocation(e.point, function(rs){
     showLocationInfo(e.point, rs);
     });
     });*/
    var geoc = new BMap.Geocoder();
    map.addEventListener("onclick", function (e) {
        var pt = e.point;
        map.clearOverlays();
        var marker = new BMap.Marker(pt);

        map.addOverlay(marker);
        marker.setAnimation(BMAP_ANIMATION_BOUNCE);
        geoc.getLocation(pt, function (rs) {
            var addComp = rs.addressComponents;
            console.log(addComp);
            console.log(e.point.lng + "," + e.point.lat);
//
            $('#longitude').val(e.point.lng);
            $('#latitude').val(e.point.lat);
            //$('#address').attr("latitude",e.point.lat);
            $('#address').val('');
            //$('#map_address').html(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
            $('#address').val(addComp.province + addComp.city  + addComp.district + addComp.street + addComp.streetNumber);

        });
    });



    function dragend(e){
        window.parent.document.getElementById("center_lng").value=e.point.lng;
        //维度
        window.parent.document.getElementById("center_lat").value=e.point.lat;
        gc.getLocation(e.point, function(rs){
            showLocationInfo(e.point, rs);
        });
    }

    function G(id) {
        return document.getElementById(id);
    }
    var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
            {"input" : "suggestId"
                ,"location" : map
            });

    ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
        var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });

    var myValue;
    ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
        var _value = e.item.value;
        myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

        setPlace();
    });



    function setPlace(){
        map.clearOverlays();    //清除地图上所有覆盖物
        function myFun(){
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            map.centerAndZoom(pp, 18);
            marker = new BMap.Marker(pp);
            marker.enableDragging();
            map.addOverlay(marker);    //添加标注
            marker.setAnimation(BMAP_ANIMATION_BOUNCE);
            marker.addEventListener("dragend",dragend);

            $('#longitude').val(pp.lng);
            $('#latitude').val(pp.lat);
        }
        var local = new BMap.LocalSearch(map, { //智能搜索
            onSearchComplete: myFun
        });
        local.search(myValue);
    }
    
</script>

</body>
</html>
<?php }} ?>