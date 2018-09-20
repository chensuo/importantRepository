$(function(){
	/*back-to-top*/
	var topMain=$(".head").height();
	$('.weui-tab').scroll(function(){
		if ($('.weui-tab').scrollTop()>topMain){
			$(".top").slideDown(500);
		}
		else{
			$(".top").slideUp(500);
		}
	});
	$(".top").click(function(){$(".weui-tab").animate({scrollTop:0},500)});
});