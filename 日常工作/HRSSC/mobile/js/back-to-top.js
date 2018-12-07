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

	/*解决因为输入法，底部菜单被顶上去*/
	var oHeight = $(document).height();

	$(window).resize(function(){

		if($(document).height() < oHeight){

			$(".fixed-bottom").hide();
		}else{

			$(".fixed-bottom").show();
		}

	});
});