/*滚动条返回原位置*/
$(function(e){
        $('a').bind('click' , function(){
            window.localStorage.setItem('Scroll' , document.documentElement.scrollTop);
        })

        if(window.localStorage.getItem('Scroll')){
            $scroll = window.localStorage.getItem('Scroll');
            $("html,body").animate({"scrollTop": $scroll} , 0);
            window.localStorage.removeItem('Scroll');
        }
       
});