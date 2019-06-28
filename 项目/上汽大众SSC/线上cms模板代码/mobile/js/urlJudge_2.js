/*根据url判断当前页面tabbar选中情况(发布于JEECMS时，需要更改indexOf里字符串)*/
$(function(){
    var  url = window.location.pathname;
    var $tabbarItem = $('.weui-tabbar__item');

    //服务页面选中
    //if(url.indexOf("tzgg/") >= 0 || url.indexOf("xw/") >= 0){
    //    $($tabbarItem[1]).addClass('weui-bar__item--on');
    //    $($tabbarItem[1]).find("img").attr("src" , "/cms/r/cms/www/mobile/img/dibu_fuwu_xuanzhong.png");
    //    return false;
    //}
    //我的页面判断选中
    if(url.indexOf("wd") >= 0){
        $($tabbarItem[2]).addClass('weui-bar__item--on');
        $($tabbarItem[2]).find("img").attr("src" ,document.lnkUrl +"r/cms/www/mobile/img/dibu_wode_xuanzhong.png");
        return false;
    }

    //百科页面选中
    $($tabbarItem[1]).addClass('weui-bar__item--on');
    $($tabbarItem[1]).find("img").attr("src" , document.lnkUrl +"r/cms/www/mobile/img/dibu_sscbaike_xuanzhong.png");


});
/*根据url判断当前页面tabbar选中情况*/
//$(function(){
//    var url = window.location.href;
//    if (url.indexOf("?") != -1) {
//        url = url.split("?" , 2)[0];
//    }
//    alert(url);
//    var urlList = [];
//    /*根据接口获取tabbar*/
//    var tabbars = [];
//    $.get(document.lnkUrl + "api/front/tabs", function(data){
//        //alert(data.code);
//        if(data.code == 200){
//            tabbars = data.body;
//            alert(tabbars[1].TAB_URL);
//            tabbars.sort(compare('TAB_SORT'));
//            for(var i=0;i<tabbars.length;i++){
//                urlList.push(tabbars[i].TAB_URL);
//            }
//            new Vue({
//                el: '#tabs',
//                data: {tabbars: tabbars}
//            });
//        }
//    });
//
//    //alert(tabbars);
//
//    //数组排序方法
//    function compare(property){
//        return function(a,b){
//            var value1 = a[property];
//            var value2 = b[property];
//            return value1 - value2;
//        }
//    };
//    //tabbar被点击 切换选中样式
//
//    var urlIndex = urlList.indexOf(url);
//    $($("#tabs>a")[urlIndex]).find(".tabbar-inactive").remove();
//    $($("#tabs>a")[urlIndex]).find(".tabbar-active").css("display" , "block");
//
//});
