<?php /* Smarty version Smarty-3.1.6, created on 2017-07-13 19:56:24
         compiled from "C:\wamp\www\diandu\Tpl\McpItem\add_item.html" */ ?>
<?php /*%%SmartyHeaderCode:1315259675fd39289e0-35775669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2a1e284c31fe926347ebed1b138052e1b0a6950' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\McpItem\\add_item.html',
      1 => 1499946983,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1315259675fd39289e0-35775669',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59675fd40ca1a',
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
<?php if ($_valid && !is_callable('content_59675fd40ca1a')) {function content_59675fd40ca1a($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	

<style>
    #jpops .fi-name{width:65px;}
    #jpops .form-controls{margin-left:75px;}
    #j-item-extend li{margin-bottom:10px;}
    .edit_item_tip{font-size: 18px;color: #a0a0a0;background-color: inherit;text-decoration: none;margin: 20px 180px;}
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
					
<div class="tabs clearfix">
    <a href="javascript:;" class="active tabs_a fl" data-origin="additem" data-index="1">基本信息</a>
	<a href="javascript:;" class="tabs_a fl" data-origin="additem" data-index="2"><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
属性</a>
    <a href="javascript:;" class="tabs_a fl" data-origin="additem" data-index="3">详细描述</a>
</div>
<!-- end tabs -->
<div class="tabs-content" data-origin="additem">
<form method="post" id="form_addItem" enctype="multipart/form-data">
<div class="tc hide" data-index="3">
    <div class="formitems inline">
        <label class="fi-name"><!-- <span class="colorRed">*</span> --><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
详情：</label>
        <div class="form-controls">
            <textarea name="contents" id="contents" class="large"><?php echo $_smarty_tpl->tpl_vars['contents']->value;?>
</textarea>
            <span class="fi-help-text error"></span>
        </div>
    </div>
    <div class="formactions mgl180">
        <button class="btn btn-blue"><i class="gicon-ok white"></i>提交</button>
    </div>
</div>
<!-- end 详细描述 -->
			<table class='hide' class='display:none;' id='J_add_sku_rank_price'>
				<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_agent_rank']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<tr>
                	<td class="tables-form-title"><?php echo $_smarty_tpl->tpl_vars['row']->value['rank_name'];?>
</td>
                    <td>
                        <input type="hidden" name="new_sku_rank_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['agent_rank_id'];?>
">
                        <input type="text" class="mini" name="new_sku_rank_price[]" value="">元
                    </td>
                </tr>
                <?php } ?>
            </table>
<div class="tc hide" data-index="2">
    <div id="J_item_prop">
        <p class="edit_item_tip">设置<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
属性前，请先选择<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
类型。</p>
    </div>

    <div class="formactions mgl180">
        <span class="btn btn-blue jump" data-value='3'>下一步</span>
    </div>
</div>

<!-- end 规格属性 -->
<div class="tc" data-index="1">
        <div class="formitems inline">
            <label class="fi-name">
                <span class="colorRed">*</span><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
分类：</label>
            <div class="form-controls">
                <select name="category_id">
                    <option value="">--请选择--</option>
                    <?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['this']->value['class_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['this']->value['class_name'];?>
</option>
                    <?php } ?>
                </select>
                <span class="fi-help-text error"></span>
            </div>
        </div>

        <div class="formitems inline">
            <label class="fi-name">
                商品类型：</label>
            <div class="form-controls">
                <select name="item_type_id">
                    <option value="0">&#45;&#45;请选择&#45;&#45;</option>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['item_type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['item_type_name'];?>
</option>
                    <?php } ?>
                </select>
                <span class="fi-help-text error"></span>
            </div>
        </div>

        <!--
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>是否为礼品：</label>
            <div class="form-controls">
                <div class="radio-group">
                    <label><input type="radio" name="is_gift" value="1">礼品</label>
                    <label><input type="radio" name="is_gift" value="0" checked>商品</label>
                </div>
                <span class="fi-help-text error"></span>
            </div>
        </div>
        -->
        <input type="hidden" name="is_gift" value="0">

        <!--
        <div class="formitems inline">
            <label class="fi-name">
                品牌：</label>
            <div class="form-controls">
                <select name="brand_id">
                    <option value="0">--请选择--</option>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brand_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['brand_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['brand_name'];?>
</option>
                    <?php } ?>
                </select>
                <span class="fi-help-text error"></span>
            </div>
        </div>
        -->

        <div class="formitems inline">
            <label class="fi-name">
                <span class="colorRed">*</span><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
名称：</label>
            <div class="form-controls">
                <input type="text" placeholder="请输入<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
名称" class="xxlarge" name="item_name" value="<?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_name'];?>
">
                <span class="fi-help-text error"></span>
            </div>
        </div>

        <div class="formitems inline">
            <label class="fi-name">
                <span class="colorRed">*</span><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
货号：</label>
            <div class="form-controls">
                <input type="text" placeholder="请输入<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
货号" class="small" name="item_sn" value="<?php echo $_smarty_tpl->tpl_vars['item_sn']->value;?>
">
                <span class="fi-help-text error"></span>
            </div>
        </div>

        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>排序号：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="serial" id="serial">
                <span class="fi-help-text hide"></span>
            </div>
        </div>
        <!-- <div class="formitems inline">
            <label class="fi-name">
                成本价：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="cost_price">
                <span class="fi-text">元</span>
                <span class="fi-help-text error"></span>
            </div>
        </div> -->

     <!--   <div class="formitems inline">
            <label class="fi-name">
                市场价：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="market_price">
                <span class="fi-text">元</span>
                <span class="fi-help-text error"></span>
            </div>
        </div>-->

        <div class="formitems inline">
            <label class="fi-name">
                <span class="colorRed">*</span>本店价：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="mall_price" value="<?php echo $_smarty_tpl->tpl_vars['item_info']->value['mall_price'];?>
">
                <span class="fi-text">元</span>
                <span class="fi-help-text error"></span>
            </div>
        </div>
        <!--
        <div class="formitems inline">
            <label class="fi-name">
                市场价：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="market_price">
                <span class="fi-text">元</span>
                <span class="fi-help-text error"></span>
            </div>
        </div>


        <div class="formitems inline">
            <label class="fi-name">
                积分抵扣百分比：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="integral_exchange_rate">
                <span class="fi-text">%</span>
                <span class="fi-help-text error"></span>
            </div>
        </div>
        -->
       <!-- <div class="formitems inline">
            <label class="fi-name">
                积分抵扣：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="integral_exchange">
                <span class="fi-help-text error"></span>
            </div>
        </div>-->
        <div class="formitems inline">
            <label class="fi-name">
                <span class="colorRed">*</span>库存数量：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="stock">
                <span class="fi-help-text error"></span>
            </div>
        </div>
        <!--<div class="formitems inline">
            <label class="fi-name">
                警戒库存：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="stock_alarm">
                <span class="fi-help-text error"></span>
            </div>
        </div>

        <div class="formitems inline">
            <label class="fi-name">
                <?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
重量：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="weight">
                <span class="fi-text">克</span>
                <span class="fi-help-text error"></span>
            </div>
        </div>-->

        <!--
        <div class="formitems inline">
            <label class="fi-name">
                单位：</label>
            <div class="form-controls">
                <input type="text" placeholder="0" class="small" name="unit" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['unit'];?>
">
                <span class="fi-help-text error"></span>
            </div>
        </div>
        -->

	<!--	<div class="formitems inline">
			<label class="fi-name"><span class="colorRed">*</span><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
销售状态：</label>
			<div class="form-controls">
				<div class="radio-group">
					<label><input type="radio" name="isuse" value="1" checked>出售中</label>
					<label><input type="radio" name="isuse" value="0">仓库中</label>
				</div>
				<span class="fi-help-text error"></span>
			</div>
		</div>-->

      <!--  <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
是否推荐（显示在首页）：</label>
            <div class="form-controls">
                <div class="radio-group">
                    <label><input type="radio" name="is_recommend" value="0" checked>否</label>
                    <label><input type="radio" name="is_recommend" value="1">是</label>
                </div>
                <span class="fi-help-text error"></span>
            </div>
        </div>-->

        <div class="formitems inline">
            <label class="fi-name"><?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
简介：</label>
            <div class="form-controls">
                <textarea name="item_desc" id="item_desc"><?php echo $_smarty_tpl->tpl_vars['item_info']->value['item_desc'];?>
</textarea>
                <span class="fi-help-text">一般在200字以内, 微商城详情中显示的内容</span>
            </div>
        </div>

        <?php echo upload_image_widget($_smarty_tpl->tpl_vars['pic_data']->value);?>


        <div class="formactions mgl180">
            <input type="hidden" name="action" value="add">
            <span class="btn btn-blue jump" data-value='2'>下一步</span>
        </div>
</div>

<!-- end 基本信息 -->
</form>
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
	
<script>
var item_name = '<?php echo $_smarty_tpl->tpl_vars['ITEM_NAME']->value;?>
';
</script>
<!--<script src="__KD__/kindeditor.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"> </script>
<script src="__KD__/lang/zh_CN.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"> </script>-->
<script src="/Public/Js/mcp/McpItem/add_item.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Js/mcp/McpItem/add_item_validate.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Js/mcp/McpItem/add_item_step1.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Js/mcp/McpItem/add_item_step2.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Js/mcp/McpItem/add_item_step3.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<!--<script src="__ACPJS__/AcpItem/add_item_step4.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>-->
<!--<script src='/Public/Js/common/upload_image.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
'></script>-->
<script>
    var flag = 1;
</script>

</body>
</html>
<?php }} ?>