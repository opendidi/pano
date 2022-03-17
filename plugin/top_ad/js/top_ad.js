$(function(){
	plugins_init_function.push(top_ad_init);
    plugins_config_get_function.push(build_top_ad);
})
function top_ad_init(){
	var data = panoConfig.top_ad;
	if(data&&data.show!="0"){
	    if (data.allow_sys == "1") {
	    	$('#top_ad_type_wrap input[name="allow_sysad"]').attr('checked','true');
	    }
	    $('#topAdModal input[name="adcontent"]').val(data.adcontent);
	}
}
function openTopAdModal(){
    $("#topAdModal").modal('show');
}

function build_top_ad(panoConfigData){
	var topAdObj = {};
	if(panoConfig.top_ad){
		topAdObj = panoConfig.top_ad;
	}
	var adcontent = $.trim($('#topAdModal input[name="adcontent"]').val());
	topAdObj.allow_sys = $('#top_ad_type_wrap input[name="allow_sysad"]').is(':checked')?1:0;

	if(adcontent.length < 1&&!topAdObj.allow_sys){
		topAdObj.show = 0;
	}else{
		if (adcontent.length>255) 
			adcontent = adcontent.substring(0,255);
		topAdObj.show = 1;
		topAdObj.adcontent = adcontent;
	}
	 panoConfigData.top_ad = topAdObj;
	
}