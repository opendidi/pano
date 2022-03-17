//flag 标识是否从预览页打开 true
function obj_buildframes(oid,type){
	if(type == "obj"){
		$.post('/obj.php',{
			'act':'init_obj',
			'oid':oid
		},function(res){
			var krpano = document.getElementById('krpanoSWFObject');
			var imgs = res.imgs;
				for(var i=0 ; i<imgs.length; i++){
				var fname = 'frame'+i;
				krpano.call('addplugin('+fname+');'+
						 'plugin['+fname+'].loadstyle(frame);'+
						 'set(plugin['+fname+'].url,'+imgs[i].imgsrc+');');
				}
			 toggleBtns(false);
			krpano.call("set(currentframe,0);set(framecount,"+imgs.length+");set(oldmousex,0);showframe(0);");
		},'json')
	}
	else if(type == 'ring'){
		$.post('/ring_around.php',{
			'act':'init_ring',
			'id':oid
		},function(data){
			// console.log(data);
			$('#ring_around_url').attr('src',data);
			$("#ring_around").modal('show');
			if(is_moble>0){
				$('#ring_around').css({
					"padding-top":"50px"
				})
				$('#ring_around .modal-dialog').css({
					"width":'100%',
					"height":"50%"
				})
				H = $('#ring_around .modal-dialog').height();
				$('#ring_around_url').css({
					"width":'100%',
					"height":H
				})
			}
		})
	}
	
}


function close_ring_around(){
	 $("#ring_around").modal('hide');
	 $('#ring_around_url').attr('src','');
}