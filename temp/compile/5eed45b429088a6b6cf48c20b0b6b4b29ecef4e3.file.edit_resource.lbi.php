<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\private_access\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1741460dfbbb954b498-89163870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eed45b429088a6b6cf48c20b0b6b4b29ecef4e3' => 
    array (
      0 => 'plugin\\private_access\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1741460dfbbb954b498-89163870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb954ed4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb954ed4')) {function content_60dfbbb954ed4($_smarty_tpl) {?><div id="PrivacyWordModal" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog">
        <div class="modal-content" style="min-height: 200px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title text-center">请输入3到20位访问密码</h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top:20px">
                    <div class="col-md-6 col-md-offset-3 ">
                        <input type="text" class="form-control" value="" id="privacy_password" placeholder="只能输入英文和数字">
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-6 col-md-offset-3 ">
                         <a class="btn btn-block btn-primary" target="_blank" href="javascript:;" onClick="javascript:confirmPrivacyWord();">确  定</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/plugin/private_access/js/private_access.js?v=1.0"></script><?php }} ?>