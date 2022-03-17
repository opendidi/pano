<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\custom_logo\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:3238460dfbbb9431f19-66759471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ac141b251b875fd0089c15cbc4e7bfbbc46434c' => 
    array (
      0 => 'plugin\\custom_logo\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3238460dfbbb9431f19-66759471',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb94ae38',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb94ae38')) {function content_60dfbbb94ae38($_smarty_tpl) {?><div id="logoModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title">自定义LOGO/作者</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">图片大小建议：120 x 120</p>
                <div class="text-center">
                    <img style="width:auto;height:120px;background-color:rgba(0, 0, 0, 0.3)" src="/plugin/custom_logo/images/custom_logo.png" onerror="">
                </div>
                <div class="text-center" style="margin-top:10px;">
                    <button type="button" class="btn btn-primary" data-modalid="#media_icon" data-imgtype="custom">从媒体库选择</button>
                    <button type="button" class="btn btn-default" style="display:none" onclick="removeLogoImg()">移除</button>
                </div>
                <div class="row" style="margin-top:10px">
                    <label class="col-md-3 text-right" style="height:32px;line-height:32px;">链接地址：</label>
                    <div class="col-md-8">
                        <input type="text" name="logolink" placeholder="请输入链接地址" class="form-control">
                    </div>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">完成</button>
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
            </div>
        </div>
    </div>
</div>
<script src="/plugin/custom_logo/js/custom_logo.js"></script><?php }} ?>