<?php /* Smarty version Smarty-3.1.6, created on 2017-08-01 15:10:30
         compiled from "C:\wamp\www\diandu\Tpl\AcpConfig\menu_set.html" */ ?>
<?php /*%%SmartyHeaderCode:22797598029668b7a09-33011223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f827a5f2b0efba691f0c4647ef765dbb35d9cca2' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpConfig\\menu_set.html',
      1 => 1492479463,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22797598029668b7a09-33011223',
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
  'unifunc' => 'content_598029671c3f2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598029671c3f2')) {function content_598029671c3f2($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/acp/mg_shop.css"/>

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
					
	<!-- end header -->
	<div class="container clearfix">
		<!-- end sidebar -->
		<div class="contain" style="overflow-x:auto;">
        <!-- 代码扔这里 start -->
        	<div class="mgcon">
                <div class="mg-l">
                    <div class="mg-l-t"><span>菜单设置 </span></div>
                    <div class="alipay-mg">
                        <div class="alipay-nav">
                            <ul id="sortable" class="alipay-nav-ul clearfix">
                            	<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['custom_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>
                        	    <li id="<?php echo $_smarty_tpl->tpl_vars['menu']->value['loop1'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>class="hover j-alnav" <?php }else{ ?> class="j-alnav" <?php }?> obj_name="<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
">
                                    <span class="ali-nav-t j-alltext"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</span>
                                    <span class="ali-nav-i j-alledit"><input name="ali-nav-yiji" type="text" value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
" onKeyUp="CheckLength(this,12)"  /></span>
                                    <i class="move"></i><i class="del"></i>
                                </li>
                       			<?php } ?>
								<?php if ($_smarty_tpl->tpl_vars['menu_length']->value<3){?>
									<div class="alipay-nav-add"><a id="alipay-nav-edit" href="#"></a></div>
								<?php }?>
                            </ul>
                            
                            <div id="releaseali" class="releaseali">发布到微信</div>
                        </div>
                        
                        <div id="alipay-meun" class="alipay-meun">
                        <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['custom_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>
                            <div data="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" id="alipay-meun-<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" class="alipay-meun-c j-menudata" <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>style="display:block;"<?php }?>>
                            	<div class="alipay-meun-type j-meun-type">
                                	<a data="no" href="javascript:;" <?php if (!isset($_smarty_tpl->tpl_vars['menu']->value['sub_button'])){?> class="hover" <?php }?>>无子级菜单</a>
                                    <a data="have" href="javascript:;" <?php if (isset($_smarty_tpl->tpl_vars['menu']->value['sub_button'])){?> class="hover"<?php }?> >有子级菜单</a>
                                </div>
                                 <div class="alipay-meun-have j-alimenutab" id="alimeunh<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" <?php if ($_smarty_tpl->tpl_vars['menu']->value['sub_button']){?> style="display:block;" <?php }else{ ?> style="display:none;"<?php }?>>
                                    <div class="ali-meun-t">
                                        <span class="icon"></span>
                                        <span class="name">子菜单名称</span>
                                        <span class="type">子菜单类型</span>
                                        <span class="xsnr">显示内容</span>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div class="ali-meun-c">
                                        <ul>
                                            <?php  $_smarty_tpl->tpl_vars['sub_menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub_menu']->_loop = false;
 $_smarty_tpl->tpl_vars['sub_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value['sub_button']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub_menu']->key => $_smarty_tpl->tpl_vars['sub_menu']->value){
$_smarty_tpl->tpl_vars['sub_menu']->_loop = true;
 $_smarty_tpl->tpl_vars['sub_key']->value = $_smarty_tpl->tpl_vars['sub_menu']->key;
?>
											<li class="j-nav-erji" id="<?php echo $_smarty_tpl->tpl_vars['menu']->value['key'];?>
_<?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['sub_key'];?>
">
                                            	<!-- 移动图标 -->
                                                <div class="ali-meun-c-icon"><i class="move"></i><i class="del"></i></div>
                                                <!-- 子菜单名称 -->
                                                <div class="ali-meun-c-name j-meunparent">
                                                    <div class="ali-meun-c-name-text j-alltext"><?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['name'];?>
</div>
                                                    <div class="ali-meun-c-name-edit j-alledit">
                                                    	<input name="ali-meun-name-erji" type="text" value="<?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['name'];?>
"  onKeyUp="CheckLength(this,36)"/>
                                                    </div>
                                                </div>
                                                <!-- 子菜单类型 -->
                                                <div class="ali-meun-c-type j-meunparent">
													<div class="ali-meun-c-type-text j-alltext">
                                                        <?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['sub_menu']->value['type']){?>
                                                        跳转网址
                                                        <?php }elseif($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='media_id'){?>
                                                        推送图文
                                                        <?php }elseif($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='click'){?>
                                                        自动回复
                                                        <?php }elseif($_smarty_tpl->tpl_vars['sub_menu']->value['type']==4){?>
                                                        自定义页面
                                                        <?php }?>
                                                    </div>
													<div class="ali-meun-c-type-edit j-alledit">
														<i></i>
                                                        <span>
                                                        	<?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['sub_menu']->value['type']){?>
                                                            跳转网址
                                                            <?php }elseif($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='media_id'){?>
                                                            推送图文
                                                            <?php }elseif($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='click'){?>
                                                            自动回复
                                                            <?php }elseif($_smarty_tpl->tpl_vars['sub_menu']->value['type']==4){?>
                                                            自定义页面
                                                            <?php }?>
                                                        </span>
                                                        <select class="ali-m-se-type">
                                                        	<?php  $_smarty_tpl->tpl_vars['se'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['se']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['select_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['se']->key => $_smarty_tpl->tpl_vars['se']->value){
$_smarty_tpl->tpl_vars['se']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['se']->key;
?>
                                                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']==$_tmp1||!$_smarty_tpl->tpl_vars['sub_menu']->value['type']){?>
                                                           			<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['se']->value;?>
</option>
                                                                <?php }else{ ?>
                                                            		<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['se']->value;?>
</option>
                                                                <?php }?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
												</div>
                                                <!-- 显示内容 -->
                                                <div class="ali-meun-c-xsnr j-meunparent">
                                                	<div class="ali-meun-c-xsnr-text j-alltext"><?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='view'){?><?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['url'];?>
<?php }else{ ?>链接地址<?php }?></div>
                                                    <div class="ali-meun-c-xsnr-edit j-alledit">
                                                        <div class="textp-wap j-xsnrspan clearfix" <?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['sub_menu']->value['type']){?> style="display:block;" <?php }else{ ?> style="display:none;" <?php }?>>
															<span class=""><input type="text" onchange="change_value(this);" class="text" name="val" value="<?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='view'){?><?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['url'];?>
<?php }?>"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                                <input type="hidden" class="ali-meun-lihidden" 
                                                	ejid="<?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['sub_key'];?>
"
                                                    ejname="<?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['name'];?>
" 
                                                    ejtype="<?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['type'];?>
" 
                                                    name="" 
													value="<?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']=='view'){?><?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['url'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sub_menu']->value['key'];?>
<?php }?>"/>
                                            </li>
											<?php } ?>
										 </ul>
                                    </div>
                                    <!--添加二级菜单 -->
                                    <div class="ali-navmeun-add">
                                        <a href="#" class=""></a>
                                    </div>
                                </div>
                                 <div class="alipay-meun-no j-alimenutab" id="alimeunno<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" <?php if ($_smarty_tpl->tpl_vars['b']->value['sort']){?> style="display:none;" <?php }else{ ?> style="display:block;"<?php }?>>
                                    <div class="ali-meun-c-type-e j-nav-erji">
                                        <div class="ali-meun-c-type j-meunparent">
                                            <div class="ali-meun-c-type-text j-alltext">
                                                <?php if ($_smarty_tpl->tpl_vars['menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['menu']->value['type']){?>
												跳转网址<?php echo $_smarty_tpl->tpl_vars['b']->value['sort'];?>

                                                <?php }elseif($_smarty_tpl->tpl_vars['menu']->value['type']=='media_id'){?>
                                                推送图文
                                                <?php }elseif($_smarty_tpl->tpl_vars['menu']->value['type']=='click'){?>
                                                自动回复
                                                <?php }elseif($_smarty_tpl->tpl_vars['menu']->value['type']==4){?>
                                                自定义页面
                                                <?php }?>
                                            </div>
                                            <div class="ali-meun-c-type-edit j-alledit">
                                                <i></i>
                                                <span>
													<?php if ($_smarty_tpl->tpl_vars['menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['menu']->value['type']){?>
													跳转网址
													<?php }elseif($_smarty_tpl->tpl_vars['menu']->value['type']=='media_id'){?>
													推送图文
													<?php }elseif($_smarty_tpl->tpl_vars['menu']->value['type']=='click'){?>
													自动回复
													<?php }elseif($_smarty_tpl->tpl_vars['menu']->value['type']==4){?>
													自定义页面
													<?php }?>
                                                </span>
                                                <select class="ali-m-se-type">
													<?php  $_smarty_tpl->tpl_vars['se'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['se']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['select_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['se']->key => $_smarty_tpl->tpl_vars['se']->value){
$_smarty_tpl->tpl_vars['se']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['se']->key;
?>
														<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['sub_menu']->value['type']==$_tmp2||!$_smarty_tpl->tpl_vars['sub_menu']->value['type']){?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['se']->value;?>
</option>
														<?php }else{ ?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['se']->value;?>
</option>
														<?php }?>
													<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ali-meun-c-xsnr j-meunparent">
											<div class="ali-meun-c-name-text j-alltext"><?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
</div>
											<div class="ali-meun-c-xsnr-edit j-alledit">
                                                <!-- <div class="textp-wap j-xsnrspan clearfix" <?php if ($_smarty_tpl->tpl_vars['menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['menu']->value['type']){?> style="display:block;" <?php }else{ ?> style="display:none;" <?php }?>>
                                                    <span class="text"><?php if ($_smarty_tpl->tpl_vars['menu']->value['type']=='view'||$_smarty_tpl->tpl_vars['menu']->value['key']){?><?php echo $_smarty_tpl->tpl_vars['menu']->value['key'];?>
<input type="text" onchange="change_value(this);" class="text" name="val" value=""><?php }else{ ?>选择链接网址<?php }?></span>
                                                </div> -->
                                                <div class="textp-wap j-xsnrspan clearfix" <?php if ($_smarty_tpl->tpl_vars['menu']->value['type']=='view'||!$_smarty_tpl->tpl_vars['menu']->value['type']){?> style="display:block;" <?php }else{ ?> style="display:none;" <?php }?>>
													<span class="text"><input type="text" onchange="change_value(this);" class="text" name="val" value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"></span>
                                                </div>
                                            </div>
                                        </div> 
                                        <div style="clear:both;"></div>
                                        <input type="hidden" class="ali-meun-lihidden" ejtype="<?php echo $_smarty_tpl->tpl_vars['menu']->value['type'];?>
" name="" value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"/>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>    
                           </div>
                        <div id="alipay-button" class="alipay-button">
                            <span class="edit">编辑</span><span class="fulfil">完成</span><span class="cancel">取消</span>
                            <div style="clear:both;"></div>
                        </div>
                        <input type="hidden" id="alipay-meun-id" tabid="" radiodata="" data="" name="" value="" erjiid="" />
                        <input type="hidden" id="mg-platehid-id" name="" platename="" value="" modelid=""/>
                    </div>
                </div>
                <div class="mg-r">
                    <div class="mg-r-c">
                        <div id="mg-ali-ms" class="mg-ali-ms clearfix"></div>
                    </div>
                </div>
            	<div style="clear:both;"></div>
        	</div>
           
        <!-- 代码扔这里 end -->
        
		</div>
		<!-- end contain -->
	</div>
	<!-- end container -->
    <!-- 模版弹出层 start -->
    <div class="mg-plateshow-bg" id="mg-plateshow-bg"></div>
    <div class="mg-plateshow" id="mg-plateshow">
    	<div class="mg-plateshow-t">模版设置<i id="mg-plateshow-close"></i></div>
        <div class="mg-plateshow-c">
            <!--<div class="mg-plateshow-f">
                <div class="mg-plateshow-ft">模版选择（共<b>12</b>套）</div>
            </div>-->
            <div class="mg-plateshow-l">
                <ul class="mg-plateshow-ul clearfix"></ul>
            </div>
            <!--<div class="mg-plateshow-p clearfix">
                <span class="up"></span>
                <span class="text">1/5</span>
                <span class="next"></span>
            </div>-->
        </div>
    </div>
    <!-- 模版弹出层 end -->
    <!-- 链接弹出层 start -->
    <div class="mg-plateshow" id="mg-linkshow">
        <div class="mg-plateshow-t">WAP网址设置<i></i></div>
        <div class="mg-plateshow-c">
            <div class="mg-plateshow-l">
               <div class="waplink"></div>
            </div>
        </div>
    </div>
    <!-- 链接弹出层 end -->
    <!-- 图文弹出层 start -->
    <div class="mg-plateshow" id="mg-graphicshow">
        <div class="mg-plateshow-t">自动回复设置<i></i></div>
        <div class="mg-plateshow-c">
        	<iframe id="iframgraphic" src="/McpPlatForm/mg_message" width="1220" height="635"></iframe>
        </div>
    </div>
    <!-- 图文弹出层 end -->
    <!-- 自定义页面弹出层 start -->
    <div class="mg-plateshow" id="mg-customshow">
        <div class="mg-plateshow-t">自定义页设置<i></i></div>
        <div class="mg-plateshow-c">
        	<iframe id="iframcustom" src="/McpPlatForm/mg_cust_page_i" width="1220" height="635"></iframe>
        </div>
    </div>

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
	
<!-- 自定义页面弹出层 end -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/acp/mg_shop.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" charset="utf-8"></script>

</body>
</html>
<?php }} ?>