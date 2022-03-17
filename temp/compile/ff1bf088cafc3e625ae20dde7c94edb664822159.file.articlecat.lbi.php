<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:33:39
         compiled from "F:/0766city/vradmin/template\lib\articlecat.lbi" */ ?>
<?php /*%%SmartyHeaderCode:247485b457a93e43df3-53794271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff1bf088cafc3e625ae20dde7c94edb664822159' => 
    array (
      0 => 'F:/0766city/vradmin/template\\lib\\articlecat.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '247485b457a93e43df3-53794271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
    'act' => 0,
    'ac' => 0,
    'res' => 0,
    'v' => 0,
    'v2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457a93ea690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457a93ea690')) {function content_5b457a93ea690($_smarty_tpl) {?><h3>
<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=articlecat&act=edit" class="actionBtn add">添加分类</a>
<div style="height:36px"></div>
</h3>

<?php if ($_smarty_tpl->tpl_vars['act']->value=='edit'){?>
<form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=articlecat" method="post" id="form">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <th width="80" align="right">分类名称</th>
       <td>
        <input type="text" name="cat_name" value="<?php echo $_smarty_tpl->tpl_vars['ac']->value['cat_name'];?>
" size="40" class="inpMain" />
       </td>
      </tr>
      
      <tr>
       <th align="right">上级分类</th>
       <td>
        <select name="parent_id">
            <option value="0">请选择</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['res']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			  <?php if ($_smarty_tpl->tpl_vars['v']->value['id']!=$_smarty_tpl->tpl_vars['ac']->value['id']){?>}
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['ac']->value['parent_id']==$_smarty_tpl->tpl_vars['v']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</option>
              <?php }?>
			<?php } ?>
          </select>
       </td>
      </tr>
      <tr>
       <th align="right">排序</th>
       <td>
        <input type="text" name="sort" value="<?php if ($_smarty_tpl->tpl_vars['ac']->value['sort']){?><?php echo $_smarty_tpl->tpl_vars['ac']->value['sort'];?>
<?php }else{ ?>29<?php }?>" size="5" class="inpMain" />
       </td>
      </tr>
      <tr>
       <th></th>
       <td> 
	      <div id="wrong_text" class="warning" style="display:none"></div>
		  <div class="clear"></div>
          <input type="hidden" name="act" value="edit">
          <input type="hidden" name="acid" value="<?php echo $_smarty_tpl->tpl_vars['ac']->value['id'];?>
">
          <input type="button" class="btn" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('form','提交');">
          <input class="btn" onclick="history.go(-1)" value="返回" type="button">
       </td>
      </tr>
     </table>
    </form>

<?php }else{ ?>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="120" align="left">分类id</th>
        <th width="120" align="left">分类名称</th>
     
        <th align="left">简单描述</th>
       <th width="60" align="center">排序</th>
        <th width="80" align="center">操作</th>
      </tr>

      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['res']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
    <tr>
      <td width="80"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
      <td width="200"><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['desc'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
      <td width="120">
      <a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=articlecat&act=edit&acid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a>　
      <a href="javascript:;" onclick="javascript:delete_article_cat(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
);">删除</a>
      </td>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
$_smarty_tpl->tpl_vars['v2']->_loop = true;
?>
    <tr>
      <td width="80"><?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
</td>
      <td width="200">　<?php echo $_smarty_tpl->tpl_vars['v2']->value['cat_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['desc'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v2']->value['sort'];?>
</td>
      <td width="120">
      <a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=articlecat&act=edit&acid=<?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
">编辑</a>　
      <a href="javascript:;" onclick="javascript:delete_article_cat(<?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
);">删除</a>
      </td>
    </tr>
    <?php } ?>
    <?php } ?>
            
            
 </table>
 <script type="text/javascript">
  function delete_article_cat(acid){
    if(confirm("确认删除该文章分类吗？")){
      $.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=articlecat&act=delete",{acid:acid},function(data){
        var data = json_decode(data);
        if(data.status==0){
          alert(data.msg);
          return false;
        }
        if(data.status==1){
          alert('删除成功！');
          window.location.reload();
        }
      });
    }
  }
  </script> 
 <?php }?> <?php }} ?>