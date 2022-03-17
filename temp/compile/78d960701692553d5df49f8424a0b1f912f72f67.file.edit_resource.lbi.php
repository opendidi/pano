<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\link\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1083760dfbbb9357351-54210156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78d960701692553d5df49f8424a0b1f912f72f67' => 
    array (
      0 => 'plugin\\link\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1083760dfbbb9357351-54210156',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb935a39',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb935a39')) {function content_60dfbbb935a39($_smarty_tpl) {?><div class="modal fade" id="myLinkModal" data-backdrop="static" data-keyboard="false" data-position="5%">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">链接、电话与导航</h2>
            </div>
            <div class="modal-body" style="padding:10px">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" onclick="addLinkOrPhoneNumRow()">添加网站链接(或电话号码)</button>
                        <button class="btn btn-primary" onclick="addMapRow()">添加地图导航</button>
                        <span class="text-muted">可自定义三个网站地址(或电话号码、地图导航)</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span><button class="btn btn-primary" onclick="linkOkClick()">完成</button></span>
            </div>
        </div>
    </div>
</div>
<script src="/plugin/link/js/link_edit.js"></script><?php }} ?>