/*判断当前"通知公告"页面是否是由详情页面返回的(适用jeecms布置后效果,模板无效果)*/
$(function(){
    var lastPageUrl = document.referrer;
    var $boxs = $('.box');
    var $navs = $('#discovery-nav a');
    $navs.removeClass('on');
    $boxs.removeClass('active');
    //当前通知公告页面是从"热门新闻"的某一热门新闻详情返回的,页面显示"热门新闻"列表内容；
    if(lastPageUrl.indexOf("xw") >= 0){
        $($navs[1]).addClass('on');
        $($boxs[1]).addClass('active');
    }
    //当前通知公告页面是从"通知公告"的某一通知公告详情返回或者是从其他页面进入的,页面显示"通知公告"列表内容；
    else{
        $($navs[0]).addClass('on');
        $($boxs[0]).addClass('active');
    }
});
