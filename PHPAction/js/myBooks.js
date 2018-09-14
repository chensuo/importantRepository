$(function(e){
	/*复选框问题*/
	$('.checkAll').change(function(){
		if($(this).prop("checked"))
			$('.checkThis').prop("checked", true);
		else
			$('.checkThis').prop("checked", false);
	});
	$('.checkThis').change(function(){
		if($('.checkThis').length == $('.checkThis:checked').length){
			$('.checkAll').prop("checked", true);
		}
		else{
			$('.checkAll').prop("checked", false);
		}
	});




	//点击移除
		// $('.remove-this').bind('click' , function(e){
		// 	this.setAttribute("data-target","#myModal");
		// });

	//点击提交按钮
	$message = $('.message-show');
	$('#btnSubmit').bind('click' , function(){
		if($('.checkAll').prop("checked")){
			$.get('ajax/submitOrder.php' , function(response){
				// console.log(response);
				if(response.code == 100){
					$('tbody .dataTr').remove();
					location.href="myOrders.php";
					
				}
				else{
					alert(response.message);
				}
			});
		}
		else{
			alert('请选择借阅书籍!(只能全选)');
		}
		
	});
});