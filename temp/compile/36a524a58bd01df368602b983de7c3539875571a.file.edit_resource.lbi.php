<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\shade_sky_floor\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:421560dfbbb935ea78-04423895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36a524a58bd01df368602b983de7c3539875571a' => 
    array (
      0 => 'plugin\\shade_sky_floor\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '421560dfbbb935ea78-04423895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb93abd0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb93abd0')) {function content_60dfbbb93abd0($_smarty_tpl) {?><div class="modal fade" id="skyModal" data-backdrop="static" data-keyboard="false" data-position="5%">
    <div class="modal-dialog modal-lg">
        <div class="modal-header">
            <h2>天空地面遮罩</h2>
        </div>
        <div class="modal-body">
            <div class="sky">
                <div class="radio allSingle">
                    <label><input type="radio" id="shadeWholeSetting" name="radioOptionsExample" value="0" checked="checked"> 全局设置</label>
                    <label><input type="radio" id="shadeOneSetting" name="radioOptionsExample" value="1"> 单场设置</label>
                </div>
                <div class="sky_content">
                    <div id="wholeDiv">
                        <div class="row">
                            <div class="label_radio">
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label><input type="radio" name="radio1" value="0" checked="checked"> 不使用遮罩</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="radio1" value="1">使用<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
遮罩</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a data-modalid="#media_icon" data-imgtype="custom" href="javascript:void(0);" class="icon_media">从媒体库选择图片</a>
                            </div>
                            <div class="use_around" style="display:none">
                                <div class="col-md-1">
                                    <img style="margin-top: 10px;" src="/plugin/shade_sky_floor/images/shade_sky_floor.png">
                                </div>
                                <div class="col-md-4">
                                    <label style="margin-top: 10px;"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
补地</label>

                                    <div class="radio" style="margin-top:-10px;">
                                        <label><input type="radio" name="radio" value="0">天空</label>
                                        <label><input type="radio" name="radio" value="1" checked="checked">地面</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: none;" id="oneDiv">

                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">完成</button>
        </div>
    </div>
</div>
<script src="/plugin/shade_sky_floor/js/shade_sky_floor.js"></script><?php }} ?>