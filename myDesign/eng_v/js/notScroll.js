/*页面中存在某些不需要记录滚动条位置的*/
$(function(e){
    $('a:not(.notScroll)').bind('click' , function(){
        window.localStorage.setItem('Scroll' , document.documentElement.scrollTop);
    })

    if(window.localStorage.getItem('Scroll')){
        $scroll = window.localStorage.getItem('Scroll');
        $("html,body").animate({"scrollTop": $scroll} , 0);
        window.localStorage.removeItem('Scroll');
    }
   
});