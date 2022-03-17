<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\top_ad\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1629260dfbbb9553609-16508244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a2093a9569fd34e5df125440e087786664b8b7a' => 
    array (
      0 => 'plugin\\top_ad\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1629260dfbbb9553609-16508244',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb9573ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb9573ba')) {function content_60dfbbb9573ba($_smarty_tpl) {?><div id="topAdModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title">自定义广告语</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">广告语不能超过255个字符,若不想使用该功能，请保持内容为空</p>
                <div class="row" style="margin-top:10px">
                    <label class="col-md-3 text-right" style="height:32px;line-height:32px;">内容：</label>
                    <div class="col-md-8">
                        <input type="text" name="adcontent" placeholder="请输入内容" class="form-control" maxlength="255">
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-md-offset-3 col-md-8" id="top_ad_type_wrap">
                                <div class="checkbox">
                                 <label>
                                    <input type="checkbox" name="allow_sysad"> 允许显示系统广告
                                  </label>
                                </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">完成</button>
            </div>
        </div>
    </div>
</div>
<script src="/plugin/top_ad/js/top_ad.js"></script><?php }} ?>