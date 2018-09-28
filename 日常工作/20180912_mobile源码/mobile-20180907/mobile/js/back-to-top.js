$(function(){
	/*back-to-top*/
	var topMain=$(".head").height();
	$('.weui-tab').scroll(function(){
		if ($('.weui-tab').scrollTop()>topMain){
			$(".top").fadeIn(400,"swing");
		}
		else{
			$(".top").fadeOut(400,"swing");
		}
	});
	$(".top").click(function(){$(".weui-tab").animate({scrollTop:0},400)});
});