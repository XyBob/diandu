<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 13:32:17
         compiled from "C:\wamp\www\diandu\Tpl\AcpHelp\list_sort.html" */ ?>
<?php /*%%SmartyHeaderCode:314175975866104c038-25141496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '650878a1b7313448e701defb1b2df10801f98f7e' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\AcpHelp\\list_sort.html',
      1 => 1492479462,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314175975866104c038-25141496',
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
  'unifunc' => 'content_5975866169644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5975866169644')) {function content_5975866169644($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpArticle/list_sort.css" type="text/css" />

<style>
#jpops .fi-name{width:75px;}
#jpops .form-controls{margin-left:80px;}
.t-list{ float:left;}
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
					
<div class="t-art" style="margin-bottom:10px;">
	<a href="javascript:;" class="btn btn-blue" id="add-new"><i class="gicon-plus white"></i>添加栏目</a>
</div>
<div class="tablesWrap">
	<div class="tables-searchbox">
	<form name="form1" action="/AcpHelp/list_sort" method="get">
		<div class="t-list">
			<span class="tbs-txt">关键词：</span>  
			<input type="text" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
		</div> 
		<div class="t-list">
			<input type="hidden" name="act" value="submit" />
			<button class="btn" type="submit"><i class="gicon-search"></i>搜索</button> 
		</div>    
	</form>
	</div>
	<!-- end tables-searchbox -->
	<table class="wxtables">
		<colgroup>
		<col width="10%">
		<col width="45%">
		<col width="15%">
		<col width="15">
		<col width="15%">
		</colgroup>
		<thead>
			<tr>
				<td>编号</td>
				<td>栏目名称</td>
				<td>排序</td>
				<td>是否显示</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
		<?php if ($_smarty_tpl->tpl_vars['help_center_category_list']->value){?>
		<?php  $_smarty_tpl->tpl_vars['this'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['this']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['help_center_category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['this']->key => $_smarty_tpl->tpl_vars['this']->value){
$_smarty_tpl->tpl_vars['this']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['this']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['this']->value['no'];?>
</td>
				<td class="sort-name"><?php echo $_smarty_tpl->tpl_vars['this']->value['help_sort_name'];?>
</td>
				<td class="serial"><input type="text" title="点击更改排序" class="mini" style="width:40px; text-align:center; border-color: #fff;" value="<?php echo $_smarty_tpl->tpl_vars['this']->value['serial'];?>
" onblur="setSerial(<?php echo $_smarty_tpl->tpl_vars['this']->value['help_sort_id'];?>
, this);"></td>
				<td>
					<img src="__IMAGES__/ajax-loading.gif" class="hide" id="ajax-loading" />
				<?php if ($_smarty_tpl->tpl_vars['this']->value['isuse']==1){?>
					<a href="javascript:;" title="点击禁用" onclick="setUse(<?php echo $_smarty_tpl->tpl_vars['this']->value['help_sort_id'];?>
, this);"><i class="gicon-ok black"></i></a>
				<?php }elseif($_smarty_tpl->tpl_vars['this']->value['isuse']==0){?>
					<a href="javascript:;" title="点击启用" onclick="setUse(<?php echo $_smarty_tpl->tpl_vars['this']->value['help_sort_id'];?>
, this);"><i class="gicon-remove black"></i></a>
				<?php }?>
				</td>
				<td>
					<a href="javascript:;" onclick="editSort(<?php echo $_smarty_tpl->tpl_vars['this']->value['help_sort_id'];?>
, this);" class="btn" title="修改"><i class="gicon-edit black"></i>编辑</a> 
					<a href="javascript:;" onclick="delSort(<?php echo $_smarty_tpl->tpl_vars['this']->value['help_sort_id'];?>
, this);" class="btn" title="删除"><i class="gicon-trash black"></i>删除</a> 
				</td>
			</tr>
		<?php } ?>
		<?php }else{ ?>
			<tr>
			<?php if ($_smarty_tpl->tpl_vars['is_search']->value){?>
				<td colspan="5" class="center">暂未搜索到相关栏目，您可以尝试其他搜索</td>
			<?php }else{ ?>
				<td colspan="5" class="center">暂无栏目，您可以<a href="#add-new">添加栏目</a></td>
			<?php }?>
			</tr>
		<?php }?>
		</tbody>
	</table>
	<!-- end wxtables -->
	<?php if ($_smarty_tpl->tpl_vars['help_center_category_list']->value){?>
	<div class="tables-btmctrl clearfix">
		<div class="fr">
			<div class="paginate">
				<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

			</div>
			<!-- end paginate -->
		</div>
	</div>
	<?php }?>
	<!-- end tables-btmctrl -->
</div>
<!-- end tablesWrap --> 
<form id="form1" style="display: none;">
	<div class="formitems inline">
		<label class="fi-name"><span class="colorRed">*</span>栏目名称：</label>
		<div class="form-controls">
			<input type="text" name="sort_name" id="sort_name">
			<span class="fi-help-text"></span>
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
	

<script type="text/javascript">
$(function(){
	$('.serial input').mouseenter(function(){
		$(this).css('cursor', 'pointer');
	})
	.click(function(){
		$(this).css('cursor', 'text');
		$(this).css('border-color', '#72b7cd');
	})
	.blur(function(){
		$(this).css('border-color', '#fff');
	});
	
	//添加标签
	$("#add-new").click(function() {
		var _html = $('#form1').clone().show();
		$.jPops.custom({
			title:"添加栏目",
			content:_html,
			okBtnTxt:"确定",
			callback:function(r){
				acp.popFormStatus=false;//弹窗表单验证状态
				
				if(r){//点击确定按钮执行的事件
                    $.validator.setDefaults({
                        submitHandler: function() {
                            var param = $('#jpops #form1').serialize();
							$.ajax({
								url: '__APP__/AcpHelpAjax/add_sort',
								data: param,
								dataType: 'json',
								success: function(data){
									$.jPops.alert({
										title:"提示",
										content:data.msg,
										okBtnTxt:"确定",
										callback:function(){
											if(data.status === 1){
												location.href = '/AcpHelp/list_sort';
											}
											return true;
										}
									});
								}
							});
                            acp.popFormStatus=true;//设置弹窗表单验证状态为通过
                        }
                    });
					
                    //表单验证规则
                    $("#jpops #form1").validate({
                        rules: {
                            sort_name: {
                                required: true
                            }
                        },
                        messages: {
                            sort_name: {
                                required: "请输入栏目名称！"
                            }
                        },
                        errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
                        success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
                    });
					
					//模拟提交表单
					$("#jpops #form1").submit();
					
                    return acp.popFormStatus;//通过表单验证状态确定是否关闭窗口
                }
				return true;
			}
		});
	});
});

function editSort(_id, _this){
	var _html = $('#form1').clone().show();
	$('#sort_name', _html).val($(_this).parents('tr').children('.sort-name').text());
	$.jPops.custom({
		title:"修改栏目",
		content:_html,
		okBtnTxt:"确定",
		callback:function(r){
			acp.popFormStatus=false;//弹窗表单验证状态
			
			if(r){//点击确定按钮执行的事件
				$.validator.setDefaults({
					submitHandler: function() {
						var param = $('#jpops #form1').serialize();
						param += '&id=' + _id;
						$.ajax({
							url: '__APP__/AcpHelpAjax/edit_sort',
							data: param,
							dataType: 'json',
							success: function(data){
							//	console.log(data);
								$.jPops.alert({
									title:"提示",
									content:data.msg,
									okBtnTxt:"确定",
									callback:function(){
										if(data.status === 1){
											$(_this).parents('tr').children('.sort-name').text(data.help_sort_name);
										//	location.href = '/AcpHelp/list_sort';
										}
										return true;
									}
								});
							}
						});
						acp.popFormStatus=true;//设置弹窗表单验证状态为通过
					}
				});
				
				//表单验证规则
				$("#jpops #form1").validate({
					rules: {
						sort_name: {
							required: true
						}
					},
					messages: {
						sort_name: {
							required: "请输入栏目名称！"
						}
					},
					errorPlacement: acp.form_ShowError,//显示出错信息(这段代码必须加)
					success:acp.form_HideError//验证成功隐藏错误信息(这段代码必须加)
				});
				
				//模拟提交表单
				$("#jpops #form1").submit();
				
				return acp.popFormStatus;//通过表单验证状态确定是否关闭窗口
			}
			return true;
		}
	});
}

function delSort(_id, _this){
	$.jPops.confirm({
		title:"提示",
		content:'您确定要删除这条数据吗？',
		okBtnTxt:"确定",
		cancelBtnTxt:"取消",
		callback:function(r){
			if(r){
				$.ajax({
					url: '__APP__/AcpHelpAjax/del_sort',
					data: {id: _id},
					dataType: 'json',
					success: function(data){
						$.jPops.alert({
							title:"提示",
							content:data.msg,
							okBtnTxt:"确定",
							callback:function(){
								if(data.status === 1){
									$(_this).parents('tr').fadeOut();
								//	$(_this).parents('tr').remove();
								}
								return true;
							}
						});
					}
				});
			}
			return true;
		}
	});
}

function setUse(_id, _this){
	$.ajax({
		url: '__APP__/AcpHelpAjax/edit_cat_isuse',
		data: {id: _id},
		dataType: 'json',
		beforeSend: function(){
			$(_this).prev('img').removeClass('hide');
			$(_this).children().addClass('hide');
		},
		success: function(data){
			$(_this).prev('img').addClass('hide');
			if(data.isuse === 0){
				$(_this).children().attr('class', 'gicon-remove black')
			}else if(data.isuse === 1){
				$(_this).children().attr('class', 'gicon-ok black');
			}
		}
	});
}

function setSerial(_id, _this){
	var initVal = _this.defaultValue;
	var curVal = $(_this).val();
	if(curVal == ''){
		$(_this).val(initVal);
		return false;
	}
	if(curVal == initVal){
		return false;
	}
	$.ajax({
		url: '__APP__/AcpHelpAjax/edit_cat_serial',
		data: {id: _id, serial: curVal},
		dataType: 'json',
		beforeSend: function(){
			$(_this).prev('img').removeClass('hide');
			$(_this).addClass('hide');
		},
		success: function(data){
			$(_this).prev('img').addClass('hide');
			$(_this).removeClass('hide');
			if(data.status === 1){
				_this.defaultValue = curVal;
			}
			$.jPops.alert({
				title:"提示",
				content:data.msg,
				okBtnTxt:"确定",
				callback:function(){
					return true;
				}
			});
		}
	});
}

</script>

</body>
</html>
<?php }} ?>