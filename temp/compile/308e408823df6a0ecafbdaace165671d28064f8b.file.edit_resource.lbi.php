<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\custom_user\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:408760dfbbb94b3233-50598865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '308e408823df6a0ecafbdaace165671d28064f8b' => 
    array (
      0 => 'plugin\\custom_user\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '408760dfbbb94b3233-50598865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb9514e0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb9514e0')) {function content_60dfbbb9514e0($_smarty_tpl) {?><div id="userModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title">自定义作者名</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">作者名称不能超过20个字符</p>
                <div class="row" style="margin-top:10px">
                    <label class="col-md-3 text-right" style="height:32px;line-height:32px;">作者姓名：</label>
                    <div class="col-md-8">
                        <input type="text" name="user" placeholder="请输入作者姓名" class="form-control" maxlength="20">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">完成</button>
            </div>
        </div>
    </div>
</div>
<script src="/plugin/custom_user/js/custom_user.js"></script><?php }} ?>