<?php /* Smarty version Smarty-3.1.7, created on 2021-07-03 09:22:01
         compiled from "plugin\project_download\template\edit_resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:261260dfbbb951a084-44935212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '193deefa145229b775065751901ed8756b33a6cf' => 
    array (
      0 => 'plugin\\project_download\\template\\edit_resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261260dfbbb951a084-44935212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_60dfbbb95463a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dfbbb95463a')) {function content_60dfbbb95463a($_smarty_tpl) {?><div id="projectDownModal" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog">
        <div class="modal-content" style="min-height: 200px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title">离线下载</h4>
            </div>
            <div class="modal-body">
                <p class="text-danger">提示：离线下载的项目里，将无法使用说一说，浏览统计，点赞统计等需要联网操作的功能。</p>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-12 text-center">
                         <a class="btn btn-primary" target="_blank" href="javascript:;" onClick="javascript:confirmDownload();">确认下载</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/plugin/project_download/js/project_download.js?v=1.4.2"></script><?php }} ?>