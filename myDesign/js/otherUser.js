
$(function(e){
	/*点击otherUser页面 导航按钮*/
	$('.nav-tabs>li').bind('click' , function(){
		$('.nav-tabs>li').removeClass();
		$(this).addClass('active');
	});
});