
/*����url�жϵ�ǰҳ��tabbarѡ�����(������JEECMSʱ����Ҫ����indexOf���ַ���)*/
$(function(){
    var  url = window.location.pathname;
    var $tabbarItem = $('.weui-tabbar__item');

    if(url.indexOf("tzgg/") >= 0 || url.indexOf("xw/") >= 0){
        $($tabbarItem[1]).addClass('weui-bar__item--on');
         return false;
    }
    if(url.indexOf("zn") >= 0){
        $($tabbarItem[2]).addClass('weui-bar__item--on');
         return false;
    }
   if(url.indexOf("wd") >= 0){
        $($tabbarItem[3]).addClass('weui-bar__item--on');
       return false;
    }
   if(url.indexOf("search.jspx") >= 0){
        $tabbarItem.removeClass('weui-bar__item--on');
        return false;
    }

    $($tabbarItem[0]).addClass('weui-bar__item--on');


});