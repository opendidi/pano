function Upload_Video(){
	this.videoParams={};
	this.videoParams.videos = new Array();
	this.video_key="";
	this.mime_types="mp4,rmvb";
	this.max_file_size="300mb";
	this.multiple=true;
	this.request_params_callback=set_request_upload_param;
	this.bind_callback=set_bind_callback;
	this.act="video";
	this.btn_id="";
	this.l_params={};//附加参数
	this.video_up=null;

	this.Init=function(btn_id,url,success_callback,act,request_params_callback,mime_types,max_file_size,multiple,style_callback){
		this.multiple=(typeof(mime_types)=="undefined" || mime_types==null || mime_types=="")?true:false;
		this.btn_id=btn_id;
		if((typeof(mime_types)!="undefined" && mime_types!=null && mime_types!="")){this.mime_types=mime_types;}
		if((typeof(max_file_size)!="undefined" && max_file_size!=null && max_file_size!="")){this.max_file_size=max_file_size;}
		if(request_params_callback){this.request_params_callback=request_params_callback};
		if(act){this.act=act};
		this.video_up=upload_video(this,btn_id,url,success_callback,this.act,this.request_params_callback,this.mime_types,this.max_file_size,this.multiple,style_callback);
		return this.video_up;
	}
}

function upload_video(obj,btn_id,url,success_callback,act,request_params_callback,mi_types,max_file_size,multiple,style_callback){
		var video_up= new plupload.Uploader({
		    runtimes : 'html5,flash,silverlight,html4',
		    browse_button : btn_id, 
		    multi_selection: false,
		    flash_swf_url: '/static/js/plupload/Moxie.swf',
		    silverlight_xap_url : '/static/js/plupload/Moxie.xap',
		    url : url,
		    filters: {
	            mime_types : [ //只允许上传图片
	            	{ title : "Video files", extensions : mi_types }
	            ],
	            max_file_size : max_file_size, //
	            prevent_duplicates : true //不允许选取重复文件
	        },
		    init: {
		        PostInit: function(up) {
		        	request_params_callback(obj,up, '', false,url);
		        },
		        FilesAdded: function(up, files) {
					var file= files[files.length-1];
					if(style_callback){

						style_callback(up,file,obj);
					}
					else{
						if(multiple){
							bindData(up,file);
						}
						else {
							if(up.files.length>1){
				        		up.removeFile(up.files[0]);
				        		$("#fsUploadProgress").html("");
			        		}
							bindData(up,file);
						}
					}
		            return false;
		        },
		        BeforeUpload: function(up, file) {
		            $("#"+btn_id).css('pointer-events','none');
		            request_params_callback(obj,up, file.name, true,url);
		        },

		        UploadProgress: function(up, file) {
		            var d = document.getElementById(file.id);
		          	if(null==d)return false;
		            d.getElementsByTagName('span')[0].innerHTML = '  ' + file.percent + "%";
		            var progBar = d.getElementsByTagName('div')[0];
		            // var progBar = prog.getElementsByTagName('div')[0]
		            progBar.style.width= file.percent+'%';
		            progBar.setAttribute('aria-valuenow', file.percent);
		        },

		        FileUploaded: function(up, file, info) {
		            if (info.status == 200){  
    	                var video = {};
    	                video.location =obj.video_key;
    	                video.name = file.name;
    	                video.size = file.size;
    	                obj.videoParams.videos.push(video);
    	                var files = up.files;
    	                 if(files[files.length-1].id == file.id){
	    	                if(success_callback)
	    						success_callback(obj);
    					}
		            }
		            else
		            {
		            	if(typeof(alert_notice)!="undefined")
		                	alert_notice("上传失败");
		                else
		                	alert("上传失败");
		            } 
		            $("#selectfiles").css('pointer-events','');
		        },

		        Error: function(up, err) {
		            if (err.code == -600) {
		            	if(typeof(alert_notice)!="undefined")
		                	alert_notice("选择的文件太大了,不能超过"+obj.max_file_size);
		                else
		                	alert("选择的文件太大了,不能超过"+obj.max_file_size);
		            }
		            else if (err.code == -601) {
		            	if(typeof(alert_notice)!="undefined")
		                	 alert_notice("只能上传"+obj.mime_types+"格式大小的文件");
		                else
		                	 alert("只能上传jpg格式大小的图片");
		            }
		            else if (err.code == -602) {
		            	if(typeof(alert_notice)!="undefined")
		                	 alert_notice("这个文件已经上传过一遍了");
		                else
		                	 alert("这个文件已经上传过一遍了");
		            }
		            else 
		            {   
		            	if(typeof(alert_notice)!="undefined")
		                	alert_notice("上传异常");
		                else
		                	alert("上传异常");
		            }
		        }
		    }
		});
	video_up.init();
	return video_up;
}

function set_bind_callback(obj,key,prefix){

}

function bindData(up,file){
	$("#fsUploadProgress").append('<tr>'+
        '<th class="col-md-4">'+file.name+'</th>'+
        '<th class="col-md-3">'+(file.size/1024).toFixed(1)+' KB</th>'+
        '<th class="col-md-6"><div class="progress progress-striped" id="'+file.id+'">'+
        '<div class="progress-bar progress-bar-success" style="width: 0%"></div>'+
        '<span class="text-muted" style="font-size:11px;font-weight:normal;">点击下方发布按钮开始上传</span>'+
        '<a href="javascript:void(0)" class="text-danger store-delete" onclick="del_click(this)" data-id="'+file.id+'" title="删除">'+
        '<i class="icon-trash pull-right"></i></a></div></th>'+
      	'</tr>');
	$("#video_up_table").show();
	$("#fsUploadProgress a[data-id="+file.id+"]").data('data',up);
}

function del_click(obj){
	var file_id=$(obj).attr("data-id");
	var up=	$("#fsUploadProgress a[data-id="+file_id+"]").data('data');
	var file=up.getFile(file_id);
	if(file){	
		$(obj).parents('tr').remove();
		up.removeFile(file);
	}
}

function set_request_upload_param(obj,up,filename,ret,url){
    if (ret == false){
        qn_video_token ={};
    	$.ajax({
    		url:"/get_token.php",
    		data:{"act":obj.act},
    		async: false,
    		success:function(result){
    		 	result = eval("("+result+")");
    		 	qn_video_token.prefix= result.prefix;
    		 	qn_video_token.type=result.type;
    		 	if (result.type=="1") {
    		 		//七牛
                	qn_video_token.token=result.token;
    		 	}
    		 	else if (result.type=="2") {
    		 		//OSS
    		 		qn_video_token.policy = result.policy;
    		 		qn_video_token.OSSAccessKeyId = result.accessid;
    		 		qn_video_token.host = result.host;
    		 		qn_video_token.signature = result.signature;
		 		}
		 		else if(result.type=="0"){
		 			//本地
		 		}
    		}
    	})
    }else{
        obj.video_key = qn_video_token.prefix+generico_name()+filename.substr(filename.lastIndexOf("."));
        var new_multipart_params={
			'key' : obj.video_key,
            'prefix':qn_video_token.prefix,
            'success_action_status':'200' //让服务端返回200,不然，默认会返回204
        };

        if (qn_video_token.type=="1") {
        	//七牛
        	new_multipart_params.token=qn_video_token.token;
        }
        else if (qn_video_token.type=="2") {
        	//OSS
            new_multipart_params.policy= qn_video_token.policy;
            new_multipart_params.OSSAccessKeyId=qn_video_token.OSSAccessKeyId;
            new_multipart_params.host= qn_video_token.host;
            new_multipart_params.signature=qn_video_token.signature
        }
        else if (qn_video_token.type=="0") {
        	//本地
        }

	    up.setOption({
	        'url': url,
	        'multipart_params': new_multipart_params
	    });
	}
}
 function generico_name() {
　　var $chars = 'abcdefghijklmnopqrstwxyz0123456789';
　　var maxPos = $chars.length;
　　var pwd = '';
　　for (i = 0; i < 3; i++) {
　　　　pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
　　}
　　return new Date().getTime()+pwd;
}
