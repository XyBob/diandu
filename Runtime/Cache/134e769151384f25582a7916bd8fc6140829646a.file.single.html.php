<?php /* Smarty version Smarty-3.1.6, created on 2017-07-13 19:45:51
         compiled from "C:\wamp\www\diandu\Lib\Widget\UploadImage\single.html" */ ?>
<?php /*%%SmartyHeaderCode:657759675d6fcd0106-34740324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '134e769151384f25582a7916bd8fc6140829646a' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Lib\\Widget\\UploadImage\\single.html',
      1 => 1492479488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '657759675d6fcd0106-34740324',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'dir' => 0,
    'module' => 0,
    'must' => 0,
    'title' => 0,
    'url' => 0,
    'warn' => 0,
    'help' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59675d6fd4944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59675d6fd4944')) {function content_59675d6fd4944($_smarty_tpl) {?><div class="formitems inline single_image_widget" id="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" data-dir="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
" data-module="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
">
    <label class="fi-name"><?php if ($_smarty_tpl->tpl_vars['must']->value){?><span class="colorRed">*</span><?php }?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
：</label>
    <div class="form-controls">
        <ul class="fi-imgslist">
            <li class="preview fi-imgslist-item pic<?php if (!$_smarty_tpl->tpl_vars['url']->value){?> hide<?php }?>" id="preview" style="">
                <div>
                    <img id="J_Preview" style="height:69px;" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
                </div>
                <input class="xxlarge" type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="J_ImgUrl" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />
                <a href="javascript:;" class="del" id="J_Del" title="删除这张图"><i class="gicon-remove" onclick="delete_single_image('<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
');"></i></a>
                <img src="/Public/Images/popup-loading.gif" id="J_AjaxLoading" class="pic-loading" style="width: 32px; height: 32px;" />
                <div class="pic-mask" id="J_Mask"></div>
            </li>
            <li class="fi-imgslist-item<?php if ($_smarty_tpl->tpl_vars['url']->value){?> hide<?php }?>" id="add_li">
                <a href="javascript:;" class="add" title="上传一张新的图片" id="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
_uploader">+</a>
            </li>
        </ul>
        <span class="fi-help-text <?php if ($_smarty_tpl->tpl_vars['warn']->value){?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['help']->value;?>
</span>
    </div>
</div><?php }} ?>