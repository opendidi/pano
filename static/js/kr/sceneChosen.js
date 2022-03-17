$(function(){
     //全景图片素材点击事件
    $(document).on("click", "#panoImgList .col-sm-4", function (e) {
        var img = $(this).find("img");
        if ($(img).hasClass("material-active")) {
            $(img).removeClass("material-active");
            $(img).prev().prop("checked", false);
        } else {
            $(img).addClass("material-active");
            $(img).prev().prop("checked", true);
        }
        var chooseNum = $("#myLgModal .modal-body > div img.material-active").length;
        $('#myLgModal .modal-footer > span > em').text(chooseNum);
    });
})
function addSceneClick() {
    $("#panoImgList #panoImgList_wrap").html('');
    $('#myLgModal .modal-footer > span > em').text('0');
    
    list_pano_img(1);
    $("#myLgModal").modal("show");
}
function list_pano_img(_page){
    var obj = alert_notice("页面加载中...",'success');
    $.post('/member/project', { "act":"list_scenes","page":_page}, function(data){
        _pageCount = data.pageCount;
        _currentPage = data.currentPage;
        var pg = new Page('list_pano_img',_pageCount,_currentPage);
        dataEach(data.list);
        $("#pager_wrap").html(pg.printHtml());
        obj.hide();
    },'json');
}
//遍历
function dataEach(data){
    var htmlStr="";
    $.each(data,function (idx) {
        var checked = false;
        var pkImgMain = this.pk_img_main;
        $("#pics").children().each(function (idx) {
            if ($(this).attr("id") == pkImgMain) {
                checked = true;
            }
        });
        if (checked) {
            return true;
        }
         var thumbnail = "?imageView2/2/w/36";
         htmlStr += '<div class="col-sm-4" name="allItems"><input type="checkbox" ' + (checked ? "checked" : "") + ' data-imgpk="' + this.pk_img_main + '" data-imguuid="'+ this.view_uuid +'"><img class="' + (checked ? 'material-active' : "") + '" src="' + this.thumb_path+thumbnail + '"><span name="searchname" title="'+this.filename+'">' + subFileName(this.filename) + '</span></div>';
    });
    $("#panoImgList #panoImgList_wrap").html(htmlStr + '<div style="clear:both;"></div>');
}
function subFileName(filename) {
    if(filename && filename!=null){
        if (get_length(filename) > 10) {
            return cut_str(filename, 10)+"..";
        }
        return filename;
    }
    return "";

}
function get_length(s){
    var char_length = 0;
    for (var i = 0; i < s.length; i++){
        var son_char = s.charAt(i);
        encodeURI(son_char).length > 2 ? char_length += 1 : char_length += 0.5;
    }
    return char_length;
}
function saveWorkImg(callback) {
    var checkedArr = [];
    $("#panoImgList input[type=checkbox]:checked").each(function (idx) {
        var imgObj = {};
        imgObj.pk_img_main = $(this).attr("data-imgpk");
        imgObj.view_uuid = $(this).attr("data-imguuid");
        //imgObj.work_id = $(this).attr("data-workid");
        imgObj.location = interceptImg($(this).next().attr("src"));
        imgObj.filename = $(this).next().next().text();
        checkedArr.push(imgObj);
    });
    if (checkedArr.length > 0) {
        callback(checkedArr);
    } 
    $("#myLgModal").modal("hide");
}
function cut_str(str, len){
    var char_length = 0;
    for (var i = 0; i < str.length; i++){
        var son_str = str.charAt(i);
        encodeURI(son_str).length > 2 ? char_length += 1 : char_length += 0.5;
        if (char_length >= len){
            var sub_len = char_length == len ? i+1 : i;
            return str.substr(0, sub_len);
            break;
        }
    }
}
