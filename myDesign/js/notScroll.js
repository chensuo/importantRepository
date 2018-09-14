/*页面中存在某些不需要记录滚动条位置的*/
$(function(e){
    $('a:not(.notScroll)').bind('click' , function(){
        window.localStorage.setItem('Scroll' , document.body.scrollTop);/*document.documentElement.scrollTop*/
	window.localStorage.setItem('Scroll1' , document.documentElement.scrollTop);/*document.body.scrollTop*/
    })

    if(window.localStorage.getItem('Scroll') > window.localStorage.getItem('Scroll1')){
        $scroll = window.localStorage.getItem('Scroll');
        window.localStorage.removeItem('Scroll');
	window.localStorage.removeItem('Scroll1');
        $("html,body").animate({"scrollTop": $scroll} , 0);

    }
   else{
        $scroll = window.localStorage.getItem('Scroll1');
	window.localStorage.removeItem('Scroll');
        window.localStorage.removeItem('Scroll1');
        $("html,body").animate({"scrollTop": $scroll} , 0);
    }
   
});