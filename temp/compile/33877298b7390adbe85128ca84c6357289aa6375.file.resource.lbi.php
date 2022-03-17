<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\gyro\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:142065b457aa92f1fa7-53413064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33877298b7390adbe85128ca84c6357289aa6375' => 
    array (
      0 => 'plugin\\gyro\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142065b457aa92f1fa7-53413064',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa92f739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa92f739')) {function content_5b457aa92f739($_smarty_tpl) {?><script>
$(function(){
	plugins_init_function.push(gyro_init);
})
function gyro_init(data,settings){
	 if (data.gyro!="0") {
            $(".btn_gyro").show;
     }
     settings['skin_settings.gyro'] = data.gyro=="1" ? true : false;
}
function showGyroBtn() {
    var gyro = $("body").data("panoData").gyro;
    if (gyro) {
        var krpano = document.getElementById('krpanoSWFObject');
        krpano.set("plugin[skin_gyro].enabled",true);
        $(".btn_gyro").show();
    }
}

function toggleGyro(el) {
    var krpano = document.getElementById('krpanoSWFObject');
    if ($(el).hasClass("btn_gyro")) {
        krpano.set("plugin[skin_gyro].enabled",false);
        $(el).removeClass("btn_gyro");
        $(el).addClass("btn_gyro_off");
    } else {
        krpano.set("plugin[skin_gyro].enabled",true);
        $(el).removeClass("btn_gyro_off");
        $(el).addClass("btn_gyro");
    }
}
function openGyro(){
    var krpano = document.getElementById('krpanoSWFObject');
    alert(krpano.get("plugin[skin_gyro].isavailable"));
}
</script><?php }} ?>