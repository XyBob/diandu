<?php /* Smarty version Smarty-3.1.6, created on 2017-07-17 11:31:33
         compiled from "C:\wamp\www\diandu\Tpl\AcpDeposit\get_deposit_apply_list.html" */ ?>
<?php /*%%SmartyHeaderCode:47515959db4243d127-77261608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69382ca8e9615fff1bd5ca4a1a2a16b8ed6fa994' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpDeposit\\get_deposit_apply_list.html',
      1 => 1500262132,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47515959db4243d127-77261608',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5959db42c0ed3',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5959db42c0ed3')) {function content_5959db42c0ed3($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpUser/audit_waiting.css" type="text/css" />

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
					
<div class="t-a-wait-con">
    <div class="tablesWrap"> 
    	<div class="tables-searchbox">
            <div class="t-a-wait-top">
                <form action="" method="post" id="rank_waiting">
				<input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
                <div class="t-a-wait-top-li">
				<span>用户账号：</span><input type="text" placeholder="" class="small" name="username" id="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
                <select class="small" name="state">
					<option value="-1" >--选择状态--</option>
					<option value="0" <?php if (is_numeric($_smarty_tpl->tpl_vars['state']->value)&&$_smarty_tpl->tpl_vars['state']->value==0){?>selected<?php }?>>待处理</option>
					<option value="1" <?php if (is_numeric($_smarty_tpl->tpl_vars['state']->value)&&$_smarty_tpl->tpl_vars['state']->value==1){?>selected<?php }?>>已处理</option>
				<!--	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['state_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (is_numeric($_smarty_tpl->tpl_vars['state']->value)&&$_smarty_tpl->tpl_vars['state']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
					<?php } ?>-->
                </select>
				<span class="tbs-txt">提现金额：</span>
				<input type="text" style="width:60px;" name="start_money" value="<?php echo $_smarty_tpl->tpl_vars['start_money']->value;?>
">
				<span class="tbs-txt">——</span>
				<input type="text" style="width:60px;" name="end_money" value="<?php echo $_smarty_tpl->tpl_vars['end_money']->value;?>
">
                <select class="small" name="deposit_type" style="display:none;">
                    <option value="0" >--选择提现类型--</option>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['deposit_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['deposit_type']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
					<?php } ?>
                </select>
                </div>
                <div class="t-a-wait-top-li" style=""><input type="hidden" name="submit" value="search" /><button class="btn"><i class="gicon-search"></i>搜索</button> </div>
              </form>
            </div>        
        </div> 

        <table class="wxtables">  
            <colgroup>  
            <col width="4%"> 
            <col width="7%">
            <col width="7%">
            <col width="5%">
            <col width="18%">
            <col width="7%">  
            <col width="12%">
            <col width="8%">
            <col width="7%">
            <col width="15%">
            </colgroup>  
            <thead>  
                <tr>  
                    <td>选择</td>  
                    <td>用户名称</td>  
                    <td>是否认证</td>  
                    <td>户名</td>  
                    <td>提现账号</td>  
					<td>提现金额
					   	<a href="<?php echo $_smarty_tpl->tpl_vars['cur_url']->value;?>
/money_sort_type/<?php if ($_smarty_tpl->tpl_vars['money_sort_type']->value==1){?>2<?php }else{ ?>1<?php }?>" style="font:14px;"><?php if ($_smarty_tpl->tpl_vars['money_sort_type']->value==2){?>▼<?php }else{ ?>▲<?php }?></a>
					</td>  
                    <td>管理员留言</td>  
                    <td>提交时间
					   	<a href="<?php echo $_smarty_tpl->tpl_vars['cur_url']->value;?>
/addtime_sort_type/<?php if ($_smarty_tpl->tpl_vars['addtime_sort_type']->value==1){?>2<?php }else{ ?>1<?php }?>" style="font:14px;"><?php if ($_smarty_tpl->tpl_vars['addtime_sort_type']->value==2){?>▼<?php }else{ ?>▲<?php }?></a>
					</td>  
                    <td>状态</td>  
                    <td>操作</td>  
                </tr>  
            </thead> 
            <tbody>
				<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deposit_apply_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <tr>  
                    <td><input type="checkbox" class="checkbox" value='<?php echo $_smarty_tpl->tpl_vars['row']->value['deposit_apply_id'];?>
' name="a[]"></td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['row']->value['is_auth']){?>是<?php }else{ ?>否<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['realname'];?>
</td>  
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['account'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
元</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['admin_remark'];?>
</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['state_name'];?>
</td>
                    <td>  
						<a href="/AcpFinance/get_account_log/user_id/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
" class="btn" title="查看财务明细">查看财务明细</a>
						<?php if ($_smarty_tpl->tpl_vars['row']->value['state']==0){?>
							<a href="javascript:;" class="btn" title="通过" data-role_type="<?php echo $_smarty_tpl->tpl_vars['row']->value['role_type'];?>
" onclick="set_state(<?php echo $_smarty_tpl->tpl_vars['row']->value['deposit_apply_id'];?>
, 1,this)">通过</a>
							<!--<a href="javascript:;" class="btn" title="拒绝" onclick="refuse(<?php echo $_smarty_tpl->tpl_vars['row']->value['deposit_apply_id'];?>
, 2, '<?php echo $_smarty_tpl->tpl_vars['row']->value['admin_remark'];?>
')">拒绝</a>-->
							<a href="javascript:;" class="btn" title="已线下打款" onclick="had_pay(<?php echo $_smarty_tpl->tpl_vars['row']->value['deposit_apply_id'];?>
, 2, '<?php echo $_smarty_tpl->tpl_vars['row']->value['admin_remark'];?>
')">已线下打款</a>
						<?php }?>
                    </td>
                </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
					<tr><td colspan="11">没有符合条件的用户</td></tr>
                <?php } ?>
            </tbody>  
        </table>  
        <!-- end wxtables -->  
        <div class="tables-btmctrl clearfix">  
            <div class="fl">  
				<a href="javascript:;" class="btn btn-blue" onclick="Select()">全选</a>  
				<a href="javascript:;" class="btn btn-blue" onclick="Cancel()">取消</a>  
		<!--		<a href="javascript:void(0);" class="btn btn-blue" onclick="batch_pass_apply();">批量通过</a>
				<a href="javascript:void(0);" class="btn btn-blue" onclick="batch_refuse_apply();">批量拒绝</a> -->
			</div> 
            <div class="fr">  
                <div class="paginate">  
                    <?php echo $_smarty_tpl->tpl_vars['show']->value;?>

                </div>  
                <!-- end paginate -->  
            </div>  
        </div>  
        <!-- end tables-btmctrl -->  
    </div>  
    <!-- end tablesWrap --> 
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
	
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
 
<script>
//全选
function Select(){
	var sel=document.getElementsByName("a[]");
	for(var i=0;i<sel.length;i++){
		sel[i].checked=true;
	}
}
//取消全选
function Cancel(){
	var sel=document.getElementsByName("a[]");
	for(var i=0;i<sel.length;i++){
		sel[i].checked=false;
	}
}

function refuse(deposit_apply_id, state, admin_remark)
{
	var html='<form id="pop_demo">                                                                '+
			'<div class="formitems inline">                                                       '+
			'	<label class="fi-name" style="width:80px;text-align:left;"><span class="colorRed">*</span>拒绝原因：</label>          '+
			'	<div class="form-controls" style="margin-left:85px;">                                                       '+
			'		<textarea name="admin_remark" id="admin_remark" style="height:120px;width:350px;" rows="8" cols="80">' + admin_remark + '</textarea>'+
			'		<span class="fi-help-text" id="amount_ts"></span>       '+
			'	</div>                                                                            '+
			'</div>                                                                               '+
			'</form>                                                                              ';
			
	$.jPops.custom({
			title:"拒绝提现申请",
			content:html,
			callback:function(r){
				acp.popFormStatus=false;//弹窗表单验证状态
				if(r){
					$.validator.setDefaults({
						submitHandler: function() {
							acp.popFormStatus=true;//设置弹窗表单验证状态为通过
							var admin_remark=$("#jpops #admin_remark").val();
						
							$.ajax({
								url : '/AcpDeposit/refuse', 
								type : 'POST', 
								//dataType : 'JSON',
								timeout : 1000,
								data : {"deposit_apply_id": deposit_apply_id, "admin_remark": admin_remark},
								error : function() {
									$.jPops.message({title:"操作提示",content: "操作失败请重试",timing:3000});
								},
								success : function(result) {
									if(result == 'success')
									{
										alert('恭喜您，拒绝成功');
										location.reload();
									}
									else
									{
										alert('抱歉，拒绝失败');
									}
								}
							});
							
						}
					});

					//表单验证规则
					$("#pop_demo").validate({
						rules: {
							amount: {required: true, check_float: true}
						},
						messages: {
							amount: {required: "请输入变动金额", check_float: "格式如: 99.00 或 99.99"}
						},
						errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
						success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
					});

					//模拟提交表单
					$("#pop_demo").submit();

					return acp.popFormStatus;//通过表单验证状态确定是否关闭窗口
				}
				else{//点击取消按钮执行的事件
					return true;
				}
			}
			
		}); 	
}

function had_pay(deposit_apply_id){
	$.jPops.confirm(
			{
				title:"提示",
				content:"您确定要执行这些操作吗？",
				okBtnTxt:"确定",
				cancelBtnTxt:"取消",
				callback:function(r)
				{
					if(r)
					{
						$.post('/AcpDeposit/has_pay', {"id":deposit_apply_id}, function(data, textStatus)
						{
							alert(data.msg);
							location.reload();
						}, 'json');
					}
					return true;
				}
			});
}
function set_state(deposit_apply_id, state,obj)
{
	opt = state == 1 ? '通过' : '拒绝';
	var type=$(obj).attr('data-role_type');

	console.log(type);
	if(type==2){
		var url='/AcpDeposit/batch_pass_deposit';
	}else{
		var url='/AcpDeposit/agent_deposit';
	}
	$.jPops.confirm(
	{
		 title:"提示",
		 content:"您确定要" + opt + "该申请吗？",
		 okBtnTxt:"确定",
		 cancelBtnTxt:"取消",
		 callback:function(r)
		 {
			 if(r)
			 {
				 $.post(url, {"ids":deposit_apply_id}, function(data, textStatus)
				 {
					if (data.code == 0)
					{
						alert(data.msg);
						location.reload();
					}
					else
					{
						alert(data.msg);
					}
				}, 'json');
			 }
			 return true;
		 }
	 });

}

function batch_pass_apply()
{
	$.jPops.confirm(
	{  
		 title:"提示",  
		 content:"您确定要执行这些操作吗？",  
		 okBtnTxt:"确定",  
		 cancelBtnTxt:"取消",  
		 callback:function(r)
		 {  
			 if(r)
			 {
				 var ids = '';
				 var count = 0;
				 $('input[name="a[]"]:checked').each(function(){
					 count ++;
					 ids += $(this).val() + ',';
				 });

				 if (!count)
				 {
					 alert('对不起，请选择至少一项进行操作！');
					 return;
				 }

				 ids = ids.substr(0, ids.length - 1);

				 $.post('/AcpDeposit/batch_pass_deposit', {"ids":ids}, function(data, textStatus) 
				 {
						alert(data.msg);
						location.reload();
				}, 'json');
			 }  
			 return true;  
		 }
	 });
}

function batch_refuse_apply()
{
	var ids = '';
	var count = 0;
	$('input[name="a[]"]:checked').each(function(){
			count ++;
			ids += $(this).val() + ',';
			});

	if (!count)
	{
		alert('对不起，请选择至少一项进行操作！');
		return;
	}

	ids = ids.substr(0, ids.length - 1);

	var html='<form id="pop_demo">                                                                '+
		'<div class="formitems inline">                                                       '+
		'	<label class="fi-name" style="width:80px;text-align:left;"><span class="colorRed">*</span>拒绝原因：</label>          '+
		'	<div class="form-controls" style="margin-left:85px;">                                                       '+
		'		<textarea name="admin_remark" id="admin_remark" style="height:120px;width:350px;" rows="8" cols="80"></textarea>'+
		'		<span class="fi-help-text" id="amount_ts"></span>       '+
		'	</div>                                                                            '+
		'</div>                                                                               '+
		'</form>                                                                              ';

	$.jPops.custom({
			title:"拒绝提现申请",
			content:html,
			callback:function(r){
				acp.popFormStatus=false;//弹窗表单验证状态
				if(r){
					$.validator.setDefaults({
						submitHandler: function() {
							acp.popFormStatus=true;//设置弹窗表单验证状态为通过
							var admin_remark=$("#jpops #admin_remark").val();
						
							$.ajax({
								url : '/AcpDeposit/batch_refuse_deposit', 
								type : 'POST', 
								//dataType : 'JSON',
								timeout : 1000,
								data : {"ids": ids, "admin_remark": admin_remark},
								error : function() {
									$.jPops.message({title:"操作提示",content: "操作失败请重试",timing:3000});
								},
								success : function(result) {
									if(result == 'success')
									{
										alert('恭喜您，拒绝成功');
										location.reload();
									}
									else
									{
										alert('抱歉，拒绝失败');
									}
								}
							});
							
						}
					});

					//表单验证规则
					$("#pop_demo").validate({
						rules: {
							amount: {required: true, check_float: true}
						},
						messages: {
							amount: {required: "请输入变动金额", check_float: "格式如: 99.00 或 99.99"}
						},
						errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
						success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
					});

					//模拟提交表单
					$("#pop_demo").submit();

					return acp.popFormStatus;//通过表单验证状态确定是否关闭窗口
				}
				else{//点击取消按钮执行的事件
					return true;
				}
			}
			
		});
}
</script>
 

</body>
</html>
<?php }} ?>