<?php /* Smarty version Smarty-3.1.6, created on 2017-07-03 13:35:20
         compiled from "C:\wamp\www\diandu\Tpl\UcpOrder\get_order_list.html" */ ?>
<?php /*%%SmartyHeaderCode:125945959d798997d77-63780155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb82040b7f1d0143c4ba6fd8c08647d0df0a1ef8' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\UcpOrder\\get_order_list.html',
      1 => 1492769410,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
    'e5aaf5638f0700f49d2c0c2c1a3356d633b307e1' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\UcpOrder\\Public_forms.html',
      1 => 1492753949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125945959d798997d77-63780155',
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
  'unifunc' => 'content_5959d79928019',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5959d79928019')) {function content_5959d79928019($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpOrder/get_pre_pay_order_list.css" type="text/css" />

<style>
	#jpops .fi-name{width:80px;}
	#jpops .form-controls{margin-left:100px;}
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
					
<div class="tablesWrap">
	<?php /*  Call merged included template "./Public_forms.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./Public_forms.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '125945959d798997d77-63780155');
content_5959d798c4472($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./Public_forms.html" */?>
	<!-- end tables-searchbox -->
	<table class="wxtables">
		<colgroup>
			<col width="5%">
			<col width="8%">
			<col width="8%">
			<!--<col width="7%">-->
			<col width="8%">
			<!--  <col width="8%">-->
			<col width="8%">
			<col width="10%">
			<col width="9%">
			<col width="12%">
			<col width="22%">
		</colgroup>
		<thead>
		<tr>
			<td>选择</td>
			<td>订单编号</td>
			<td>下单时间</td>
			<!-- <td>收货人</td>-->
			<td>订单金额</td>
			<!--<td>积分抵扣</td>-->
			<td>付款方式</td>
			<!-- <td>配送方式</td>-->
			<td>订单实收款</td>
			<!--  <td>订单状态</td>-->
			<td>商家</td>
			<td>操作</td>
		</tr>
		</thead>
		<?php  $_smarty_tpl->tpl_vars['order_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order_info']->key => $_smarty_tpl->tpl_vars['order_info']->value){
$_smarty_tpl->tpl_vars['order_info']->_loop = true;
?>
		<tbody class="combo-tbody">
		<tr>
			<td><input type="checkbox" class="checkbox" name="a[]" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
"></td>
			<td><span class="t-le"><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_sn'];?>
</span></td>
			<td><span class="t-le"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span></td>
			<!--<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['consignee'];?>
</td> -->
			<td>
				<span>￥</span>
				<span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['total_amount'];?>
</span>
			</td>
			<!-- <td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['integral_amount'];?>
</td> -->
			<td><?php if ($_smarty_tpl->tpl_vars['order_info']->value['payway']){?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['payway'];?>
<?php }else{ ?>--<?php }?></td>
			<!--<td><?php if ($_smarty_tpl->tpl_vars['order_info']->value['express_company_name']){?><?php echo $_smarty_tpl->tpl_vars['order_info']->value['express_company_name'];?>
<?php }else{ ?>&#45;&#45;<?php }?></td> -->
			<td>
				<span>￥</span>
				<!--<span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['total_amount']+$_smarty_tpl->tpl_vars['order_info']->value['express_fee'];?>
</span>-->
				<span><?php echo $_smarty_tpl->tpl_vars['order_info']->value['pay_amount'];?>
</span>
			</td>
			<td><span class="t-le"><?php echo $_smarty_tpl->tpl_vars['order_info']->value['business_name'];?>
</span></td>
			<!--<td><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_status_name'];?>
</td> -->
			<td>
				<a href="/UcpOrder/order_detail/order_id/<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
/redirect/<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
" class="btn" title="查看">查看</a>
				<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==OrderModel::PRE_PAY){?>
				<a href="/UcpOrder/edit_order/order_id/<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
/redirect/<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
" class="btn" title="修改">编辑</a>
				<a href="javascript:;" class="btn" title="删除" onclick="delete_order(<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
)">删除</a>
				<a href="javascript:offline_pay(<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
, 0);" class="btn" title="已线下收款">已线下收款</a>
				<?php }elseif($_smarty_tpl->tpl_vars['order_info']->value['order_status']==OrderModel::PAYED){?>
				<!--	<a href="javascript:;" class="btn" title="发货" onclick="deliver_order(<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
)">发货</a> -->
				<?php }elseif($_smarty_tpl->tpl_vars['order_info']->value['order_status']==OrderModel::REFUND_DELIVEING){?>
				<a href="javascript:confirm_refund_delivered(<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_id'];?>
);" class="btn" title="确认收货">确认收货</a>

				<?php }?>
			</td>
		</tr>
		</tbody>
		<?php }
if (!$_smarty_tpl->tpl_vars['order_info']->_loop) {
?>
		<tbody>
		<tr>
			<td colspan="7">
				没有符合条件的记录
			</td>
		<tr>
		</tbody>
		<?php } ?>
	</table>
	<!-- end wxtables -->
	<div class="tables-btmctrl clearfix">
		<div class="fl">
			<a href="javascript:;" class="btn btn-blue" onclick="Select()">全选</a>
			<a href="javascript:;" class="btn btn-blue" onclick="Cancel()">取消</a>
			<a href="javascript:;" class="btn btn-blue" onclick="batch_delete()">关闭</a>
			<a href="javascript:;" class="btn btn-blue" onclick="order_link('<?php echo $_smarty_tpl->tpl_vars['copy_link']->value;?>
')">复制链接</a>
			<?php if ($_smarty_tpl->tpl_vars['order_info']->value['order_status']==OrderModel::PAYED){?>
			<!--<a href="javascript:;" class="btn btn-blue" onclick="print_packing_list();">批量打印配货单</a>
            <a href="javascript:;" class="btn btn-blue" id="print_selected">批量打印快递单</a>
            <a href="javascript:;" onclick="print_invoice()" class="btn btn-blue">批量打印发货单</a>
            <a href="javascript:;" onclick="batch_deliver()" class="btn btn-blue">批量发货</a>-->
			<?php }?>
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

<object id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0>
	<embed id="LODOP_EM" type="application/x-print-lodop" width=0 height=0></embed>
</object>

<div id="globalPop"></div>
<!-- end tablesWrap -->

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
<script src="__JS__/acp/AcpOrder/order.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/acp/AcpOrder/get_pre_stockup_order_list.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/acp/AcpOrder/get_pre_deliver_order_list.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/lodop/LodopFuncs.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/acp/AcpOrder/print_shipping.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="__JS__/clipboard.min.js"></script>

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

	function confirm_refund_delivered(order_id)
	{
		var html='';

		var html='<form id="deliver_form">' +
				'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>退款金额：</label>'+
				'<div class="form-controls">'+
				'<input name="freight_name" id="freight_name"><span class="fi-help-text"> </span>'+
				'</div>' +
				'</div>'+
				'</form>';

		$.jPops.custom({
			title:"确认收货并退款",
			content:html,
			okBtnTxt:"确定",
			cancelBtnTxt:"取消",
			callback:function(r)
			{
				if(r)
				{
					var refund_total  = $('#freight_name').val();

					$.validator.setDefaults(
							{
								//表单验证通过后的处理，异步提交表单
								submitHandler: function()
								{
									$.post('/AcpOrder/confirm_refund_deliving',{"order_id":order_id, "refund_total":refund_total},function(data)
									{
										if (data == 'success')
										{
											alert('恭喜您，操作成功');
											location.reload();
										}
										else
										{
											alert('对不起，操作失败');
										}
									})
									acp.batchDeliverFormStatus = true;
								}
							});

					//表单验证规则
					$("#deliver_form").validate(
							{
								rules:
								{
									freight_name:
									{
										required: true,
										digits: true
									},
								},
								messages:
								{
									freight_name:
									{
										required: "对不起，请填写退款金额",
										digits: "金额请填写数字!"
									},
								},
								errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
								success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
							});

					//模拟提交表单
					$("#deliver_form").submit();
					return acp.batchDeliverFormStatus;
				}
				else
				{
					return true;
				}
			}
		});
	}

	function deliver_order(order_id)
	{
		var html='';

		var html='<form id="deliver_form">' +
				'<div class="formitems inline">'+
				'<label class="fi-name"><span class="colorRed">*</span>快递公司：</label>'+
				'<div class="form-controls">'+
				'<select class="small" name="express_company_id" id="express_company_id">'+
				
		'<option value="">--选择物流公司--</option>'+
		<?php  $_smarty_tpl->tpl_vars['express_company_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['express_company_info']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['express_company_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['express_company_info']->key => $_smarty_tpl->tpl_vars['express_company_info']->value){
$_smarty_tpl->tpl_vars['express_company_info']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['express_company_info']->key;
?>
		'<option value="<?php echo $_smarty_tpl->tpl_vars['express_company_info']->value['shipping_company_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['express_company_info']->value['shipping_company_name'];?>
</option>'+
		<?php } ?>
		
		'</select><span class="fi-help-text"> </span>'+
		'</div>' +
		'</div>'+
		'<div class="formitems inline">'+
		'<label class="fi-name"><span class="colorRed">*</span>快递单号：</label>'+
		'<div class="form-controls">'+
		'<input name="express_number" id="express_number"><span class="fi-help-text"> </span>'+
		'</div>' +
		'<input type="hidden" name="order_id" value="'+order_id+'">'+
		'</div>'+
		'</form>';

		$.jPops.custom({
			title:"发货",
			content:html,
			okBtnTxt:"确定",
			cancelBtnTxt:"取消",
			callback:function(r)
			{
				if(r)
				{

					$.validator.setDefaults(
							{
								//表单验证通过后的处理，异步提交表单
								submitHandler: function()
								{
									$.post('/AcpOrder/deliver_order',$('#deliver_form').serialize(),function(data)
									{
										if (data == 'success')
										{
											alert('恭喜您，操作成功');
											location.reload();
										}
										else
										{
											alert('对不起，操作失败');
										}
									})
									acp.batchDeliverFormStatus = true;
								}
							});

					//表单验证规则
					$("#deliver_form").validate(
							{
								rules:
								{
									express_company_id:
									{
										required: true,
									},
									express_number:
									{
										required: true,
										digits: true
									},
								},
								messages:
								{
									express_company_id:
									{
										required: "对不起，请选择快递公司",
									},
									express_number:
									{
										required: "对不起，请填写快递单号",
									},
								},
								errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
								success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
							});

					//模拟提交表单
					$("#deliver_form").submit();
					return acp.batchDeliverFormStatus;
				}
				else
				{
					return true;
				}
			}
		});
	}

	//复制链接
	function order_link(copy_link)
	{
		if(copy_link == 'payed'){
			copy_link = 'pre_deliver';
		}else if(copy_link == 'delivered'){
			copy_link = 'pre_confirm';
		}
		var link = 'http://' + document.domain + '/FrontOrder/'+copy_link+'_order';
		$.jPops.custom({
			title:"请复制链接",
			content:'<div>订单链接：' + link + '</div>',
			okBtnTxt:"复制",
			cancelBtnTxt:"关闭",
			callback:function(r)
			{
				if(r)
				{
					text = link;
					copy_text('jpops-btn-ok');
				}
				else
				{
					return true;
				}
			}
		});
	}
	function copy_text(id)
	{
		var clipboard = new Clipboard('#' + id, {
			text: function() {
				return text;
			}
		});

		clipboard.on('success', function(e) {
			console.log(e);
			alert('复制成功');
		});

		clipboard.on('error', function(e) {
			console.log(e);
			alert('复制失败，请手动复制');
		});
	}
</script>


</body>
</html>
<?php }} ?><?php /* Smarty version Smarty-3.1.6, created on 2017-07-03 13:35:20
         compiled from "C:\wamp\www\diandu\Tpl\UcpOrder\Public_forms.html" */ ?>
<?php if ($_valid && !is_callable('content_5959d798c4472')) {function content_5959d798c4472($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><div class="tables-searchbox">
    <form name="search_form" id="search_form" method="POST" action="">
        <div class="t-pay-top">
            <div class="apiece"><span>订单编号：</span><input type="text" placeholder="" class="small" name="order_sn" id="order_sn" value="<?php echo $_smarty_tpl->tpl_vars['order_sn']->value;?>
"> </div>
            <div class="apiece"><span>商家名：</span><input type="text" placeholder="" class="xubox_max" name="business_name" id="business_name" value="<?php echo $_smarty_tpl->tpl_vars['business_name']->value;?>
"> </div>


            <!--<?php if (isset($_smarty_tpl->tpl_vars['show_handling_status']->value)&&$_smarty_tpl->tpl_vars['show_handling_status']->value){?>
            <div class="apiece"><span>处理状态：</span>
                <select class="small" name="apply_state" id="apply_state">
                    <option value="-1">&#45;&#45;选择处理状态&#45;&#45;</option>
                    <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['state']->value)&&$_smarty_tpl->tpl_vars['state']->value==0){?>selected<?php }?>>待处理</option>
                    <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['state']->value)&&$_smarty_tpl->tpl_vars['state']->value==1){?>selected<?php }?>>已受理</option>
                    <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['state']->value)&&$_smarty_tpl->tpl_vars['state']->value==2){?>selected<?php }?>>已拒绝</option>
                </select>
                </div>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['order_status_list']->value)&&count($_smarty_tpl->tpl_vars['order_status_list']->value)){?>
            <div class="apiece"><span>订单状态：</span>
                <select class="small" name="order_status" id="order_status">
                    <option value="-1">&#45;&#45;选择订单状态&#45;&#45;</option>
                    <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_status_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['order_status']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</option>
                    <?php } ?>
                </select>
                </div>
            <?php }?>
            <div class="apiece"><span>商品名称：</span><input type="text" placeholder="" class="large" name="item_name" id="item_name" value="<?php echo $_smarty_tpl->tpl_vars['item_name']->value;?>
"> </div>-->

        </div>
        <div class="t-pay-time">

            <div class="t-pay-time-le">
                <div class="formitems inline">
                    <label class="t-pay-time-name">时间：</label>
                    <div class="form-controls" style="margin-left:10px;">
                        <input type="text" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})" name="start_time" id="start_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_time']->value,"%Y-%m-%d %H:%M:%S");?>
">
                        <span class="fi-text">-</span>
                        <input type="text" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})" name="end_time" id="end_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_time']->value,"%Y-%m-%d %H:%M:%S");?>
">
                    </div>
                </div>
            </div>
            <div class="t-pay-time-ri"><button type="submit" class="btn"><i class="gicon-search"></i>搜索</button> </div>
        </div>
    </form>
</div>  
<?php }} ?>