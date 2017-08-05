<?php /* Smarty version Smarty-3.1.6, created on 2017-07-31 17:31:53
         compiled from "C:\wamp\www\diandu\Tpl\AcpBusiness\get_business_list.html" */ ?>
<?php /*%%SmartyHeaderCode:30124595b5367365755-87773733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1c4ef59145e69aeea3cbe3ec98882f135102db2' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpBusiness\\get_business_list.html',
      1 => 1501464862,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30124595b5367365755-87773733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_595b5367ba0b4',
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
<?php if ($_valid && !is_callable('content_595b5367ba0b4')) {function content_595b5367ba0b4($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
					
<!--<div class="t-art" style="margin-bottom:10px;"><a href="/AcpSiteDeploy/add_site_deploy_facility" class="btn btn-blue"><i class="gicon-plus white"></i>添加设施</a>  </div>-->
<div class="tablesWrap">
    <div class="tables-searchbox">
        <form name="form" action="" method="post">
            <div class="t-list">
                <span class="tbs-txt">商家名称：</span>
                <input type="text" name="key_words" id="key_words" value="<?php echo $_smarty_tpl->tpl_vars['key_words']->value;?>
">
                <span class="tbs-txt">联系人电话：</span>
                <input type="text" name="contact_number" id="contact_number" value="<?php echo $_smarty_tpl->tpl_vars['contact_number']->value;?>
">
                <button class="btn" type="submit"><i class="gicon-search"></i>搜索</button>
            </div>
        </form>
    </div>
    <!-- end tables-searchbox -->
    <table class="wxtables">
        <colgroup>
            <col width="5%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="12%">
            <col width="20%">
        </colgroup>
        <thead>
        <tr>
            <td>选择</td>
            <td>商家名</td>
            <td>联系人</td>
            <td>联系人电话</td>
            <td>推荐人</td>
            <td>让利比例</td>
            <td>人均消费</td>
            <td>进件状态</td>
            <td>店铺类型</td>
            <td>付款二维码</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        <?php if ($_smarty_tpl->tpl_vars['business_list']->value){?>
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        <tr>
            <td class="_checkbox">
                <input type="checkbox" class="checkbox" name="a[]" value="<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
">
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['this']->value['business_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['this']->value['contacts'];?>
</td>

            <td class="serial">
                <?php echo $_smarty_tpl->tpl_vars['this']->value['contact_number'];?>

            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['this']->value['second_agent_id'];?>
</td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['this']->value['rate']*100;?>
%
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['this']->value['consumption'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['this']->value['mch_status']==1){?>通过<?php }elseif($_smarty_tpl->tpl_vars['this']->value['mch_status']==2){?>拒绝<?php }elseif($_smarty_tpl->tpl_vars['this']->value['mch_status']==3){?>审核中<?php }else{ ?>未进件<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['this']->value['industry_name'];?>
</td>
            <td>
                <a target="_blank" onclick="showQrcode('http://<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/FrontMerchantOrder/buy_bill/business_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['this']->value['sign_pic'];?>
?imageView2/1/w/100/h/100/q/100/')" class="btn" title="付款二维码">付款二维码</a>
            </td>
            <td>

	    <a href="/AcpUser/get_all_user_list/user_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_id'];?>
" class="btn" title="查看个人资料">个人资料</a>
	    <a onclick="editMch('<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
')"  class="btn" title="修改进件信息">修改进件信息</a>
                <?php if ($_smarty_tpl->tpl_vars['examine']->value==4||$_smarty_tpl->tpl_vars['this']->value['out_status']==2){?>
                <a href="/AcpBusiness/examine_business_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
" class="btn" title="编辑">查看详情</a>
                <?php if ($_smarty_tpl->tpl_vars['examine']->value==4){?>
                <a  onclick="examine(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
,true)" class="btn" title="通过审核">通过审核</a>
                <a  onclick="examine(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
,false)" class="btn" title="拒绝审核">拒绝审核</a>
                <?php }elseif($_smarty_tpl->tpl_vars['this']->value['out_status']==2){?>
                <a  onclick="examine_take_out(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
,true)" class="btn" title="通过审核">通过审核</a>
                <a  onclick="examine_take_out(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
,false)" class="btn" title="拒绝审核">拒绝审核</a>
                <?php }?>
                <?php }elseif($_smarty_tpl->tpl_vars['examine']->value==3){?>
                <!--<a href="/AcpBusiness/edit_business/business_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
" class="btn" title="编辑"><i class="gicon-edit black"></i>编辑</a>-->
                <a href="/AcpBusiness/freeze_business_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
" class="btn" title="编辑">查看详情</a>
                <?php }elseif($_smarty_tpl->tpl_vars['examine']->value==2){?>
                <a href="/AcpBusiness/no_pass_business_detail/business_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
" class="btn" title="编辑">查看详情</a>
                <?php }elseif($_smarty_tpl->tpl_vars['examine']->value==1){?>
                <a href="/AcpBusiness/edit_business/business_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
" class="btn" title="编辑"><i class="gicon-edit black"></i>编辑</a>
                <?php if ($_smarty_tpl->tpl_vars['this']->value['is_tpl']==0&&$_smarty_tpl->tpl_vars['this']->value['out_status']==1){?>
                <a href="javascript:;"  class="btn" title="设置为模板商家" onclick="set_to_tpl_business(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
)"></i>设置为模板商家</a>
                <?php }?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['this']->value['status']==1&&($_smarty_tpl->tpl_vars['this']->value['out_status']==0||$_smarty_tpl->tpl_vars['this']->value['out_status']==1)){?>
                <a href="javascript:;" onclick="is_use(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['this']->value['is_use'];?>
);" class="btn" title="删除"><?php if ($_smarty_tpl->tpl_vars['this']->value['is_use']==1){?>不显示<?php }else{ ?>显示<?php }?></a>
                <a href="/AcpBusiness/get_business_recommend/user_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_id'];?>
/type/1"  class="btn" title="查看ta的推荐"></i>查看ta推荐的人</a>
                <a href="/AcpBusiness/get_business_recommend/user_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_id'];?>
/type/2"  class="btn" title="查看ta的推荐"></i>查看ta推荐的店铺</a>
		<!--<a href="/AcpUser/get_my_recommenders/user_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_id'];?>
/type/1"  class="btn" title="查看ta的推荐"></i>ta推荐的人</a>
		<a href="/AcpUser/get_my_recommenders/user_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_id'];?>
/type/2"  class="btn" title="查看ta的推荐"></i>ta推荐的商家</a>-->
                <a href="/AcpUser/edit_agent_shop/user_id/<?php echo $_smarty_tpl->tpl_vars['this']->value['user_id'];?>
"  class="btn" title="修改他的商家推荐人"></i>修改他的商家推荐人</a>
                <?php }?>

                <a href="javascript:;" onclick="delete_obj(<?php echo $_smarty_tpl->tpl_vars['this']->value['business_id'];?>
);" class="btn" title="删除"><i class="gicon-trash black"></i>删除</a>
            </td>
        </tr>
        <?php } ?>
        <?php }else{ ?>
        <tr>
            <td colspan="7" class="center">暂无信息</td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    <!-- end wxtables -->
    <div class="tables-btmctrl clearfix">
        <div class="fl">
            <a href="javascript:Select()" class="btn btn-blue">全选</a>
            <a href="javascript:Cancel()" class="btn btn-blue">取消</a>
            <a href="javascript:;" onclick="Batch_delete_obj();" class="btn btn-blue">删除</a>
        </div>
        <div class="fr">
            <div class="paginate">
                <?php echo $_smarty_tpl->tpl_vars['page']->value->show();?>

            </div>
            <!-- end paginate -->
        </div>
    </div>
    <!-- end tables-btmctrl -->
</div>
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
<script src="/Public/Plugins/qrcode/jquery.qrcode.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Plugins/qrcode/qrcode.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Plugins/qrcode/utf.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

<script>
    //全选
    function Select(){
        var sel=document.getElementsByName("a[]");
        for(var i=0;i<sel.length;i++){
            sel[i].checked=true;
        }
    }
    var html='确定需要修改进件信息吗，这个操作将会导致重新审核';
    function editMch(id){
        $.jPops.confirm({
            title:"警告",
            content:html,
            okBtnTxt:"确定",
            cancelBtnTxt:"取消",
            callback:function(r)
            {
                if(r)
                {
                    $.post("/AcpBusiness/do_updatemch",{ 'business_id':id },function(data){
                        var info = JSON.parse(data);
                        if(info.code == 0){
                            alert(info.msg);
                        }else{
                            alert(info.msg);
                        }
                    })
                }
                else
                {
                    return true;
                }
            }
        });
    }

    //取消全选
    function Cancel(){
        var sel=document.getElementsByName("a[]");
        for(var i=0;i<sel.length;i++){
            sel[i].checked=false;
        }
    }
    
    function set_to_tpl_business(business_id)
    {
        var html='';

        var html='<form id="deliver_form">' +
                '<div class="formitems inline">'+
                '<label class="fi-name"><span class="colorRed">*</span>店铺类型：</label>'+
                '<div class="form-controls">'+
                '<select class="small" name="business_classify_id" id="business_classify_id">'+
        
        '<option value="">--选择店铺类型--</option>'+
        <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['business_classify_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
        '<option value="<?php echo $_smarty_tpl->tpl_vars['this']->value['business_classify_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['this']->value['business_classify_name'];?>
</option>'+
        <?php } ?>
        '</select>'+
        '<input type="hidden" name="tpl_business_id" value="'+business_id+'">'+
        
        '<span class="fi-help-text"> </span>'+
        '</div>' +
        '</div>'+
        '</form>';

        $.jPops.custom({
            title:"设置模板店铺",
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
                                    $.post('/AcpBusiness/set_tpl_business',$('#deliver_form').serialize(),function(data)
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

                                    business_classify_id:
                                    {
                                        required: true,
                                        digits: true
                                    },
                                },
                                messages:
                                {

                                    business_classify_id:
                                    {
                                        required: "对不起，请选择店铺类型",
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
    
</script>

<script>
    function is_use(business_id,flag){
        if(flag){
            var change_to=0;
        }else{
            var change_to=1;
        }
        $.jPops.confirm(
                {
                    title: "提示",
                    content: "您确定这么做？",
                    okBtnTxt: "确定",
                    cancelBtnTxt: "取消",
                    callback: function (r) {
                        if (r) {
                            $.post('/AcpBusiness/is_use', {"business_id": business_id,change_to:change_to}, function (data, textStatus) {
                                console.log(data);
                                if (data.code == 1) {
                                    alert(data.msg);
                                    location.reload();
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

    function examine(business_id,flag){
        $.jPops.confirm(
            {
                title: "提示",
                content: "您确定这么做？",
                okBtnTxt: "确定",
                cancelBtnTxt: "取消",
                callback: function (r) {
                    if (r) {
                        $.post('/AcpBusiness/examine', {"business_id": business_id,flag:flag}, function (data, textStatus) {
                            console.log(data);
                            if (data.code == 1) {
                                alert(data.msg);
                                location.href='/AcpBusiness/get_examine_business_list'
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
    function examine_take_out(business_id,flag){
        $.jPops.confirm(
                {
                    title: "提示",
                    content: "您确定这么做？",
                    okBtnTxt: "确定",
                    cancelBtnTxt: "取消",
                    callback: function (r) {
                        if (r) {
                            $.post('/AcpBusiness/examine_take_out', {"business_id": business_id,flag:flag}, function (data, textStatus) {
                                console.log(data);
                                if (data.code == 1) {
                                    alert(data.msg);
                                    location.href='/AcpBusiness/take_out_business_list'
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
    function delete_obj(obj_id) {
        $.jPops.confirm(
                {
                    title: "提示",
                    content: "您确定要删除这条数据吗？",
                    okBtnTxt: "确定",
                    cancelBtnTxt: "取消",
                    callback: function (r) {
                        if (r) {
                            $.post('/AcpBusiness/del_business', {"obj_id": obj_id}, function (data, textStatus) {
                                console.log(data);
                                if (data == 'success') {
                                    alert('恭喜您，删除成功！');
                                    location.reload();
                                }
                                else {
                                    alert('对不起，删除失败！');
                                }
                            });
                        }
                        return true;
                    }
                });
    }


    function Batch_delete_obj() {
        $.jPops.confirm(
                {
                    title: "提示",
                    content: "您确定要删除这些数据吗？",
                    okBtnTxt: "确定",
                    cancelBtnTxt: "取消",
                    callback: function (r) {
                        if (r) {
                            var obj_ids = '';
                            var count = 0;
                            $('input[name="a[]"]:checked').each(function () {
                                count++;
                                obj_ids += $(this).val() + ',';
                            });

                            if (!count) {
                                alert('对不起，请选择至少一项进行删除！');
                                return;
                            }

                            obj_ids = obj_ids.substr(0, obj_ids.length - 1);
                            $.post('/AcpBusiness/del_business', {"obj_id": obj_ids}, function (data, textStatus) {
                                if (data == 'success') {
                                    alert('恭喜您，删除成功！');
                                    location.reload();
                                }
                                else {
                                    alert('对不起，删除失败！');
                                }
                            });
                        }
                        return true;
                    }
                });
    }

    function showQrcode(text,url){
        layer.open({
            title:"付款二维码,右击保存",
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '420px'], //宽高
            content: '<div id="qrcodeCanvas" style="margin: 20px;"></div>'
        });

        getQrcodeImg(text,url);
    }

    function getQrcodeImg(text,url){
        $('#qrcodeCanvas').qrcode({
            render    : "canvas",
            text    : text,
            width : "200",               //二维码的宽度
            height : "200",              //二维码的高度
            background : "#ffffff",       //二维码的后景色
            foreground : "#000000",        //二维码的前景色
            src:url            //二维码中间的图片
        });
    }
</script>


<style>
    .layermcont{
        overflow:auto;
        line-height: 0px;
    }
</style>


</body>
</html>
<?php }} ?>