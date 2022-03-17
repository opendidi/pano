var uploadFlag = false;
var tokenObj={};
var  polist =  new Array();
var click_type;//点击按钮类型 封面 背景 音乐
var src;
$(function(){
    
    $("#workCover").click(function(){
         $("#media_icon").modal('show');
         click_type = 'img_path';
    });
    $("#img_background").click(function(){
         $("#media_icon").modal('show');
         click_type = 'background';
    });
    $("#musics").click(function(){
         $("#media_icon").modal('show');
         click_type = 'music';
    });

    $("#addimg").click(function(){
        $("#media_icon").modal('show');
         click_type = 'ring_around_img';
    });

    $("#update_obj").click(function(){
        $("#media_icon").modal('show');
         click_type = 'obj';
    });

    $("#update_mtl").click(function(){
        $("#media_icon").modal('show');
         click_type = 'mtl';
    });

    $("#imgUpload").fileinput({
        language: 'zh',
        showUpload: false, 
        showRemove: false, 
        showCancel: false,
        showPreview: true,
        showCaption: false,
        allowedFileExtensions: ["jpg", "png",'mp3','obj','mtl'],
        browseClass: "btn btn-primary",
        browseLabel: "选择音乐/图片文件",
        browseIcon: "<i class=\"icon icon-file-o\"></i> ",
        uploadUrl: up_url,
        uploadAsync: true,
        textEncoding: "UTF-8",
        layoutTemplates: {
            actions: ''
        },
        uploadExtraData: buildExtraData
    }).on("filebatchselected", function (event, files) {
        var type = files[0].type;
        if (type=="image/jpeg"||type=="image/png"||type=="audio/mp3" ||type==""){
             $("#imgUpload").fileinput("upload");
        }else{
             $.zui.messager.show("请选择格式为jpg,png的图片或MP3的音乐", {placement: 'center', time: '3000', icon: 'check'});
            $("#imgUpload").fileinput("clear");
        }
    }).on('filebatchuploadcomplete', function () {
        $.zui.messager.show('图片上传成功', {placement: 'center', type: 'success', time: '3000', icon: 'check'});
        $("#imgUpload").fileinput("clear");
        //上传成功，替换封面
        upload_img();
        uploadFlag = true;
    });

})
function buildExtraData() {
    if (tokenObj.key || uploadFlag) {
        //已经上传成功
        if (uploadFlag) {
            tokenObj = {};
            polist =  new Array();
            uploadFlag = false;
        }
        return tokenObj;
    }
    var files = $('#imgUpload').fileinput('getFileStack');
    if (files.length>0) {
        var sb = _U.getSubmit('/get_token.php', null, 'ajax', true);
        var name = files[0].name;
        var size = files[0].size;
        sb.pushData("mediaType", '0');
        sb.pushData("filename", name);
        sb.pushData("filesize", size + "");
        sb.pushData("act","ring_around_edit");
        sb.submit(function () {
        }, function (data) {
            data.prefix = prefix;
            if(data.token){
                tokenObj.token = data.token;
                tokenObj.key =  data.prefix+data.key;
            }else if(data.policy){
                tokenObj.key =  data.prefix+data.key;
                tokenObj.policy = data.policy;
                tokenObj.signature = data.signature;
                tokenObj.OSSAccessKeyId = data.accessid;
                tokenObj.host = data.host;
			}else{
				tokenObj.key = data.prefix+data.key;
				tokenObj.prefix = data.prefix;
            }
        });
        return tokenObj;
    }
}

function confirmChoseCover(){
    $("#thumbpath").attr('src',$("#pic span img.img-selected").data('key'));
     $("#media_icon").modal('hide'); 
}

// 上传成功，处理数据
function upload_img(){
    $("#media_icon").modal('hide');
    if(click_type == 'ring_around_img'){
        $.post("/edit/ring_around",{
            act:'ring_around_img_add',
            rid:rid,
            key:tokenObj.key,
        },function(data){
            if(data.status==1){
                var h ="";
                var p = data.data;
                h = '<div class="col-md-4 " id="source_'+p.id+'">'+
                        '<a class="card">'+
                        '<div class="top_cover"><span class="pull-right" onclick="delete_source('+p.id+')"><i class="icon-trash"></i>删除</span></div>'+
                        '<img src="'+p.img_path+'" style="height:200px;width:100%" >'+
                        '</a>'+
                    '</div>';
                $('#source_wrap').append(h);
            }
        },'json'); 
    }else{
         $.post("/edit/ring_around",{
            act:'ring_around_edit',
            rid:rid,
            key:tokenObj.key,
            type:click_type
        },function(data){
            if(data.status==1){
                if(click_type=='obj'||click_type=='mtl'){
                    $('#'+click_type).attr('href',data.src)
                }else{
                    $('#'+click_type).attr('src',data.src)
                }
                
            }
        },'json'); 
    }
    
}

//删除图片
function delete_source(img_id){
    $.post('/edit/ring_around',{
        act:'delete_source',
        id:img_id
    },function(data){
        $('#source_'+data.id).remove();
    },'json');
}

function preview_ring_around(id){
    window.open(cdn_host+"ring_around/index.html?id="+id+"");
}

//input失去焦点修改链接或名称
function update_ring(t,el){
    var val = $(el).val();
    if(val==""){
        return false;
    }
    $.post('/edit/ring_around',{
        act:'update_ring',
        type:t,
        value:val,
        rid:rid
    },function(data){
        if(data.status==1){
            // $("#"t).val(data.msg);
        }else{
            alert(data.msg);
        }
    },'json');

}
