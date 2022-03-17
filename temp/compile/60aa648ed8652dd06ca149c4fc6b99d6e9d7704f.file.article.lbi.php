<?php /* Smarty version Smarty-3.1.7, created on 2018-12-10 10:58:26
         compiled from "D:/phpStudy/WWW/vradmin/template\lib\article.lbi" */ ?>
<?php /*%%SmartyHeaderCode:325415b3c430ed1a4d2-05097619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60aa648ed8652dd06ca149c4fc6b99d6e9d7704f' => 
    array (
      0 => 'D:/phpStudy/WWW/vradmin/template\\lib\\article.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325415b3c430ed1a4d2-05097619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b3c430edaad5',
  'variables' => 
  array (
    'act' => 0,
    '_lang' => 0,
    'a' => 0,
    'res' => 0,
    'v' => 0,
    'v2' => 0,
    'cats' => 0,
    'cat_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c430edaad5')) {function content_5b3c430edaad5($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['act']->value=='edit'){?>
  <form action="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article" id="form" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <th width="90" align="right">文章标题*</th>
       <td>
        <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <th align="right">文章分类</th>
       <td>
        <select name="cat_id">
            <option value="0">请选择</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['res']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['a']->value['cat_id']==$_smarty_tpl->tpl_vars['v']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</option>
              <?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
$_smarty_tpl->tpl_vars['v2']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['a']->value['cat_id']==$_smarty_tpl->tpl_vars['v2']->value['id']){?>selected<?php }?>>　<?php echo $_smarty_tpl->tpl_vars['v2']->value['cat_name'];?>
</option>
              <?php } ?>
            <?php } ?>
          </select>　
		  不选择文章分类则是单页面
       </td>
      </tr>
      <tr>
       <th align="right">关键字</th>
       <td>
        <input type="text" name="keywords" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['keywords'];?>
" size="50" class="inpMain" />　空格隔开，可为空
       </td>
      </tr>
	  <tr>
       <th align="right">导航显示</th>
       <td>
        <label><input type="radio" name="is_nav" value="" size="50" class="inpMain" <?php if (empty($_smarty_tpl->tpl_vars['a']->value['is_nav'])){?>checked<?php }?> /> 无</label>　
        <label><input type="radio" name="is_nav" value="left_bottom" size="50" class="inpMain" <?php if ($_smarty_tpl->tpl_vars['a']->value['is_nav']=='left_bottom'){?>checked<?php }?>/> 左下底部</label>
	   </td>
      </tr>
	  <tr>
       <th align="right">排序</th>
       <td>
        <input type="text" name="sort" value="<?php if ($_smarty_tpl->tpl_vars['a']->value['sort']){?><?php echo $_smarty_tpl->tpl_vars['a']->value['sort'];?>
<?php }else{ ?>199<?php }?>" size="5" class="inpMain" />
       </td>
      </tr>
	  <tr>
       <th align="right">访问量</th>
       <td>
        <input type="text" name="visits" value="<?php if ($_smarty_tpl->tpl_vars['a']->value['visits']){?><?php echo $_smarty_tpl->tpl_vars['a']->value['visits'];?>
<?php }else{ ?>1000<?php }?>" size="5" class="inpMain" />
       </td>
      </tr>
	  <tr>
       <th align="right">最新更新</th>
       <td>
        <input type="text" name="createtime" value="<?php if ($_smarty_tpl->tpl_vars['a']->value['createtime']){?><?php echo $_smarty_tpl->tpl_vars['a']->value['createtime'];?>
<?php }else{ ?><?php echo date('Y-m-d H:i:s',Common::gmtime());?>
<?php }?>" size="20" class="inpMain" />　
		默认为当前时间
       </td>
      </tr>
      <tr>
       <th align="right">文章内容*</th>
       <td>
        <script type="text/javascript" src="/static/kindeditor/kindeditor-min.js"></script>
        <script type="text/javascript" src="/static/kindeditor/lang/zh_CN.js"></script> 
        <script type="text/javascript">
        KindEditor.ready(function(K) {
          editor = K.create('textarea[name="content"]', {
            resizeType : 1, 
            allowPreviewEmoticons : false,
            allowMediaUpload : false,
            allowFlashUpload : false,
            allowFileManager : false,
            
            afterChange : function(){this.sync();},
            afterBlur : function(){this.sync();},
            
            uploadJson : '/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/upload.php?act=article',
            cssPath : '/static/kindeditor/fontSize.css',
            items : [
              'fullscreen','source','code','|',
              'formatblock','forecolor', 'hilitecolor','fontname', 'fontsize', '|', 
              'bold', 'italic', 'underline','removeformat', '|', 
              'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', 'link','|',
              'flash', 'media','image','|',
              'baidumap','preview'
              ]
          });
        });
        </script>
        <textarea name="content" id="content" style="width:750px;height:400px"><?php echo $_smarty_tpl->tpl_vars['a']->value['content'];?>
</textarea>
       </td>
      </tr>
      <tr>
       <th></th>
       <td>
          <div id="wrong_text" class="warning" style="display:none"></div>
          <div class="clear"></div>
          <input type="hidden" name="act" value="edit">
          <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['a']->value['id'];?>
">
          <input type="button" class="btn" value="提交" id="sub_btn" onclick="javascript:ajaxFormSubmit('form','提交');">
          <input class="btn" onclick="history.go(-1)" value="返回" type="button">
       </td>
      </tr>
     </table>
    </form>
<?php }else{ ?>
    <h3>
		<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article&act=edit" class="actionBtn add">添加文章</a>
		<form  act="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article" method="post">
		文章分类：<select name="cat_id">
				<option value="0">请选择</option>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id']==$_smarty_tpl->tpl_vars['cat_id']->value){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</option> 
					<?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
$_smarty_tpl->tpl_vars['v2']->_loop = true;
?>
					  <option value="<?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v2']->value['id']==$_smarty_tpl->tpl_vars['cat_id']->value){?> selected="selected" <?php }?>>　<?php echo $_smarty_tpl->tpl_vars['v2']->value['cat_name'];?>
</option> 
					<?php } ?>
				<?php } ?>
		 </select>
		 <input id="search" class="btn" type="submit" value="查询" />
		</form>
	</h3>

 <div id="list">
    <form name="action" method="post" action="article.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
      <th width="40" align="center">文章id</th>
      <th align="left">文章标题</th>
      <th width="150" align="center">文章分类</th>
	  <th width="80" align="center">排序</th>
      <th width="120" align="center">发布日期</th>
      <th width="120" align="center">操作</th>
     </tr>
     <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
     <tr>
      <td align="center" class="check"><input type="checkbox" name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" /></td>
      <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
      <td ><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</td>
      <td align="center" class="cata"><a><?php if (empty($_smarty_tpl->tpl_vars['v']->value['cat_name'])){?>单页面<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
<?php }?></a></td>
      <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
	  <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['createtime'];?>
</td>
      <td align="center">
	    <a href="/article?aid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank">预览</a>　
		<a href="/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a>　
	    <a href="javascript:;" onclick="javascript:delete_article(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
);">删除</a>
	  </td>
     </tr>
    <?php } ?>    
    </table>
    <div class="action">
     <select name="action">
      <option value="0">请选择...</option>
      <option value="del_all">删除</option>
      <option value="category_move">移动分类至</option>
     </select>
     <select name="new_cat_id" style="display:none">
     <option value="0">请选择</option>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id']==$_smarty_tpl->tpl_vars['cat_id']->value){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</option> 
			<?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
$_smarty_tpl->tpl_vars['v2']->_loop = true;
?>
			  <option value="<?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v2']->value['id']==$_smarty_tpl->tpl_vars['cat_id']->value){?> selected="selected" <?php }?>>　<?php echo $_smarty_tpl->tpl_vars['v2']->value['cat_name'];?>
</option> 
			<?php } ?>
	<?php } ?>
	</select>
     <input name="submit" class="btn" id="exec" type="button" value="执行" />
    </div>
    </form>
    </div>
    
  </div>
 <?php }?>

<script type="text/javascript">
$('[name="action"]').change(function(){
	var act=$('[name="action"] :selected').val();
	if(act=='category_move'){
		$('[name="new_cat_id"]').show();
	}else{
		$('[name="new_cat_id"]').hide();
	}
});
$('#exec').click(function(){
	var act=$('[name="action"] :selected').val();
    if(act==0){
	   alert('请先选择操作');
	   return;
    }
	var ids=[];
	$(".check :checked").not('#chkall').each(function(i,n){
	ids.push($(this).val());
});
        
if(act=='del_all'){
  if(ids.length==0){
		alert('请至少选择一篇文章');
		return;
  }
  if(confirm("确定要删除所选文章吗，删除后将不可恢复？")){          
	  $.post('/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article&act=delete',{ids:ids},function(data){
		if(data.status==1){
		  $(".check :checked").not('#chkall').parent('td').siblings('td').remove();
		  $(".check :checked").parent('td').remove();
		  alert('删除成功');
		  window.location.reload();
		}else{
		  alert('删除失败');
		}
	  },'json');
		
	}
}else if(act=='category_move'){
        if(ids.length==0){
          alert('请至少选择一篇文章');
          return;
      }
      var newcatid=$('[name="new_cat_id"]').val();
      if(newcatid==0){
        alert('请选择分类!');return;

      }


    if(confirm("确定要移动文章吗？")){
        $.post('/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article&act=move',{ids:ids,newcatid:newcatid},function(data){
          if(data.status==1){
            var texts=$('[name="new_cat_id"]').find("option:selected").text();
          $(".check :checked").not('#chkall').parent('td').siblings('td.cata').text(texts);
         $("[type='checkbox']").attr('checked',false);
            alert('移动成功');
			window.location.reload();
          }else{
            alert('移动失败');
          }
        },'json')   
      }
    }else{
    }
})

function delete_article(aid){
    if(confirm("确认删除该文章吗？")){
      $.post("/<?php echo $_smarty_tpl->tpl_vars['_lang']->value['admin_path'];?>
/?m=article&act=delete",{aid:aid},function(data){
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
<?php }} ?>