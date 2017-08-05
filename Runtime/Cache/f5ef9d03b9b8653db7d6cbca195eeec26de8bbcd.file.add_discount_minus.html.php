<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 13:33:25
         compiled from "C:\wamp\www\diandu\Tpl\AcpDiscountMinus\add_discount_minus.html" */ ?>
<?php /*%%SmartyHeaderCode:988597586a53db074-05652587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5ef9d03b9b8653db7d6cbca195eeec26de8bbcd' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpDiscountMinus\\add_discount_minus.html',
      1 => 1498461551,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '988597586a53db074-05652587',
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
  'unifunc' => 'content_597586a5a9d4d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597586a5a9d4d')) {function content_597586a5a9d4d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
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
					
<form action='' method='post' id='add_admin'>

<div class="formitems inline">
    <label class="fi-name"><span class="colorRed">*</span>名称：</label>
    <div class="form-controls">
        <input type="text" placeholder="" class="xlarge" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
        <span class="fi-help-text hide"></span>
    </div>
</div>

<div class="formitems inline" style="display:none;">
    <label class="fi-name">
        <span class="colorRed">*</span><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
分类：</label>
    <div class="form-controls">
        <select name="genre_id">
            <option value="">--请选择--</option>
            <?php  $_smarty_tpl->tpl_vars['row1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row1']->key => $_smarty_tpl->tpl_vars['row1']->value){
$_smarty_tpl->tpl_vars['row1']->_loop = true;
?>
            <?php  $_smarty_tpl->tpl_vars['row2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row1']->value['sort_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row2']->key => $_smarty_tpl->tpl_vars['row2']->value){
$_smarty_tpl->tpl_vars['row2']->_loop = true;
?>
            <?php  $_smarty_tpl->tpl_vars['row3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row2']->value['genre_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row3']->key => $_smarty_tpl->tpl_vars['row3']->value){
$_smarty_tpl->tpl_vars['row3']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['row3']->value['genre_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['category_id']->value==$_smarty_tpl->tpl_vars['row3']->value['genre_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row3']->value['original_genre_name'];?>
</option>
            <?php } ?>
            <?php } ?>
            <?php } ?>
        </select>
        <span class="fi-help-text">选择分类</span>
    </div>
</div>

<!-- <div class="formitems inline">
	<label class="fi-name">礼品：</label>
	<div class="form-controls">
		<select name="gift_id">
			<option value="0">--请选择--</option>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['gift_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['gift_id']->value==$_smarty_tpl->tpl_vars['row']->value['gift_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['gift_name'];?>
</option>
			<?php } ?>
		</select>
		<span class="fi-help-text">礼品和优惠券至少选一项</span>
	</div>
</div>

<div class="formitems inline">
	<label class="fi-name">优惠券：</label>
	<div class="form-controls">
		<select name="vouchers_id">
			<option value="0">--请选择--</option>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vouchers_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['vouchers_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['vouchers_id']->value==$_smarty_tpl->tpl_vars['row']->value['vouchers_id']){?>selected<?php }?>>面额<?php echo $_smarty_tpl->tpl_vars['row']->value['num'];?>
元，满<?php echo $_smarty_tpl->tpl_vars['row']->value['amount_limit'];?>
元可使用</option>
			<?php } ?>
		</select>
		<span class="fi-help-text">礼品和优惠券至少选一项</span>
	</div>
</div>

<div class="formitems inline">
    <label class="fi-name"><span class='colorRed'>*</span>赠送优惠券张数：</label>
    <div class="form-controls">
		<input type="text" name='give_num' value='<?php echo $_smarty_tpl->tpl_vars['give_num']->value;?>
' id='give_num' placeholder="" class="small">
        <span class="fi-help-text"></span>
    </div>
</div> -->

<div class="formitems inline">
	<label class="fi-name"><span class="colorRed">*</span>活动有效期：</label>
    <div class="form-controls">
		<input type="text" autocomplete="off" class="Wdate" name="start_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_time']->value,'%Y-%m-%d %H:%M:%S');?>
"  onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">至
		<input type="text" autocomplete="off" class="Wdate" name="end_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_time']->value,'%Y-%m-%d %H:%M:%S');?>
"  onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
        <span class="fi-help-text"></span>
	</div>
</div>

<div class="formitems inline">
    <label class="fi-name"><span class="colorRed">*</span>面额：</label>
    <div class="form-controls">
        <input type="text" placeholder="" class="xlarge" name="num" id="num" value="<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
        <span class="fi-help-text hide"></span>
    </div>
</div>

<div class="formitems inline">
    <label class="fi-name"><span class="colorRed">*</span>订单满足金额：</label>
    <div class="form-controls">
        <input type="text" placeholder="" class="xlarge" name="amount_limit" id="amount_limit" value="<?php echo $_smarty_tpl->tpl_vars['amount_limit']->value;?>
">
        <span class="fi-help-text">订单满多少(此处指合并支付的总金额)可使用该优惠券</span>
    </div>
</div>

<!-- <div class="formitems inline">
    <label class="fi-name"><span class='colorRed'>*</span>参与次数限制：</label>
    <div class="form-controls">
		<input type="text" name='use_time' value='<?php echo $_smarty_tpl->tpl_vars['use_time']->value;?>
' id='use_time' placeholder="" class="small">
        <span class="fi-help-text">用户可参与几次这样的活动，0表示无限制</span>
    </div>
</div> -->

    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>使用范围：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" name="scope" value="1"
                              <?php if ($_smarty_tpl->tpl_vars['discount_minus_info']->value['scope']==1){?> checked<?php }?> >仅限店内消费</label>
                <label><input type="radio" name="scope" value="2"
                              <?php if ($_smarty_tpl->tpl_vars['discount_minus_info']->value['scope']==2){?> checked<?php }?> >仅限外卖</label>
                <label><input type="radio" name="scope" value="0"
                              <?php if ($_smarty_tpl->tpl_vars['discount_minus_info']->value['scope']==0||!$_smarty_tpl->tpl_vars['discount_minus_info']->value['scope']){?> checked<?php }?> >全部</label>
            </div>
        </div>
    </div>

<div class="formitems inline">
    <label class="fi-name">是否有效：</label>
    <div class="form-controls">
        <div class="radio-group">
            <label><input type="radio" name="isuse" value="1" <?php if ($_smarty_tpl->tpl_vars['isuse']->value!=0){?>checked="checked"<?php }?> />是</label>
            <label><input type="radio" name="isuse" value="0" <?php if ($_smarty_tpl->tpl_vars['isuse']->value==0){?>checked="checked"<?php }?>/>否</label>
        </div>
    </div>
</div>

<div class="formitems inline">
    <label class="fi-name"></label>
    <div class="form-controls">
    	<input type='hidden' name='submit' value='submit' />
    	<button type="submit" class="btn btn-blue"><i class="gicon-ok white"></i>保存</button>
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
	
<script type="text/javascript" src="__JS__/jquery/ajaxupload.3.5.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script>

	upload_file('activity_small_pic');
	upload_file('activity_pic');
	upload_file('bg_pic');
	function upload_file(div_id)
	{
		// ajax上传图片
		new AjaxUpload("#" + div_id + "_uploader", {
			action: "/AcpArticleAjax/uploadHandler",
			name: "imgFile",
			responseType: "json",
			onSubmit: function(){
				//alert('正在上传');
				//preview处的图片改为loading图片
				$('#' + div_id).find('.preview').removeClass('hide');
			},
			onChange: function(file, extension){
				if (extension && /^(jpg|png|jpeg|gif)$/.test(extension)) {
					return true;
				}
				else {
					alert('暂不支持该图片格式！');
					return false;
				}
			},
			onComplete: function(file, response){
				console.log(response);
				if (response.status === 0) {
					alert(response.msg);
				}
				else if (response.status === 1) {
					$('#' + div_id).find('#J_Preview').attr('src', response.img_url);
					$('#' + div_id).find('.preview').show();
					$('#' + div_id).find('#J_ImgUrl').val(response.img_url);
					$('#' + div_id).find('#add_li').hide();
				}
			}
		});
	}

	function delImage(div_id)
	{
		var ajaxLoading = $('#' + div_id).find('#J_AjaxLoading');
		var preview = $('#' + div_id).find('#J_Preview');
		var param = {};
		var _id = $('#' + div_id).find('#J_ImgUrl').data('id');
		var imgUrl = $('#' + div_id).find('#J_ImgUrl').val();

		if (_id != '') {
			param.id = _id;
		}
		if (imgUrl != '') {
			param.img_url = imgUrl;
		}
		$.ajax({
			url: '/AcpArticleAjax/delImage',
			type: 'post',
			data: param,
			dataType: 'json',
			beforeSend: function(){
				ajaxLoading.show();
			},
			success: function(data){
			//	console.log(data);
				if (data.status === 1) {
					$('#' + div_id).find('#J_ImgUrl').attr('data-id', '').val(null);
					$('#' + div_id).find('#J_Del').off('click', delImage);
					preview.removeAttr('src').parent().parent().addClass('hide');
					$('#' + div_id).find('#' + div_id + '_uploader').parent().removeClass('hide');
					$('#' + div_id).find('#add_li').show();
				}
				ajaxLoading.fadeOut();
			}
		});
	}


</script>

</body>
</html>
<?php }} ?>