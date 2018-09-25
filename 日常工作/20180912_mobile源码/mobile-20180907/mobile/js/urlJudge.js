/**
 * Created by cs on 2018/9/18.
 */
/*根据url判断当前页面tabbar选中情况(发布于JEECMS时，需要更改indexOf里字符串)*/
$(function(){
    var  url = window.location.pathname;
    var $tabbarItem = $('.weui-tabbar__item');

    if(url.indexOf("discovery.html") >= 0 || url.indexOf("discovery-content.html") >= 0 || url.indexOf("discovery-content_2.html") >= 0){
        $($tabbarItem[1]).addClass('weui-bar__item--on');
        return false;
    }
    if(url.indexOf("guide.html") >= 0){
        $($tabbarItem[2]).addClass('weui-bar__item--on');
        return false;
    }
    if(url.indexOf("mine.html") >= 0){
        $($tabbarItem[3]).addClass('weui-bar__item--on');
        return false;
    }
        $($tabbarItem[0]).addClass('weui-bar__item--on');
});


