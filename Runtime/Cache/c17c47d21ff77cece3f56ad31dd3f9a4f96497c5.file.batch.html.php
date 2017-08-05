<?php /* Smarty version Smarty-3.1.6, created on 2017-07-24 13:48:40
         compiled from "C:\wamp\www\diandu\Lib\Widget\UploadImage\batch.html" */ ?>
<?php /*%%SmartyHeaderCode:1121059758a38dfedd3-17260317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c17c47d21ff77cece3f56ad31dd3f9a4f96497c5' => 
    array (
      0 => 'C:\\wamp\\www\\diandu\\Lib\\Widget\\UploadImage\\batch.html',
      1 => 1492479488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1121059758a38dfedd3-17260317',
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
    'pic_arr' => 0,
    'pic_url' => 0,
    'warn' => 0,
    'help' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59758a38e7bf6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59758a38e7bf6')) {function content_59758a38e7bf6($_smarty_tpl) {?><div class="formitems inline batch_image_widget" id="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" data-dir="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
" data-module="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
">
    <label class="fi-name"><?php if ($_smarty_tpl->tpl_vars['must']->value){?><span class="colorRed">*</span><?php }?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
：</label>
    <div class="form-controls">
        <ul class="fi-imgslist">
            <?php  $_smarty_tpl->tpl_vars['pic_url'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pic_url']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pic_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pic_url']->key => $_smarty_tpl->tpl_vars['pic_url']->value){
$_smarty_tpl->tpl_vars['pic_url']->_loop = true;
?>
                <li class="fi-imgslist-item">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['pic_url']->value;?>
" alt="">
                    <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['pic_url']->value;?>
">
                    <a href="javascript:;" onclick="delete_batch_image(this);" class="del J_del_pic" title="删除这张图"><i class="gicon-remove"></i></a>
                </li>
            <?php } ?>
            <li class="fi-imgslist-item" id="J_add_pic">
                <a href="javascript:;" class="add" id="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
_uploader" title="上传一张新的图片">+</a>
            </li>
        </ul>
        <span class="fi-help-text <?php if ($_smarty_tpl->tpl_vars['warn']->value){?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['help']->value;?>
</span>
    </div>
</div><?php }} ?>