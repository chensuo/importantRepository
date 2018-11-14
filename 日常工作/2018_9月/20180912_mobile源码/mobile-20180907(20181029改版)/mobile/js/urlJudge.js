/**
 * Created by cs on 2018/9/18.
 */
/*根据url判断当前页面tabbar选中情况(发布于JEECMS时，需要更改indexOf里字符串)*/
$(function(){
    var  url = window.location.pathname;
    var $tabbarItem = $('.weui-tabbar__item');

    //
    if(url.indexOf("discovery.html") >= 0){
        $($tabbarItem[1]).addClass('weui-bar__item--on');
        $($tabbarItem[1]).find("img").attr("src" , "../../mobile/img/dibu_sscbaike_xuanzhong.png");
        return false;
    }
    if(url.indexOf("mine.html") >= 0 || url.indexOf("myfavorite.html") >= 0){
        $($tabbarItem[2]).addClass('weui-bar__item--on');
        $($tabbarItem[2]).find("img").attr("src" , "../../mobile/img/dibu_wode_xuanzhong.png");
        return false;
    }
    $($tabbarItem[0]).addClass('weui-bar__item--on');
    $($tabbarItem[0]).find("img").attr("src" , "../../mobile/img/dibu_fuwu_xuanzhong.png");

});
