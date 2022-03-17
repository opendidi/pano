<?php /* Smarty version Smarty-3.1.7, created on 2018-07-11 11:34:01
         compiled from "plugin\link\template\resource.lbi" */ ?>
<?php /*%%SmartyHeaderCode:72485b457aa9304709-02903852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29e5b73f4a335913c9e98d9dcd413108438e16ba' => 
    array (
      0 => 'plugin\\link\\template\\resource.lbi',
      1 => 1530676515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72485b457aa9304709-02903852',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b457aa930bc2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b457aa930bc2')) {function content_5b457aa930bc2($_smarty_tpl) {?><script>
	$(function(){
		plugins_init_function.push(link_init);
	   $('#mapMarkModal').on('hide.zui.modal', function (e) {
	        toggleBtns(true);
	    });
	})
	function link_init(data){
		$(".vrshow_container_3_min .img_desc_container_min:first").nextAll().remove();
		if (data.url_phone_nvg.linkSettings && data.url_phone_nvg.linkSettings.length > 0) {
		    $(data.url_phone_nvg.linkSettings).each(function(idx){
		        var imgSrc = this.imgPath;
		        var title = this.title;
		        var htmlStr = '';
		        if(this.type == 0){
		            var locationData = this.content;
		            htmlStr += '<div class="img_desc_container_min img_add" >'+
		                '<img src="'+imgSrc+'" onclick="openMapModal(this,true)">'+
		                '<div class="img_desc_min">'+title+'</div>'+
		                '</div>';
		            $(".vrshow_container_3_min").append(htmlStr);
		            $(".vrshow_container_3_min > div:last img").data("locationData",locationData);
		        }else{
		            var url = this.content;
		            if(!isNaN(url)){
		                url = "tel://" + url;
		            }else{
		                if(url.indexOf('http://') != 0&&url.indexOf('https://') != 0){
		                    url = 'http://' + url;
		                }
		            }
		            htmlStr += '<div class="img_desc_container_min img_add" >'+
		                '<img src="'+imgSrc+'" onclick="lookLinkUrl(\''+url+'\')" '+(isIos()?'':'data-toggle="tooltip"')+' title="'+(url.length > 20 ? url.substring(0,20)+'...' : url)+'">'+
		                '<div class="img_desc_min">'+title+'</div>'+
		                '</div>';
		            $(".vrshow_container_3_min").append(htmlStr);
		        }
		    });
		    $('.vrshow_container_3_min [data-toggle=tooltip]').tooltip({});
		}
	}
	function isIos(){
		var ua = navigator.userAgent.toLowerCase();	
		if (/iphone|ipad|ipod/.test(ua)) {
				return true;	
		} 
		return false;
	}
	function lookLinkUrl(url){
	
    	window.open(url);
	}
	function openMapModal(el,readonly){
		// toggleBtns();
	    mapModalEl = el;
	    _U.mapMarkModal().openModal($(mapModalEl).data("locationData"),readonly);
	}
</script><?php }} ?>