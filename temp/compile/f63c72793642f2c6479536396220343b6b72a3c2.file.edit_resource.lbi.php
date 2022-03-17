<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\open_alert\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:651360dfbbb93b0705-41436700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f63c72793642f2c6479536396220343b6b72a3c2' => 
    array (
      0 => 'plugin\\open_alert\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '651360dfbbb93b0705-41436700',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb93da43',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb93da43')) {function content_60dfbbb93da43($_smarty_tpl) {?><div class="modal fade" id="openModal" data-backdrop="static" data-keyboard="false" data-position="5%">
    <div class="modal-dialog modal-lg">
        <div class="modal-header">
            <h2>开场提示</h2>
        </div>
        <div class="modal-body">
            <div class="prompt_choose">
                <div class="radio">
                    <label><input type="radio" name="radioDefault" id="radioOptionsExample1" value="0"> 不使用提示</label>
                    <label><input type="radio" name="radioDefault" id="radioOptionsExample2" value="1"> 使用默认提示</label>
                </div>
                <a data-modalid="#media_icon" data-imgtype="custom" href="javascript:void(0);" class="icon_media">从媒体库选择图片</a>
                <img src="/plugin/open_alert/images/openalert.png"><label class="label" style="font-size:100%;margin-left:10px;">默认提示</label>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">完成</button>
        </div>
    </div>
</div>
<script src="/plugin/open_alert/js/open_alert.js"></script><?php }} ?>