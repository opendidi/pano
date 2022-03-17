<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\bgmusic\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:1903160dfbbb92c1ba3-12234684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a4cff0814fc5fbfe13c22a60bb86be5f66265dd' => 
    array (
      0 => 'plugin\\bgmusic\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1903160dfbbb92c1ba3-12234684',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb930304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb930304')) {function content_60dfbbb930304($_smarty_tpl) {?><div class="modal fade" id="bgMusicModal" data-backdrop="static" data-keyboard="false" data-position="5%">
    <div class="modal-dialog modal-lg">
       <div class="modal-header">
            <h2>背景音乐</h2>
        </div>
        <div class="modal-content">
            <div class="voice">
                <div class="radio">
                    <label><input type="radio" name="radioMusic" checked="checked" value="0"> 全局背景音乐</label>
                    <label><input type="radio" name="radioMusic" value="1"> 单个场景背景音乐</label>
                </div>
                <div class="voice_content">
                    <div>
                        <div class="row">
                            <div class="col-md-4"><label>还未选择音乐</label></div>
                            <div class="col-md-4">
                                <a data-modalid="#media_icon" data-mediatype="1" data-imgtype="custom" href="javascript:void(0);" class="icon_media">个人媒体库音乐</a>&nbsp;&nbsp;
                                <a data-modalid="#media_icon" data-mediatype="1" data-imgtype="system" data-subtype="def_msc" href="javascript:void(0);" class="icon_media">系统音乐</a>
                            </div>
                            <!--  <div class="col-md-2"></div> -->
                            <div class="col-md-4">
                                <div class="btn-group">
                                    <button class="btn voice-music-play" disabled="disabled" onclick="playVoice(this)">试听</button>
                                    <button class="btn" disabled="disabled" onclick="removeVoice(this)">移除</button>
                                    <audio src="" style="display:none" preload="none"></audio>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: none">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">完成</button>
        </div>
    </div>
</div>
<script src="/plugin/bgmusic/js/bgmusic_edit.js"></script><?php }} ?>