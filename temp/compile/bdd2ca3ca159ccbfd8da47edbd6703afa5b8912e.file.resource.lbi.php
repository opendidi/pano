<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\profile\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:70595b457aa93b5600-44637397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdd2ca3ca159ccbfd8da47edbd6703afa5b8912e' => 
    array (
      0 => 'plugin\\profile\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70595b457aa93b5600-44637397',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa93b954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa93b954')) {function content_5b457aa93b954($_smarty_tpl) {?><div class="modal" id="infomationModal" data-backdrop="static" data-keyboard="false" style="z-index:2002">
    <div class="modal-dialog">
        <div class="modal-header text-center" >
            <button type="button" class="close" onClick="hideProfile()"><span>&times;</span></button>
            <span style="color: #353535;font-weight:700" id="profileWorkName"></span>
        </div>
        <div class="modal-body" style="height:250px;overflow-y:scroll ">
            <div class="row">
                <div class="col-sm-offset-1 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
                    <span id="profileProfile"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
         plugins_init_function.push(profile_init);
    })
    function profile_init(data){
       if(data.hideprofile_flag == '1'){
            $("#profileDiv").hide();
        }
    }
    function hideProfile() {
        $('#infomationModal').modal('hide');
        toggleBtns(true);
    }
    function showProfile() {
        toggleBtns(false);
        var data = $("body").data("panoData");
        $('#profileWorkName').text('');
        $('#profileProfile').text('');
        $('#profileWorkName').text(data.name);
        $('#profileProfile').text(data.profile==null?"":data.profile);
        $('#infomationModal').modal("show");
    }
</script><?php }} ?>