<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:20:00
         compiled from "D:/VR/VR0002/vradmin/template\lib\pages.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1998460dfbb402f50d4-10273949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a1f40f70e197b4f832c69a21243fc206d631f0' => 
    array (
      0 => 'D:/VR/VR0002/vradmin/template\\lib\\pages.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1998460dfbb402f50d4-10273949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allPages' => 0,
    'allNum' => 0,
    'pages' => 0,
    'p' => 0,
    'page' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbb4030924',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbb4030924')) {function content_60dfbb4030924($_smarty_tpl) {?><style type="text/css">
.pagebox{
text-align:center;
margin-top:10px;
}
.pagebox span{
margin-left:-10px;
}
a.apage{
height:25px;line-height:25px;padding:3px 6px;margin-right:10px;border:1px solid #ccc;border-radius:3px;
}
a.apage.on, a.apage:hover{
background: #60BBFF;border:1px solid #75a2c3;color:#fff;
}
</style>
<?php if ($_smarty_tpl->tpl_vars['allPages']->value>1){?>
 <div class="pagebox">
  <span class="s12">共<?php echo $_smarty_tpl->tpl_vars['allNum']->value;?>
条/<?php echo $_smarty_tpl->tpl_vars['allPages']->value;?>
页　</span>
  <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
   <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['url'];?>
" class="s12 apage <?php if ($_smarty_tpl->tpl_vars['p']->value['num']==$_smarty_tpl->tpl_vars['page']->value){?>on<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</a>
   <?php if ($_smarty_tpl->tpl_vars['allPages']->value>7){?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value==1&&$_smarty_tpl->tpl_vars['k']->value==6){?>
     <span class="c66">...</span>
    <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['page']->value>1&&($_smarty_tpl->tpl_vars['allPages']->value-$_smarty_tpl->tpl_vars['page']->value)>3&&$_smarty_tpl->tpl_vars['k']->value==8){?>
     <span class="c66">...</span>
    <?php }?>
   <?php }?> 
  <?php } ?>
 </div>
<?php }?><?php }} ?>