<?php /* Smarty version Smarty-3.1.6, created on 2017-07-03 13:29:52
         compiled from "C:\wamp\www\diandu\Tpl\McpDeposit\deposit_stat.html" */ ?>
<?php /*%%SmartyHeaderCode:309995959d650c43c78-32399455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8077530c6daa11d7f67aeb96597e8748def39473' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\McpDeposit\\deposit_stat.html',
      1 => 1492765828,
      2 => 'file',
    ),
    '4b779290fffdb7484debbedc5ea8229734670497' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Tpl\\acp.html',
      1 => 1495845319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309995959d650c43c78-32399455',
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
  'unifunc' => 'content_5959d65142171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5959d65142171')) {function content_5959d65142171($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\wamp\\www\\diandu\\frame\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
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
	
<link rel="stylesheet" href="/Public/Css/acp/AcpOrder/order_num_stat.css" type="text/css" />

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
					
<div class="t-n-s-top">
    <div class="tables-searchbox">
	<form method="post">
		<div class="t-a-wait-top-li" style="margin-top:10px;float:left;">
		<span class="tbs-txt">统计类型：</span>
		<select class="small" name="date_type" style="height:30px;">
			<option value="1" <?php if ($_smarty_tpl->tpl_vars['date_type']->value==McpDepositAction::DEPOSIT_STAT_BY_DAY){?>selected<?php }?>>提现按日统计</option>
			<option value="2" <?php if ($_smarty_tpl->tpl_vars['date_type']->value==McpDepositAction::DEPOSIT_STAT_BY_MONTH){?>selected<?php }?>>提现按月统计</option>
			<option value="3" <?php if ($_smarty_tpl->tpl_vars['date_type']->value==McpDepositAction::DEPOSIT_STAT_BY_YEAR){?>selected<?php }?>>提现按年统计</option>
		</select>
		</div>

		<span id="day_span">
		<div class="mgt10" style="margin-left:20px;float:left;">
			<span class="tbs-txt">选择日期：</span>
			<input type="text" autocomplete="off" class="Wdate" name="add_time" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['add_time']->value,'%Y-%m-%d');?>
"  onclick="WdatePicker()">
			<button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
		</div>
		</span>

		<span id="month_span" style="display:none;">
		<div class="mgt10" style="margin-left:20px;float:left;">
			<span class="tbs-txt">选择月份：</span>
			<select class="mini" name="year" id="year" style="height:30px;">
                        <option value="2013" <?php if ($_smarty_tpl->tpl_vars['year']->value==2013){?>selected<?php }?>>2013</option>
                        <option value="2014" <?php if ($_smarty_tpl->tpl_vars['year']->value==2014){?>selected<?php }?>>2014</option>
                        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['year']->value==2015){?>selected<?php }?>>2015</option>
                        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['year']->value==2016){?>selected<?php }?>>2016</option>
                        <option value="2017" <?php if ($_smarty_tpl->tpl_vars['year']->value==2017){?>selected<?php }?>>2017</option>
                        <option value="2018" <?php if ($_smarty_tpl->tpl_vars['year']->value==2018){?>selected<?php }?>>2018</option>
                        <option value="2019" <?php if ($_smarty_tpl->tpl_vars['year']->value==2019){?>selected<?php }?>>2019</option>
                    </select>
                    <span>年</span>
                </div>
				<div class="form-controls" style="float:left;margin-top:10px; margin-left:10px;">
                    <select class="mini" name="month" id="month" style="height:30px;">
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['month']->value==1){?>selected<?php }?>>1</option>
                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['month']->value==2){?>selected<?php }?>>2</option>
                        <option value="3" <?php if ($_smarty_tpl->tpl_vars['month']->value==3){?>selected<?php }?>>3</option>
                        <option value="4" <?php if ($_smarty_tpl->tpl_vars['month']->value==4){?>selected<?php }?>>4</option>
                        <option value="5" <?php if ($_smarty_tpl->tpl_vars['month']->value==5){?>selected<?php }?>>5</option>
                        <option value="6" <?php if ($_smarty_tpl->tpl_vars['month']->value==6){?>selected<?php }?>>6</option>
                        <option value="7" <?php if ($_smarty_tpl->tpl_vars['month']->value==7){?>selected<?php }?>>7</option>
                        <option value="8" <?php if ($_smarty_tpl->tpl_vars['month']->value==8){?>selected<?php }?>>8</option>
                        <option value="9" <?php if ($_smarty_tpl->tpl_vars['month']->value==9){?>selected<?php }?>>9</option>
                        <option value="10" <?php if ($_smarty_tpl->tpl_vars['month']->value==10){?>selected<?php }?>>10</option>
                        <option value="11" <?php if ($_smarty_tpl->tpl_vars['month']->value==11){?>selected<?php }?>>11</option>
                        <option value="12" <?php if ($_smarty_tpl->tpl_vars['month']->value==12){?>selected<?php }?>>12</option>
                    </select>
                    <span>月</span>
			<button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
		</div>
		</span>

		<span id="year_span" style="display:none;">
		<div class="mgt10" style="margin-left:20px;float:left;">
			<span class="tbs-txt">选择年份：</span>
					<select class="mini" name="year2" id="year2" style="height:30px;">
                        <option value="2019" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2019){?>selected<?php }?>>2019</option>
                        <option value="2018" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2018){?>selected<?php }?>>2018</option>
                        <option value="2017" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2017){?>selected<?php }?>>2017</option>
                        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2016){?>selected<?php }?>>2016</option>
                        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2015){?>selected<?php }?>>2015</option>
                        <option value="2014" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2014){?>selected<?php }?>>2014</option>
                        <option value="2013" <?php if ($_smarty_tpl->tpl_vars['year2']->value==2013){?>selected<?php }?>>2013</option>
                    </select>
                    <span>年</span>
			<button type="submit" class="btn"><i class="gicon-search"></i>搜索</button>
		</div>
		</span>
	</form>
	</div>

	<div class="t-month-chart" id="container">
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
	
<script type="text/javascript" src="/Public/Plugins/Highcharts/highcharts.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="/Public/Plugins/My97DatePicker/WdatePicker.js?version=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript">
var new_deposit_stat_list = '[';
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['new_deposit_stat_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	new_deposit_stat_list = new_deposit_stat_list + <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
 + ',';
<?php } ?>
new_deposit_stat_list = new_deposit_stat_list.substring(0, new_deposit_stat_list.length - 1);
new_deposit_stat_list += ']';

var sum_deposit_stat_list = '[';
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sum_deposit_stat_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	sum_deposit_stat_list = sum_deposit_stat_list + <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
 + ',';
<?php } ?>
sum_deposit_stat_list = sum_deposit_stat_list.substring(0, sum_deposit_stat_list.length - 1);
sum_deposit_stat_list += ']';

var date_type = '<?php echo $_smarty_tpl->tpl_vars['date_type']->value;?>
';
var xAxis = '[';
var tmp = '';
if (date_type == <?php echo AcpDepositAction::DEPOSIT_STAT_BY_DAY;?>
)
{
	for (var i = 1; i <= 24; i++)
	{
		tmp = i < 10 ? '0' + i : i;
		xAxis = xAxis + tmp + ',';
	}
}
else if (date_type == <?php echo AcpDepositAction::DEPOSIT_STAT_BY_MONTH;?>
)
{
	for (var i = 1; i <= 31; i++)
	{
		xAxis = xAxis + i + ',';
	}
}
else if (date_type == <?php echo AcpDepositAction::DEPOSIT_STAT_BY_YEAR;?>
)
{
	for (var i = 1; i <= 12; i++)
	{
		tmp = i < 10 ? '0' + i : i;
		xAxis = xAxis + tmp + ',';
	}
}

xAxis = xAxis.substring(0, xAxis.length - 1);
xAxis += ']';

var d = '<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
';

$(function (){
var chart = new Highcharts.Chart({
	chart: {
		renderTo: 'container',
		defaultSeriesType: 'line'
	},
	title: {
		text: d + ' 提现统计'
	},
	subtitle: {
		text: ''
	},
	xAxis: {
		//categories: ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24']
		categories: eval(xAxis)
	},
	yAxis: {
		title: {
			text: '提现数'
		}
	},
	tooltip: {
		enabled: false,
		formatter: function() {
			return '<b>'+ this.series.name +'</b><br/>'+
				this.x +': '+ this.y +'°C';
		}
	},
	plotOptions: {
		line: {
			dataLabels: {
				enabled: true
			},
			enableMouseTracking: false
		}
	},
	series: [{
		name: '提现数',
		data: eval(new_deposit_stat_list)
	},{
		name: '提现总金额',
		data: eval(sum_deposit_stat_list)
	}]
});
});

showHide(date_type);
$('[name="date_type"]').change(function(){
	var date_type = $(this).val();
	showHide(date_type);
})

function showHide(date_type)
{
	if (date_type == 1)
	{
		$('#day_span').show();
		$('#month_span').hide();
		$('#year_span').hide();
	}
	else if (date_type == 2)
	{
		$('#day_span').hide();
		$('#month_span').show();
		$('#year_span').hide();
	}
	else if (date_type == 3)
	{
		$('#day_span').hide();
		$('#month_span').hide();
		$('#year_span').show();
	}
}
</script>


</body>
</html>
<?php }} ?>