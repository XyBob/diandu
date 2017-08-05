<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 14:32:42
         compiled from "C:\wamp\www\diandu\Tpl\AcpAgent\add_agent.html" */ ?>
<?php /*%%SmartyHeaderCode:319025975948a7fb160-53320416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '199f6202b4445f0757d0a2455fe37f50c822dc89' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpAgent\\add_agent.html',
      1 => 1492766737,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319025975948a7fb160-53320416',
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
  'unifunc' => 'content_5975948b6a3fc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5975948b6a3fc')) {function content_5975948b6a3fc($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpConfig/base_config.css" type="text/css" />

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
					
<form id='base_config' action='' method='POST'>
<?php if ($_smarty_tpl->tpl_vars['opt']->value=='add'){?>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span> 选择城市：</label>  
    <div class="form-controls">  
		<select class="small" id="province_id" name="province_id">  
			<option value="0">--选择省份--</option>  
			<?php  $_smarty_tpl->tpl_vars['province_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['province_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['province_info']->key => $_smarty_tpl->tpl_vars['province_info']->value){
$_smarty_tpl->tpl_vars['province_info']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['province_info']->value['province_id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['province_id']->value)&&$_smarty_tpl->tpl_vars['province_id']->value==$_smarty_tpl->tpl_vars['province_info']->value['province_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['province_info']->value['province_name'];?>
</option>  
			<?php } ?>
		</select> 
		<select class="small" id="city_id" name="city_id">  
			<option value="0">--选择城市--</option>  
		</select> 
		<span id="div_area">
			<select class="small" id="area_id" name="area_id">  
				<option value="0">--选择地区--</option>  
			</select> 
		</span>
        <span class="fi-help-text" style="color:red;">注意：省级合伙人只需要选到省，市级合伙人只需要选到市，县级合伙人需要选到区县，选错了级别就错了，请谨慎选择。若开通错误，请先关闭错误开通的省市区，再重新开通。</span>  
    </div>  
</div>
<?php }else{ ?>
<div class="formitems inline">  
    <label class="fi-name"><span class="colorRed">*</span>省/市/县：</label>  
		<div class="form-controls">
			<?php echo $_smarty_tpl->tpl_vars['area_string']->value;?>
 
		</div>  
        <span class="fi-help-text" style="color:red;">注意：省级合伙人只需要选到省，市级合伙人只需要选到市，县级合伙人需要选到区县，选错了级别就错了，请谨慎选择。若开通错误，请先关闭错误开通的省市区，再重新开通。</span>  
</div>
<?php }?>

<!--<div class="formitems inline">-->
	<!--<label class="fi-name"><span class="colorRed">*</span>合伙人类型：</label>-->
	<!--<div class="form-controls">-->
		<!--<div class="radio-group">-->
			<!--<label><input type="radio" name="agent_type" value="1" <?php if ($_smarty_tpl->tpl_vars['agent_type']->value==1){?>checked<?php }?>>正式</label>-->
			<!--<label><input type="radio" name="agent_type" value="0"  <?php if ($_smarty_tpl->tpl_vars['agent_type']->value==0){?>checked<?php }?>>试用</label>-->
		<!--</div>-->
		<!--<span class="fi-help-text error"></span>-->
	<!--</div>-->
<!--</div>-->

<div class="formitems inline">  
    <label class="fi-name"><span class='colorRed'>*</span>联系人：</label>  
    <div class="form-controls">  
		<input type="text" name='realname' value='<?php echo $_smarty_tpl->tpl_vars['realname']->value;?>
' id='realname' placeholder="" class="small"> 
        <span class="fi-help-text"></span>   
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name"><span class='colorRed'>*</span>手机号：</label>
    <div class="form-controls">  
		<input type="text" name='mobile' value='<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
' id='mobile' placeholder="" class="default">
        <span class="fi-help-text" id='notice_mobile'></span>
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name"><span class='colorRed'>*</span>登录用户名：</label>  
    <div class="form-controls">
		<input type="text" name='username'  id='username' value='<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
' class="small">
    	<span class="fi-help-text">全站唯一</span>    
    </div>  
</div>

<div class="formitems inline">
    <label class="fi-name">登录密码：</label>
    <div class="form-controls">  
        <input type="password" placeholder="" name='password' id='password' value='' class="small">
		<span class="fi-help-text"><?php if ($_smarty_tpl->tpl_vars['opt']->value=='add'){?>若不填写，则默认与登录名相同(不能少于6位)<?php }else{ ?>若不填写，则不修改<?php }?></span>
    </div>
</div>

<div class="formitems inline">  
    <label class="fi-name">支付密码：</label>  
    <div class="form-controls">  
        <input type="password" placeholder="" name='pay_password' id='pay_password' value='' class="small">
		<span class="fi-help-text"><?php if ($_smarty_tpl->tpl_vars['opt']->value=='add'){?>若不填写，则默认与登录名相同(不能少于6位)<?php }else{ ?>若不填写，则不修改<?php }?></span>
    </div>  
</div>

<div class="formitems inline">  
    <label class="fi-name"><span class='colorRed'>*</span>联系地址：</label>  
    <div class="form-controls">
		<input type="text" name='address'  id='address' value='<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
' class="small">
    	<span class="fi-help-text"></span>
    </div>  
</div>

<div class="formitems inline">
    <label class="fi-name"><span class='colorRed'></span>身份证号：</label>
    <div class="form-controls">
		<input type="text" name='id'  id='id' value='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
' class="small">
    	<span class="fi-help-text"></span>
    </div>
</div>

<!--<div class="formitems inline">-->
    <!--<label class="fi-name"><span class='colorRed'></span>开户银行：</label>-->
    <!--<div class="form-controls">-->
		<!--<input type="text" name='bank_name'  id='bank_name' value='<?php echo $_smarty_tpl->tpl_vars['bank_name']->value;?>
' class="small">-->
    	<!--<span class="fi-help-text"></span>-->
    <!--</div>-->
<!--</div>-->

<!--<div class="formitems inline">  -->
    <!--<label class="fi-name"><span class='colorRed'></span>银行卡号：</label>  -->
    <!--<div class="form-controls">-->
		<!--<input type="text" name='bank_account'  id='bank_account' value='<?php echo $_smarty_tpl->tpl_vars['bank_account']->value;?>
' class="small">-->
    	<!--<span class="fi-help-text"></span>-->
    <!--</div>  -->
<!--</div>-->

<!--<div class="formitems inline">  -->
    <!--<label class="fi-name"><span class='colorRed'></span>持卡人姓名：</label>  -->
    <!--<div class="form-controls">-->
		<!--<input type="text" name='bank_realname'  id='bank_realname' value='<?php echo $_smarty_tpl->tpl_vars['bank_realname']->value;?>
' class="small">-->
    	<!--<span class="fi-help-text"></span>-->
    <!--</div>  -->
<!--</div>-->

<!--<div class="formitems inline">  -->
    <!--<label class="fi-name"><span class='colorRed'></span>开户行：</label>  -->
    <!--<div class="form-controls">-->
		<!--<input type="text" name='openning_bank'  id='openning_bank' value='<?php echo $_smarty_tpl->tpl_vars['openning_bank']->value;?>
' class="small">-->
    	<!--<span class="fi-help-text"></span>-->
    <!--</div>  -->
<!--</div>-->

<!--<div class="formitems inline">  -->
    <!--<label class="fi-name"><span class='colorRed'></span>预留手机号：</label>  -->
    <!--<div class="form-controls">-->
		<!--<input type="text" name='bank_mobile'  id='bank_mobile' value='<?php echo $_smarty_tpl->tpl_vars['bank_mobile']->value;?>
' class="small">-->
    	<!--<span class="fi-help-text"></span>-->
    <!--</div>  -->
<!--</div>-->

<div class="formitems inline">
    <label class="fi-name"></label>
    <div class="form-controls">
    	<input type='hidden' name='act' value='save' />
		<input type='hidden' id='pre_province_id' name='pre_province_id' value='<?php echo $_smarty_tpl->tpl_vars['province_id']->value;?>
' />
		<input type='hidden' id='pre_city_id' name='pre_city_id' value='<?php echo $_smarty_tpl->tpl_vars['city_id']->value;?>
' />
		<input type='hidden' id='pre_area_id' name='pre_area_id' value='<?php echo $_smarty_tpl->tpl_vars['area_id']->value;?>
' />
        <button type="submit" class="btn btn-blue"><i class="gicon-check white"></i>确定</button>
        <button type="reset" class="btn"><i class="gicon-repeat"></i>重置</button>
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
	
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

</body>
</html>
<?php }} ?>