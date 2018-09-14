$(function(e){
	$('.nav-tabs>li').bind('click' , function(){
		$('.nav-tabs>li').removeClass();
		$(this).addClass('active');
	});

	
	//点击当前订单
	$('.currentOrders').bind('click' , function(){
		$('.orders-container').css('display' , 'block');
		$('.orders-container-history').css('display' , 'none');
	});
	//点击历史订单
	$('.historyOrders').bind('click' , function(){
		$('.orders-container-history').css('display' , 'block');
		$('.orders-container').css('display' , 'none');
	});
});